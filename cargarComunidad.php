<?php

header("Content-Type: application/xml");

$conexion=mysql_connect("localhost","u789964829_jm","trebujena") or 
  die("Problemas en la conexion");

mysql_select_db("u789964829_proy",$conexion) or
  die("Problemas en la selección de la base de datos");


$sql="SELECT * FROM comunidad_autonoma";

$result=mysql_query($sql) or die("Error: no se pudo hacer la consulta.");

echo ("<comunidades>");

while($row = mysql_fetch_array($result)){
	echo ("<comunidad>");
	echo ("<codigo>$row[0]</codigo>");
	echo ("<nombre>$row[1]</nombre>");
	echo ("</comunidad>");
	
	
	
}

echo ("</comunidades>");

?>