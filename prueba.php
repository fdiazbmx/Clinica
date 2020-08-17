<?php
	require ('connect_db.php');
	
	$query = "SELECT * FROM especialidades ORDER BY codespecialidad";
	$resultado=$con->query($query);
?>
 
<html>
	<head>
		<title>ComboBox Ajax, PHP y MySQL</title>
		
		<script language="javascript" src="js/jquery-3.5.1.min"></script>
		
		<script language="javascript">
			$(document).ready(function(){
				$("#cbx_estado").change(function () {
 
					
					
					$("#cbx_estado option:selected").each(function () {
						CodEspecialidad = $(this).val();
						$.post("../getMunicipio.php", { CodEspecialidad: CodEspecialidad }, function(data){
							$("#cbx_municipio").html(data);
						});            
					});
				});
			});
			
		</script>
		
	</head>
	
	<body>
		<form id="combo" name="combo" action="guarda.php" method="POST">
			<div>Selecciona Estado : <select name="cbx_estado" id="cbx_estado">
				<option value="0">Seleccionar Estado</option>
				<?php while($row = $resultado->fetch_assoc()) { ?>
					<option value="<?php echo $row['CodEspecialidad']; ?>"><?php echo $row['Nombre']; ?></option>
				<?php } ?>
			</select></div>
			
			<br />
			
			<div>Selecciona Municipio : <select name="cbx_municipio" id="cbx_municipio"></select></div>
			
			<br />
			
			
			<br />
			<input type="submit" id="enviar" name="enviar" value="Guardar" />
		</form>
	</body>
</html>
