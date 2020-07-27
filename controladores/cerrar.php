<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        session_start();
        session_destroy();
        header("location:../panel_principal.php"); 
        
        ?>
    </body>
</html>
