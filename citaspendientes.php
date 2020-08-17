<?php
include("connect_db.php");
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
                <a href="salasdoctor.php" class="nav-link">
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
			<h2>Citas Pendientes</h2>
			<hr />

				<?php
					if(isset($_GET['aksi']) == 'delete'){
						// escaping, additionally removing everything that could be (html/javascript-) code
						$nik = mysqli_real_escape_string($con,(strip_tags($_GET["nik"],ENT_QUOTES)));
						$cek = mysqli_query($con, "SELECT * FROM persona WHERE codpersona='$nik'");
						
						if(mysqli_num_rows($cek) == 0){
							echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> No se encontraron datos.</div>';
						}else{
							$delete = mysqli_query($con, "DELETE FROM persona WHERE codpersona='$nik'");
                                                        $delete = mysqli_query($con, "DELETE FROM usuario WHERE codpersona='$nik'");
							if($delete){
								echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Datos eliminado correctamente.</div>';
							}else{
								echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Error, no se pudo eliminar los datos.</div>';
							}
						}
					}
				?>
                        </br>
                        </br>
                        <div class="col-lg-3">
                            <form action="buscar_empleado.php" method="get" class="form_search" >
                                <input type="text" name="busqueda" id="busqueda" placeholder="Buscar" >
                                <input type="submit" value="Buscar" class="btn_search">
                            </form>
                        </div>

                        <br />
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre</th>
                                        <th>Identidad</th>
                                        <th>Telefono</th>
                                        <th>Direccion</th>
                                        <th>Fecha de Ingreso</th>                                       
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                    <?php
                                    $sql = mysqli_query($con, "SELECT * FROM persona where codtipopersona = 3 ORDER BY codpersona ASC");

                                    if (mysqli_num_rows($sql) == 0) {
                                        echo '<tr><td colspan="8">No hay datos.</td></tr>';
                                    } else {
                                        $no = 1;
                                        while ($row = mysqli_fetch_assoc($sql)) {
                                            echo '
                    <tr>
                      <td>' . $no . '</td>
                      <td><a href="profile.php?nik=' . $row['CodPersona'] . '"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> ' . $row['Nombres'] . ' ' . $row['Apellidos'] . '</a></td>
                      <td>' . $row['Nume_Identificacion'] . '</td>
                      
                      
                      <td>' . $row['Celular'] . '</td>
                      <td>' . $row['Direccion'] . '</td>
                      <td>' . $row['FechaModicicaion'] . '</td>                      
                       <td>Pendiente </td>
                      <td>
                            <a href="edit.php?nik=' . $row['CodPersona'] . '"class="btn btn-primary btn-block">Atender</a>										
                            </td>
                    </tr>
                    ';
                                            $no++;
                                        }
                                    }
                                    ?>
						</table>
					</div>
				</div>
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
