<div class="container">
    <div class="content">
        <h2>Doctores</h2>
        <hr />

        <?php
        include("connect_db.php");
        if (isset($_GET['aksi']) == 'delete') {
            // escaping, additionally removing everything that could be (html/javascript-) code
            $nik = mysqli_real_escape_string($con, (strip_tags($_GET["nik"], ENT_QUOTES)));
            $cek = mysqli_query($con, "SELECT * FROM persona WHERE codpersona='$nik'");

            if (mysqli_num_rows($cek) == 0) {
                echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> No se encontraron datos.</div>';
            } else {
                $delete = mysqli_query($con, "DELETE FROM persona WHERE codpersona='$nik'");
                $delete = mysqli_query($con, "DELETE FROM usuario WHERE codpersona='$nik'");
                if ($delete) {
                    echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Datos eliminado correctamente.</div>';
                } else {
                    echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Error, no se pudo eliminar los datos.</div>';
                }
            }
        }
        ?>
        </br>
        <div class="col-lg-12">
            <a onclick="cargar_contenido('contenido','agregar_doctor.php')" class="btn btn-primary " style="float: right" ><i class="fa fa-plus" aria-hidden="true"></i> Agregar Doctor</a>
        </div>


        </br>
        <div class="col-lg-3">
            <form action="buscar_empleado.php" method="get" class="form_search" >
                <input type="text" name="busqueda" id="busqueda" placeholder="Buscar" >
                <input type="submit" value="Buscar" class="btn_search">
            </form>
        </div>

        <br />
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <tr>
                        <th>No</th>
                        <th>Nombre</th>
                        <th>Identidad</th>
                        <th>Tipo Empleado</th>
                        <th>Teléfono</th>
                        <th>Fecha de nacimiento</th>
                        <th>Direccion</th>
                        <th>Genero</th>
                        <th>Acciones</th>
                    </tr>
                    <?php
                    $sql = mysqli_query($con, "SELECT * FROM persona where codtipopersona = 2 ORDER BY codpersona ASC");

                    if (mysqli_num_rows($sql) == 0) {
                        echo '<tr><td colspan="8">No hay datos.</td></tr>';
                    } else {
                        $no = 1;
                        while ($row = mysqli_fetch_assoc($sql)) {
                        echo '
                            <tr>
                                    <td>' . $no . '</td>
                                    <td><a href="profile.php?nik=' . $row['CodPersona'] . '"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> ' . $row['Nombres'] . ' ' . $row['Apellidos'] . '</a></td>
                                    <td>' . $row['Nume_Identificacion'] . '</td>
                                    </td>
                                    <td>';
                            if ($row['CodTipoPersona'] == 2) {
                                echo '<span class="label label-success">Medico</span>';
                            }

                            echo '
                                </td>
                                <td>' . $row['Telefono'] . '</td>
                                <td>' . $row['FechaNacimiento'] . '</td>
                                <td>' . $row['Direccion'] . '</td>
                                <td>';
                            if ($row['Genero'] == 'f') {
                                echo '<span class="label label-success">Femenino</span>';
                            } else if ($row['Genero'] == 'm') {
                                echo '<span class="label label-info">Masculino</span>';
                            }
                            echo ' 
											<td>

											<a href="edit.php?nik=' . $row['CodPersona'] . '" title="Editar datos" class="btn btn-success "><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
											<a href="doctores.php?aksi=delete&nik=' . $row['CodPersona'] . '" title="Eliminar" onclick="return confirm(\'Esta seguro de borrar los datos ' . $row['Nombres'] . '?\')" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
											</td>
										</tr>
										';
                            $no++;
                        }
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>