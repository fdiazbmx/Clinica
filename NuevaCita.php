
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
include ('controladores/conexion.php');
session_start();
if (!isset($_SESSION["usuario"])) {
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
                    <li><a href="panel_principal.php"><i class="fas fa-sign-out" aria-hidden="true"></i>Cerrar Sesión</a></li>
                </ul>
            </nav>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo --> 
                <a href="panel_clientes.php" class="brand-link">
                    <span class="brand-text font-weight-light"><i class="fa fa-ambulance" aria-hidden="true"></i>  Amigos en Apuros</span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="imagenes/descarga.png" class="img-circle elevation-2" alt="User Image">
                        </div>
                        <div class="info">
                            <?php
                            $sql = "SELECT * FROM persona p, usuario u where u.codpersona = p.Codpersona and u.correo = ?";
                            $resultado = $conn->prepare($sql);
                            $resultado->execute(array($_SESSION["usuario"]));
                            while ($nombre = $resultado->fetch(pdo::FETCH_ASSOC)) {
                                echo '<a href="informacioncliente.php" class="d-block">' . $nombre['Nombres'] . ' ' . $nombre['Apellidos'] . '</a>';
                            }
                            ?>
                        </div>
                    </div>

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
                            with font-awesome or any other icon font library -->
                            <li class="nav-header">PACIENTE</li>
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-edit"></i>
                                    <p>
                                        Cita Medica
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="NuevaCita.php" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Crear Cita</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/forms/advanced.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Citas</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
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
                                                <h2> Agregar Cita</h2>
                                                <hr />

                                                <?php
                                                
                                                if (isset($_POST['add'])) {

                                                    $id_paciente = mysqli_real_escape_string($conn, (strip_tags($_POST["id_paciente"], ENT_QUOTES))); //Escanpando caracteres 
                                                    $id_especialidad = mysqli_real_escape_string($conn, (strip_tags($_POST["id_especialidad"], ENT_QUOTES))); //Escanpando caracteres 
                                                    $fecha_cita = mysqli_real_escape_string($conn, (strip_tags($_POST["fecha_cita"], ENT_QUOTES))); //Escanpando caracteres 
                                                    $horainicial = mysqli_real_escape_string($conn, (strip_tags($_POST["horainicial"], ENT_QUOTES))); //Escanpando caracteres 
                                                    $horafinal = mysqli_real_escape_string($conn, (strip_tags($_POST["horafinal"], ENT_QUOTES))); //Escanpando caracteres 
                                                    $id_empleado = mysqli_real_escape_string($conn, (strip_tags($_POST["id_empleado"], ENT_QUOTES))); //Escanpando caracteres 



                                                    $insert = mysqli_query($conn, "INSERT INTO citas (id_paciente, id_especialidad, fecha_cita, horainicial, horafinal, id_empleado)
                      VALUES( '$id_paciente','$id_especialidad', '$fecha_cita', '$horainicial', '$horafinal', '$id_empleado' )") or die(mysqli_error());
                                                    if ($insert) {
                                                        echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Bien hecho! Los datos han sido guardados con éxito.</div>';
                                                    } else {
                                                        echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. No se pudo guardar los datos !</div>';
                                                    }
                                                }
                                                ?>

                                                <form class="form-horizontal" action="" method="post">
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Especialidad</label>
                                                        <div class="col-sm-3">
                                                            <select name="id_especialidad" class="form-control">
                                                                <option value=""> ------ </option>
<?php
$sql = "SELECT * FROM especialidades";
$resultado = $conn->prepare($sql);
$resultado->execute(array(""));
while ($especialidad = $resultado->fetch(pdo::FETCH_ASSOC)) {
    echo '<option value="' . $especialidad[CodEspecialidad] . '">' . $especialidad[Nombre] . '</option>';
}
?>
                                                            </select>
                                                        </div>
                                                    </div> 
                                                    <form action="" method="post">
                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">Medico</label>
                                                            <div class="col-sm-3">
                                                                <select name="CodEmpleado" class="form-control">
                                                                    <option value=""> ----- </option>
<?php
//$sql="SELECT * FROM persona WHERE CodTipoPersona = 2";
$sql = "SELECT * FROM persona p,empleados e,medico m WHERE P.CodPersona=E.CodPersona AND E.CodEmpleado=m.CodEmpleado and CodEspecialidad = ?";
$resultado = $conn->prepare($sql);
$resultado->execute(array("1"));
while ($empleado = $resultado->fetch(pdo::FETCH_ASSOC)) {
    echo '<option value="' . $empleado[Nombres] . '">' . $empleado[Nombres] . ' ' . $empleado[Apellidos] . '</option>';
}
?>
                                                                </select>
                                                            </div>
                                                        </div> 

                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">Fecha de la Cita</label>
                                                            <div class="col-sm-4">
                                                                <input type="text" name="fecha_cita" class="input-group date form-control" date="" data-date-format="dd-mm-yyyy" placeholder="00-00-0000" required>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">Hora Inicial de la cita</label>
                                                            <div class="col-sm-4">
                                                                <input type='time' name="horainicial" id="horainicial" class="form-control"  />
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">Hora Final de la cita</label>
                                                            <div class="col-sm-4">
                                                                <input type='time' name="horafinal" id="horafinal" class="form-control"  />
                                                            </div>
                                                        </div>


                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">&nbsp;</label>
                                                            <div class="col-sm-6">
                                                                <input type="submit" name="add" class="btn btn-sm btn-primary" value="Guardar datos">
                                                                <a href="index.php" class="btn btn-sm btn-danger">Cancelar</a>
                                                                <a href="citas.php" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Regresar</a>
                                                            </div>
                                                        </div>
                                                    </form>
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
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
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