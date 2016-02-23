<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script language="javascript" src="jquery-1.3.min.js"></script>
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
<link href="estilos5.css" rel="stylesheet" type="text/css" />
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
<div id="hijo4">
<h1>Política de Privacidad</h1><br /><br />
<p>1. Navegación anónima a través de la web<p><br />


<p class="privacidad">Chain sólo obtiene y conserva la siguiente información acerca de los visitantes de nuestra web:<br /><br />

a. El nombre de dominio del proveedor (PSI) y/o dirección IP que les da acceso a la red. <br /><br />
b. La fecha y hora de acceso a nuestra web. <br /><br />
c. La dirección de Internet desde la que partió el link que dirige a nuestra web. <br /><br />
d. El número de visitantes diarios de cada sección.<br /><br />

La información obtenida es totalmente anónima, y en ningún caso puede ser asociada a un usuario concreto e identificado.</p><br />

<p>2. Navegación con Javascript, CSS y Cookies</p><br />

<p class="privacidad">Para navegar por este sitio web es necesario tener activadas las opciones de Javascript, CSS y Cookies, pequeños ficheros de datos que se generan en el ordenador del usuario y que nos permiten guardar elementos de personalización de los contenidos que el usuario escogió en su primera visita al sitio web de Chain Todas nuestras cookies guardan la información de forma encriptada y se destruyen de forma automática pasado cierto tiempo. El usuario, por su parte, podrá eliminar las cookies que le sean remitidas mediante la configurador del navegador utilizado para acceder al sitio web de Chain.</p><br />

<p>3. Registro e identificación web</p><br />

<p class="privacidad">Al participar en las acciones de la web Chain se creará automáticamente una cuenta de usuario. Esta cuenta permite al usuario acceder a una zona privada (http://www.chain.es/admin) donde gestionar los datos personales, colaboraciones y suscripciones a boletines informativos. En esta zona privada también se encontrará la vía para poder rectificar y/o cancelar esta cuenta de usuario.</p><br />

<p>4. Tratamiento de los datos obtenidos a través de la web</p><br />

<p class="privacidad">De acuerdo con la normativa vigente en materia de protección de datos así como en materia de servicios de sociedad de la información y comercio electrónico, el usuario acepta que los datos personales que el usuario facilite a través de la web www.chain.es serán objeto de tratamiento e incorporados en un fichero titularidad de Chain del que es responsable Chain, con domicilio social en Gran Via de les Corts Catalanes, 641, 08010 Barcelona. La recogida y tratamiento de los datos personales tiene como finalidad gestionar las solicitudes que el usuario realice a Chain a través del sitio web y cumplir las obligaciones legales de Chain en materia de protección de datos personales, así como -en su caso- otras finalidades que se indiquen en los formularios del sitio web donde se recaben los datos del usuario. Los datos que se soliciten al usuario en los formularios de recogida tendrán carácter obligatorio salvo que se indique lo contrario en el formulario correspondiente. En el caso de que el usuario no facilite los datos solicitados con carácter obligatorio, Chain no podrá tramitar el servicio solicitado mediante el formulario de que se trate. Chain se compromete al cumplimiento de su obligación de secreto de los datos de carácter personal y de su deber de tratarlos con confidencialidad, y asume, a estos efectos, las medidas de índole técnica, organizativa y de seguridad necesarias para evitar su alteración, pérdida, tratamiento o acceso no autorizado, de acuerdo con lo establecido en la Ley Orgánica 15/1999 sobre Protección de Datos de Carácter Personal, y demás legislación aplicable. El titular de los datos personales deberá dirigirse por escrito a info@chain.es o al domicilio social de Chain anteriormente indicado, para el ejercicio de los derechos de acceso, rectificación, cancelación y oposición relativo al tratamiento responsabilidad de Chain, indicando en el asunto ‘LOPD’ y acreditando su identidad.</p><br />

<p>5. Seguridad</p><br />

<p class="privacidad">Garantizamos que cualquier transmisión que se produzca de sus datos personales se hará mediante una tecnología que cumple los máximos estándares de seguridad. La comunicación entre su máquina y nuestros servidores se establece de manera encriptada. El tratamiento de los datos lo realizará solamente personal autorizado y responsable de Chain.</p><br />

Esta página es sólo un ejemplo de Política de Privacidad, y no tiene valor legal. <br />

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
</ul><div id="cabecera">
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
</div>

<div id="hijo6">
<p id="pie"><a href="condicionesGenerales.php">Condiciones Generales</a></p><p id="pie2"><a href="politicaPrivacidad.php">Política de Privacidad</a></p><p id="pie3"><a href="informacionContacto.php">Información de Contacto</a>
</p>
<p id="pie4"><img id="copy" src="Imagenes/copyright-1.png" width="18" height="18"/><p id="txt">CHAIN S.L. Todos los derechos reservados. 2015</p>
</div>

</div>
</body>
</html>
