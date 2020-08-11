<?php

//include("connect_db.php");
//$miconexion = new connect_db;

if (empty($_POST['mail']) || empty($_POST['pass'])) {
    //$alerta = 'Ingrese su usuario y Clave';
    echo '<script type="text/javascript">alert("Ingrese su Usuario y Clave");window.location.href="login_admin.php";</script>';
} else {
    require("connect_db.php");
    $username = $_POST['mail'];
    $pass = $_POST['pass'];
    $sql2 = mysqli_query($con, "SELECT * FROM usuario WHERE correo='$username'");
    if ($f2 = mysqli_fetch_assoc($sql2)) {
        if ($pass == $f2['Contraseña']) {
            session_start();
            $_SESSION['id'] = $f2['CodUsuario'];
            $_SESSION['usuario'] = $f2['Correo'];
            $_SESSION['rol'] = $f2['CodPerfil'];
            
            if($_SESSION["rol"] == 1){
                echo '<script>alert("BIENVENIDO ADMINISTRADOR")</script> ';
            echo "<script>location.href='panel_admin.php'</script>";
            }else{
                header("location:../clinica/panel_principal.php");   
            }
        } else {
            echo '<script type="text/javascript">alert("Su Correo o Contraseña son Incorrectos");window.location.href="login_admin.php";</script>';
        }
    }
}

/* $sql=mysqli_query($mysqli,"SELECT * FROM usuario WHERE correo='$username'");
  if($f=mysqli_fetch_assoc($sql)){
  if($pass==$f['password']){
  $_SESSION['id']=$f['id'];
  $_SESSION['user']=$f['user'];
  $_SESSION['rol']=$f['rol'];

  header("Location: index2.php");
  }else{
  echo '<script>alert("CONTRASEÑA INCORRECTA")</script> ';

  echo "<script>location.href='login_admin.php'</script>";
  }
  }else{

  echo '<script>alert("ESTE USUARIO NO EXISTE, PORFAVOR REGISTRESE PARA PODER INGRESAR")</script> ';

  echo "<script>location.href='login_admin.php'</script>";

  } */
?>