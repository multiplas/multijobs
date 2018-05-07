<?php 

session_start();
include 'conexion.php';

$destinatario = "xavidr72@hotmail.com"; 
$asunto = $_POST['asunto']; 
$cuerpo = ' 
<html> 
<head> 
   <title>Asunto'.$_POST["asunto"].'</title> 
</head> 
<body> 
<h3>Mensaje de '.$_POST['mail'].'</h3>
<p> 
'.$_POST['cuerpo'].'
</p> 
</body> 
</html> 
'; 




//para el envío en formato HTML 
$headers = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=utf-8\r\n"; 

//dirección del remitente 
$headers .= "From: ".$_POST['nombre']." <".$_POST['mail'].">\r\n"; 

//dirección de respuesta, si queremos que sea distinta que la del remitente 
//$headers .= "Reply-To: multiplas72@gmail.com\r\n"; 

//ruta del mensaje desde origen a destino 
//$headers .= "Return-path: javli22@msn.com\r\n"; 

//direcciones que recibián copia 
//$headers .= "Cc: javierdiazrego@hotmail.com\r\n"; 

//direcciones que recibirán copia oculta 
$headers .= "Bcc: javierdiazrego@hotmail.com\r\n"; 

if(mail($destinatario,$asunto,$cuerpo,$headers)){
	$_SESSION['enviado']=1;
	$consulta = "INSERT INTO `correo`(`correo`, `fecha`) VALUES (".$_POST['mail'].",NOW())";
	$inserta=mysqli_query(conectar(),$consulta);
}
else{
	$_SESSION['enviado']=0;
}
header("Location: contacto.php");
    exit;
?>