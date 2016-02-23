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


if(!empty($_SESSION["usuario"])){

echo "<p class=\"nombre\">Bienvenid@ ".$_SESSION["usuario"]." (".$_SESSION['tipo'].")</p><a class=\"salir\" href=\"cerrarSesion2.php\" title=\"Cerrar sesión\">(Salir)</a>";

}


?>

<div id="hijo4" align="center">
</br></br>
<p class="mtbBh">Buscar Productos</p></br>
<?php
		      
			  session_start();
		   
			 
			$conexion=mysql_connect("localhost","u789964829_jm","trebujena") or die("Problemas en la conexion");
			
			mysql_select_db("u789964829_proy",$conexion) or die("Problemas en la selección de la base de datos");
			
			
			$sql="SELECT categoria FROM categorias";
			$rs = mysql_query($sql);
			
			echo "<div style=\"width:400px;\" align=\"center\">";
			echo "<form action=\"consultaBuscarProductos.php\">";
			echo "<table border=\"0\" align=\"center\">";
			echo "<tr><td align=\"center\">Producto</td><td align=\"center\">Color</td><td align=\"center\">Precio(€) Inferior a</td><td style=\"color:white; width:15px;\">Buscar</td></tr>";
			
			echo "<tr><td align=\"right\"><select name=\"categoria\"><option>- Seleccione -</option>";
			
			while ($row = @mysql_fetch_array($rs)) {
			
			echo "<option>".$row[0]."</option>";
			
			}
			
			echo "</select></td>";
			
			echo "<td align=\"center\"><select name=\"color\"><option>- Seleccione -</option><option>blanco</option><option>negro</option><option>amarillo</option><option>rojo</option><option>azul</option><option>verde</option><option>grafito</option><option>naranja</option><option>marron</option><option>plata</option><option>gris</option></select></td><td><select name=\"precio\"><option>- Seleccione -</option><option>50</option><option>100</option><option>200</option><option>500</option><option>1000</option><option>2000</option><option>5000</option><option>10000</option></select></td><td align=\"left\"><input type=\"submit\" value=\"Buscar\"/></td></tr>";
			echo "</table>";
			echo "</form>"; 
			echo "</div></br>";
			  
?>

<?php
			  $conexion=mysql_connect("localhost","u789964829_jm","trebujena") or die("Problemas en la conexion");

			  mysql_select_db("u789964829_proy",$conexion) or die("Problemas en la selección de la base de datos");

  		      
			  $categoria=$_GET['categoria'];
			  $color2=$_GET['color'];
			  $precio2=$_GET['precio'];
			  
			
			  
			  $indice=0;
			
			  
			  if($categoria=="MTB"){
					
					$indice=1;
				}
				
				if($categoria=="Carretera"){
					
					$indice=2;
				}
				if($categoria=="Guantes"){
					
					$indice=3;
				}
				if($categoria=="Cascos"){
					
					$indice=4;
				}
				if($categoria=="Hinchadores"){
					$indice=5;
				}
				if($categoria=="CuentaKilometros"){
					$indice=6;
					
				}
				if($categoria=="Luces"){
					
					$indice=7;
				}
				if($categoria=="Bidones"){
					
					$indice=8;
				}
				if($categoria=="Frenos"){
					
					$indice=9;
				}
				if($categoria=="Neumaticos"){
					
					$indice=10;
				}
				if($categoria=="Pedales"){
					
					$indice=11;
				}
				if($categoria=="Sillines"){
					
					$indice=12;
				}
				if($categoria=="Transmicion"){
					$indice=13;
					
				}
				if($categoria=="Camaras"){
					
					$indice=14;
				}
			  
			  
			  $sql="SELECT id, id_categoria, color, precio FROM productos WHERE id_categoria='$indice' AND color LIKE '%".$color2."%' AND precio < '$precio2'";
			  $rs = mysql_query($sql);
              $num_total_registros = mysql_num_rows($rs);
			  
			  
			  if($num_total_registros>0){
				  //Limito la busqueda
				$TAMANO_PAGINA = 4;
				
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
				
				$result = mysql_query("SELECT id, id_categoria, color, precio FROM productos WHERE id_categoria='$indice' AND color LIKE '%".$color2."%' AND precio < '$precio2' ORDER BY precio ASC LIMIT ".$inicio.",".$TAMANO_PAGINA.""); 
				
			  
			  
				  if (mysql_num_rows($result)){ 
				 	    echo "<div id=\"caja\" align=\"center\" style=\"width:500px\">";
						echo "<table cellspacing=\"0\" align=\"center\"> ";   
						echo "<tr id=\"titulos\"><td align=\"right\">Foto</td><td align=\"center\"></td><td align=\"left\">Categoría</td><td align=\"center\">Color</td><td align=\"center\">Precio</td></tr>";
						
						echo "<tr>";
					
						while ($row = @mysql_fetch_array($result)) {
							$indice=$row[1];
							$color=$row[2];
							$precio=$row[3];
							
							
							
											
								echo "<td align=\"center\" colspan=\"2\"><img width=\"100\" height=\"75\" src=\"http://jmlopez.esy.es/Proyecto_Final/cargarImagen.php?id=".$row['id']."\"></td>"; 
								echo "<td id=\"prod\" align=\"left\">".$categoria."</td><td align=\"center\">".$color."</td><td align=\"center\">".$precio." €</td>"; 
							
								
			  echo "</tr>"; 
							
						}
						
						echo "</table> ";
						echo "</div>";
						
					}else{
						 echo "<div id=\"registros\" style=\"width:400px;\" align=\"center\"><p>¡ No se ha encontrado ningún registro !</p></div>";
					
					}
					
					echo "<div id=\"enlaces\" style=\"position:absolute; top:550px; left:370px;\">";
					if ($total_paginas > 1) {
					   if ($pagina != 1)
						  echo '<a class="pag" href="'.$url.'?pagina='.($pagina-1).'&categoria='.$categoria.'&color='.$color2.'&precio='.$precio2.'"><img src="Imagenes\izq.gif" border="0"></a>';
						  for ($i=1;$i<=$total_paginas;$i++) {
							 if ($pagina == $i)
								//si muestro el índice de la página actual, no coloco enlace
								echo $pagina;
							 else
								//si el índice no corresponde con la página mostrada actualmente,
								//coloco el enlace para ir a esa página
								echo '  <a class="pag" href="'.$url.'?pagina='.$i.'&categoria='.$categoria.'&color='.$color2.'&precio='.$precio2.'">'.$i.'</a>  ';
						  }
						  if ($pagina != $total_paginas)
							 echo '<a class="pag" href="'.$url.'?pagina='.($pagina+1).'&categoria='.$categoria.'&color='.$color2.'&precio='.$precio2.'"><img src="Imagenes\der.gif" border="0"></a>';
						}
				echo "</div>";
				  
			  }else{
				  echo "<div id=\"registros\" align=\"center\"><p align=\"center\">No hay registros</p></div>";
				  
			  }
			  
			  			
					
			?>




</div>
<div id="menu">
<ul id="nav">
<?php
session_start();
$tipo="normal";
$tipo2="lectura";
if(empty($_SESSION["usuario"])){	
?> <li><a href="permiso.php">Ajustes</a></li>
    <li><a href="#">Clientes</a>
    <ul class="submenu">
    <li><a href="permiso.php">Añadir</a></li>
    <li><a href="permiso.php">Eliminar</a></li>
    <li><a href="permiso.php">Bloquear o Desbloquear</a></li>
</ul>
    </li>
    <li><a href="#">Productos</a>
<ul class="submenu">
    <li><a href="permiso.php">Añadir</a></li>
    <li><a href="permiso.php">Eliminar</a></li>
</ul>
</li>
    <li><a href="#">Pedidos</a>
    <ul class="submenu">
    <li><a href="permiso.php">Pedidos Pendientes</a></li>
    <li><a href="permiso.php">Pedidos Finalizados</a></li>
</ul>    
</li>
<li><a href="#">Usuarios</a>
    <ul class="submenu">
    <li><a href="permiso.php">Añadir Usuario Administrador</a></li>
    <li><a href="permiso.php">Añadir Usuario Normal</a></li>
    <li><a href="permiso.php">Añadir Usuario de Lectura</a></li>
</ul>    
</li> 
<li>
<a href="#">Consultas</a>
 <ul class="submenu">
    <li><a href="permiso.php">Buscar Clientes</a></li>
    <li><a href="permiso.php">Buscar Productos</a></li>
    </ul>
</li>   
    <?php
    }else if($tipo==$_SESSION['tipo'] ){
    ?>
   <li><a href="ajustes.php">Ajustes</a></li>
    <li><a href="#">Clientes</a>
    <ul class="submenu">
    <li><a href="permiso.php">Añadir</a></li>
    <li><a href="permiso.php">Eliminar</a></li>
    <li><a href="permiso.php">Bloquear o Desbloquear</a></li>
</ul>
    </li>
    <li><a href="#">Productos</a>
<ul class="submenu">
    <li><a href="anadirProductos.php">Añadir</a></li>
    <li><a href="eliminarProductos.php">Eliminar</a></li>
</ul>
</li>
    <li><a href="#">Pedidos</a>
    <ul class="submenu">
   <li><a href="pedidosPendientes.php">Pedidos Pendientes</a></li>
    <li><a href="pedidosFinalizados.php">Pedidos Finalizados</a></li>
</ul>    
</li>
<li><a href="#">Usuarios</a>
    <ul class="submenu">
    <li><a href="permiso.php">Añadir Usuario Administrador</a></li>
    <li><a href="permiso.php">Añadir Usuario Normal</a></li>
    <li><a href="permiso.php">Añadir Usuario de Lectura</a></li>
</ul>    
</li> 
<li>
<a href="#">Consultas</a>
 <ul class="submenu">
    <li><a href="buscarClientes.php">Buscar Clientes</a></li>
    <li><a href="buscarProductos.php">Buscar Productos</a></li>
    </ul>
</li>   
    <?php
    }else if($tipo2==$_SESSION['tipo']){
	?>
    <li><a href="permiso.php">Ajustes</a></li>
    <li><a href="#">Clientes</a>
    <ul class="submenu">
    <li><a href="permiso.php">Añadir</a></li>
    <li><a href="permiso.php">Eliminar</a></li>
    <li><a href="permiso.php">Bloquear o Desbloquear</a></li>
</ul>
</li>
<li><a href="#">Productos</a>
<ul class="submenu">
    <li><a href="permiso.php">Añadir</a></li>
    <li><a href="permiso.php">Eliminar</a></li>
</ul>
</li>
    <li><a href="#">Pedidos</a>
    <ul class="submenu">
    <li><a href="permiso.php">Pedidos Pendientes</a></li>
    <li><a href="permiso.php">Pedidos Finalizados</a></li>
</ul>    
</li>
<li><a href="#">Usuarios</a>
    <ul class="submenu">
    <li><a href="permiso.php">Añadir Usuario Administrador</a></li>
    <li><a href="permiso.php">Añadir Usuario Normal</a></li>
    <li><a href="permiso.php">Añadir Usuario de Lectura</a></li>
</ul>    
</li> 
<li>
<a href="#">Consultas</a>
 <ul class="submenu">
    <li><a href="buscarClientes.php">Buscar Clientes</a></li>
    <li><a href="buscarProductos.php">Buscar Productos</a></li>
    </ul>
</li>   
<?php

}else{
	?>
	<li><a href="ajustes.php">Ajustes</a></li>
    <li><a href="#">Clientes</a>
    <ul class="submenu">
    <li><a href="anadirClientes.php">Añadir</a></li>
    <li><a href="eliminarClientes.php">Eliminar</a></li>
    <li><a href="bloquear_o_desbloquear.php">Bloquear o Desbloquear</a></li>
</ul>
    </li>
    <li><a href="#">Productos</a>
<ul class="submenu">
    <li><a href="anadirProductos.php">Añadir</a></li>
    <li><a href="eliminarProductos.php">Eliminar</a></li>
</ul>
</li>
    <li><a href="#">Pedidos</a>
    <ul class="submenu">
    <li><a href="pedidosPendientes.php">Pedidos Pendientes</a></li>
    <li><a href="pedidosFinalizados.php">Pedidos Finalizados</a></li>
</ul>    
</li>
<li><a href="#">Usuarios</a>
    <ul class="submenu">
    <li><a href="anadirAdministrador.php">Añadir Usuario Administrador</a></li>
    <li><a href="anadirUsuarioNormal.php">Añadir Usuario Normal</a></li>
    <li><a href="anadirUsuarioLectura.php">Añadir Usuario de Lectura</a></li>
</ul>    
</li> 
<li>
<a href="#">Consultas</a>
 <ul class="submenu">
    <li><a href="buscarClientes.php">Buscar Clientes</a></li>
    <li><a href="buscarProductos.php">Buscar Productos</a></li>
    </ul>
</li>   
	<?php
}
?>
    
</div>
<div id="hijo6">
<p align="center" style="color:white; font-weight:bold;">Administración <img src="Imagenes/copyright-1.png" width="18" height="18"/>CHAIN S.L. 2015</p>
</div>
</div>
</body>
</html>
