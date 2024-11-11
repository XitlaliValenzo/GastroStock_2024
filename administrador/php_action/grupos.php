<?php 
    include '../../conf/config.php';

    /*$eliminar = $_POST['eliminar'];
    $agregar = $_POST['agregar'];
    $editar = $_POST['editar'];*/

    function agregar($con, $grupo, $nivel){
        $sqlInsert = "INSERT INTO grupo (grupo, nivel, estatus) VALUES ('$grupo','$nivel', 1)";
        return $sqlInsert;
    }

    function editar($con, $nivel, $grupo, $id){
        $sqlUpdate = "UPDATE grupo SET grupo = '$grupo', nivel = '$nivel' WHERE id_grupo = '$id' ";
        return $sqlUpdate;
    }

    function eliminar($con,$id){
        $sqlDelete = "UPDATE grupo SET estatus = 2 WHERE id_grupo = '$id' ";
        return $sqlDelete;
    }

    function asignar($con,$id_grupo,$id_alumno){
        $sqlAsignar = "UPDATE usuarios SET grupo = '$id_grupo' WHERE id = '$id_alumno' ";
        return $sqlAsignar;
    }


    if ($_POST){
        if (isset($_POST['eliminar'])){
            $id = $_POST['id'];
            $sqlDelete = eliminar($con, $id);

            if ($con->query($sqlDelete) === TRUE){
                header("Location: ../grupos.php?m=3");
            } else {
                echo "Error al eliminar el grupo " . $con->error;
            }

            
        } else if(isset($_POST['editar'])){
            $nivel = $_POST['nivel'];
            $grupo = $_POST['grupo'];
            $id = $_POST['id'];

            $sqlUpdate = editar($con, $nivel, $grupo, $id);

            if ($con->query($sqlUpdate) === TRUE){
                header("Location: ../grupos.php?m=2");
            } else {
                echo "Error al actualizar el grupo " . $con->error;
            }

        } else if(isset($_POST['agregar'])){
            $nivel = $_POST['nivel'];
            $cantidad = $_POST['cantidad_grupo'];

            for($i=1; $i<=$cantidad; $i++){
                $grupo = $_POST['nombre_grupo'.$i];
                $sqlInsert = agregar($con, $grupo, $nivel); 

                if (!$con->query($sqlInsert)) {
                    echo "Error al insertar el grupo " . $con->error;
                    exit; 
                }
            }
            header("Location: ../grupos.php?m=1");
            exit;
        } else if(isset($_POST['asignar'])){
            $alumnos = $_POST['alumnos'];
            $id_grupo = $_POST['id_grupo'];
            foreach ($alumnos as $valor) {
                $id_alumno = $valor;
                $sqlAsignar = asignar($con,$id_grupo,$id_alumno);

                if (!$con->query($sqlAsignar)) {
                    echo "Error al asignar grupo " . $con->error;
                    exit; 
                }
            }
            header("Location: ../grupos.php?m=4");
            exit;

        }
    }

    mysqli_close($con);
?>