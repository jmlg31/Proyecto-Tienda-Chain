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
<link href="estilos6.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>
<body>
<div id="general"><img id="foto1" src="Imagenes/logo-dacunha1.png" /><p class="titulo">"Especialista en Bicicletas, accesorios y componentes"</p><a class="miCuenta" href="miCuenta.php"><img id="foto2" src="Imagenes/user_3.png"/>Mi Cuenta</a>

<?php

session_start();


if(!empty($_SESSION["usuario"])){

echo "<p class=\"nombre\">Bienvenid@ ".$_SESSION["usuario"]."</p><a class=\"salir\" href=\"cerrarSesion.php\" title=\"Cerrar sesión\">(Salir)</a>";



}else{

	echo "<a class=\"identificarse\" href=\"identificarse.php\"><img id=\"foto3\" src=\"Imagenes/icon_login.png\"/>Identificarse</a>";
}

?>

<div id="hijo2">
<div id="hijo3">
<p class="parrafo">Patrocinadores</p>
</div>
<img id="bh" src="Imagenes/bh_logo[1].png"/>
<img id="orbea" src="Imagenes/orbea logo.png" />
<img id="specialized" src="Imagenes/specialized_logo.png" />
<img id="trek" src="Imagenes/l72084-trek-logo-95843.png"/>
</div>
<div id="hijo4" align="center">
<p class="mtbBh">Contáctanos</p></br>
<div id="caja" align="center">
<form action="contacto.php" method="post">
<label for="nombre">Nombre:</label>
<input id="nombre" type="text" name="nombre" placeholder="Nombre y Apellido" required="" />
<label for="email">Email:</label>
<input id="email" type="email" name="email" placeholder="ejemplo@correo.com" required="" />
<label for="mensaje">Mensaje:</label>
<textarea id="mensaje" name="mensaje" placeholder="Mensaje" required=""></textarea>
<input id="submit" type="submit" name="submit" value="Enviar" />
</form>
</div>
</div>
<div id="hijo5">
<div id="hijo3">
<p class="parrafo">Síguenos</p>
</div>
<a href="https://www.facebook.com/"><img id="fb" src="Imagenes/fb.png"/></a>
<a href="https://twitter.com"><img id="tw" src="Imagenes/twitter.png"/></a>
<a href="https://plus.google.com"><img id="google" src="Imagenes/google+.png"/></a>
<a href="https://es.pinterest.com"><img id="pinterest" src="Imagenes/pinterest.png"/></a>
</div>
<div id="menu">
<ul id="nav">
    <li><a href="index.php">Inicio</a></li>
    <li><a href="#">Bicicletas</a>
<ul class="submenu">
    <li><a href="#">Bicicletas MTB</a>
<ul class="subsubmenu">
    <li><a href="Bicicletas_MTB_BH.php">BH</a></li>
    <li><a href="Bicicletas_MTB_Orbea.php">Orbea</a></li>
    <li><a href="Bicicletas_MTB_Specialized.php">Specialized</a></li>
    <li><a href="Bicicletas_MTB_Trek.php">Trek</a></li>
</ul>
</li>
     <li><a href="#">Bicicletas de Carretera</a>
    <ul class="subsubmenu">
    <li><a href="Bicicletas_Carretera_BH.php">BH</a></li>
    <li><a href="Bicicletas_Carretera_Orbea.php">Orbea</a></li>
    <li><a href="Bicicletas_Carretera_Specialized.php">Specialized</a></li>
    <li><a href="Bicicletas_Carretera_Trek.php">Trek</a></li>
</ul>
</li>  
</ul>
</li>
    <li><a href="#">Accesorios</a>
<ul class="submenu">
    <li><a href="guantes.php">Guantes</a></li>
    <li><a href="cascos.php">Cascos</a></li>
    <li><a href="hinchadores.php">Hinchadores</a></li>
    <li><a href="gps.php">Cuentakilómetros, GPS</a></li>
    <li><a href="luces.php">Luces y Accesorios</a></li>
    <li><a href="bidones.php">Bidones, Mochilas de Agua</a></li>
</ul>
</li>
    <li><a href="#">Componentes</a>
    <ul class="submenu">
    <li><a href="frenos.php">Frenos</a></li>
    <li><a href="neumaticos.php">Neumáticos</a></li>
    <li><a href="pedales.php">Pedales</a></li>
    <li><a href="sillines.php">Sillines</a></li>
    <li><a href="transmicion.php">Transmición</a></li>
    <li><a href="camaras.php">Cámaras</a></li>
</ul>    
</li>
<li><a href="buscar.php">Buscar</a></li>
<li><a href="contactanos.php">Contáctanos</a></li>
</ul>
</div>
<div id="cabecera">
	<?php
	if(!empty($_SESSION["usuario"])){
	?>
	<!-- Información de la cesta-->
	<div id="totales">
		<table>
			<tr align="right">
				<td><img width="30" height="30" src="Imagenes/buy-20clipart-shopping_cart_blue.png"/><strong>(
				<?php 
							if(isset($_SESSION["cantidadTotal"])){
								echo "<a style=\"color:#06F; text-decoration:underline;\" href=\"http://jmlopez.esy.es/Proyecto_Final/carro.php?id=1&action=mostrar\" title='lista de compra'>".$_SESSION["cantidadTotal"]."</a>";
							}else{
								echo "<a style=\"color:#06F; text-decoration:underline;\" href=\"http://jmlopez.esy.es/Proyecto_Final/carro.php?id=1&action=mostrar\" title='lista de compra'>0</a>";
								$_SESSION["totalcoste"] = 0;
							}
						?>
                       )</strong>
				</td></tr>
                
		</table>
	</div>
    
    
	<!-- FIN CESTA-->
	<?php
	}else{
		
		?>
		<div id="totales">
		<table>
			<tr align="right">
				<td><img width="30" height="30" src="Imagenes/buy-20clipart-shopping_cart_blue.png"/><strong>(
                <?php
                echo "<a style=\"color:#06F; text-decoration:underline;\" href=\"http://jmlopez.esy.es/Proyecto_Final/carro.php?id=1&action=mostrar\" title='lista de compra'>0</a>";
								$_SESSION["totalcoste"] = 0;
								?>
		  )</strong>
				</td></tr>
                
		</table>
	</div>
    <?php
	}
	?>
<div id="hijo6">
<p id="pie"><a href="condicionesGenerales.php">Condiciones Generales</a></p><p id="pie2"><a href="politicaPrivacidad.php">Política de Privacidad</a></p><p id="pie3"><a href="informacionContacto.php">Información de Contacto</a>
</p>
<p id="pie4"><img id="copy" src="Imagenes/copyright-1.png" width="18" height="18"/><p id="txt">CHAIN S.L. Todos los derechos reservados. 2015</p>
</div>

</div>
</body>
</html>
