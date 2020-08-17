<?php

require 'controladores/conexion.php';

$CodEspecialidad = $_POST('CodEspecialidad');


$sql = "SELECT * FROM persona p,empleados e,medico m WHERE P.CodPersona=E.CodPersona AND E.CodEmpleado=m.CodEmpleado and CodEspecialidad = $CodEspecialidad";
$resultado = $conn->prepare($sql);
$resultado->execute(array());

$html = "<option value='0'> ------ </option>";

while ($empleado = $resultado->fetch(pdo::FETCH_ASSOC)) {
    
    $html = "<option value='' . $empleado[CodMedico] . ''>' . $empleado[Nombres] . ' ' . $empleado[Apellidos] . '</option>";
    //echo '<option value="' . $empleado[CodMedico] . '">' . $empleado[Nombres] . ' ' . $empleado[Apellidos] . '</option>';
}

echo $html;

?>