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
        <li><a href="../clinica/controladores/cerrar.php"><i class="fa fa-sign-out" aria-hidden="true"></i>  Cerrar Sesión</a></li>
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
        <?php
            include 'foto_nombre_doc.php';
        ?>
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
                  <p>Citas Atentidas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="calendario.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Calendario</p>
                </a>
              </li>
              </div>
              
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
			<h2> Actualización</h2>
                        <?php
                        
     if(isset($_POST['actualizar'])){
     $reg_Nombres =$_POST["Nombres"];
     $reg_apellidos =$_POST["Apellidos"];
     $reg_estado_civil=$_POST["estado_civil"];
     $reg_direccion=$_POST["direccion"];
     $reg_num_telefono=$_POST["num_telefono"];
     $reg_num_Celular=$_POST["num_Celular"];
     $user=$_SESSION["usuario"];
     $sql="UPDATE persona SET Nombres='$reg_Nombres', Apellidos = '$reg_apellidos' , EstadoCivil =$reg_estado_civil, Direccion = '$reg_direccion',"
             . " Telefono = '$reg_num_telefono',Celular = '$reg_num_Celular' WHERE CodPersona = (SELECT CodPersona FROM usuario where correo = '$user' )";
    
     $resultado=$conn->prepare($sql); 
      $resultado->execute();
      
     
     if($resultado){   
         echo '<script type="text/javascript">alert("Datos Actualizados Correctamente");window.location.href="informacion_doc.php";</script>';
     }else{
         echo 'error';
     }    
     }  
     
     
     
        ?>
   <center>
  <div class="content-header">
      <div class="container-fluid">
        <div class="login-box">   
<div class="register-box">
  <div class="register-logo">
    <a href="../controladores/registro_clientes"><b>Clinica </b>Amigos En Apuros</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Actualización Datos Generales</p>
     

      <form action="" method="post">
        <div class="input-group mb-3">
             <?php
      $user=$_SESSION["usuario"];
          $sql="SELECT * FROM persona p, usuario u where u.codpersona = p.Codpersona and u.correo = ?";
                     $resultado=$conn->prepare($sql);
                     $resultado->execute(array($user));
                     while ($nombre=$resultado->fetch(pdo::FETCH_ASSOC)){  
                      echo   "<input type='text' name='Nombres' class='form-control'class='input-group date form-control' value='$nombre[Nombres]'>";
                      }     
                ?>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
          <div class="input-group mb-3">
              <?php
      $user=$_SESSION["usuario"];
          $sql1="SELECT * FROM persona p, usuario u where u.codpersona = p.Codpersona and u.correo = ?";
                     $resultado1=$conn->prepare($sql);
                     $resultado1->execute(array($user));
                     while ($nombre=$resultado1->fetch(pdo::FETCH_ASSOC)){  
                      echo   "<input type='text' name='Apellidos' class='form-control'class='input-group date form-control' value='$nombre[Apellidos]'>";
                      }     
                ?>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
           <div class="input-group mb-3">
               <select name="estado_civil" class="form-control"required="">
                            <?php
      $user=$_SESSION["usuario"];
          $sql="SELECT * FROM persona p, usuario u where u.codpersona = p.Codpersona and u.correo = ?";
                     $resultado=$conn->prepare($sql);
                     $resultado->execute(array($user));
                     while ($nombre=$resultado->fetch(pdo::FETCH_ASSOC)){  
                      echo   "<option disabled selected value=''>Estado Civil</option>";
                      }     
                ?>
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
          <div class="input-group mb-3" btsExpInput>
              <?php
      $user=$_SESSION["usuario"];
          $sql1="SELECT * FROM persona p, usuario u where u.codpersona = p.Codpersona and u.correo = ?";
                     $resultado1=$conn->prepare($sql);
                     $resultado1->execute(array($user));
                     while ($nombre=$resultado1->fetch(pdo::FETCH_ASSOC)){  
                      echo   "<input type='text' name='direccion' class='form-control'class='input-group date form-control' value='$nombre[Direccion]'>";  
                      }     
                ?>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas"></span>
            </div>
          </div>
        </div>
          <div class="input-group mb-3">
              <?php
      $user=$_SESSION["usuario"];
          $sql1="SELECT * FROM persona p, usuario u where u.codpersona = p.Codpersona and u.correo = ?";
                     $resultado1=$conn->prepare($sql);
                     $resultado1->execute(array($user));
                     while ($nombre=$resultado1->fetch(pdo::FETCH_ASSOC)){  
                      echo   "<input type='text' name='num_telefono' class='form-control'class='input-group date form-control' value='$nombre[Telefono]'required pattern='[0-9]{8,8}'  title='Un número de teléfono válido debe de constar con 8 digitos'>";
                      }     
                ?>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>
          <div class="input-group mb-3">
              <?php
      $user=$_SESSION["usuario"];
          $sql1="SELECT * FROM persona p, usuario u where u.codpersona = p.Codpersona and u.correo = ?";
                     $resultado1=$conn->prepare($sql);
                     $resultado1->execute(array($user));
                     while ($nombre=$resultado1->fetch(pdo::FETCH_ASSOC)){  
                      echo   "<input type='text' name='num_Celular' class='form-control'class='input-group date form-control' value='$nombre[Celular]'required pattern='[0-9]{8,8}'  title='Un número de teléfono válido debe de constar con 8 digitos'>";
                      }     
                ?>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-mobile"></span>
            </div>
          </div>
        </div>
          <!-- /.col -->
          <div class="col-5">
              <button type="submit" name="actualizar" class="btn btn-primary btn-block">Actualizar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
</div><!-- /.container-fluid -->
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
