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
        <li><a href="../clinica/controladores/cerrar.php"><i class="fas fa-sign-out" aria-hidden="true"></i>Cerrar Sesión</a></li>
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
          <section class="content">
      <!-- Default box -->
      <div class="container">
		<div class="content">
			<h2> Información</h2>
        <div class="card-body pb-1">
          <div class="row d-flex align-items-stretch">
            <div class="col-20 col-sm-6 col-md-15 d-flex align-items-stretch">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                  Paciente
                </div>
                <div class="card-body pt-1">
                  <div class="row">
                    <div class="col-6">
                     <?php
                     $sql="SELECT * FROM persona p, usuario u where u.codpersona = p.Codpersona and u.correo = ?";
                     $resultado=$conn->prepare($sql);
                     $resultado->execute(array($_SESSION["usuario"]));
                     while ($nombre=$resultado->fetch(pdo::FETCH_ASSOC)){
                     echo '<h2 class="lead"><b>'.$nombre['Nombres'].' '.$nombre['Apellidos'].'</b></h2></br>';
                      }
                     ?>
                      <ul class="ml-3 mb-0 fa-ul text-muted">
                          <?php
                     $sql="SELECT * FROM persona p, usuario u where u.codpersona = p.Codpersona and u.correo = ?";
                     $resultado=$conn->prepare($sql);
                     $resultado->execute(array($_SESSION["usuario"]));
                     while ($nombre=$resultado->fetch(pdo::FETCH_ASSOC)){
                         echo '<li class="small"><span class="fa-li"><i class="fas fa-lg fa-calendar"></i></span> Fecha de Nacimiento: '.$nombre['FechaNacimiento'].'</li>';
                         echo '<li class="small"><span class="fa-li"><i class="fas fa-lg fa-user"></i></span> No. de Identificación: <br/> '.$nombre['Nume_Identificacion'].'</li>';
                         echo '<li class="small"><span class="fa-li"><i class="fas fa-lg fa-home"></i></span> Dirección: '.$nombre['Direccion'].'</li>';
                         echo '<li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Telefono: '.$nombre['Telefono'].'</li>';
                         echo '<li class="small"><span class="fa-li"><i class="fas fa-lg fa-mobile"></i></span> Celular: '.$nombre['Celular'].'</li>';
                         echo "</div>
                    <div class='col-6 text-center'>
                      <img src='img/$nombre[FotoPerfil]' alt='' class='img-circle img-fluid'>
                    </div>"; 
                     }
                     ?>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                    <a href="actualizacion_cliente.php" class="btn btn-sm btn-primary">
                      <i class="fas fa-user"></i> Gestionar Cuenta
                    </a>
                  </div>
                </div>
              </div>
            </div>
            </div>
                </div>
              </div>
            </div>
    </section>
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
