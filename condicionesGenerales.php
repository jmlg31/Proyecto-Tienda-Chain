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
<link href="estilos4.css" rel="stylesheet" type="text/css" />
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
<h1>Condiciones Generales</h1><br /><br />

<p class="titulo3">Contrato y aceptación</p><br />

<p class="privacidad">CHAIN, S.L., es el titular de la presente página Web, operando bajo la denominación comercial de CHAIN.

Las presentes condiciones generales están formuladas de conformidad a los Códigos Civil y de Comercio, Ley 7/1996, de 15 de enero, de Ordenación del Comercio Minorista, Ley 7/1998, de 13 de abril, de Condiciones Generales de la Contratación y Ley 7/1995, de 23 de marzo, de Crédito al Consumo.
Estos términos y condiciones, junto con su Confirmación de Pedido, constituyen el Contrato entre nuestra empresa y usted.

La realización de cualquier pedido en www.chain.es implica el conocimiento y aceptación de las presentes Condiciones Generales. Además, el cliente de La tienda CHAIN afirma tener un mínimo de 18 años y asegura la veracidad de los datos ofrecidos para la correcta gestión de su pedido.</p><br />

<p class="titulo3">Plazos y ámbito de entrega</p><br />

<p>Plazos de entrega</p><br />

<p class="privacidad">Los plazos de entrega variarán según productos. Si desea conocerlos, sólo tiene que entrar en la ficha de cada producto. Los plazos de entrega están indicados en días laborables (de Lunes a Viernes) y comenzarán a contar desde la confirmación del pago en nuestra cuenta bancaria. Los artículos se entregarán dentro del plazo convenido, salvo que el cliente desee que la mercancía se le entregue más tarde de la fecha prevista.

En ocasiones, por causas ajenas a La tienda CHAIN, el plazo se puede demorar 10 días laborables de su fecha prevista de entrega. En este caso, el comprador podrá anular el pedido y recibir el importe abonado. El incumplimiento en la entrega no se considerará tal si ha sido retrasado por voluntad propia o si no se ha podido localizar al comprador mediante los datos facilitados por éste.

Plazo de entrega entre 24 y 48 horas. Sólo se podrá garantizar en pedidos pagados mediante una de las formas de pago reflejadas en la página.<p/><br />

<p>Pedidos retenidos</p><br />

<p class="privacidad">En los pedidos retenidos sin indicar fecha de entrega, usted deberá avisar cuando desee recibir la mercancía. En ese momento se le asignará un nuevo plazo de entrega, que podrá ser superior o inferior al plazo que se le indicó al realizar el pedido.</p><br />

<p>Ámbito de entrega</p><br />

<p class="privacidad">Los productos ofrecidos en La tienda CHAIN se sirven en la Península española, Menorca, Mallorca, Ibiza, Tenerife y Gran Canaria. Tanto en el resto de islas de Canarias y Baleares.

El precio de los productos incluyen impuestos y transporte. Sin embargo, en Baleares y Canarias puede haber portes para ciertos productos. En todo caso, este detalle se indicará a la hora de realizar el pedido.<p/><br />

<p class="titulo3">Recepción del pedido</p><br />

<p class="privacidad">La agencia de transportes efectuará los envíos de lunes a viernes en horario de mañana o de tarde (dependiendo de la ruta de reparto establecida para su población), quedando siempre con usted antes de ir. Si su población se encuentra alejada de un gran núcleo urbano o ciudad, o tiene menos de 5000 habitantes, la entrega puede demorarse de 3 a 5 días adicionales.

Le recomendamos que, en caso de desacuerdo con la agencia de transportes, se ponga en contacto con nosotros para que le ayudemos en la gestión.</p><br />

<p>Seguro de la mercancía</p><br />

<p class="privacidad">Los pedidos viajan cubiertos con un seguro por el 100% del valor de la mercancía. En caso de que su envío presente desperfectos debidos al transporte, deberá indicar las anomalías en el albarán del transportista. No se admitirán reclamaciones pasadas 24 horas desde la recepción de la mercancía. Toda reclamación motivada por desperfectos en el transporte debe ser dirigida a La tienda CHAIN en el plazo indicado. Recuerde no tirar nunca el embalaje de los productos hasta comprobar que se encuentran en perfecto estado y verificar que todos los productos coinciden con los que usted pidió.</p><br />

<p class="titulo3">Otras condiciones</p><br />

<p>Pago de su pedido</p><br />

<p class="privacidad">Para poder mantener el plazo de entrega y las promociones vigentes de su pedido, deberá abonarlo en las siguientes 24/48 horas laborales. Una vez expirado este plazo, CHAIN, S.L. no se responsabiliza de las variaciones en los plazos y/o precios que pueda sufrir su pedido.</p><br />

<p>Privacidad</p><br />

<p class="privacidad">Al realizar su pedido CHAIN, S.L. se compromete a no ceder sus datos personales, salvo a la agencia de transporte o plataforma logística del fabricante para la realización del envío.</p><br />

<p class="titulo3">Formas de pago</p><br />

<p class="privacidad">A la hora de realizar un pedido en La tienda CHAIN, puede escoger entre las siguientes formas de pago:</p><br />

<p>Pago por Paypal: </p><br />

<p class="privacidad">Si dispone de una cuenta Paypal, podrá pagar sus compras en La tienda CHAIN de forma rápida y segura. Al finalizar el proceso de pedido, accederá a su Cuenta Segura de Paypal y, tras verificar los detalles de su compra, ordenar el pago.</p><br />

Esta página es sólo un ejemplo de Condiciones Generales, y no tiene valor legal. <br />

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
