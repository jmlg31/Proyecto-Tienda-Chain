<?php
$conexion=mysql_connect("localhost","u789964829_jm","trebujena") or die("Problemas en la conexion");

mysql_select_db("u789964829_proy",$conexion) or die("Problemas en la selección de la base de datos");

$maximo_intentos=$_REQUEST['maximo'];

$sql="UPDATE Parametros SET valor='$maximo_intentos' WHERE id=1";
mysql_query($sql);

?>

<script language="JavaScript">
	alert("El numero maximo de intentos de conexion se ha actualizado");
	window.location.href='ajustes.php';
</script>