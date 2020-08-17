<?php
         if(!empty($_POST))
         {
             if (empty($_POST['txtcorreo']) || empty($_POST['txtpassword'])) {
    echo '<script type="text/javascript">alert("Ingrese su Usuario y Clave");window.location.href="login_clientes.php";</script>';
} else {
    require("connect_db.php");
    $username = $_POST['txtcorreo'];
    $pass = $_POST['txtpassword'];
    $sql2 = mysqli_query($con, "SELECT * FROM usuario u, persona p WHERE u.codpersona=p.codpersona and correo='$username'");
    if ($f2 = mysqli_fetch_assoc($sql2)) {
        if ($pass == $f2['Contraseña']) {
            session_start();
            $_SESSION['id'] = $f2['CodUsuario'];
            $_SESSION['usuario'] = $f2['Correo'];
            $_SESSION['rol'] = $f2['CodPerfil'];
            $nombre = $f2['Nombres'];
            
            if($_SESSION["rol"] == 3){
                echo '<script>alert("BIENVENIDO $newObj = clone $nombre;")</script> ';
            echo "<script>location.href='panel_clientes.php'</script>";
            }else{
                header("location:../clinica/panel_principal.php");   
            }
        } else {
            echo '<script type="text/javascript">alert("Su Correo o Contraseña son Incorrectos");window.location.href="login_clientes.php";</script>';
        }
    }
}
//             if(empty($_POST['txtcorreo'])||empty($_POST['txtpassword'])){
//                 //$alerta = 'Ingrese su usuario y Clave';
//                 echo '<script type="text/javascript">alert("Ingrese su Usuario y Clave");window.location.href="login_clientes.php";</script>';
//             }else{
//                 include 'controladores/conexion.php';
//                 $login=htmlentities(addslashes($_POST["txtcorreo"]));  
//          $passwordlog=htmlentities(addslashes($_POST["txtpassword"]));
//          $sql="SELECT * FROM USUARIO WHERE CORREO= :txtcorreo AND CONTRASEÑA=:txtpassword";
//          $resultado=$conn->prepare($sql);
//          $resultado->bindValue(":txtcorreo", $login);
//          $resultado->bindValue(":txtpassword", $passwordlog);
//          $resultado->execute();
//          $numero_registro=$resultado->rowCount();
//                    
//          if($numero_registro!=0){  
//              session_start();
//              $_SESSION["usuario"]=$_POST['txtcorreo'];
//              $_SESSION['rol']=3;
//              header("location:../clinica/panel_clientes.php");
//              
//          }else{
//              echo '<script type="text/javascript">alert("Su Correo o Contraseña son Incorrectos");window.location.href="login_clientes.php";</script>';
//              //header("location:../clinica/login_clientes.php"); 
//              
//              }
//             }
         }
?>
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
      <form action="" method="post">
        <div class="input-group mb-3">
            <input type="email" name="txtcorreo" class="form-control" placeholder="Usuario o correo electrónico"required>
            
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
              <div class="input-group mb-3">    
                  <input type="password" name="txtpassword" class="form-control" placeholder="Contraseña" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row boton_login">
          <div>
            <button type="submit" name=="btnlogin" class="btn btn-primary btn-block">Iniciar Sesión</button>
          </div>
        </div>
      <p class="mb-1">
          <a href="recuperar_contraseña.php">¿Olvidaste tu contraseña?</a>
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