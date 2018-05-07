	<?php 
	include "conexion.php";
	$consulta1 = "INSERT INTO `familias`(`nombre_familia`) VALUES ('".$_POST['nombre_familia']."')";
	echo $consulta1;
	$actuacion=mysqli_prepare($mysqli,$consulta1);
	mysqli_stmt_execute($actuacion);
	// header("Location: insertar.php");
 //    exit;
	
	?>