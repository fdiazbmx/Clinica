<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";

        try {
          $conn = new PDO("mysql:host=$servername;dbname=clinica", $username, $password);
          // set the PDO error mode to exception
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sql="SELECT * FROM USUARIO WHERE CORREO= :txtcorreo AND CONTRASEÑA=:txtpassword";
          $resultado=$conn->prepare($sql);
          $login=htmlentities(addslashes($_POST["txtcorreo"]));  
          $passwordlog=htmlentities(addslashes($_POST["txtpassword"]));
      
          $resultado->bindValue(":txtcorreo", $login);
          
          $resultado->bindValue(":txtpassword", $passwordlog);
          
          $resultado->execute();
          
          $numero_registro=$resultado->rowCount();
          
                    
          if($numero_registro!=0){
              
              echo "adelante";
          }else{
                
                 header("location:../login.php");
              }    
        } catch(PDOException $e) {
          echo "Connection failed: " . $e->getMessage() ;
        }
        ?>
    </body>
</html>
