<?php
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$mensaje = $_POST['mensaje'];
$para = 'pruebatiendachain@gmail.com';
$titulo = 'Consultas sobre pedidos y errores técnicos';
$header = 'From: ' . $email;
$msjCorreo = "Nombre: $nombre\n E-Mail: $email\n Mensaje:\n $mensaje";

if ($_POST['submit']) {
if (mail($para, $titulo, $msjCorreo, $header)) {
echo "<script language='javascript'>
alert('Mensaje enviado, muchas gracias.');
window.location.href = 'contactanos.php';
</script>";
} else {
echo "<script language='javascript'>
alert('No se ha podido enviar el mensaje.');
window.location.href = 'contactanos.php';
</script>";
}
}
?>