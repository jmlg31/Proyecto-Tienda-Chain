<?php
if (@!$_POST['enviar']){
  //formulario para buscar la imagen a guardar
?>

<?php
  //fin formulario
}else{
  //si el campo de la imagen esta vacío regresar al formulario
  if (empty($_FILES['imagen']['name'])){
    header("location: anadirProductos.php"); 
    exit;
  }
 
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

 
  //datos de la imagen
  $imagen_tmp=$_FILES['imagen']['tmp_name']; //nombre temporal
  $imagen_nombre=$_FILES['imagen']['name']; //nombre
  $imagen_tamanio=$_FILES['imagen']['size']; //tamaño
  $imagen_tipo=$_FILES['imagen']['type']; //tipo
  
 
  //abrir la imagen para lectura
  $lectura_imagen=fopen($imagen_tmp, "rb");   
 
  //convertir la imagen en código binario
  $imagen_binario = addslashes(fread($lectura_imagen, filesize($imagen_tmp)));
  
 
  //insertamos los datos en la BD.
  $sql2 ="INSERT INTO productos(id_categoria, producto, color, precio, imagen, tipo) values 
            ('$_REQUEST[categoria]', '$_REQUEST[producto]', '$_REQUEST[color]', '$_REQUEST[precio]', '$imagen_binario', '$imagen_tipo')";
   
  
  
mysql_query($sql2) or die(mysql_error());
	
		?>
        <script language="JavaScript">
		alert("Producto Añadido!!!");
		window.location.href='anadirProductos.php'; 
		</script>
							
 		<?php

}
  

?>