<?php

header("Content-Type: application/xml");

$conexion=mysql_connect("localhost","u789964829_jm","trebujena") or 
  die("Problemas en la conexion");

mysql_select_db("u789964829_proy",$conexion) or
  die("Problemas en la selección de la base de datos");
   
$indice=$_GET["comunidad"];

$sql="SELECT * FROM provincia WHERE id_comunidad='$indice'";

$result=mysql_query($sql) or die("Error: no se pudo hacer la consulta.");

echo ("<provincias>");

while($row = mysql_fetch_array($result)){
	echo ("<provincia>");
	echo ("<codigo>$row[0]</codigo>");
	echo ("<nombre>$row[1]</nombre>");
	echo ("</provincia>");
	
	
	
}

echo ("</provincias>");

?>