<?php
include("connect_db.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Clinica Amigos en Apuros</title>
<!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="adminlte/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="adminlte/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="adminlte/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="adminlte/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

</head>
<body>
		<?php include('nav_admin.php');?>
	<div class="container">
		<div class="content">
			<h2>Doctores</h2>
			<hr />

				<?php
					if(isset($_GET['aksi']) == 'delete'){
						// escaping, additionally removing everything that could be (html/javascript-) code
						$nik = mysqli_real_escape_string($con,(strip_tags($_GET["nik"],ENT_QUOTES)));
						$cek = mysqli_query($con, "SELECT * FROM persona WHERE id_empleado='$nik'");
						
						if(mysqli_num_rows($cek) == 0){
							echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> No se encontraron datos.</div>';
						}else{
							$delete = mysqli_query($con, "DELETE FROM persona WHERE codpersona='$nik'");
							if($delete){
								echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Datos eliminado correctamente.</div>';
							}else{
								echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Error, no se pudo eliminar los datos.</div>';
							}
						}
					}
				?>
				</br>
				<div class="col-lg-12">
					<a href="add.php" class="btn btn-primary " style="float: right" ><i class="fa fa-plus" aria-hidden="true"></i> Agregar Doctor</a>
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
						
								if(mysqli_num_rows($sql) == 0){
									echo '<tr><td colspan="8">No hay datos.</td></tr>';
								}else{
									$no = 1;
									while($row = mysqli_fetch_assoc($sql)){
										echo '
										<tr>
											<td>'.$no.'</td>
											<td><a href="profile.php?nik='.$row['CodPersona'].'"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> '.$row['Nombres'].' '.$row['Apellidos'].'</a></td>
											<td>'.$row['Nume_Identificacion'].'</td>
											</td>
											<td>';
											if($row['CodTipoPersona'] == 2){
												echo '<span class="label label-success">Medico</span>';
											}
											
										echo '
											</td>
											<td>'.$row['Telefono'].'</td>
											<td>'.$row['FechaNacimiento'].'</td>
											<td>'.$row['Direccion'].'</td>
											<td>';
											if($row['Genero'] == 'f'){
												echo '<span class="label label-success">Femenino</span>';
											}
											else if ($row['Genero'] == 'm' ){
												echo '<span class="label label-info">Masculino</span>';
											}
										echo ' 
											<td>

											<a href="edit.php?nik='.$row['CodPersona'].'" title="Editar datos" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
											<a href="empleados.php?aksi=delete&nik='.$row['CodPersona'].'" title="Eliminar" onclick="return confirm(\'Esta seguro de borrar los datos '.$row['Nombres'].'?\')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
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
    <script src="adminlte/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="adminlte/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
</script>
<!-- Bootstrap 4 -->
<script src="adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="adminlte/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="adminlte/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="adminlte/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="adminlte/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="adminlte/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="adminlte/plugins/moment/moment.min.js"></script>
<script src="adminlte/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="adminlte/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="adminlte/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="adminlte/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="adminlte/dist/js/demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="sweetalert2.all.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
</body>
<footer class="page-footer font-small teal pt-4">
<?php include('../clinica/footer.php');?>
</footer>
</html>
