<?php

$conexion=mysql_connect("localhost","u789964829_jm","trebujena") or 
  die("Problemas en la conexion");

mysql_select_db("u789964829_proy",$conexion) or
  die("Problemas en la selección de la base de datos");

$registros=mysql_query("select * from clientes where nombreUsuario='$_REQUEST[nombre]' and contrasena='$_REQUEST[contrasena]' and bloqueado=false",$conexion) or
  die("Problemas en el select:".mysql_error());
  
$sql="SELECT contrasena, nombreUsuario, bloqueado, numero_intentos_conexion, id_cliente FROM clientes WHERE nombreUsuario = '$_REQUEST[nombre]'";

$result = mysql_query($sql) or die("Error: no se pudo hacer la consulta.");

$usuario= $_REQUEST['nombre'];
$contrasena=$_REQUEST['contrasena'];
$cont=0;

$sql2="SELECT valor FROM Parametros WHERE id = 1";

$result2 = mysql_query($sql2) or die("Error: no se pudo hacer la consulta.");


$valor=0;

while($row2 = mysql_fetch_array($result2)){
	
	$valor=$row2[0];
	
}



while($row = mysql_fetch_array($result)){
  $contrasenaEncriptada= $row[0]; //obtener la contraseña. 
  $nombre=$row[1];
  $bloqueado=$row[2];
  $intentos=$row[3];
  $id=$row[4];
  
  
  if($valor==$intentos){
	$sq3l="UPDATE clientes SET bloqueado=true WHERE nombreUsuario='$_REQUEST[nombre]'";
	mysql_query($sq3l);
    
  } 
  
}





if($bloqueado==false){
	
	if( crypt($contrasena,$contrasenaEncriptada) == $contrasenaEncriptada && $usuario==$nombre) {
 		//echo 'Es igual, el cliente se ha loggeado. ';
		session_start(); 
		$_SESSION['usuario']=$nombre;
		$_SESSION['id']=$id;
		$_SESSION['clave']=$_REQUEST['contrasena'];
		$date_added=date("d-m-Y H:i:s", time());
		$sql="UPDATE clientes SET fecha_ultima_conexion=DATE_ADD(NOW(),INTERVAL 1 HOUR) WHERE nombreUsuario='$_SESSION[usuario]'";
		mysql_query($sql);
		echo "hola";
		header("Location: index.php");	
		
 
	}else{
		
		$sq2l="UPDATE clientes SET numero_intentos_conexion='$intentos'+1 WHERE nombreUsuario='$_REQUEST[nombre]'";
		mysql_query($sq2l);
		?>
	<script language="JavaScript">
		alert("Nombre de Usuario o Contraseña incorrectos");
		window.location.href='identificarse.php';
	</script>
	<?php
		
	}
	
		
}else{
	?>
	<script language="JavaScript">
		alert("La cuenta esta bloqueada, Por no haber confirmado su cuenta o porque ha superado el máximo número de intentos de conexión");
		window.location.href='identificarse.php';
	</script>
	<?php
}

mysql_close($conexion);




?>