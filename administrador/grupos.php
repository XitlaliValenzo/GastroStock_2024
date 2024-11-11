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
        <h5 class='modal-title' id='exampleModalLabel'>Grupos añadidos</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
        <center><p class='lead'>¡Los grupos se han añadido exitosamente!</p>
     
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
        <h5 class='modal-title' id='exampleModalLabel'>Grupo actualizado</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
        <center><p class='lead'>¡Grupo actualizado correctamente!</p>
     
        <i class='fa-regular fa-circle-check fa-3xl' style='font-size:50px'></i> </center>
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-success' data-dismiss='modal'><i class='fa-solid fa-circle-check'></i> Ok</button>
      </div>
    </div>
  </div>
</div>";
          break;
          case '3':
        echo "<div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
  <div class='modal-dialog'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='exampleModalLabel'>Grupo elimiando</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
        <center><p class='lead'>¡Grupo eliminado exitosamente!</p>
     
        <i class='fa-regular fa-circle-check fa-3xl' style='font-size:50px'></i> </center>
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-success' data-dismiss='modal'><i class='fa-solid fa-circle-check'></i> Ok</button>
      </div>
    </div>
  </div>
</div>";
        break;
        case '4':
          echo "<div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
  <div class='modal-dialog'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='exampleModalLabel'>Alumnos asignados</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
        <center><p class='lead'>¡Alumnos asignados exitosamente!</p>
     
        <i class='fa-regular fa-circle-check fa-3xl' style='font-size:50px'></i> </center>
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-success' data-dismiss='modal'><i class='fa-solid fa-circle-check'></i> Ok</button>
      </div>
    </div>
  </div>
</div>";
          break;
          case '5':
          echo "<div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
  <div class='modal-dialog'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='exampleModalLabel'>Contraseña restablecida</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
        <center><p class='lead'>¡Contraseña restablecida correctamente!</p>
     
        <i class='fa-solid fa-lock fa-3xl' style='font-size:50px'></i> </center>
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-success' data-dismiss='modal'><i class='fa-solid fa-circle-check'></i> Ok</button>
      </div>
    </div>
  </div>
</div>";
          break;
          case '6':
          echo "<div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
  <div class='modal-dialog'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='exampleModalLabel'>Cuentas creadas</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
        <center><p class='lead'>¡Registros insertados exitosamente!</p>
     
        <i class='fa-regular fa-circle-check fa-3xl' style='font-size:50px'></i> </center>
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-success' data-dismiss='modal'><i class='fa-solid fa-circle-check'></i> Ok</button>
      </div>
    </div>
  </div>
</div>";
          break;
          case '7':
          echo "<div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
  <div class='modal-dialog'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='exampleModalLabel'>Registros duplicados</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
        <center><p class='lead'>¡Lo sentimos, existen registros duplicados!</p>
     
        <i class='fa-regular fa-circle-xmark fa-3xl' style='font-size:50px'></i> </center>
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-success' data-dismiss='modal'><i class='fa-solid fa-circle-check'></i> Ok</button>
      </div>
    </div>
  </div>
</div>";
          break;
          case '8':
            echo "<div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
    <div class='modal-dialog'>
      <div class='modal-content'>
        <div class='modal-header'>
          <h5 class='modal-title' id='exampleModalLabel'>Grupos actualizados</h5>
          <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button>
        </div>
        <div class='modal-body'>
          <center><p class='lead'>¡Actualización realizada exitosamente!</p>
       
          <i class='fa-regular fa-circle-check fa-3xl' style='font-size:50px'></i> </center>
        </div>
        <div class='modal-footer'>
          <button type='button' class='btn btn-success' data-dismiss='modal'><i class='fa-solid fa-circle-check'></i> Ok</button>
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
	<title>Grupos</title>
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
                        <h1 class="mt-4">Grupos</h1>
                        <br>
                        <hr>
                        <br>                        
                        <div class="card mb-4" style="border: none">
                            <div class="card-body">
                                <div class="table-responsive">
                                	
                                    <table class="table table-hover table-striped" id="dataTable" width="100%" cellspacing="0">

                                        <thead style="background-color:#5C9287 ;color: #fff;">
                                            <tr>
                                                <th>Grupo</th>
                                                <th>Nivel</th>
                                                <th>Asignar</th>
                                                <th>Cambiar</th>
                                                <th>Editar</th>
                                                <th>Eliminar</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                        	
                                          <?php
          $sql = "SELECT * FROM grupo WHERE estatus = 1";
          $result = $con -> query($sql);
            $i=1;
          if($result ->num_rows > 0){
            while($row = $result ->fetch_assoc()) { ?>
              <tr>
                  <td><?php echo $row['grupo'] ?></td>
                  <td><?php echo ucfirst($row['nivel']) ?></td>
                  <td>
                    <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#exampleModal3_<?php echo $i ?>">
                    <i class="fa-solid fa-users"></i>
</button>
<!-- Modal -->
<div class="modal fade" id="exampleModal3_<?php echo $i ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Asignar alumnos ( <?php echo $row['grupo'] ?> )</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="php_action/grupos.php" method="POST">

      <div class="form-group">
        <label for="alumnos">Alumnos</label>
        <input type="text" class="form-control" placeholder="Buscar..." id="buscador">

      </div>
      
        <?php 
        $alumnos = "SELECT * FROM usuarios WHERE role = 'alumno' and activo = 1";
        $resultAlumnos = $con -> query($alumnos);
        if($resultAlumnos ->num_rows > 0){
          while($check = $resultAlumnos ->fetch_assoc()){ ?>
          <div class="form-check">
          <input class="form-check-input" type="checkbox" value="<?php echo $check['id'] ?>" id="alumnos" name="alumnos[]">
        <label class="form-check-label" for="defaultCheck1">
        <?php echo $check['matricula'] . ' - ' . $check['nombre'] ?>
        </label>
        </div>
          <?php }
        }
        ?>  
      <input type="hidden" name="id_grupo" value="<?php echo $row['id_grupo'] ?>">
      <input type="hidden" name="asignar" value="asignar">
      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-danger">Asignar</button>
      </form>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
                  </td>
                  <td>
                    <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#exampleModal3_<?php echo $i ?>">
                    <i class="fa-solid fa-arrows-rotate"></i>
</button>
<!-- Modal -->
<div class="modal fade" id="exampleModal3_<?php echo $i ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cambiar alumnos ( <?php echo $row['grupo'] ?> )</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="php_action/grupos.php" method="POST">

      <div class="form-group">
        <label for="alumnos">Alumnos</label>
        <input type="text" class="form-control" placeholder="Buscar..." id="buscador">

      </div>
      
        <?php 
        $id_grupo = $row['id_grupo'];
        $alumnos = "SELECT * FROM usuarios WHERE role = 'alumno' and activo = 1 and grupo = '$id_grupo'  ";
        $resultAlumnos = $con -> query($alumnos);
        if($resultAlumnos ->num_rows > 0){
          while($check = $resultAlumnos ->fetch_assoc()){ ?>
          <div class="form-check">
          <input class="form-check-input" type="checkbox" value="<?php echo $check['id'] ?>" id="alumnos" name="alumnos[]">
        <label class="form-check-label" for="defaultCheck1">
        <?php echo $check['matricula'] . ' - ' . $check['nombre'] . ' - '. $check['grupo']?>
        </label>
        </div>
          <?php }
        }
        ?>  
      <input type="hidden" name="id_grupo" value="<?php echo $row['id_grupo'] ?>">
      <input type="hidden" name="asignar" value="asignar">
      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-danger">Asignar</button>
      </form>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
                  </td>
                  <td>
                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal1_<?php echo $i ?>">
                    <i class="fa-solid fa-pencil"></i>
</button>
<!-- Modal -->
<div class="modal fade" id="exampleModal1_<?php echo $i ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="php_action/grupos.php" method="POST">
        <div class="form-group">
            <label for="grupo">Grupo</label>
            <input type="text" class="form-control" id="grupo" name="grupo" value="<?php echo $row['grupo']?>">
        </div>
        <div class="form-group">
      <label for="nivel">Nivel</label>
      <select id="nivel" class="form-control" name="nivel">
        <option selected><?php echo $row['nivel']?></option>
        <?php
            if ($row['nivel'] == 'ingeniería'){ ?>
                <option value="TSU">TSU</option>
            <?php } else { ?>
                <option value="ingeniería">Ingeniería</option>
            <?php }
        ?>
      </select>
    </div>
      <input type="hidden" name="id" value="<?php echo $row['id_grupo'] ?>">
      <input type="hidden" name="editar" value="editar">
      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-danger">Actualizar</button>
      </form>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
                  </td>
                  <td class="text-center">
                    <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModal2_<?php echo $i ?>">
  <i class="fa-solid fa-trash"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal2_<?php echo $i ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmar eliminación</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ¿Realmente deseas eliminar este grupo?
      </div>
      <div class="modal-footer">
      <form action="php_action/grupos.php" method="POST">
      <input type="hidden" name="id" value="<?php echo $row['id_grupo'] ?>">
      <input type="hidden" name="eliminar" value="eliminar">
      <button type="submit" class="btn btn-danger">Eliminar</button>
      </form>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
                  </td>

                  
              </tr>
              <?php $i++;
            }
          } else{
            echo "<tr> <td colspan='4'> <center>Aún no se han registrado alumnos</center></td></tr>";
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
          <br>
          <br>
         
      <style>
        .custom-list {
            list-style-type: none;
            padding: 0;
        }
        .custom-list li {
            margin-bottom: 10px;
        }
    </style>
         
      <div class="d-flex container-fluid justify-content-end fixed-bottom p-5">
        <ul class="custom-list">
            <li>
                <button type="button" class="btn shadow " style="border-radius: 50px;background-color: #2FC463;color:#fff;" data-toggle="modal" data-target="#grupoModal"><i class="fa-solid fa-circle-plus"></i> Añadir grupos</button>
            </li>
            
        </ul>
        

    </div>
    <!-- Modal -->
<div class="modal fade" id="grupoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  
  <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Añadir grupos</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="php_action/grupos.php" method="POST" id="form_grupos">
        <div class="form-group">
        <label for="nivel">Nivel</label>
        <select id="nivel" class="form-control" name='nivel'>
          <option selected>Ingresa el nivel</option>
          <option value="TSU">TSU</option>
          <option value="ingeniería">Ingeniería</option>
        </select>
      </div>
  
      <div class="form-group">
              <label for="cantidad_grupo2" id="cantidad_grupo2">Cantidad de grupos a añadir</label>
              <input type="number" class="form-control" id="cantidad_grupo" name="cantidad_grupo" placeholder="Ingresa la cantidad de grupos">
          </div>
          <div id="contenedorCampos"></div>
        <input type="hidden" name="agregar" value="agregar">
        </div>
        <div class="modal-footer">
        <button type="submit" class="btn btn-danger">Añadir</button>
        </form>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div>
        </main>
        <script>
          document.addEventListener('DOMContentLoaded', function() {
            
            document.getElementById('cantidad_grupo').addEventListener('input', function() {
                generarCampos();
            });

            document.addEventListener('keyup', e=> {
              if (e.target.matches('#buscador')){
                document.querySelectorAll(".form-check").forEach(alumno=>{
                  alumno.textContent.toLowerCase().includes(e.target.value.toLowerCase())
                  ?alumno.style.display = 'block'
                  :alumno.style.display = 'none';
                })
              }
            });
        });

        function generarCampos() {
            const contenedor = document.getElementById('contenedorCampos');
            const numeroCampos = parseInt(document.getElementById('cantidad_grupo').value);

            contenedor.innerHTML = '';

            if (isNaN(numeroCampos) || numeroCampos <= 0) {
                return; 
            }

            for (let i = 1; i <= numeroCampos; i++) {
                const div_grupo = document.createElement('div');
                const label_grupo = document.createElement('label');
                const nombre_grupo = document.createElement('input');

                div_grupo.className = 'form-group';
                label_grupo.textContent = `Nombre del grupo ${i}:`;
                nombre_grupo.type = 'text';
                nombre_grupo.placeholder = `Ingresa el nombre del grupo ${i}`;
                nombre_grupo.name = `nombre_grupo${i}`;
                nombre_grupo.className = 'form-control';

                contenedor.appendChild(div_grupo);
                contenedor.appendChild(label_grupo);
                contenedor.appendChild(nombre_grupo);
            }
        }

            </script>
   
        <?php include_once('footer.php'); ?>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        
      
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="../assets/demo/datatables-demo.js"></script>
</body>
</html>