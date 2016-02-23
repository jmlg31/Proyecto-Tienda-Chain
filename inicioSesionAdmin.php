<?php

$conexion=mysql_connect("localhost","u789964829_jm","trebujena") or 
  die("Problemas en la conexion");

mysql_select_db("u789964829_proy",$conexion) or
  die("Problemas en la selección de la base de datos");

$registros=mysql_query("SELECT * FROM usuarios WHERE usuario='$_REQUEST[nombre]' and contrasena='$_REQUEST[contrasena]' and bloqueado=false",$conexion) or
  die("Problemas en el select:".mysql_error());
  
$sql="SELECT contrasena, usuario, bloqueado, id, tipo FROM usuarios WHERE usuario = '$_REQUEST[nombre]'";

$result = mysql_query($sql) or die("Error: no se pudo hacer la consulta.");

$usuario= $_REQUEST['nombre'];
echo $usuario;

$contrasena=$_REQUEST['contrasena'];
echo $contrasena;



$result2 = mysql_query($sql) or die("Error: no se pudo hacer la consulta.");



while($row = mysql_fetch_array($result)){
  $contrasenaEncriptada= $row[0]; //obtener la contraseña. 
  echo $contrasenaEncriptada;
  $nombre=$row[1];
  echo $nombre;
  $bloqueado=$row[2];
  $id=$row[3];
  $tipo=$row[4];
  

  
}





if($bloqueado==false){
	
	if( crypt($contrasena,$contrasenaEncriptada) == $contrasenaEncriptada && $usuario==$nombre) {
 		//echo 'Es igual, el cliente se ha loggeado. ';
		session_start(); 
		$_SESSION['usuario']=$nombre;
		$_SESSION['id']=$id;
		$_SESSION['clave']=$_REQUEST['contrasena'];
		$_SESSION['tipo']= $tipo;
		header("Location: ajustes.php");	
		
 
	}else{
		
		?>
	<script language="JavaScript">
		alert("Nombre de Usuario o Contraseña incorrectos");
		window.location.href='admin.html';
	</script>
	<?php
		
	}
	
		
}else{
	?>
	<script language="JavaScript">
		alert("La cuenta esta bloqueada por el administrador");
		window.location.href='admin.html';
	</script>
	<?php
}

mysql_close($conexion);




?>