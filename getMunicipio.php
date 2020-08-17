<?php
	require ('connect_db.php');
	
	$id_estado = $_POST['CodEspecialidad'];
	
	$queryM = "SELECT * FROM medico WHERE CodEspecialidad = $id_estado";
	$resultadoM = $con->query($queryM);
	
	$html = "<option value='0'>Seleccionar Municipio</option>";
	
	while($rowM = $resultadoM->fetch_assoc())
	{
		$html = "<option value='".$rowM['CodEspecialidad']."'>".$rowM['CodEmpleado']."</option>";
	}
	
	echo $html;
?>
