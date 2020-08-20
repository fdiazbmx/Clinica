<?php
//Codigo que verifica si se ha iniciado la sesion y el rol del usuario que ha iniciado
      include 'controladores/conexion.php';
      include 'connect_db.php';
      session_start();
      if($_SESSION["rol"] != 1 && !isset($_SESSION["usuario"])){
        header("location:../clinica/panel_principal.php");
      }
