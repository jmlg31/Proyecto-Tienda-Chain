<div id="derecha">
		<div class='text-border'>
			<h1>Compra realizada con éxito, por favor revisa su correo para ver la notificación.</h1>
			
			<h3>Volver a la <a href="index.php">Tienda CHAIN</a></h3>
			<?php
			
				//1. recogemos los valores del cliente y de la compra.
				//****************************************************
				
				//Con print-r podremos ver todos los valores que nos devuelve PayPal mediante POST
				//para después elegir los que queramos utilizar en nuestra aplicación.
				//print_r($_POST);
				        session_start();
						$conexion=mysql_connect("localhost","u789964829_jm","trebujena") or die("Problemas en la conexion");

			            mysql_select_db("u789964829_proy",$conexion) or die("Problemas en la selección de la base de datos");
				

						$nombre = $_POST['first_name'];
						$apellido = $_POST['last_name'];
						$email_client = $_POST['payer_email'];
						$calle_client = $_POST['address_name'];
						$ciudad_client = $_POST['address_city'];
						$pais_client = $_POST['address_country'];
						$zonaRes_client = $_POST['residence_country'];
						$total_pedido = $_POST['mc_gross'];
		?>
		</div>
	</div>
<?php
//Llamada al script fpdf
ob_end_clean();
require('fpdf.php');
$fecha_factura=date("d-m-y");
$archivo="factura ".$fecha_factura.".pdf";
$archivo_de_salida=$archivo;
$nombre_tienda="CHAIN S.L.";
//Recibir los datos de los productos
$iva = 21;
$gastos_de_envio = 0;



$pdf=new FPDF();  //crea el objeto
$pdf->AddPage();  //añadimos una página. Origen coordenadas, esquina superior izquierda, posición por defeto a 1 cm de los bordes.

$pdf->Image('Imagenes/logo-dacunha1.png' , 0 ,0, 40 , 40,'PNG');

// Encabezado de la factura
$pdf->SetFont('Arial','B',14);
$pdf->Cell(190, 10, "FACTURA", 0, 2, "C");
$pdf->SetFont('Arial','B',10);
$pdf->MultiCell(190,5, "Numero de Factura: 1"."\n"."Fecha: $fecha_factura", 0, "C", false);
$pdf->Ln(2);


// Datos de la tienda
$pdf->SetFont('Arial','B',12);
$top_datos=45;
$pdf->SetXY(40, $top_datos);
$pdf->Cell(190, 10, "Datos de la tienda:", 0, 2, "J");
$pdf->SetFont('Arial','',9);
$pdf->MultiCell(190, //posición X
5, //posición Y
$nombre_tienda."\n".
"Email: pruebatiendachain@gmail.com\n".
utf8_decode("Dirección: Calle Poniente 4\n").
"Ciudad: Sevilla\n".
utf8_decode("Pais: España\n").
"Zona de Residencia: ES",
 0, // bordes 0 = no | 1 = si
 "J", // texto justificado 
 false);

// Datos del cliente
$pdf->SetFont('Arial','B',12);
$pdf->SetXY(125, $top_datos);
$pdf->Cell(190, 10, "Datos del cliente:", 0, 2, "J");
$pdf->SetFont('Arial','',9);
$pdf->MultiCell(
190, //posición X
5, //posicion Y
"Nombre: ".$nombre."\n".
"Apellidos: ".$apellido."\n".
"Email: ".$email_client."\n".
utf8_decode("Dirección: ").$calle_client."\n".
"Ciudad: ".$ciudad_client."\n".
utf8_decode("País: ").$pais_client."\n".
"Zona de Residencia: ".$zonaRes_client, 
0, // bordes 0 = no | 1 = si
"J", // texto justificado
false);

//Salto de línea
$pdf->Ln(2);   

//Creación de la tabla de los detalles de los productos productos
$top_productos = 110;
    $pdf->SetXY(45, $top_productos);
    $pdf->Cell(40, 5, 'UNIDADES', 0, 1, 'C');
    $pdf->SetXY(80, $top_productos);
    $pdf->Cell(40, 5, 'PRODUCTOS', 0, 1, 'C');
    $pdf->SetXY(115, $top_productos);
    $pdf->Cell(40, 5, 'PRECIO UNIDAD', 0, 1, 'C');    
	
$precio_subtotal = 0; // variable para almacenar el subtotal
$y = 115; // variable para la posición top desde la cual se empezarán a agregar los datos	
$euro = chr(128);

foreach($_SESSION['carro'] as $id => $x){
	$resultado = mysql_query("SELECT id, producto, precio FROM productos WHERE id=$id");
	$mifila = mysql_fetch_array($resultado);
	$resultado2 = mysql_query("SELECT id_pedido FROM pedidos WHERE id_cliente='$_SESSION[id]'");
	$mifila2 = mysql_fetch_array($resultado2);
	$id_pedido=$mifila2['id_pedido'];
	
	$id = $mifila['id'];
	$producto = $mifila['producto'];
	//acortamos el nombre del producto a 40 caracteres
	$producto = substr($producto,0,40);
	$precio = $mifila['precio'];
	//Coste por artículo según la cantidad elegida
	$coste = $precio * $x;
	//Coste total del carro
	$totalcoste = $totalcoste + $coste;
	//Contador del total de productos añadidos al carro
	$xTotal = $xTotal + $x;
	$sql="INSERT INTO det_pedidos (id_pedido, id_producto, cantidad, precio) VALUES ('$id_pedido',  '$id', '$x', '$precio')";
	mysql_query($sql);
	
	$pdf->SetFont('Arial','',8);
    $pdf->SetXY(45, $y);
    $pdf->Cell(40, 5, $x, 0, 1, 'C');
    $pdf->SetXY(80, $y);
    $pdf->Cell(40, 5, $producto, 0, 1, 'C');
    $pdf->SetXY(115, $y);
    $pdf->Cell(40, 5, $coste. $euro, 0, 1, 'C');
	// aumento del top 5 cm
    $y = $y + 5;	 
}
 
//Cálculo del Impuesto
$add_iva = $totalcoste * $iva / 100;

//Cálculo del precio total
$total_mas_iva = round($totalcoste + $add_iva + $gastos_de_envio, 2);

$pdf->Ln(2);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(180, 5, utf8_decode("Gastos de envío: ").$gastos_de_envio. $euro , 0, 1, "C");
$pdf->Cell(190, 5, "I.V.A: $iva %", 0, 1, "C");
$pdf->Cell(190, 5, utf8_decode("Subtotal: ").$totalcoste. $euro, 0, 1, "C");
$pdf->Cell(190, 5, "TOTAL: ".$total_mas_iva. $euro, 0, 1, "C");	

ob_start ();
$pdf->Output();

//Creacion de las cabeceras que generarán el archivo pdf
header ("Content-Type: application/download");
header ("Content-Disposition: attachment; filename=$archivo");
header("Content-Length: " . filesize("$archivo"));
$fp = fopen($archivo, "r");
fpassthru($fp);
fclose($fp);

//Eliminación del archivo en el servidor
unlink($archivo);


unset($_SESSION['carro']);
unset($_SESSION["cantidadTotal"]);
?>