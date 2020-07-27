<center>
  <div class="content-header">
      <div class="container-fluid">
        <div class="login-box">
  <div class="login-logo">
      <div class="card card-info">
                <div >
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
          <a href="../clinica/register.php" class="text-center">Regístrate</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
      </div><!-- /.container-fluid -->
    </div>
  </center>