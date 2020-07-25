<!DOCTYPE html>
<!--
Copyright (C) 2020 LENOVO

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>      
    </head>
    <body>
        <?php
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
     
     if($reg_password==$reg_password2){
        include '../controladores/conexion.php'; 
     }else{
       echo '<script>alert("no es la misma");</script>';
       
       header("location:../register.php") ;
         
     }  
     
     $sql="INSERT INTO `persona`(`Nombres`, `Apellidos`, `Genero`, `FechaNacimiento`, `EstadoCivil`, `Direccion`,"
             . " `Telefono`, `Celular`, `CodPais`, `CodIdentificacion`, `Nume_Identificacion`, `CodTipoSangre`,"
             . " `CodTipoPersona`, `FechaModicicaion`) VALUES ('$reg_Nombres','$reg_apellidos',$reg_genero,$reg_fecha_nacimiento,$reg_estado_civil,'$reg_direccion','$reg_num_telefono','$reg_num_Celular',$reg_Pais,'$reg_TipoIdentidad','$reg_num_identidad',$reg_tipo_sangre,'3',now())";
    
     $sql1="INSERT INTO `usuario`(`Correo`, `Contraseña`, `CodPersona`, `CodPerfil`, `FechaCreacion`) VALUES ('$reg_email','$reg_password',3,3,now())";
     
     $resultado1=$conn->prepare($sql1);         
     $resultado=$conn->prepare($sql); 

      $resultado->execute();
      $resultado1->execute();
      
      header("location:../login.php");
     
     if(!$resultado){   
         echo'error';
     }else{
         echo 'correcto';
         
     }
     
        ?>
    </body>
</html>
