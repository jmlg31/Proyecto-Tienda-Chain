<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript" src="jquery-1.3.min.js"></script>
<script type="text/javascript">
function mainmenu(){
$(" #nav ul ").css({display: "none"});
$(" #nav li").hover(function(){
	$(this).find('ul:first:hidden').css({visibility: "visible",display: "none"}).show(400);
	},function(){
		$(this).find('ul:first').css({visibility: "hidden"});
	});
}
$(document).ready(function(){
	mainmenu();
});
</script>
<link href="estilos7.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>
<body>
<div id="general">
<img id="foto1" src="Imagenes/logo-dacunha1.png" /><p class="titulo">Administración Web</p>

<?php

session_start();




echo "<p class=\"nombre\">Bienvenid@ ".$_SESSION["usuario"]."</p><a class=\"salir\" href=\"cerrarSesion.php\" title=\"Cerrar sesión\">(Salir)</a>";



?>

<div id="hijo4" align="center">
<p class="mtbBh">Ajustes <img width="40" height="40" src="Imagenes/1424234839_options.png"</img></p></br>
</div>
<div id="menu">
<ul id="nav">
    <li><a href="#">Ajustes</a></li>
    <li><a href="#">Clientes</a>
    <ul class="submenu">
    <li><a href="#">Añadir</a></li>
    <li><a href="#">Eliminar</a></li>
    <li><a href="#">Bloquear o Desbloquear</a></li>
</ul>
    </li>
    <li><a href="#">Productos</a>
<ul class="submenu">
    <li><a href="#">Añadir</a></li>
    <li><a href="#">Eliminar</a></li>
</ul>
</li>
    <li><a href="#">Pedidos</a>
    <ul class="submenu">
    <li><a href="#">Ver Pedidos</a></li>
    <li><a href="#">Eliminar Pedidos</a></li>
</ul>    
</li>
<li><a href="#">Usuarios</a>
    <ul class="submenu">
    <li><a href="#">Añadir Usuario Normal</a></li>
    <li><a href="#">Añadir Usuario de Lectura</a></li>
</ul>    
</li> 
<li><a href="#">Consultas</a></li>   
</ul>
</div>
<div id="hijo6">
<p id="pie"><a href="condicionesGenerales.php">Condiciones Generales</a></p><p id="pie2"><a href="politicaPrivacidad.php">Política de Privacidad</a></p><p id="pie3"><a href="informacionContacto.php">Información de Contacto</a>
</p>
<p id="pie4"><img id="copy" src="Imagenes/copyright-1.png" width="18" height="18"/><p id="txt">CHAIN S.L. Todos los derechos reservados. 2015</p>
</div>
</div>
</body>
</html>
