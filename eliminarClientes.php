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
<link href="estilos9.css" rel="stylesheet" type="text/css" />
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
<img id="imagen" width="40" height="40" src="Imagenes/delete.png"</img>
<p class="mtbBh">Eliminar Clientes</p></br></br></br>
<?php
		      
			  session_start();
			  
			  $conexion=mysql_connect("localhost","u789964829_jm","trebujena") or die("Problemas en la conexion");

			  mysql_select_db("u789964829_proy",$conexion) or die("Problemas en la selección de la base de datos");
			  
			  
		   
			  $sql="SELECT * FROM clientes";
			  $rs = mysql_query($sql);
              $num_total_registros = mysql_num_rows($rs);
			  
			  if($num_total_registros>0){
				  //Limito la busqueda
				$TAMANO_PAGINA = 5;
				
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
				
				$result = mysql_query("SELECT nombre, nombreUsuario, email, localidad, fec_alta, id_cliente FROM clientes ORDER BY id_cliente DESC LIMIT ".$inicio.",".$TAMANO_PAGINA.""); 
			  
				  if (mysql_num_rows($result)){ 
				 	
						echo "<table cellspacing=\"0\" style=\"font-size:14px; font-weight:normal;\" align=\"center\"> ";   
						echo "<tr id=\"titulos\" style=\"font-weight:bold;\"><td align=\"right\">Nombre</td><td align=\"center\">Nick</td><td align=\"center\">Email</td><td align=\"center\">Localidad</td><td align=\"center\">Fecha Alta</td></tr>";
						
						echo "<tr>";
					
						while ($row = @mysql_fetch_array($result)) {
							$nombre=$row[0];
							$nick=$row[1];
							$email=$row[2];
							$localidad=$row[3];
							$fechaAlta=$row[4];
							$id=$row[5];				
								echo "<td style=\"border-bottom: 35px solid transparent;\" align=\"right\">".$nombre."</td>"; 
								echo "<td style=\"border-bottom: 35px solid transparent;\" id=\"prod\" align=\"center\">".$nick."</td><td style=\"border-bottom: 35px solid transparent;\" align=\"center\">".$email."</td>"; 
								echo "<td style=\"border-bottom: 35px solid transparent;\" id=\"prod\" align=\"center\">".$localidad."</td><td style=\"border-bottom: 35px solid transparent;\" align=\"center\">".$fechaAlta."</td>";
							    echo "<td style=\"border-bottom: 35px solid transparent;\" align=\"center\">";
								
								echo "<a style=\"color:red; font-weight:bold; font-size:16px;\" href=\"eliminar.php?id=".$id."\" >Eliminar";
								
								
				echo "</a></td>";
								
			  echo "</tr>"; 
								
							
						}
						
						echo "</table> ";
						
						
					}else{
						echo "¡ No se ha encontrado ningún registro !";
					
					}
					
					
					if ($total_paginas > 1) {
					   if ($pagina != 1)
						  echo '<a  style="color:blue;" href="'.$url.'?pagina='.($pagina-1).'"><img src="Imagenes\izq.gif" border="0"></a>';
						  for ($i=1;$i<=$total_paginas;$i++) {
							 if ($pagina == $i)
								//si muestro el índice de la página actual, no coloco enlace
								echo $pagina;
							 else
								//si el índice no corresponde con la página mostrada actualmente,
								//coloco el enlace para ir a esa página
								echo '  <a style="color:gray;" href="'.$url.'?pagina='.$i.'">'.$i.'</a>  ';
						  }
						  if ($pagina != $total_paginas)
							 echo '<a  href="'.$url.'?pagina='.($pagina+1).'"><img src="Imagenes\der.gif" border="0"></a>';
						}
				
				  
			  }else{
				  echo "No hay registros";
				  
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
