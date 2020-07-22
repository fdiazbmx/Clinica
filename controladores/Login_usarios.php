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
          include '../controladores/conexion.php';        
          $sql="SELECT * FROM USUARIO WHERE CORREO= :txtcorreo AND CONTRASEÑA=:txtpassword";
          $resultado=$conn->prepare($sql);
          $login=htmlentities(addslashes($_POST["txtcorreo"]));  
          $passwordlog=htmlentities(addslashes($_POST["txtpassword"]));
      
          $resultado->bindValue(":txtcorreo", $login);
          
          $resultado->bindValue(":txtpassword", $passwordlog);
          
          $resultado->execute();
          
          $numero_registro=$resultado->rowCount();
          
                    
          if($numero_registro!=0){
              
              session_start();
              $_SESSION["usuario"]=$_POST[txtcorreo];              
              header("location:../panel.php");
          }else{
                
                 header("location:../login.php");     
              }    
        ?>
    </body>
</html>
