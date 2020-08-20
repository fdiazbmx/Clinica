<?php
require'connect_db.php';

$especialidad = $_POST['especialidad'];

$sql='SELECT m.codmedico,p.nombres,p.apellidos FROM persona p,empleados e,medico m WHERE P.CodPersona=E.CodPersona AND E.CodEmpleado=m.CodEmpleado and CodEspecialidad = '.$especialidad.'';
$cadena='';
$resultado= mysqli_query($con,$sql);
while($row= mysqli_fetch_array($resultado)){
   $cadena=$cadena.'<option value='.$row['codmedico'].'>'.utf8_encode($row['nombres'].' '.$row['apellidos']).'</option>';

}
    echo $cadena;
?>
