<?php
//------------credenciales mysql------------------
$mysql_server="localhost";
$mysql_user="u789964829_jm";
$mysql_pass="trebujena";
$mysql_database="u789964829_proy";
//-----------------------------------------------
 
//obtener el id de la imagen
if(isset($_GET['id'])){
  $id=$_GET['id'];
}else{
  die ("No tenemos el id");
}
 
//conectar a mysql---------
$conn = mysqli_connect($mysql_server, $mysql_user, $mysql_pass, $mysql_database) or die("Error al conectar al servidor");
//---------------------------
 
$sql="SELECT imagen, tipo FROM productos WHERE id='$id'";
 
//ejecutar la sentencia sql
$result = mysqli_query($conn, $sql) or die("Error: no se pudo hacer la consulta.");
 
while($row = mysqli_fetch_array($result)){
  $imagen= $row[0]; //obtener la imagen
  $tipo=$row[1]; //obtener el tipo de imagen
}
 
mysqli_close($conn);
 
//header para tranformar la salida en el tipo de imagen
header("Content-type: $tipo"); 
 
//imprimir la imagen
echo $imagen;
 
?>
