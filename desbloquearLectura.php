<?php

$conexion=mysql_connect("localhost","u789964829_jm","trebujena") or die("Problemas en la conexion");

mysql_select_db("u789964829_proy",$conexion) or die("Problemas en la selección de la base de datos");


$tipo="lectura";

$sql="UPDATE usuarios SET bloqueado=false WHERE tipo='$tipo'";
mysql_query($sql);
 
 
?>
 

<script language="JavaScript">
		alert("Usuario Desbloqueado");
		window.location.href='ajustes.php';
</script>
			  
