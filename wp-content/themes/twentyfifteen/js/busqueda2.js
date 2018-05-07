function activarBusca(){
	var xmlhttp;
	nombre = document.getElementById("bus").value;
	document.getElementById("datos").style.display = "none";
	document.getElementById("datos_ajax").style.display = "inherit";

	if(nombre==''){
	document.getElementById("datos").style.display = "inherit";
	document.getElementById("datos_ajax").style.display = "none";
	return;
	}

	if (window.XMLHttpRequest)
	{// code for IE7+, Firefox, Chrome, Opera, Safari
	xmlhttp=new XMLHttpRequest();
	}
	else
	{// code for IE6, IE5
	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function()
	{
	if (xmlhttp.readyState==4 && xmlhttp.status==200)
	{
		caja = document.getElementById("datos_ajax");
		caja.innerHTML = xmlhttp.responseText;
	}
	}
	xmlhttp.open("POST","busqueda2.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("q="+nombre);
}
