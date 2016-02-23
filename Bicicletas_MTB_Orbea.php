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
<link href="estilos2.css" rel="stylesheet" type="text/css" />
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
<p class="mtbBh">Bicicletas MTB <img width="40" height="40" src="Imagenes/orbea logo.png"</img></p></br>
<div id="caja" align="center">
           <?php
		      
			  session_start();
		   
			  $conexion=mysql_connect("localhost","u789964829_jm","trebujena") or die("Problemas en la conexion");

			  mysql_select_db("u789964829_proy",$conexion) or die("Problemas en la selección de la base de datos");
			  
			  
			  $sql="SELECT * FROM productos WHERE producto LIKE '%Orbea%' AND id_categoria=1";
			  $rs = mysql_query($sql);
              $num_total_registros = mysql_num_rows($rs);
			  
			  if($num_total_registros>0){
				  //Limito la busqueda
				$TAMANO_PAGINA = 6;
				
				//examino la página a mostrar y el inicio del registro a mostrar
				$pagina = $_GET["pagina"];
				if (!$pagina) {
					$inicio = 0;
					$pagina = 1;
				}else{
					$inicio = ($pagina - 1) * $TAMANO_PAGINA;
				}
				//calculo el total de páginas
				$total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);
				
				$result = mysql_query("SELECT id, producto, precio FROM productos WHERE producto LIKE '%Orbea%' AND id_categoria=1 ORDER BY id DESC LIMIT ".$inicio.",".$TAMANO_PAGINA.""); 
			  
			  
				  if (mysql_num_rows($result)){ 
				 	echo "<div id=\"caja\">";
						echo "<table cellspacing=\"0\"> ";   
						echo "<tr id=\"titulos\"><td align=\"right\">Foto</td><td align=\"center\"></td><td align=\"left\">Descripción</td><td align=\"center\">Precio</td><td align=\"center\">Añadir</td></tr>";
						
						echo "<tr>";
					
						while ($row = @mysql_fetch_array($result)) {
							$producto=$row[1];
							$precio=$row[2];
											
								echo "<td align=\"center\" colspan=\"2\"><img width=\"100\" height=\"75\" src=\"http://jmlopez.esy.es/Proyecto_Final/cargarImagen.php?id=".$row['id']."\"></td>"; 
								echo "<td id=\"prod\">".$producto."</td><td align=\"center\">".$precio."€</td>"; 
							    echo "<td colspan=\"2\" align=\"center\">";
								
								if(!empty($_SESSION["usuario"])){
								
								echo "<a href='http://jmlopez.esy.es/Proyecto_Final/carro.php?id=" .$row[0]. "&action=";
								//Detectamos si el producto ya se ha añadido al cesta de la compra para usar una imagen u otra.
								//Si se ha añadido usamos una imagen para Restar una cantidad al carro
								if (isset($_SESSION['carro'][$row[0]])){
									//echo "remove' alt='Eliminar del carro'><img src='img/remove_carro.png' width='48' height='48' alt='Eliminar del carro' title='Añadir producto al carrito'>";
									echo "removeProd' alt='Eliminar del carro'><img src='Imagenes/remove_carro.png' width='48' height='48' alt='Eliminar del carro' title='Añadir producto al carrito'>";
								}
								else
									echo "add' alt='Añadir al carro'><img src='Imagenes/add_carro.png' width='48' height='48' alt='Añadir al carrito' title='Añadir producto al carrito'>";
								}else{
									echo "<a href='http://jmlopez.esy.es/Proyecto_Final/errorCarro.php'><img src='Imagenes/add_carro.png' width='48' height='48' alt='Añadir al carrito' title='Añadir producto al carrito'/>";
								}	
								
				echo "</a></td>";
								
			  echo "</tr>"; 
								
							
						}
						
						echo "</table> ";
						echo "</div>";
						
					}else{
						echo "¡ No se ha encontrado ningún registro !";
					
					}
					
					
					if ($total_paginas > 1) {
					   if ($pagina != 1)
						  echo '<a class=\"pag\" href="'.$url.'?pagina='.($pagina-1).'"><img src="Imagenes\izq.gif" border="0"></a>';
						  for ($i=1;$i<=$total_paginas;$i++) {
							 if ($pagina == $i)
								//si muestro el índice de la página actual, no coloco enlace
								echo $pagina;
							 else
								//si el índice no corresponde con la página mostrada actualmente,
								//coloco el enlace para ir a esa página
								echo '  <a href="'.$url.'?pagina='.$i.'">'.$i.'</a>  ';
						  }
						  if ($pagina != $total_paginas)
							 echo '<a href="'.$url.'?pagina='.($pagina+1).'"><img src="Imagenes\der.gif" border="0"></a>';
						}
				
				  
			  }else{
				  echo "No hay registros";
				  
			  }
			  
			  			
					
			?>
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
