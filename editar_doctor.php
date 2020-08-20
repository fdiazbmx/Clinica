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
      include ('controladores/sesion_admin.php');
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
    <a href="panel_admin.php" class="brand-link">
      <span class="brand-text font-weight-light"><i class="fa fa-ambulance" aria-hidden="true"></i>  Amigos en Apuros</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-2 pb-2 mb-3 d-flex">
        <?php
            include 'foto_nombre_admin.php';
        ?>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header">ADMINISTRADOR</li>
              <li class="nav-item">
                <a href="doctores.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Doctores</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="especialidades.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Especialidades</p>
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
			<h2>Datos de los Doctores &raquo; Agregar datos</h2>
			<hr />

                        <?php                          
                       $nik = mysqli_real_escape_string($con,(strip_tags($_GET["nik"],ENT_QUOTES)));
			$sql = mysqli_query($con, "SELECT * FROM persona p,empleados e WHERE p.codpersona=e.codpersona and p.codpersona='$nik'");
			if(mysqli_num_rows($sql) == 0){
				header("Location: panel_admin.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			if (isset($_POST['add'])) {                           
                            $reg_estado_civil = $_POST["estado_civil"];
                            $reg_direccion = $_POST["direccion"];
                            $reg_num_telefono = $_POST["num_telefono"];
                            $reg_num_Celular = $_POST["num_Celular"];
                            $reg_salario = $_POST["salario"];
                            
                            $update = mysqli_query($con, "UPDATE `persona` SET `EstadoCivil`=$reg_estado_civil,`Direccion`='$reg_direccion',`Telefono`='$reg_num_telefono',`Celular`='$reg_num_Celular',`FechaModicicaion`=now() WHERE CodPersona = '$nik'") or die(mysqli_error()); 
                            //$update1 = mysqli_query($con, "update empleados set salario = $reg_salario, FechaModicicaion =now() WHERE CodPersona = '$nik'") or die(mysqli_error()); 
                            if ($update) {
                                echo '<script type="text/javascript">alert("Datos Actualizados Correctamente");window.location.href="doctores.php";</script>';
                            } else {
                                echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error, no se pudo guardar los datos.</div>';
                            }
                        }                        
                        ?>

                        <center>
                            <div class="register-box">
                                <div class="card">
                                    <div class="card-body register-card-body">
                                        <p class="login-box-msg">Datos Generales</p>
                                        <form action="" method="post">
                                            <div class="input-group mb-3">
                                                <select name="estado_civil" class="form-control" required>
                                                    <option disabled selected value="">Estado Civil</option>
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
                                                <input type="text" name="salario" value="L.<?php echo $row ['Salario']; ?>"class="form-control" placeholder="Salario" required>
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input-group mb-3" btsExpInput>
                                                <input type="text" name="direccion"value="<?php echo $row ['Direccion']; ?>" class="form-control" placeholder="direccion" required>
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input-group mb-3">
                                                <input type="text" name="num_telefono"value="<?php echo $row ['Telefono']; ?>" placeholder="Telefono" class="form-control"required pattern="\[0-9]{8,8}"  title="Un número de teléfono válido debe de constar con 8 digitos" >
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-phone"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input-group mb-3">
                                                <input type="text" name="num_Celular"value="<?php echo $row ['Celular']; ?>" class="form-control" placeholder="Celular" required pattern="\[0-9]{8,8}"  title="Un número de teléfono válido debe de constar con 8 digitos" >
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-mobile"></span>
                                                    </div>
                                                </div>
                                            </div>                                                                                                                                                                                                                        
                                            <div class="col-5">
                                                <button type="submit" name="add" class="btn btn-primary btn-block" value="add">Actualizar</button><br>
                                                <a href="doctores.php" class="btn btn-danger" >Cancelar</a>
                                            </div>
                                            </form>
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
