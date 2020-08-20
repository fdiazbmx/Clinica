<?php
$sql = "SELECT * FROM persona p, usuario u where u.codpersona = p.Codpersona and u.correo = ?";
            $resultado = $conn->prepare($sql);
            $resultado->execute(array($_SESSION["usuario"]));
            while ($nombre = $resultado->fetch(pdo::FETCH_ASSOC)) {
                if ($nombre['FotoPerfil'] == "") {
                    echo" <div class='image'>
                    <img src='img/usuarios.png' class='img-circle elevation-2' alt='User Image'>
                    </div>
                    <div class='info'> ";
                    echo '<a href="informacion_admin.php" class="d-block">' . $nombre['Nombres'] . '<br/>' . $nombre['Apellidos'] . '</a>'
                    . '</div>';
                } else {
                    echo"<div class='image'> <img src='img/$nombre[FotoPerfil]' class='img-circle elevation-2' alt='User Image'>
                    </div>
                    <div class='info'> ";
                    echo '<a href="informacion_admin.php" class="d-block">' . $nombre['Nombres'] . '<br/>' . $nombre['Apellidos'] . '</a>'
                    . '</div>';
                }
            }


