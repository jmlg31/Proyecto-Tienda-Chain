<head>
<style>

.sk-spinner-three-bounce.sk-spinner {
	margin-top:-45px;
 margin-left:380px;
  width: 70px;
  text-align: center; }
.sk-spinner-three-bounce div {
  width: 18px;
  height: 18px;
  background-color: #09F;
  border-radius: 100%;
  display: inline-block;
  -webkit-animation: sk-threeBounceDelay 1.4s infinite ease-in-out;
          animation: sk-threeBounceDelay 1.4s infinite ease-in-out;
  
  -webkit-animation-fill-mode: both;
          animation-fill-mode: both; }
.sk-spinner-three-bounce .sk-bounce1 {
  -webkit-animation-delay: -0.32s;
          animation-delay: -0.32s; }
.sk-spinner-three-bounce .sk-bounce2 {
  -webkit-animation-delay: -0.16s;
          animation-delay: -0.16s; }
@-webkit-keyframes sk-threeBounceDelay {
  0%, 80%, 100% {
    -webkit-transform: scale(0);
            transform: scale(0); }
  40% {
    -webkit-transform: scale(1);
            transform: scale(1); } }
@keyframes sk-threeBounceDelay {
  0%, 80%, 100% {
    -webkit-transform: scale(0);
            transform: scale(0); }
  40% {
    -webkit-transform: scale(1);
            transform: scale(1); } }

</style>



</head>

<?php
	//Iniciamos o continuamos sesión
	session_start();
	
	$conexion=mysql_connect("localhost","u789964829_jm","trebujena") or die("Problemas en la conexion");

    mysql_select_db("u789964829_proy",$conexion) or die("Problemas en la selección de la base de datos");
			
	
	/*Declaramos la función para recuperar el último Id de la tabla Pedidos*/
	//LLamada
	//Buscar el maximo id de la tabla pedidos y añadirle uno
	//$maxId = buscarMaxId('pedidos','id_pedido');
	//$item_number = $maxId;
	
	/*function buscarMaxId($tabla,$campoId){
		$id= 0;
		$rs = mysql_query("SELECT MAX(id_pedido) AS id FROM pedidos");
		if ($row = mysql_fetch_row($rs)) {
		$id = $row[0];
		}
		return $id++;
	}*/
	
	/*Recuperamos los productos del carro de la compra*/
	function recuperar_productos(){
		$contador = 0;
		//recorremos el array de SESION	hasta el final
		foreach($_SESSION['carro'] as $id => $x){ 
			$contador++; //Número de item que después usaremos en el atribute name de los inputs 
			$resultado = mysql_query("SELECT id, producto, precio FROM productos WHERE id=$id");
			$resultado2 = mysql_query("SELECT id_cliente FROM clientes WHERE nombreUsuario='$_SESSION[usuario]'");
			$mifila = mysql_fetch_array($resultado);
			$mifila2 = mysql_fetch_array($resultado2);
			$id = $mifila['id'];
			$producto = $mifila['producto'];
			//acortamos el nombre del producto a 40 caracteres
			$producto = substr($producto,0,40);
			$precio = $mifila['precio'];
			$idCliente =$mifila2['id_cliente'];
			
			$sql="INSERT INTO pedidos (id_cliente, fec_alta) VALUES ('$_SESSION[id]',  CURDATE())"; 
			mysql_query($sql);
			
			
		?>
			<input name="item_number_<?php echo $contador; ?>" type="hidden" value="<?php echo $id; ?>">
			<input name="item_name_<?php echo $contador; ?>" type="hidden" value="<?php echo $producto; ?>"> 
			<input name="amount_<?php echo $contador; ?>" type="hidden" value="<?php echo $precio; ?>"> 
			<input name="quantity_<?php echo $contador; ?>" type="hidden" value="<?php echo $x; ?>"> 
		<?php
		}
	}
	?>


      <h1>Conectando con <img src="Imagenes/pp-logo-150px.png" /></h1>



    <div class="sk-spinner sk-spinner-three-bounce">
      <div class="sk-bounce1"></div>
      <div class="sk-bounce2"></div>
      <div class="sk-bounce3"></div>
    </div></br>
	
		<div class='text-border' style="border-top:2px solid #FC0;">
			<!-- La dirección de llamada del formulario de pruebas es https://www.sandbox.paypal.com/cgi-bin/webscr 
			     pero al pasar a ventas reales deberemos indicar https://www.paypal.com/cgi-bin/webscr
				 
				 OJO!!! Hay que cambiar también los inputs que hacen referencia a nuestros archivos en local o remoto
				 y el mail del acceso a Paypal del vendedor. 
				 		"shopping_url", 
						 "return",
						 "hidden",
						 "notify_url",
						 "business"
			 -->
			<form name='formTpv' method='post' action='https://www.sandbox.paypal.com/cgi-bin/webscr' style="border: 1px solid #CECECE;padding-left: 10px;">
					<input name="cmd" type="hidden" value="_cart"> 
					<input name="upload" type="hidden" value="1">
					<input name="business" type="hidden" value="sales_chain@gmail.com">
					<input name="shopping_url" type="hidden" value="http://jmlopez.esy.es/Proyecto_Final/Bicicletas_MTB_BH.php">
					<input name="currency_code" type="hidden" value="EUR">
					<input name="return" type="hidden" value="http://jmlopez.esy.es/Proyecto_Final/exito4.php">
					<input type='hidden' name='cancel_return' value='http://jmlopez.esy.es/Proyecto_Final/errorPaypal.php'>
					<input name="notify_url" type="hidden" value="http://jmlopez.esy.es/Proyecto_Final/paypalipn.php">
					<input name="rm" type="hidden" value="2">
								
					<?php
						recuperar_productos();
					?>
					<!-- 	SI QUIERES COLOCAR EL BOTON EN LUGAR DE QUE VAYA AUTOMATICAMENTE A PAYPAL
								TIENES QUE DESASTERISCAR EL INPUT DEL BOTON Y ASTERISCAR EL JAVASCRIPT QUE
								HAY MAS ABAJO.
								<script type='text/javascript'>
									document.formTpv.submit();
								</script>
					-->
					<!--<input type="submit" value="PayPal SandBox">-->
					<!-- VARIABLES PAYPAL UTILIZADAS
					      cmd > indica el tipo de fichero que va a recoger PayPal 
										_cart : varios items
										_donations : donaciones
										_xclick : boton de compra
								business > indica el identificador del negocio registrado en paypal. Ejemplo : buyer_1265883185_biz@gmail.com
								shopping_url > la dirección de nuestra tienda online . Ejemplo : http://www.fernandosalom.es
								currency_code > el tipo de moneda (USD , EUR ...)
								return > sera el enlace de vuelta a nuestro negocio que ofrece paypal
								notify_url > en esta pagina es donde recogeremos el estado del pago y un gran numeros de variables con informacion adicional en nuestro caso lo hemos llamado paypal_ipn.php
								rm > Indica el método que se va a utilizar para enviar la información de vuelta a nuestro sitio. RM=1 información enviada por GET , RM=2 información enviada por POST (En este caso usamos este método porque es un script php el que recoge los datos) . (Gracias Miguel)
								item_number_X > identificador del producto
								item_name_X > nombre del producto
								amount_X > precio del producto
								quantity_X > cantidad del producto
					-->
			</form>
			<!-- Esto hará que se envie la información sin necesidad de hacer clic en ningún botón -->
			<!-- Si lo quitamos, el usuario tendrá que hacer clic para realizar la compra -->
			<script type='text/javascript'>
				document.formTpv.submit();
			</script>
		</div> <!-- Cierro text-border -->
	</div> <!-- Cierro derecha -->

<?php

?>