<?php

//-----credenciales de mysql-----------------  
  $mysql_server="localhost";
  $mysql_user="u789964829_jm";
  $mysql_pass="trebujena";
  $mysql_database="u789964829_proy";
  //----fin credenciales mysql-----------------
 
 //----Encriptar Contraseña SHA-2-------------
 
 $clave = $_REQUEST['contrasena'];
 $email= $_REQUEST['email'];
 $nombre= $_REQUEST['nombre'];
 
 
 function Encriptar_Contrasena_Con_Blowfish($contrasena, $digito=7){  
	$set_salt ='./1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';  
	$salt = sprintf('$2a$%02d$', $digito); // una sal es un pequeño dato añadido que hace que los hash sean significantemente más difíciles de crackear.
	
//El salt para Blowfish debe ser escrito de la siguiente manera: $2a$, $2x$ o $2y$ + 2 números de iteración entre 04 y 31 + 22 caracteres que pueden ser ./1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz.
	
	
	for($i = 0; $i < 22; $i++) {  
 		$salt .= $set_salt[mt_rand(0, 63)];  
	}  
	return crypt($contrasena, $salt);  
 }
 
 $contrasena = Encriptar_Contrasena_Con_Blowfish($clave);  
 
 
  //conexion al servidor mysql
  $conn = mysql_connect($mysql_server, $mysql_user, $mysql_pass) or die("Error al conectar al servidor");
  
  
mysql_select_db("u789964829_proy",$conn) or
  die("Problemas en la selección de la base de datos");

 $tipo="lectura";
 $bloqueado=false;
 
  //insertamos los datos en la BD.
  $sql2 ="INSERT INTO usuarios(nombre, usuario, email, contrasena, tipo, bloqueado) values 
            ('$_REQUEST[nombre]', '$_REQUEST[usuario]', '$_REQUEST[email]', '$contrasena', '$tipo', '$bloqueado')";
   
  
  
  if(!mysql_query($sql2)) die (mysql_error());
	  $titulo= 'Confirmacion de Registro';
      $mensaje='Usted solicito un registro de usuario de lectura para acceder a la parte privada de nuestra web, estos son sus datos:'."\r\n"."\r\n".'Nombre de Usuario:'.$_REQUEST['nick']."\r\n" .'Clave:'.$clave."\r\n" ."\r\n"; 
      $cabeceras = 'To:' .$email. "\r\n" .
					'From: info@chain.com'."\r\n" .
					'Reply-To: info@chain.com'."\r\n". 
					'Cc:' .$email. "\r\n";
	if(!mail($email, $titulo, $mensaje, $cabeceras)) die ("No se pudo enviar el email de confirmacion.");
		?>
        <script language="JavaScript">
		alert("Registrado!!!, Ya puedes acceder a la parte privada");
		window.location.href='admin.html'; 
		</script>
        <?php 
							

?>