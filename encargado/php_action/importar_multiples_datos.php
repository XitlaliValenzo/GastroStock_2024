<?php
require '../../conf/config.php';

if (isset($_POST["import"])) {
    // Verificar si el archivo ha sido subido correctamente
    if (isset($_FILES['excel']) && $_FILES['excel']['error'] === UPLOAD_ERR_OK) {
        $fileName = $_FILES["excel"]["name"];
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $newFileName = date("Y.m.d") . " - " . date("h.i.sa") . "." . $fileExtension;
        $targetDirectory = "uploads/" . $newFileName;

        // Mover el archivo a la carpeta de destino
        if (!move_uploaded_file($_FILES['excel']['tmp_name'], $targetDirectory)) {
            die("Error al mover el archivo subido.");
        }

        // Habilitar la visualización de errores para depuración
        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        // Requerir las librerías para leer archivos Excel
        require 'excelReader/excel_reader2.php';
        require 'excelReader/SpreadsheetReader.php';

        // Leer el archivo Excel
        $reader = new SpreadsheetReader($targetDirectory);

        $isFirstRow = true; // Variable para identificar la primera fila

        foreach ($reader as $key => $row) {
            if ($isFirstRow) {
                $isFirstRow = false; // Saltar la primera fila
                continue;
            }

            // Escapar los datos para prevenir SQL Injection
            $nombre = mysqli_real_escape_string($con, $row[0]);
            $email = mysqli_real_escape_string($con, $row[1]);
            $password = 12345678; // Contraseña predeterminada
            $passHash = password_hash($password, PASSWORD_DEFAULT); // Encriptar la contraseña
            $matricula = mysqli_real_escape_string($con, $row[2]);
            $cuatrimestre = isset($row[3]) && is_numeric($row[3]) ? intval($row[3]) : 0;
            $grupo = mysqli_real_escape_string($con, $row[4]);

            // Verificar si el email o la matrícula ya existen
            $checkQuery = "SELECT * FROM usuarios WHERE email='$email' OR matricula='$matricula'";
            $result = mysqli_query($con, $checkQuery);

            if (!$result) {
                die("Error en la consulta: " . mysqli_error($con));
            }

            if (mysqli_num_rows($result) == 0) {
                $query = "INSERT INTO usuarios (nombre, email, password, cuatrimestre, grupo, matricula, role, activo) VALUES ('$nombre', '$email', '$passHash', '$cuatrimestre', '$grupo', '$matricula', 'alumno', 1)";
                if (!mysqli_query($con, $query)) {
                    die("Error al insertar datos: " . mysqli_error($con));
                }
            }
        }

        // Cerrar la conexión a la base de datos
        mysqli_close($con);

        echo "<script>
        alert('Successfully Imported');
        document.location.href = '../alumnos.php';
        </script>";
    } else {
        die("Error al subir el archivo.");
    }
}
?>
