<?php 
$conexion=mysql_connect("localhost","u789964829_jm","trebujena") or 
  die("Problemas en la conexion");
mysql_select_db("u789964829_proy",$conexion) or
  die("Problemas en la selección de la base de datos");
  
$codigo = $_GET['codigo']; 
$bloqueado=true;

$sql="SELECT  codigoVerificacion FROM clientes WHERE codigoVerificacion ='".$codigo."'";

$result = mysql_query($sql) or die("Error: no se pudo hacer la consulta.");
  
//$buscar = mysql_query("SELECT * FROM usuarios WHERE codigoVerificacion='".$codigo."'"); // Buscamos el codigo 

while($row = mysql_fetch_array($result)){
	$codigoVerificacion=$row[0];	
}

if($codigo==$codigoVerificacion){
	$sql2="UPDATE clientes SET codigoVerificacion=0, bloqueado=false WHERE codigoVerificacion ='".$codigoVerificacion."'";
	mysql_query($sql2);
	?>
	<script language="JavaScript">
		alert("Cuenta Confirmada!!!");
		window.location.href='index.php';
	</script>
	<?php
}else{
	echo "Ya se ha verificado la cuenta."; 
}
 

?> 

