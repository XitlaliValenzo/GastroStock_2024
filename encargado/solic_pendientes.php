<?php   
    session_start();
    include_once('../conf/config.php');
    if(!isset($_SESSION['ID'])){
        header("Location: ../index.php");
    }
    
    $nombre = $_SESSION['NAME'];
    $tipo_usuario = $_SESSION['ROLE'];  
    
    if(isset($_GET['m'])){
    $m = $_GET['m'];

    switch ($m) {
        case '1':
          echo "<div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
  <div class='modal-dialog'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='exampleModalLabel'>Estatus editado</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
        <center><p class='lead'>¡El estatus ha sido editado exitosamente!</p>
     
        <i class='fa-regular fa-circle-check fa-3xl' style='font-size:50px'></i> </center>
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-success' data-dismiss='modal'><i class='fa-solid fa-circle-check'></i> Ok</button>
      </div>
    </div>
  </div>
</div>";
          break;
          case '2':
            echo "<div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
      <div class='modal-dialog'>
        <div class='modal-content'>
          <div class='modal-header'>
            <h5 class='modal-title' id='exampleModalLabel'>Error al editar Estatus</h5>
            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
          </div>
          <div class='modal-body'>
            <center><p class='lead'>¡Se ha producido un error al editar el Estatus!</p>
         
            <i class='fa-solid fa-envelope fa-3xl' style='font-size:50px'></i> </center>
          </div>
          <div class='modal-footer'>
            <button type='button' class='btn btn-success' data-dismiss='modal'><i class='fa-solid fa-triangle-exclamation'></i> Ok</button>
          </div>
        </div>
      </div>
    </div>";
    break;
      }
    }
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requisiciones pendientes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <link href="../css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="../css/estilo-nav.css">
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <!-- CDN FontAwesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <style>
   #nav {
  background: #870000;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #190A05, #870000);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #190A05, #870000); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
   }
    
</style>
</head>
<body class="sb-nav-fixed">
<script>
  $(document).ready(function(){
    $('#exampleModal').modal('show');
  });
</script>
    <?php
        include_once("navbar.php");
    ?>
    <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Requisiciones pendientes</h1>
                        <br>
                        <hr>
                        <br>
      
                        <div class="card mb-4" style="border: none">
                            <!--<div class="card-header"><i class="fa-solid fa-briefcase"></i> Vacantes</div>-->
                            <div class="card-body">
                                <div class="table-responsive">
                                    
                                    <table class="table table-hover table-striped" id="dataTable" width="100%" cellspacing="0">

                                        <thead style="background-color:#5C9287 ;color: #fff;">
                                            <tr>
                                                <th>No.</th>
                                                <th>Equipo</th>
                                                <th>Materiales</th>
                                                <th>Fecha de requisición</th>
                                                <th>Total requerido</th>
                                                <th>Asignatura</th>
                                                <th>Profesor</th>
                                                <th>Estatus</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                        <?php

// Consulta SQL para obtener los datos de los equipos con sus integrantes
$sql_equipos = "SELECT s.equipo, GROUP_CONCAT(us.nombre, ' (', us.matricula, ')') AS alumnos, s.fecha_solicitud, s.asignatura, s.profesor, s.id, s.total
            FROM solicitud s
            INNER JOIN integrantes_equipo i ON s.equipo = i.num_equipo
            INNER JOIN usuarios us ON i.alumno = us.id
            WHERE s.estatus = 'pendiente'
            GROUP BY s.equipo";

// Consulta SQL para obtener los artículos asociados a cada solicitud
$sql_articulos = "SELECT s.id, GROUP_CONCAT(art.nombre,' (', a.cantidad_articulo, ')') AS nombres_articulos
                FROM solicitud s
                INNER JOIN articulos_solicitud a ON s.id = a.solicitud
                INNER JOIN articulos art ON a.articulo = art.id_articulo
                WHERE s.estatus = 'pendiente'
                GROUP BY s.id";

$result_equipos = $con->query($sql_equipos);
$result_articulos = $con->query($sql_articulos);

if ($result_equipos->num_rows > 0) {
    while ($row_equipo = $result_equipos->fetch_assoc()) {
        // Mostrar información del equipo y sus integrantes
        echo "<tr>
                  <td>" . $row_equipo['equipo'] . "</td>
                  <td>
                      <a href='#' class='text-danger' data-toggle='modal' data-target='#modal_equipo" . $row_equipo['equipo'] . "'>Equipo " . $row_equipo['equipo'] . "</a>
                  </td>";
        echo "<div class='modal fade' id='modal_equipo" . $row_equipo['equipo'] . "' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                    <div class='modal-dialog' role='document'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                            <div class='row align-items-center'>
                        <img src='../img/icono.png' alt='chef' width='60px' height='60px'>
                        <h5 class='modal-title' id='exampleModalLabel'>Equipo " . $row_equipo['equipo'] . "</h5>
                      </div>
                                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                </button>
                            </div>
                            <div class='modal-body'>
                                <ul>";
        // Convertir la cadena de integrantes separados por comas en una lista
        $integrantes = explode(",", $row_equipo['alumnos']);
        foreach ($integrantes as $integrante) {
            echo "<li>" . $integrante . "</li>";
        }
        echo "</ul>
                            </div>
                            <div class='modal-footer'>
                                <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                            </div>
                        </div>
                    </div>
                </div>";

        // Obtener los datos de los artículos asociados a la solicitud actual
        $row_articulo = $result_articulos->fetch_assoc();
        if ($row_articulo) {
            // Mostrar información del artículo asociado
            echo "<td>
                      <a href='#' class='text-danger' data-toggle='modal' data-target='#modal_articulo" . $row_articulo['id'] . "'>Ver materiales</a>
                  </td>";
            echo "<div class='modal fade' id='modal_articulo" . $row_articulo['id'] . "' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                    <div class='modal-dialog' role='document'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                            <div class='row align-items-center'>
                        <img src='../img/icono.png' alt='chef' width='60px' height='60px'>
                        <h5 class='modal-title' id='exampleModalLabel'>Material</h5>
                      </div>
                                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                </button>
                            </div>
                            <div class='modal-body'>
                                <ul>";
            // Convertir la cadena de artículos separados por comas en una lista
            $nombres_articulos = explode(",", $row_articulo['nombres_articulos']);
            foreach ($nombres_articulos as $nombre_articulo) {
                echo "<li>" . $nombre_articulo . "</li>";
            }
            echo "</ul>
                            </div>
                            <div class='modal-footer'>
                                <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                            </div>
                        </div>
                    </div>
                </div>";
        } else {
            echo "<td colspan='2'>No se encontraron materiales para esta requisición</td>";
        }

        echo "<td>".$row_equipo['fecha_solicitud']."</td>
            <td>".$row_equipo['total']."</td>
              <td>".$row_equipo['asignatura']."</td>
              <td>".$row_equipo['profesor']."</td>

<!-- Modal para cambiar estatus -->
<td>
    <div class='container-fluid text-center'>
        <button type='button' class='btn btn-outline-primary cambiar-estatus' data-toggle='modal' data-target='#cambiarEstatusModal-" . $row_equipo['id'] . "' data-id='" . $row_equipo['id'] . "'><i class='fa-solid fa-pencil'></i> Cambiar estatus</button>
    </div>
</td>

<div class='modal fade' id='cambiarEstatusModal-" . $row_equipo['id'] . "' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
    <div class='modal-dialog' role='document'>
        <div class='modal-content'>
            <div class='modal-header'>
                <h5 class='modal-title' id='exampleModalLabel'>Cambiar Estatus</h5>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>
            <div class='modal-body'>
                <p>Selecciona el nuevo estatus:</p>
                <form class='cambiar-estatus-form' method='POST' action='actualizar_estatus_pendientes.php'>
                    <select class='form-control' name='nuevoEstatus'>
                        <option value='pendiente'>Pendiente</option>
                        <option value='prestamo'>Prestamo</option>
                        <option value='faltantes'>Faltantes</option>
                        <option value='finalizada'>Finalizada</option>
                    </select>
                    <input type='hidden' name='id' value='" . $row_equipo['id'] . "'>
                    <br>
                    <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancelar</button>
                    <button type='submit' class='btn btn-primary'>Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>



              </tr>";
    }
} else {
    echo "<tr><td colspan='6'><center>No se encontraron equipos con estatus pendiente</center></td></tr>";
}
?>

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            
          </div>
          <br>
          <br>
          <br>
        </main>
        <?php include_once('footer.php'); ?>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="../assets/demo/chart-area-demo.js"></script>
        <script src="../assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="../assets/demo/datatables-demo.js"></script>
        <script>
document.addEventListener('DOMContentLoaded', function() {
  // Obtener los elementos con la clase 'btn-equipo' y 'btn-total'
  var btnEquipos = document.querySelectorAll('.btn-equipo');
  var btnTotales = document.querySelectorAll('.btn-total');
  
  // Agregar un evento clic a cada botón de equipo para mostrar un popup con el texto correspondiente
  btnEquipos.forEach(function(btnEquipo) {
    btnEquipo.addEventListener('click', function() {
      var equipo = this.dataset.equipo;
      alert(equipo);
    });
  });
  
  // Agregar un evento clic a cada botón de total para mostrar un popup con el total correspondiente
  btnTotales.forEach(function(btnTotal) {
    btnTotal.addEventListener('click', function() {
      var total = this.dataset.total;
      alert('Total: ' + total);
    });
  });
});
</script>
<script>
    // Script para manejar el cambio de estatus
    $('#cambiarEstatusModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Botón que activó el modal
        var idSolicitud = button.data('id'); // Extraer el ID de los datos del botón
        var modal = $(this);
        modal.find('#idSolicitud').val(idSolicitud); // Asignar el ID al campo oculto del formulario
    });

    // Script para enviar el formulario al hacer clic en el botón Guardar
    $('#guardarEstatus').click(function() {
        $('#cambiarEstatusForm').submit(); // Enviar el formulario
    });
</script>

</body>
</html>