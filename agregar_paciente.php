<?php
include("controladores/conexion.php")
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Clinica | Amigos en Apuros</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="adminlte/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="adminlte/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="adminlte/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="adminlte/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  
	
</head>
<body 
    <?php
      session_start();
       if(!isset($_SESSION["usuario"])){
        header("location:../clinica/panel_principal.php");
      }
    ?> 
<div class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li><a href="../clinica/controladores/cerrar.php"><i class="fa fa-sign" aria-hidden="true"></i>  Cerrar Sesión</a></li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo --> 
    <a href="panel_doctor.php" class="brand-link">
      <span class="brand-text font-weight-light"><i class="fa fa-ambulance" aria-hidden="true"></i>  Amigos en Apuros</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-2 pb-2 mb-3 d-flex">
        <div class="image">
            <?php
                     $sql="SELECT * FROM persona p, usuario u where u.codpersona = p.Codpersona and u.correo = ?";
                     $resultado=$conn->prepare($sql);
                     $resultado->execute(array($_SESSION["usuario"]));
                     while ($nombre=$resultado->fetch(pdo::FETCH_ASSOC)){
                       echo" <img src='img/$nombre[FotoPerfil]' class='img-circle elevation-2' alt='User Image'>
        </div>
        <div class='info'> ";
                     echo '<a href="informacioncliente.php" class="d-block">'.$nombre['Nombres'].'<br/>'.$nombre['Apellidos'].'</a>';
                      }
                ?>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header">DOCTOR</li>
              <li class="nav-item">
                <a href="citaspendientes.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Citas Pendientes</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="citasatendidas.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Citas Atendidas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="salas.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Salas</p>
                </a>
              </li>
              </ul>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
         <div class="container">
		<div class="content">
			<h2>Datos de los Pacientes &raquo; Agregar datos</h2>
			<hr />

			<?php
                        if (isset($_POST['add'])) {
                            $reg_Nombres = $_POST["Nombres"];
                            $reg_apellidos = $_POST["Apellidos"];
                            $reg_genero = $_POST["genero"];
                            $reg_fecha_nacimiento = $_POST["fecha_nacimiento"];
                            $reg_estado_civil = $_POST["estado_civil"];
                            $reg_direccion = $_POST["direccion"];
                            $reg_num_telefono = $_POST["num_telefono"];
                            $reg_num_Celular = $_POST["num_Celular"];
                            $reg_Pais = $_POST["Pais"];
                            $reg_TipoIdentidad = $_POST["TipoIdentidad"];
                            $reg_num_identidad = $_POST["num_identidad"];
                            $reg_tipo_sangre = $_POST["tipo_sangre"];
                            $reg_email = $_POST["CorreoElectronico"];
                            $reg_password = $_POST["Contraseña"];
                            $reg_password2 = $_POST["Contraseña2"];

                            $_fotoPerfil_name = $_FILES['fotoPerfil']['name'];
                            $_fotoPerfil_type = $_FILES['fotoPerfil']['type'];
                            $_fotoPerfil_size = $_FILES['fotoPerfil']['size'];
                            $_fotoPerfil_tem = $_FILES['fotoPerfil']['tmp_name'];
                            $_fotoPerfil_store = "img/" . $_fotoPerfil_name;

                            move_uploaded_file($_fotoPerfil_tem, $_fotoPerfil_store);

                            if ($reg_password == $reg_password2) {
                                include("connect_db.php");
                            } else {
                                echo '<script type="text/javascript">alert("Su Clave de verificación es Distinta");window.location.href="agregar_doctor.php";</script>';
                            }

                            $insert = mysqli_query($con, "INSERT INTO `persona`(`Nombres`, `Apellidos`, `Genero`, `FechaNacimiento`, `EstadoCivil`,FotoPerfil,`Direccion`,"
                                    . " `Telefono`, `Celular`, `CodPais`, `CodIdentificacion`, `Nume_Identificacion`, `CodTipoSangre`,"
                                    . " `CodTipoPersona`, `FechaModicicaion`) VALUES ('$reg_Nombres','$reg_apellidos',$reg_genero,'$reg_fecha_nacimiento',$reg_estado_civil,'$_fotoPerfil_name','$reg_direccion','$reg_num_telefono','$reg_num_Celular',$reg_Pais,'$reg_TipoIdentidad','$reg_num_identidad',$reg_tipo_sangre,'3',now())") or die(mysqli_error());
                            
                            $insert = mysqli_query($con,"INSERT INTO `usuario`(`Correo`, `Contraseña`, `CodPersona`, `CodPerfil`, `FechaCreacion`) VALUES ('$reg_email','$reg_password',LAST_INSERT_ID(),3,now())") or die(mysqli_error());
                            
                            $sql = mysqli_query($con, "SELECT * FROM usuario where correo = $_SESSION[usuario]");
                                               


                            if ($insert) {
                                echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Bien hecho! Los datos han sido guardados con éxito.</div>';
                            } else {
                                echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. No se pudo guardar los datos !</div>';
                            }
                        }
                        ?>

                        <center>
                            <div class="register-box">
                                <div class="card">
                                    <div class="card-body register-card-body">
                                        <p class="login-box-msg">Datos Generales</p>
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="input-group mb-3">
                                                <input type="text" name="Nombres" class="form-control"class="input-group date form-control" placeholder="Nombres" required>
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-user"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input-group mb-3">
                                                <input type="text" name="Apellidos" class="form-control" placeholder="Apellidos" required>
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-user"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input-group mb-3">
                                                <select name="Pais" class="form-control" >
                                                    <option disabled selected>País</option>
                                                    <option value="1">Honduras</option>
                                                    <option value="2">El Salvador</option>
                                                    <option value="3">Nicaragua</option>
                                                    <option value="4">Guatemala</option>
                                                    <option value="5">Costa Rica</option>
                                                    <option value="6">Panama</option>
                                                </select>
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input-group mb-3">
                                                <input type="text" name="fecha_nacimiento" class="input-group date form-control" date="" data-date-format="dd-mm-yyyy" placeholder="Fecha de nacimiento  dd/mm/yyyy" required>
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input-group mb-3">
                                                <select name="TipoIdentidad" class="form-control" >
                                                    <option disabled selected>Tipo de Identificación</option>
                                                    <option value="1">Identidad</option>
                                                    <option value="2">Pasaporte</option>
                                                    <option value="3">Carnet de Residencia</option>
                                                </select>
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input-group mb-3">
                                                <input type="text" name="num_identidad" class="form-control" placeholder="Numero de Identificación" required>
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input-group mb-3">
                                                <select name="genero" class="form-control">
                                                    <option disabled selected>Genero</option>
                                                    <option value="'m'">Masculino</option>
                                                    <option value="'f'">Femenino</option>
                                                </select>
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input-group mb-3">
                                                <select name="estado_civil" class="form-control">
                                                    <option disabled selected>Estado Civil</option>
                                                    <option value="'Soltero'">Soltero</option>
                                                    <option value="'Casado'">Casado</option>
                                                    <option value="'Unión Libre'">Unión Libre</option>
                                                    <option value="'Viudo'">Viudo</option>
                                                </select>
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input-group mb-3">
                                                <select name="tipo_sangre" class="form-control">
                                                    <option disabled selected>Tipo De Sangre</option>
                                                    <option value="1">O-</option>
                                                    <option value="2">O+</option>
                                                    <option value="3">A-</option>
                                                    <option value="4">A+</option>
                                                    <option value="5">B-</option>
                                                    <option value="6">B+</option>
                                                    <option value="7">AB-</option>
                                                    <option value="8">AB+</option>
                                                </select>
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                                
                                            <div class="input-group mb-3" btsExpInput>
                                                <textarea name="direccion" class="form-control" placeholder="Dirección" required></textarea>
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input-group mb-3">
                                                <input type="text" name="num_telefono" class="form-control" placeholder="Telefono" required>
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-phone"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input-group mb-3">
                                                <input type="text" name="num_Celular" class="form-control" placeholder="Celular" required>
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-mobile"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input-group mb-3">
                                                <input type="email" name="CorreoElectronico" class="form-control" placeholder="Correo Electronico" required>
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-envelope"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputFile">Foto De Perfil</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" name="fotoPerfil" class="custom-file-input" id="fotoPerfil">
                                                        <label class="custom-file-label" for="exampleInputFile">Elegir Una Foto</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input-group mb-3">
                                                <input type="password" name="Contraseña" class="form-control" placeholder="Contraseña">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-lock"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input-group mb-3">
                                                <input type="password" name="Contraseña2" class="form-control" placeholder="Repetir Contraseña">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-lock"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-5">
                                                <button type="submit" name="add" class="btn btn-primary btn-block" value="add">Registrar</button><br>
                                                <a href="doctores.php" class="btn btn-danger" >Cancelar</a>
                                            </div>
                                            <!-- /.col -->
                                    </div>
                                    </form>
                                </div>
                                <!-- /.form-box -->
                            </div>
                        </center>
		</div>
	</div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
</div>

<!-- jQuery -->
<script src="adminlte/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="adminlte/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<!-- Bootstrap 4 -->
<script src="adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="adminlte/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="adminlte/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="adminlte/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="adminlte/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="adminlte/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="adminlte/plugins/moment/moment.min.js"></script>
<script src="adminlte/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="adminlte/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="adminlte/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="adminlte/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="adminlte/dist/js/demo.js"></script>
</body>
<footer class="page-footer font-small teal pt-4">
<?php include('../clinica/footer.php');?>
</footer>
</html>
