
<?php
 

 //-----credenciales de mysql-----------------  
  $mysql_server="localhost";
  $mysql_user="u789964829_jm";
  $mysql_pass="trebujena";
  $mysql_database="u789964829_proy";
  //----fin credenciales mysql----------------- 
 
  //conexion al servidor mysql
  $conn = mysql_connect($mysql_server, $mysql_user, $mysql_pass) or die("Error al conectar al servidor");
  
  
mysql_select_db("u789964829_proy",$conn) or
  die("Problemas en la selección de la base de datos");

  $id=$_REQUEST['id'];
  $nombre=$_REQUEST['usuario'];
  $nombreUsuario=$_REQUEST['nick'];
  $clave=$_REQUEST['contrasena'];
  $correo=$_REQUEST['email'];
  $localidad=$_REQUEST['municipio'];
  $telefono=$_REQUEST['telefono'];
  $direccion=$_REQUEST['direccion'];
   
$sql2="SELECT nombre, nombreUsuario, contrasena, email, telefono, direccion, localidad FROM clientes WHERE id_cliente='$id'";
  
$rs=mysql_query($sql2) or die(mysql_error());;

while($row=mysql_fetch_array($rs)){
				
		$nombre2=$row[0];		     
		$nombreUsuario2=$row[1];
		$contrasena=$row[2];
		$email=$row[3];
		$telefono2=$row[4];
		$direccion2=$row[5];
		$localidad2=$row[6];
}


if($nombre2!=$nombre){
	$sql3="UPDATE clientes SET nombre='$nombre' WHERE id_cliente='$id'";
	mysql_query($sql3);
	?>
        <script language="JavaScript">
		alert("Campo Actualizado!!!");
		window.location.href='Inicio.php'; 
		</script>
							
 		<?php
	
}


if(crypt($clave,$contrasena) != $contrasena){
	function Encriptar_Contrasena_Con_Blowfish($contrasena2, $digito=7){  
	$set_salt ='./1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';  
	$salt = sprintf('$2a$%02d$', $digito); // una sal es un pequeño dato añadido que hace que los hash sean significantemente más difíciles de crackear.
	
//El salt para Blowfish debe ser escrito de la siguiente manera: $2a$, $2x$ o $2y$ + 2 números de iteración entre 04 y 31 + 22 caracteres que pueden ser ./1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz.
	
	
	for($i = 0; $i < 22; $i++) {  
 		$salt .= $set_salt[mt_rand(0, 63)];  
	}  
	return crypt($contrasena2, $salt);  
 }
 
 $contrasena2 = Encriptar_Contrasena_Con_Blowfish($clave);  
 
 $sql4="UPDATE clientes SET contrasena='$contrasena2' WHERE id_cliente='$id'";
	mysql_query($sql4);
	
	
}
	

if($email!=$correo){
	$sql5="UPDATE clientes SET email='$correo' WHERE id_cliente='$id'";
	mysql_query($sql5);
	
	
	
}


if($localidad2!=$localidad){
	$sql6="UPDATE clientes SET localidad='$localidad' WHERE id_cliente='$id'";
	mysql_query($sql6);
	
	
	
}


if($telefono2!=$telefono){
	$sql7="UPDATE clientes SET telefono='$telefono' WHERE id_cliente='$id'";
	mysql_query($sql7);
	
	
	
}




if($direccion2!=$direccion){
	$sql8="UPDATE clientes SET direccion='$direccion' WHERE id_cliente='$id'";
	mysql_query($sql8);
	
	
	
}


?>
        <script language="JavaScript">
		alert("Datos Actualizados!!!");
		window.location.href='Inicio.php'; 
		</script>
							
 		<?php	
  

?>