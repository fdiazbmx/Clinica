<?php
$sql = "SELECT * FROM persona p, usuario u where u.codpersona = p.Codpersona and u.correo = ?";
            $resultado = $conn->prepare($sql);
            $resultado->execute(array($_SESSION["usuario"]));
            while ($nombre = $resultado->fetch(pdo::FETCH_ASSOC)) {
                if ($nombre['FotoPerfil'] == "") {
                    echo" <div class='col-6 text-center'>
                      <img src='img/usuarios.png' alt='' class='img-circle img-fluid'>
                    </div>";
                } else {
                    echo"<div class='col-6 text-center'>
                      <img src='img/$nombre[FotoPerfil]' alt='' class='img-circle img-fluid'>
                    </div>";
                }
            }



