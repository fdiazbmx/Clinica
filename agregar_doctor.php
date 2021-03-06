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
                        if(isset($_POST['add'])){
                                                    
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
                        $reg_salario = $_POST["salario"];
                        $reg_especialidad = $_POST["Especialidad"];                        
                        $reg_password = sha1($_POST["Contraseña"]);
                        $reg_password2 = sha1($_POST["Contraseña2"]);
                        $reg_jornada = $_POST["Jornada"];

                        $_fotoPerfil_name = $_FILES['fotoPerfil']['name'];
                        $_fotoPerfil_type = $_FILES['fotoPerfil']['type'];
                        $_fotoPerfil_size = $_FILES['fotoPerfil']['size'];
                        $_fotoPerfil_tem = $_FILES['fotoPerfil']['tmp_name'];
                        $_fotoPerfil_store = "img/" . $_fotoPerfil_name;

                        move_uploaded_file($_fotoPerfil_tem, $_fotoPerfil_store);
                                                
                            if (!empty($_POST["sala"])) {
                            $sql = "SELECT * FROM Clinica_sala where codclinicasala = $_POST[sala]";
                            $resultado = $conn->prepare($sql);
                            $resultado->execute(array(""));
                            while ($sala = $resultado->fetch(pdo::FETCH_ASSOC)) {
                                if ($sala["CodEspecialidad"] == $reg_especialidad) {                                    
                                    $reg_sala = $_POST["sala"];
                                } else {
                                    echo '<script type="text/javascript">alert("La Especialidad de la Sala no es la Misma que la de el Doctor");window.location.href="agregar_doctor.php";</script>';
                                    exit();
                                }
                            }
                        } 
                        if (!empty($_POST["CorreoElectronico"])) {
                            $sql = "SELECT * FROM usuario";
                            $resultado = $conn->prepare($sql);
                            $resultado->execute(array(""));
                            while ($usuario = $resultado->fetch(pdo::FETCH_ASSOC)) {
                                if ($usuario["Correo"] != $_POST["CorreoElectronico"]) {
                                    $reg_email = $_POST["CorreoElectronico"];
                                } else {
                                    echo '<script type="text/javascript">alert("Ese Correo ya Existe, Intente con Otro.");window.location.href="agregar_doctor.php";</script>';
                                    exit();
                                }
                            }
                        }     
                        if ($reg_password != $reg_password2) {
                            echo '<script type="text/javascript">alert("Su Clave de verificación es Distinta");window.location.href="agregar_doctor.php";</script>';
                            exit();
                        }
                            include("connect_db.php");
                                                                                             
                        $insert = mysqli_query($con, "INSERT INTO `persona`(`Nombres`, `Apellidos`, `Genero`, `FechaNacimiento`, `EstadoCivil`,FotoPerfil,`Direccion`,"
                                . " `Telefono`, `Celular`, `CodPais`, `CodIdentificacion`, `Nume_Identificacion`, `CodTipoSangre`,"
                                . " `CodTipoPersona`, `FechaModicicaion`) VALUES ('$reg_Nombres','$reg_apellidos',$reg_genero, STR_TO_DATE('$reg_fecha_nacimiento','%d/%m/%Y'),$reg_estado_civil,'$_fotoPerfil_name','$reg_direccion','$reg_num_telefono','$reg_num_Celular',$reg_Pais,'$reg_TipoIdentidad','$reg_num_identidad',$reg_tipo_sangre,'2',now())") or die(mysqli_error());

                        $insert = mysqli_query($con, "INSERT INTO `usuario`(`Correo`, `Contraseña`, `CodPersona`, `CodPerfil`, `FechaCreacion`) VALUES ('$reg_email','$reg_password',LAST_INSERT_ID(),2,now())") or die(mysqli_error());

                        $codpersona2 = "";
                        $sql = mysqli_query($con, "SELECT * FROM usuario where correo = '$reg_email'");

                        while ($row = mysqli_fetch_assoc($sql)) {
                            $codpersona2 = $row['CodPersona'];
                        }
                        $insert = mysqli_query($con, "INSERT INTO `empleados`(`CodPersona`, `Salario`, `FechaContratacion`,codjornada,`FechaModificacion`) VALUES ($codpersona2,$reg_salario,now(),$reg_jornada,now())") or die(mysqli_error());

                        $insert1 = mysqli_query($con, "INSERT INTO `medico`(`CodEmpleado`, `CodEspecialidad`,`CodClinicaSala`) VALUES (LAST_INSERT_ID(),'$reg_especialidad',$reg_sala)") or die(mysqli_error());

                        if ($insert1) {
                            echo '<script type="text/javascript">alert("Datos Ingresados Correctamente");window.location.href="doctores.php";</script>';
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
                                                <select name="Pais" class="form-control" required>
                                                    <option disabled selected value="">País</option>
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
                                                <input type="text" name="fecha_nacimiento" class="input-group date form-control" date="" data-date-format="dd-mm-yyyy" placeholder="Fecha de nacimiento  dd/mm/yyyy" required pattern="[0-9]{2}/[0-9]{2}/[0-9]{4}">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input-group mb-3">
                                                <select name="TipoIdentidad" class="form-control"required>
                                                    <option disabled selected value="">Tipo de Identificación</option>
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
                                                <select name="genero" class="form-control"required>
                                                    <option disabled selected value="">Genero</option>
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
                                                <select name="estado_civil" class="form-control"required>
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
                                                <select name="tipo_sangre" class="form-control" required>
                                                    <option disabled selected value="">Tipo De Sangre</option>
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
                                            <div class="input-group mb-3">
                                                <select name="Jornada" class="form-control"required>
                                                    <option disabled selected value="">Jornada de Trabajo</option>                                                    
                                                    <option value="1">Matutino</option>';
                                                    <option value="2">Vespertino</option>';
                                                </select>
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input-group mb-3">
                                                <select name="Especialidad" class="form-control"required>
                                                    <option disabled selected value="">Especialidad</option>
                                                    <?php
                                                    $sql = "SELECT * FROM especialidades";
                                                    $resultado = $conn->prepare($sql);
                                                    $resultado->execute(array(""));
                                                    while ($especialidad = $resultado->fetch(pdo::FETCH_ASSOC)) {
                                                        echo '<option value="' . $especialidad['CodEspecialidad'] . '">' . $especialidad['Nombre'] . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input-group mb-3">
                                                <select name="sala" class="form-control"required>
                                                    <option disabled selected value="">Sala</option>
                                                    <?php
                                                    $sql = "SELECT c.CodClinicaSala as codsala,c.nombre as nombrec,e.nombre as nombree FROM Clinica_sala c, especialidades e where c.codespecialidad = e.codespecialidad";
                                                    $resultado = $conn->prepare($sql);
                                                    $resultado->execute(array(""));
                                                    while ($sala = $resultado->fetch(pdo::FETCH_ASSOC)) {
                                                        echo '<option value="' .$sala['codsala']. '">' . $sala['nombrec'].' '.'de'.' '. $sala['nombree']. '</option>';
                                                    }
                                                    ?>
                                                </select>
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input-group mb-3">
                                                <input type="text" name="salario" class="form-control" placeholder="Salario" required>
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
                                                <input type="text" name="num_telefono" class="form-control" placeholder="Telefono" required pattern="[0-9]{8,8}"  title="Un número de teléfono válido debe de constar con 8 digitos">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-phone"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input-group mb-3">
                                                <input type="text" name="num_Celular" class="form-control" placeholder="Celular" required pattern="[0-9]{8,8}"  title="Un número de teléfono válido debe de constar con 8 digitos">
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

<script src="../Adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../Adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../Adminlte/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="../Adminlte/dist/js/adminlte.min.js"></script>
<script src="../Adminlte/dist/js/demo.js"></script>
<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>
</body>
<footer class="page-footer font-small teal pt-4">
<?php include('../clinica/footer.php');?>
</footer>
</html>
