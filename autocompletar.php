<?php

$conexion=mysql_connect("localhost","u789964829_jm","trebujena") or 
  die("Problemas en la conexion");

mysql_select_db("u789964829_proy",$conexion) or
  die("Problemas en la selección de la base de datos");

$texto = strtolower(trim($_POST["municipio"]));

$indice=$_POST["provincia"];

$sql="SELECT * FROM localidad WHERE id_provincia='$indice'";

$result=mysql_query($sql) or die("Error: no se pudo hacer la consulta.");



$localidades=array();
$sugerencias = array();
while($row = mysql_fetch_array($result)){
	
	$localidad=$row[1];
	
	$localidades[]=$localidad;
	
}

foreach($localidades as $indice => $nombre) {
  if(preg_match('/^('.$texto.')/i',$nombre)) {
    $sugerencias[] = $nombre;
    if(count($sugerencias)>20) { break; }
  }
}

if(isset($_GET["modo"]) && $_GET["modo"] != null) {
	$modo = $_GET["modo"];
}
else {
	$modo = "json";
}

if($modo == "ul") {
	if(count($sugerencias)>0) {
	  echo "<ul>\n<li>";
	  echo implode($sugerencias, "</li>\n<li>");
	  echo "</li>\n</ul>";
	}
	else {
	  echo "<ul></ul>";
	}
}
else {
	if(count($sugerencias)>0) {
	  echo "[ \"";
	  echo implode($sugerencias, "\", \"");
	  echo "\"]";
	}
	else {
	  echo "[]";
	}
}
	

?>