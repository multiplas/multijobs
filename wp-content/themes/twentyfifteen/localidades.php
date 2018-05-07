<?php

include 'conexion.php';

$q=$_POST['q'];
$con=conectar();
	if(isset($q)&&!empty($q)){
		$consulta = "SELECT * FROM `localidad` WHERE `prov_id` = ".$q. "  ORDER BY nombre";
		$result = mysqli_query($con,$consulta);
		$cuenta=0;
		echo "<option value=''>Selecciona una localidad</option>";
		while($fila=mysqli_fetch_assoc($result))
		{
		echo "<option value=".$fila['id'].">".$fila['nombre']."</option>";
		}	
	}
 	

?>