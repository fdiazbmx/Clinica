<?php

if (empty($_POST['mail']) || empty($_POST['pass'])) {
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
                echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>';
                echo '<script type="text/javascript">Swal.fire("Bienvenido")</script>';
            echo "<script>location.href='panel_admin.php'</script>";
            }else{
                header("location:../clinica/panel_principal.php");   
            }
        } else {
            echo '<script type="text/javascript">alert("Su Correo o Contraseña son Incorrectos");window.location.href="login_admin.php";</script>';
        }
    }
}

?>