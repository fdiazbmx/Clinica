<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
         <?php
          include ('../controladores/conexion.php');        
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
              header("location:../new-panel_clientes.php");
              
          }else{
                
                 header("location:../new-login.php");     
              }    
        ?>
    </body>
</html>

