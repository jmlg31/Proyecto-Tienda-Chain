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
<img id="imagen" width="40" height="40" src="Imagenes/1424234839_options.png"</img>
<p class="mtbBh">Ajustes Rápidos</p></br></br></br>
<?php
		      
			  session_start();
			  
			  $tipo="normal";
              $tipo2="lectura";
			  
		   
			  $conexion=mysql_connect("localhost","u789964829_jm","trebujena") or die("Problemas en la conexion");

			  mysql_select_db("u789964829_proy",$conexion) or die("Problemas en la selección de la base de datos");
			  
			  
			  $sql="SELECT valor FROM Parametros";

			  $result = mysql_query($sql) or die("Error: no se pudo hacer la consulta.");
			
			  $maximoIntentos=0;
			
			  while($row = mysql_fetch_array($result)){
  				  $maximoIntentos=$row[0];
			
			  }
			  if(empty($_SESSION["usuario"])){
				  echo "<div align=\"center\" style=\"width:500px\">";
			  echo "<form method=\"post\" action=\"permiso.php\">";
			  echo "<table align=\"center\">";
			  echo "<tr><td style=\"border-bottom: 35px solid transparent;\">Nº Máximo de Conexiones</td><td style=\"border-bottom: 35px solid transparent;\"><input type=\"text\" name=\"maximo\" value=".$maximoIntentos." /></td><td style=\"border-bottom: 35px solid transparent;\"><input type=\"submit\" value=\"Actualizar\" /></td></tr>";
			  echo "</table>";
			  echo "</form>";
			  echo "<form method=\"post\" action=\"permiso.php\">";
			  echo "<table align=\"center\">";
			  echo "<tr><td colspan=\"2\" style=\"border-bottom: 35px solid transparent;\">Bloquear Usuario Normal</td></td><td style=\"border-bottom: 35px solid transparent;\"><input type=\"submit\" value=\"Bloquear\" /></td></tr>";
			  echo "</table>";
			  echo "</form>";
			    echo "<form method=\"post\" action=\"permiso.php\">";
			  echo "<table align=\"center\">";
			  echo "<tr><td colspan=\"2\" style=\"border-bottom: 35px solid transparent;\">Desloquear Usuario Normal</td></td><td style=\"border-bottom: 35px solid transparent;\"><input type=\"submit\" value=\"Desbloquear\" /></td></tr>";
			  echo "</table>";
			  echo "</form>";
			    echo "<form method=\"post\" action=\"permiso.php\">";
			  echo "<table align=\"center\">";
			  echo "<tr><td colspan=\"2\" style=\"border-bottom: 35px solid transparent;\">Bloquear Usuario Lectura</td></td><td style=\"border-bottom: 35px solid transparent;\"><input type=\"submit\" value=\"Bloquear\" /></td></tr>";
			  echo "</table>";
			  echo "</form>";
			    echo "<form method=\"post\" action=\"permiso.php\">";
			  echo "<table align=\"center\">";
			  echo "<tr><td colspan=\"2\" style=\"border-bottom: 35px solid transparent;\">Desbloquear Usuario Normal</td></td><td style=\"border-bottom: 35px solid transparent;\"><input type=\"submit\" value=\"Desbloquear\" /></td></tr>";
			  echo "</table>";
			  echo "</form>";
			  echo "</div>";
			  echo "</div>";
			  
			  }else if($tipo==$_SESSION['tipo'] ){
				  			  echo "<div align=\"center\" style=\"width:500px\">";
			  echo "<form method=\"post\" action=\"permiso.php\">";
			  echo "<table align=\"center\">";
			  echo "<tr><td style=\"border-bottom: 35px solid transparent;\">Nº Máximo de Conexiones</td><td style=\"border-bottom: 35px solid transparent;\"><input type=\"text\" name=\"maximo\" value=".$maximoIntentos." /></td><td style=\"border-bottom: 35px solid transparent;\"><input type=\"submit\" value=\"Actualizar\" /></td></tr>";
			  echo "</table>";
			  echo "</form>";
			  echo "<form method=\"post\" action=\"permiso.php\">";
			  echo "<table align=\"center\">";
			  echo "<tr><td colspan=\"2\" style=\"border-bottom: 35px solid transparent;\">Bloquear Usuario Normal</td></td><td style=\"border-bottom: 35px solid transparent;\"><input type=\"submit\" value=\"Bloquear\" /></td></tr>";
			  echo "</table>";
			  echo "</form>";
			    echo "<form method=\"post\" action=\"permiso.php\">";
			  echo "<table align=\"center\">";
			  echo "<tr><td colspan=\"2\" style=\"border-bottom: 35px solid transparent;\">Desloquear Usuario Normal</td></td><td style=\"border-bottom: 35px solid transparent;\"><input type=\"submit\" value=\"Desbloquear\" /></td></tr>";
			  echo "</table>";
			  echo "</form>";
			    echo "<form method=\"post\" action=\"permiso.php\">";
			  echo "<table align=\"center\">";
			  echo "<tr><td colspan=\"2\" style=\"border-bottom: 35px solid transparent;\">Bloquear Usuario Lectura</td></td><td style=\"border-bottom: 35px solid transparent;\"><input type=\"submit\" value=\"Bloquear\" /></td></tr>";
			  echo "</table>";
			  echo "</form>";
			    echo "<form method=\"post\" action=\"permiso.php\">";
			  echo "<table align=\"center\">";
			  echo "<tr><td colspan=\"2\" style=\"border-bottom: 35px solid transparent;\">Desbloquear Usuario Normal</td></td><td style=\"border-bottom: 35px solid transparent;\"><input type=\"submit\" value=\"Desbloquear\" /></td></tr>";
			  echo "</table>";
			  echo "</form>";
			  echo "</div>";
			  echo "</div>";
			  
			  }else if($tipo2==$_SESSION['tipo'] ){
				   echo "<div align=\"center\" style=\"width:500px\">";
			  echo "<form method=\"post\" action=\"permiso.php\">";
			  echo "<table align=\"center\">";
			  echo "<tr><td style=\"border-bottom: 35px solid transparent;\">Nº Máximo de Conexiones</td><td style=\"border-bottom: 35px solid transparent;\"><input type=\"text\" name=\"maximo\" value=".$maximoIntentos." /></td><td style=\"border-bottom: 35px solid transparent;\"><input type=\"submit\" value=\"Actualizar\" /></td></tr>";
			  echo "</table>";
			  echo "</form>";
			  echo "<form method=\"post\" action=\"permiso.php\">";
			  echo "<table align=\"center\">";
			  echo "<tr><td colspan=\"2\" style=\"border-bottom: 35px solid transparent;\">Bloquear Usuario Normal</td></td><td style=\"border-bottom: 35px solid transparent;\"><input type=\"submit\" value=\"Bloquear\" /></td></tr>";
			  echo "</table>";
			  echo "</form>";
			    echo "<form method=\"post\" action=\"permiso.php\">";
			  echo "<table align=\"center\">";
			  echo "<tr><td colspan=\"2\" style=\"border-bottom: 35px solid transparent;\">Desloquear Usuario Normal</td></td><td style=\"border-bottom: 35px solid transparent;\"><input type=\"submit\" value=\"Desbloquear\" /></td></tr>";
			  echo "</table>";
			  echo "</form>";
			    echo "<form method=\"post\" action=\"permiso.php\">";
			  echo "<table align=\"center\">";
			  echo "<tr><td colspan=\"2\" style=\"border-bottom: 35px solid transparent;\">Bloquear Usuario Lectura</td></td><td style=\"border-bottom: 35px solid transparent;\"><input type=\"submit\" value=\"Bloquear\" /></td></tr>";
			  echo "</table>";
			  echo "</form>";
			    echo "<form method=\"post\" action=\"permiso.php\">";
			  echo "<table align=\"center\">";
			  echo "<tr><td colspan=\"2\" style=\"border-bottom: 35px solid transparent;\">Desbloquear Usuario Normal</td></td><td style=\"border-bottom: 35px solid transparent;\"><input type=\"submit\" value=\"Desbloquear\" /></td></tr>";
			  echo "</table>";
			  echo "</form>";
			  echo "</div>";
			  echo "</div>";
			  
				   }else{
				 
			  echo "<div align=\"center\" style=\"width:500px\">";
			  echo "<form method=\"post\" action=\"Actualizar_Maximo_de_conexiones.php\">";
			  echo "<table align=\"center\">";
			  echo "<tr><td style=\"border-bottom: 35px solid transparent;\">Nº Máximo de Conexiones</td><td style=\"border-bottom: 35px solid transparent;\"><input type=\"text\" name=\"maximo\" value=".$maximoIntentos." /></td><td style=\"border-bottom: 35px solid transparent;\"><input type=\"submit\" value=\"Actualizar\" /></td></tr>";
			  echo "</table>";
			  echo "</form>";
			  echo "<form method=\"post\" action=\"bloquearNormal.php\">";
			  echo "<table align=\"center\">";
			  echo "<tr><td colspan=\"2\" style=\"border-bottom: 35px solid transparent;\">Bloquear Usuario Normal</td></td><td style=\"border-bottom: 35px solid transparent;\"><input type=\"submit\" value=\"Bloquear\" /></td></tr>";
			  echo "</table>";
			  echo "</form>";
			    echo "<form method=\"post\" action=\"desbloquearNormal.php\">";
			  echo "<table align=\"center\">";
			  echo "<tr><td colspan=\"2\" style=\"border-bottom: 35px solid transparent;\">Desbloquear Usuario Normal</td></td><td style=\"border-bottom: 35px solid transparent;\"><input type=\"submit\" value=\"Desbloquear\" /></td></tr>";
			  echo "</table>";
			  echo "</form>";
			    echo "<form method=\"post\" action=\"bloquearLectura.php\">";
			  echo "<table align=\"center\">";
			  echo "<tr><td colspan=\"2\" style=\"border-bottom: 35px solid transparent;\">Bloquear Usuario Lectura</td></td><td style=\"border-bottom: 35px solid transparent;\"><input type=\"submit\" value=\"Bloquear\" /></td></tr>";
			  echo "</table>";
			  echo "</form>";
			    echo "<form method=\"post\" action=\"desbloquearLectura.php\">";
			  echo "<table align=\"center\">";
			  echo "<tr><td colspan=\"2\" style=\"border-bottom: 35px solid transparent;\">Desbloquear Usuario Lectura</td></td><td style=\"border-bottom: 35px solid transparent;\"><input type=\"submit\" value=\"Desbloquear\" /></td></tr>";
			  echo "</table>";
			  echo "</form>";
			  echo "</div>";
			  echo "</div>";
			  
				   }
			  
			  
			  
?>

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
