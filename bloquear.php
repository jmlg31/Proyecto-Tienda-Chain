<?php

$conexion=mysql_connect("localhost","u789964829_jm","trebujena") or die("Problemas en la conexion");

mysql_select_db("u789964829_proy",$conexion) or die("Problemas en la selección de la base de datos");


if(isset($_GET['id'])){
  $id=$_GET['id'];
}else{
  die ("No tenemos el id");
}
 

//echo $usuario;
echo $id;

$sql="UPDATE clientes SET bloqueado=true WHERE id_cliente=".$id."";
mysql_query($sql);
 
 
?>
 

<script language="JavaScript">
		alert("Usuario Bloqueado");
		window.location.href='bloquear_o_desbloquear.php';
</script>
			  
