<?php
include_once "../conf/config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el nuevo estatus y el ID de la solicitud desde el formulario
    $nuevoEstatus = $_POST['nuevoEstatus'];
    $idSolicitud = $_POST['id']; 

    // Consulta SQL para actualizar el estatus en la base de datos
    $sql = "UPDATE solicitud SET estatus = '$nuevoEstatus' WHERE id = $idSolicitud";

    // Ejecutar la consulta
    if (mysqli_query($con, $sql)) {
        if ($nuevoEstatus == 'finalizada') {
            // Acción específica para estatus 'finalizada'
            // Obtener los artículos de la solicitud
            $sqlArticulosSolicitud = "SELECT articulo, cantidad_articulo FROM articulos_solicitud WHERE solicitud = $idSolicitud";
            $resultArticulosSolicitud = mysqli_query($con, $sqlArticulosSolicitud);

            if ($resultArticulosSolicitud) {
                while ($row = mysqli_fetch_assoc($resultArticulosSolicitud)) {
                    $idArticulo = $row['articulo'];
                    $cantidadArticulo = $row['cantidad_articulo'];

                    // Actualizar la cantidad en la tabla articulos
                    $sqlUpdateArticulo = "UPDATE articulos SET cantidad = cantidad + $cantidadArticulo WHERE id_articulo = $idArticulo";
                    mysqli_query($con, $sqlUpdateArticulo);
                }
            }
            header("Location: solic_finalizadas.php?m=1");
        } else {
            header("Location: solic_pendientes.php?m=1");
        }
    } else {
        header("Location: solic_pendientes.php?m=2");
    }
} else {
    echo "Error al obtener la matrícula original del usuario.";
}
?>
