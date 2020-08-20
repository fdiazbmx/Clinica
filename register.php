<?php 
include '../Clinica/controladores/new-registro_clientes.php';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Amigos en Apuros | Registro</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="adminlte/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body 
    <?php include ('../clinica/nav_login.php');?>
<center>
  <div class="content-header">
      <div class="container-fluid">
        <div class="login-box">   
<div class="register-box">
  <div class="register-logo">
    <a href="register.php" method="post" enctype="multipart/form-data"><b>Clinica </b>Amigos En Apuros</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Datos Generales</p>
      <form action="../Clinica/register.php" method="post" enctype="multipart/form-data">
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
              <select name="TipoIdentidad" class="form-control" required>
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
             <select name="genero" class="form-control" required>
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
         <select name="tipo_sangre" class="form-control"required>
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
          <div class="input-group mb-3" btsExpInput>
         <textarea name="direccion" class="form-control" placeholder="Dirección" required></textarea>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas"></span>
            </div>
          </div>
        </div>
          <div class="input-group mb-3">
        <input type="text" name="num_telefono" placeholder="Telefono 00000000" class="form-control phone form-control"  phone="" 
               required pattern="[0-9]{8,8}"  title="Un número de teléfono válido debe de constar con 8 digitos" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>
          <div class="input-group mb-3">
        <input type="text" name="num_Celular" placeholder="Celular 00000000" class="form-control mobile form-control" mobile=""
         required pattern="[0-9]{8,8}"  title="Un número de teléfono válido debe de constar con 8 digitos" >
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
                          <input type="file" name="fotoPerfil" value="1" class="custom-file-input" id="fotoPerfil">
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
            <button type="submit" name="save_picture" class="btn btn-primary btn-block" value="upload">Registrarse</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <a href="../clinica/login_clientes.php" class="text-center">Ya Estoy Registrado</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
</div><!-- /.container-fluid -->
</div>
</center>
<!-- /.register-box -->

<!-- jQuery -->
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
