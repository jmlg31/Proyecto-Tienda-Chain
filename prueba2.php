<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<!-- visor meta para restablecer la escala inital iPhone -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Diseño web responsable</title>

<!-- css3-mediaqueries.js for IE8 o mas viejos-->
<!--[if lt IE 9]>
	<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->

<style type="text/css">

body {
	font: 1em/150% Arial, Helvetica, sans-serif;
}
a {
	color: #669;
	text-decoration: none;
}
a:hover {
	text-decoration: underline;
}
h1 {
	font: bold 36px/100% Arial, Helvetica, sans-serif;
}

/************************************************************************************
Estructura
*************************************************************************************/
#pagewrap {
	padding: 5px;
	width: 960px;
	margin: 20px auto;
}
#header {
	height: 180px;
	
}


a.identificarse:link, a.identificarse:visited{
	position:relative;
	top:0px;
	left:780px;
	text-decoration:none;
	color:black;
	font-weight:bold;
	font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
	
}



a.salir{

position:absolute;
	top:55px;
	left:950px;
	color:black;	
	font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
	color:#06F;
	font-weight:bold;
	
}


.nombre{
	position:absolute;
	top:23px;
	left:900px;	
	font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
	font-weight:bold;
	font-size:14px;
	
}



#foto3{
	width:17px;
	height:17px;
}


a.miCuenta:link, a.miCuenta:visited{
	position:relative;
	top:-50px;
	left:600px;
	text-decoration:none;
	color:black;
	font-weight:bold;
	font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
}


#foto2{
	width:15px;
	height:15px;
}


.titulo{
	position:relative;
	top:60px;
	left:-105px;
	font-family: 'Vollkorn', serif cursive;
	font-weight:bold;
	font-size:18px;
	font-style:italic;
	text-align:center;
	
	
}


#foto1{
	width:200px;
	height:200px;
	position:absolute;
	top:-15px;
	left:200px;
	/* Animación */
	-webkit-animation: sombra ease-in infinite alternate 500ms;
	-moz-animation: sombra ease-in infinite alternate 500ms;
	animation: sombra ease-in infinite alternate 500ms;
	
}


#foto1:hover{
	-webkit-animation: temblor 0.5s infinite;
	
	
	
}



#content {
	width: 600px;
	float: left;
}
#sidebar {
	width: 300px;
	float: right;
}
#footer {
	clear: both;
}

/************************************************************************************
MEDIA QUERIES
*************************************************************************************/
/* for 980px or less */
@media screen and (max-width: 980px) {
	
	#pagewrap {
		width: 94%;
	}
	#content {
		width: 65%;
	}
	#sidebar {
		width: 30%;
	}

}

/* for 700px or less */
@media screen and (max-width: 700px) {

	#content {
		width: auto;
		float: none;
	}
	#sidebar {
		width: auto;
		float: none;
	}

}

/* for 480px or less */
@media screen and (max-width: 480px) {

	#header {
		height: auto;
	}
	h1 {
		font-size: 24px;
	}
	#sidebar {
		display: none;
	}

}

/* border & guideline (you can ignore these) */
#content {
	background: #f8f8f8;
}
#sidebar {
	background: #f0efef;
}
#header, #content, #sidebar {
	margin-bottom: 5px;
}
#pagewrap, #header, #content, #sidebar, #footer {
	border: solid 1px #ccc;
}

</style>
</head>

<body>

<div id="pagewrap">

	<div id="header">
		<img id="foto1" src="Imagenes/logo-dacunha1.png" /><p class="titulo">"Especialista en Bicicletas, accesorios y componentes"</p><a class="miCuenta" href="miCuenta.php"><img id="foto2" src="Imagenes/user_3.png"/>Mi Cuenta</a>

<?php

session_start();


if(!empty($_SESSION["usuario"])){

echo "<p class=\"nombre\">Bienvenid@ ".$_SESSION["usuario"]."</p><a class=\"salir\" href=\"cerrarSesion.php\" title=\"Cerrar sesión\">(Salir)</a>";



}else{

	echo "<a class=\"identificarse\" href=\"identificarse.php\"><img id=\"foto3\" src=\"Imagenes/icon_login.png\"/>Identificarse</a>";
}

?>
	</div>

	<div id="content">
		<h2>Content</h2>
		<p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
	</div>

	<div id="sidebar">
		<h3>Sidebar</h3>
		<p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
	</div>
	
	<div id="footer">
		<h4>Footer</h4>
	</div>

</div>

</body>
</html>
