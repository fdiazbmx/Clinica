<div class="content">
    <h2>Datos de los Doctores &raquo; Agregar datos</h2>
    <hr />
    <center>
        <div class="register-box">
            <div class="card">
                <div class="card-body register-card-body">
                    <p class="login-box-msg">Datos Generales</p>
                    <form <?php
                    include("controladores/conexion.php");
    if (isset($_POST['add'])) {
        $reg_Nombres = $_POST["Nombres"];
        $reg_apellidos = $_POST["Apellidos"];
        $reg_genero = $_POST["genero"];
        $reg_fecha_nacimiento = $_POST["fecha_nacimiento"];
        $reg_estado_civil = $_POST["estado_civil"];
        $reg_direccion = $_POST["direccion"];
        $reg_num_telefono = $_POST["num_telefono"];
        $reg_num_Celular = $_POST["num_Celular"];
        $reg_Pais = $_POST["Pais"];
        $reg_TipoIdentidad = $_POST["TipoIdentidad"];
        $reg_num_identidad = $_POST["num_identidad"];
        $reg_tipo_sangre = $_POST["tipo_sangre"];
        $reg_salario = $_POST["salario"];
        $reg_email = $_POST["CorreoElectronico"];
        $reg_password = $_POST["Contraseña"];
        $reg_password2 = $_POST["Contraseña2"];

        $_fotoPerfil_name = $_FILES['fotoPerfil']['name'];
        $_fotoPerfil_type = $_FILES['fotoPerfil']['type'];
        $_fotoPerfil_size = $_FILES['fotoPerfil']['size'];
        $_fotoPerfil_tem = $_FILES['fotoPerfil']['tmp_name'];
        $_fotoPerfil_store = "img/" . $_fotoPerfil_name;

        move_uploaded_file($_fotoPerfil_tem, $_fotoPerfil_store);

        if ($reg_password == $reg_password2) {
            include("connect_db.php");
        } else {
            echo '<script type="text/javascript">alert("Su Clave de verificación es Distinta");window.location.href="agregar_doctor.php";</script>';
        }

        $insert = mysqli_query($con, "INSERT INTO `persona`(`Nombres`, `Apellidos`, `Genero`, `FechaNacimiento`, `EstadoCivil`,FotoPerfil,`Direccion`,"
                . " `Telefono`, `Celular`, `CodPais`, `CodIdentificacion`, `Nume_Identificacion`, `CodTipoSangre`,"
                . " `CodTipoPersona`, `FechaModicicaion`) VALUES ('$reg_Nombres','$reg_apellidos',$reg_genero,'$reg_fecha_nacimiento',$reg_estado_civil,'$_fotoPerfil_name','$reg_direccion','$reg_num_telefono','$reg_num_Celular',$reg_Pais,'$reg_TipoIdentidad','$reg_num_identidad',$reg_tipo_sangre,'2',now())") or die(mysqli_error());

        $insert = mysqli_query($con, "INSERT INTO `usuario`(`Correo`, `Contraseña`, `CodPersona`, `CodPerfil`, `FechaCreacion`) VALUES ('$reg_email','$reg_password',LAST_INSERT_ID(),2,now())") or die(mysqli_error());

        $sql = mysqli_query($con, "SELECT * FROM usuario where correo = $_SESSION[usuario]");

        $insert = mysqli_query($con, "INSERT INTO `empleados`(`CodPersona`, `Salario`, `FechaContratacion`,`FechaModificacion`) VALUES (1,$reg_salario,now(),now())") or die(mysqli_error());


        if ($insert) {
            echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Bien hecho! Los datos han sido guardados con éxito.</div>';
        } else {
            echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. No se pudo guardar los datos !</div>';
        }
    }
    ?> method="post" enctype="multipart/form-data">
                        <div class="input-group mb-3">
                            <input type="text" name="Nombres" class="form-control"class="input-group date form-control" placeholder="Nombres" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" name="Apellidos" class="form-control" placeholder="Apellidos" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <select name="Pais" class="form-control" >
                                <option disabled selected>País</option>
                                <option value="1">Honduras</option>
                                <option value="2">El Salvador</option>
                                <option value="3">Nicaragua</option>
                                <option value="4">Guatemala</option>
                                <option value="5">Costa Rica</option>
                                <option value="6">Panama</option>
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" name="fecha_nacimiento" class="input-group date form-control" date="" data-date-format="dd-mm-yyyy" placeholder="Fecha de nacimiento  dd/mm/yyyy" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <select name="TipoIdentidad" class="form-control" >
                                <option disabled selected>Tipo de Identificación</option>
                                <option value="1">Identidad</option>
                                <option value="2">Pasaporte</option>
                                <option value="3">Carnet de Residencia</option>
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" name="num_identidad" class="form-control" placeholder="Numero de Identificación" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <select name="genero" class="form-control">
                                <option disabled selected>Genero</option>
                                <option value="'m'">Masculino</option>
                                <option value="'f'">Femenino</option>
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <select name="estado_civil" class="form-control">
                                <option disabled selected>Estado Civil</option>
                                <option value="'Soltero'">Soltero</option>
                                <option value="'Casado'">Casado</option>
                                <option value="'Unión Libre'">Unión Libre</option>
                                <option value="'Viudo'">Viudo</option>
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <select name="tipo_sangre" class="form-control">
                                <option disabled selected>Tipo De Sangre</option>
                                <option value="1">O-</option>
                                <option value="2">O+</option>
                                <option value="3">A-</option>
                                <option value="4">A+</option>
                                <option value="5">B-</option>
                                <option value="6">B+</option>
                                <option value="7">AB-</option>
                                <option value="8">AB+</option>
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <select name="Especialidad" class="form-control">
                                <option disabled selected>Especialidad</option>
                                <?php
                                $sql = "SELECT * FROM especialidades";
                                $resultado = $conn->prepare($sql);
                                $resultado->execute(array(""));
                                while ($especialidad = $resultado->fetch(pdo::FETCH_ASSOC)) {
                                    echo '<option value="' . $especialidad[CodEspecialidad] . '">' . $especialidad[Nombre] . '</option>';
                                }
                                ?>
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" name="salario" class="form-control" placeholder="Salario" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3" btsExpInput>
                            <textarea name="direccion" class="form-control" placeholder="Dirección" required></textarea>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" name="num_telefono" class="form-control" placeholder="Telefono" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-phone"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" name="num_Celular" class="form-control" placeholder="Celular" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-mobile"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="email" name="CorreoElectronico" class="form-control" placeholder="Correo Electronico" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Foto De Perfil</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="fotoPerfil" class="custom-file-input" id="fotoPerfil">
                                    <label class="custom-file-label" for="exampleInputFile">Elegir Una Foto</label>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" name="Contraseña" class="form-control" placeholder="Contraseña">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" name="Contraseña2" class="form-control" placeholder="Repetir Contraseña">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-5">
                            <button type="submit" name="add" class="btn btn-primary btn-block" value="add">Registrar</button><br>
                            <a href="doctores.php" class="btn btn-danger" >Cancelar</a>
                        </div>
                        <!-- /.col -->
                </div>
                </form>
            </div>
            <!-- /.form-box -->
        </div>
    </center>
</div>
