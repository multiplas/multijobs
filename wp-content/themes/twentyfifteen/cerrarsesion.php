<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="content-language" content="es" />
	<meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
	<title>Document</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/estilos.css"/>
</head>

<body>
<?php
  session_start();
  unset($_SESSION["usuario"]); 
  unset($_SESSION["administrador"]); 
  unset($_SESSION["valida"]);
  unset($_SESSION["cesta"]);
  unset($_SESSION['id_empresa']);
  unset($_SESSION['inicio-correcto']);
  unset($_SESSION['correcto']);
  unset($_SESSION['alumno']);
  session_destroy();
  header("Location: index.php");
  exit;
?>

</body>
</html>