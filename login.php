
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Clinica Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="adminlte/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
  <link rel="stylesheet" href="adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="adminlte/dist/css/adminlte.min.css">
 </head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
      <div class="card card-primary">
                <div class="card-header">
   <b>Clinica </b>Amigos en Apuros</a>
                </div>
      </div>
  </div>
  <!-- /.login-logo -->
  
    <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Inicia tu sesión</p>
      <form action="controladores/Login_usarios.php" method="post">
        <div class="input-group mb-3">
            <input type="email" name="txtcorreo" class="form-control" placeholder="Usuario o correo electrónico ">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
              <div class="input-group mb-3">    
            <input type="password" name="txtpassword" class="form-control" placeholder="Contraseña">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
            <button type="submit" name=="btnlogin"  class="btn btn-primary btn-block">Iniciar Sesión</button>
          </div>
          <!-- /.col -->
        </div>
      <p class="mb-1">
        <a href="forgot-password.html">¿Olvidaste tu contraseña?</a>
      </p>
      <p class="mb-0">
          <a href="../pueba/register.php" class="text-center">Regístrate</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="adminlte/dist/js/adminlte.min.js"></script>

</body>
</html>
