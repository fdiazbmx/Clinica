<?php
//include("connect_db.php");

//$miconexion = new connect_db;


session_start();
	require("connect_db.php");

	$username=$_POST['mail'];
	$pass=sha1($_POST['pass']);


	//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
	$sql2=mysqli_query($con,"SELECT * FROM usuario u,persona p, empleados e, medico m WHERE u.codpersona=p.codpersona and p.codpersona =e.codpersona and e.codempleado = m.codempleado and correo='$username'");
	if($f2=mysqli_fetch_assoc($sql2)){
		if($pass==$f2['Contraseña']){
			$_SESSION['id']=$f2['CodUsuario'];
			$_SESSION['usuario']=$f2['Correo'];
			$_SESSION['rol']=$f2['CodPerfil'];
                        $_SESSION['codmedico']=$f2['CodMedico'];

			echo '<script>alert("BIENVENIDO DOCTOR")</script> ';
			echo "<script>location.href='panel_doctor.php'</script>";
		
		}
	}


	/*$sql=mysqli_query($mysqli,"SELECT * FROM usuario WHERE correo='$username'");
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

	}*/

?>