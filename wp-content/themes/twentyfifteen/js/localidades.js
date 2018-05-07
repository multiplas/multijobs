function muestralocalidad(){
	var xmlhttp;
	provincia = document.getElementsByName("provincia");
	var n=provincia[0].value;


	if(n==''){
	alert ("Se debe elegir una provincia");
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
	localidad = document.getElementsByName("localidad");
	localidad[0].disabled = false;
	localidad[0].innerHTML = xmlhttp.responseText;
	}
	}
	xmlhttp.open("POST","//localhost:8080/multijobs_wordpress/wp-content/themes/twentyfifteen/localidades.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("q="+n);
}

function muestrafp(){
	var xmlhttp;
	ciclo = document.getElementsByName("ciclo[]");
	var n=ciclo[0].value;

	if(n==''){
	alert ("Se debe elegir un ciclo");
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
	fp = document.getElementsByName("fp[]");
	fp[0].disabled = false;
	fp[0].innerHTML = xmlhttp.responseText;
	}
	}
	xmlhttp.open("POST","//localhost:8080/multijobs_wordpress/wp-content/themes/twentyfifteen/fp.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("q="+n);
}