<?php
require'connect_db.php';

$medico = $_POST['codmedico'];
$fecha = $_POST['fecha'];

$sql='SELECT codhorario,horainicio,horafinal FROM persona p,empleados e,medico m,horarios h WHERE P.CodPersona=E.CodPersona AND E.CodEmpleado=m.CodEmpleado and e.codjornada = h.codjornada and Codmedico = '.$medico.'';   
$sql2='select horainicio from cita_medica c,horarios h where c.codhorario = h.codhorario and fecha = '.$fecha.' ';
$cadena='';
$resultado= mysqli_query($con,$sql);
while($row= mysqli_fetch_array($resultado)){
   $cadena=$cadena.'<option value='.$row['codhorario'].'>'.utf8_encode($row['horainicio'].' '.'de'.' '.$row['horafinal']).'</option>';

}
    echo $cadena;
?>
