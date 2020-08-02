<?php
if(isset($_POST['save_picture'])){
 $reg_Nombres =$_POST["Nombres"];
     $reg_apellidos =$_POST["Apellidos"];
     $reg_genero=$_POST["genero"];
     $reg_fecha_nacimiento=$_POST["fecha_nacimiento"];
     $reg_estado_civil=$_POST["estado_civil"];
     $reg_direccion=$_POST["direccion"];
     $reg_num_telefono=$_POST["num_telefono"];
     $reg_num_Celular=$_POST["num_Celular"];
     $reg_Pais=$_POST["Pais"];
     $reg_TipoIdentidad=$_POST["TipoIdentidad"];
     $reg_num_identidad=$_POST["num_identidad"];
     $reg_tipo_sangre=$_POST["tipo_sangre"];
     $reg_email=$_POST["CorreoElectronico"];
     $reg_password=$_POST["Contraseña"];
     $reg_password2=$_POST["Contraseña2"];
     
     $_fotoPerfil_name = $_FILES['fotoPerfil']['name'];
     $_fotoPerfil_type = $_FILES['fotoPerfil']['type'];
     $_fotoPerfil_size = $_FILES['fotoPerfil']['size'];
     $_fotoPerfil_tem = $_FILES['fotoPerfil']['tmp_name'];
     $_fotoPerfil_store="img/".$_fotoPerfil_name;

     move_uploaded_file($_fotoPerfil_tem, $_fotoPerfil_store);
     
     if($reg_password==$reg_password2){
     $conn = mysqli_connect('localhost','root','','clinica');
     }else{
       echo '<script>alert("no es la misma");</script>';
       
     header("location:../register.php") ;
         
     }  
     
     $sql="INSERT INTO `persona`(`Nombres`, `Apellidos`, `Genero`, `FechaNacimiento`, `EstadoCivil`,FotoPerfil,`Direccion`,"
             . " `Telefono`, `Celular`, `CodPais`, `CodIdentificacion`, `Nume_Identificacion`, `CodTipoSangre`,"
             . " `CodTipoPersona`, `FechaModicicaion`) VALUES ('$reg_Nombres','$reg_apellidos',$reg_genero,$reg_fecha_nacimiento,$reg_estado_civil,'$_fotoPerfil_name','$reg_direccion','$reg_num_telefono','$reg_num_Celular',$reg_Pais,'$reg_TipoIdentidad','$reg_num_identidad',$reg_tipo_sangre,'3',now())";
    
     $sql1="INSERT INTO `usuario`(`Correo`, `Contraseña`,`FechaCreacion`) VALUES ('$reg_email','$reg_password',now())";
     
     $resultado1=$conn->prepare($sql1);         
     $resultado=$conn->prepare($sql); 

      $resultado->execute();
      $resultado1->execute();
      
     header("location: new-login.php");
     
     if(!$resultado){   
         echo'error';
     }else{
         echo 'correcto';
         
     }
}