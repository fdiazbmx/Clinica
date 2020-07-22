
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Clinica Amigos en Apuros</title>
          <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <!-- Font Awesome -->
  <link rel="stylesheet" href="Adminlte/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
  <link rel="stylesheet" href="Adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="Adminlte/dist/css/adminlte.min.css">
</head>
<body class="hold-transition register-page">
            <div class="card card-primary">
                <div class="card-header">
	        <h2>Datos de los Generales</h2>
		</div>
            </div>
	<form role="form" action="" method="post">
            <div class="card-body">
                <div class="form-group">
		    <label>Nombre</label>
		    <input type="text" name="nombre" class="form-control" placeholder="Nombre" required>
                </div>
		<div class="form-group">
		    <label>Apellido</label>
		    <input type="text" name="apellido" class="form-control" placeholder="Apellido" required>
		</div>
                <div class="form-group">
		    <label class="col-sm-3 control-label">Tipo de Identidad</label>
			<select name="genero" class="form-control">
			    <option value=""> ----- </option>
                            <option value="f">Identidad</option>
			    <option value="m">Pasaporte</option>
                            <option value="m">Visa de trabajo</option>
			</select>
                </div>
	        <div class="form-group">
		    <label class="col-sm-3 control-label"># de Identidad</label>
		    <input type="text" name="num_identidad" class="form-control" placeholder="Identidad" required>
		</div>
		<div class="form-group">
		    <label class="col-sm-3 control-label">Genero</label>
			<select name="genero" class="form-control">
			    <option value=""> ----- </option>
                            <option value="f">Femenino</option>
			    <option value="m">Masculino</option>
			</select>
		</div>
		<div class="form-group">
		    <label class="col-sm-3 control-label">Telefono</label>
		    <input type="text" name="num_telefono" class="form-control" placeholder="Telefono" required>
		</div>
		<div class="form-group">
		    <label class="col-sm-3 control-label">Fecha de nacimiento</label>
		    <input type="text" name="fecha_nacimiento" class="input-group date form-control" date="" data-date-format="dd-mm-yyyy" placeholder="00-00-0000" required>
		</div>
		<div class="form-group">
		    <label class="col-sm-3 control-label">Dirección</label>
		    <textarea name="direccion" class="form-control" placeholder="Dirección"></textarea>
		</div>
		<div class="form-group">
		    <label class="col-sm-3 control-label">Tipo De Sangre</label>
			<select name="tipo_sangre" class="form-control">
			    <option value=""> ----- </option>
                            <option value="A+">A+</option>
			    <option value="A-">A-</option>
			    <option value="B+">B+</option>
			    <option value="B-">B-</option>
			    <option value="O+">O+</option>
			    <option value="O-">O-</option>
			</select>
		    </div>
		<div class="form-group">
		    <label class="col-sm-3 control-label">Email</label>
		    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
		</div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Foto De Perfil</label>
                    <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Elige archivo</label>
                      </div>
                 </div>
                </div>
            </div>
            <div class="card-footer">
                  <button type="submit" class="btn btn-primary" class="text-center">Finalizar</button>
            </div>
        </form>
    <!-- jQuery -->
<script src="Adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="Adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="Adminlte/dist/js/adminlte.min.js"></script>
</body>
</html>
