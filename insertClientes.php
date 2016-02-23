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
 
 $codigoverificacion = rand(0,100000);
 $bloqueado=true;
 $intentos=0;
 $maximoIntentos=5;
 
  //conexion al servidor mysql
  $conn = mysql_connect($mysql_server, $mysql_user, $mysql_pass) or die("Error al conectar al servidor");
  
  
mysql_select_db("u789964829_proy",$conn) or
  die("Problemas en la selección de la base de datos");

 
  //insertamos los datos en la BD.
  $sql2 ="INSERT INTO clientes(nombre, nombreUsuario, contrasena, codigoVerificacion, bloqueado, numero_intentos_conexion, email, telefono, direccion, localidad, fec_alta) values 
            ('$_REQUEST[nombre]', '$_REQUEST[nick]', '$contrasena', '$codigoverificacion', '$bloqueado', '$intentos',  '$_REQUEST[email]', '$_REQUEST[telefono]', '$_REQUEST[direccion]', '$_REQUEST[municipio]', CURDATE())";
   
  
  
  if(!mysql_query($sql2)) die (mysql_error());
	  $titulo= 'Confirmacion de Registro';
      $mensaje='Usted solicito un registro en nuestra web, estos son sus datos:'."\r\n"."\r\n".'Nombre de Usuario:'.$_REQUEST['nick']."\r\n" .'Clave:'.$clave."\r\n" ."\r\n"."Para confirmar la cuenta debe hacer click en el siguiente enlace: http://jmlopez.esy.es/Proyecto_Final/confirmarCuenta.php?codigo=".$codigoverificacion; 
      $cabeceras = 'To:' .$email. "\r\n" .
					'From: sales@chain.com'."\r\n" .
					'Reply-To: sales@chain.com'."\r\n". 
					'Cc:' .$email. "\r\n";
	if(!mail($email, $titulo, $mensaje, $cabeceras)) die ("No se pudo enviar el email de confirmacion.");
		?>
        <script language="JavaScript">
		alert("Tu cuenta ha sido registrada, sin embargo, esta requiere que la confirmes desde el email que ingresaste en el registro.");
		window.location.href='index.php'; 
		</script>
        <?php 
							

?>