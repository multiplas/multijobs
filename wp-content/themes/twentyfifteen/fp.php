<?php

include 'conexion.php';

$q=$_POST['q'];
$con=conectar();

 	$consulta = "SELECT * FROM `fp` WHERE `idciclo` = ".$q. "  ORDER BY `nombre_fp`";
	$result = mysqli_query($con,$consulta);
	$cuenta=0;
	echo "<option value=''> -- Seleccionar -- </option>";
	while($fila=mysqli_fetch_assoc($result))
	{
	echo "<option value=".$fila['id_fp'].">".$fila['nombre_fp']."</option>";
	}

?>