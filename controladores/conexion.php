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
          $conn->exec("set character set utf8");
              
        } catch(PDOException $e) {
          echo "Connection failed: " . $e->getMessage() ;
        }
        ?>
    </body>
</html>
