<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript" src="jquery-1.3.min.js"></script>
<script type="text/javascript">
function mainmenu(){
$(" #nav ul ").css({display: "none"});
$(" #nav li").hover(function(){
	$(this).find('ul:first:hidden').css({visibility: "visible",display: "none"}).show(400);
	},function(){
		$(this).find('ul:first').css({visibility: "hidden"});
	});
}
$(document).ready(function(){
	mainmenu();
});
</script>

<script type="text/javascript">

var peticion_http=null;
var peticion = null;
var elementoSeleccionado = -1;
var sugerencias = null;
var cacheSugerencias = {};
            
            
           
            
            
            function inicializa_xhr(){
                    if(window.XMLHttpRequest){
                            return new XMLHttpRequest();
                    }
                    else if(window.ActiveXObject){
                            return new ActiveXObject("Microsoft.XMLHTTP");
                    }
            }
            
            
            function cargarComunidad(){
                 peticion_http=inicializa_xhr();
                              
                
                if(peticion_http){
                    
                     peticion_http.onreadystatechange=muestraComunidades;
                     peticion_http.open('GET', "http://jmlopez.esy.es/Proyecto_Final/cargarComunidad.php?nocache=" + Math.random(), true);
                     peticion_http.send(null);
                     
                }   
            }
                
            function muestraComunidades(){
                var listaDesplegable=document.getElementById("comunidad");
                var documento_xml=peticion_http.responseXML;
                var comunidades=documento_xml.getElementsByTagName("comunidades")[0];
                var comunidad=comunidades.getElementsByTagName("comunidad");
                
                for(var x=0;x<comunidad.length;x++){
					var codigo=comunidad[x].getElementsByTagName("codigo")[0].firstChild.nodeValue;
                    var nombre=comunidad[x].getElementsByTagName("nombre")[0].firstChild.nodeValue;
                    listaDesplegable.options[x+1]=new Option(nombre, codigo);
                    
                }
                
                
            }
			
			
			
			function cargaProvincias(){
                var listaComunidad=document.getElementById("comunidad");
                var comunidad=listaComunidad.options[listaComunidad.selectedIndex].value;
				
				
                peticion_http=inicializa_xhr();
                              
                
                if(peticion_http){
                    
                     peticion_http.onreadystatechange=muestraProvincias;
                     peticion_http.open('GET', "http://jmlopez.esy.es/Proyecto_Final/cargaProvincia.php?comunidad="+comunidad+'nocache=' + Math.random(), true);
                     peticion_http.send(null);
                     
                }   
            }
                
                
                
                
            function muestraProvincias(){
                
                var listaDesplegable=document.getElementById("provincia");
                var documento_xml=peticion_http.responseXML;
                var provincias=documento_xml.getElementsByTagName("provincias")[0];
                var provincia=provincias.getElementsByTagName("provincia");
                
                for(var x=0;x<provincia.length;x++){
                    var codigo=provincia[x].getElementsByTagName("codigo")[0].firstChild.nodeValue;
                    var nombre=provincia[x].getElementsByTagName("nombre")[0].firstChild.nodeValue;
                    listaDesplegable.options[x+1]=new Option(nombre,codigo);
                    
                }
                
                
                
            }
			
			Array.prototype.formateaLista = function() {
  var codigoHtml = "";

  codigoHtml = "<ul>";
  for(var i=0; i<this.length; i++) {
    if(i == elementoSeleccionado) {
      codigoHtml += "<li class=\"seleccionado\">"+this[i]+"</li>";
    }
    else {
      codigoHtml += "<li>"+this[i]+"</li>";
    }
  }
  codigoHtml += "</ul>";

  return codigoHtml;
};

function autocompleta() {
  var elEvento = arguments[0] || window.event;
  var tecla = elEvento.keyCode;

  if(tecla == 40) { // Flecha Abajo
    if(elementoSeleccionado+1 < sugerencias.length) {
      elementoSeleccionado++;
    }
    muestraSugerencias();
  }
  else if(tecla == 38) { // Flecha Arriba
    if(elementoSeleccionado > 0) {
      elementoSeleccionado--;
    }
    muestraSugerencias();
  }
  else if(tecla == 13) { // ENTER o Intro
    seleccionaElemento();
  }
  else {
    var texto = document.getElementById("municipio").value;
    
    // Si es la tecla de borrado y el texto es vacío, ocultar la lista
    if(tecla == 8 && texto == "") {
      borraLista();
      return;
    }
    
    if(cacheSugerencias[texto] == null) {
	  var listaProvincia=document.getElementById("provincia");
      var provincia=listaProvincia.options[listaProvincia.selectedIndex].value;
	  
      peticion = inicializa_xhr();
      
      peticion.onreadystatechange = function() { 
        if(peticion.readyState == 4) {
          if(peticion.status == 200) {
            sugerencias = eval('('+peticion.responseText+')');
			
            if(sugerencias.length == 0) {
              sinResultados();
            }
            else {
              cacheSugerencias[texto] = sugerencias;
              actualizaSugerencias();
            }
          }
        }
      };
      
      peticion.open('POST', 'http://jmlopez.esy.es/Proyecto_Final/autocompletar.php?nocache=' + Math.random(), true);
      peticion.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      peticion.send('municipio='+encodeURIComponent(texto)+'&provincia='+provincia);
	 
    }
    else {
      sugerencias = cacheSugerencias[texto];
      actualizaSugerencias();
    }
  }
}

function sinResultados() {
  document.getElementById("sugerencias").innerHTML = "No existen municipios que empiecen con ese texto";
  document.getElementById("sugerencias").style.display = "block";
}

function actualizaSugerencias() {
  elementoSeleccionado = -1;
  muestraSugerencias();
}

function seleccionaElemento() {
  if(sugerencias[elementoSeleccionado]) {
    document.getElementById("municipio").value = sugerencias[elementoSeleccionado];
    borraLista();
  }
}

function muestraSugerencias() {
  var zonaSugerencias = document.getElementById("sugerencias");
  
  zonaSugerencias.innerHTML = sugerencias.formateaLista();
  zonaSugerencias.style.display = 'block';  
}

function borraLista() {
  document.getElementById("sugerencias").innerHTML = "";
  document.getElementById("sugerencias").style.display = "none";
}


 window.onload=function(){
                
                cargarComunidad();
                document.getElementById("comunidad").onchange=cargaProvincias;
				// Crear elemento de tipo <div> para mostrar las sugerencias del servidor
  var elDiv = document.createElement("div");
  
  elDiv.id = "sugerencias";
  document.getElementById("hijo4").appendChild(elDiv);
  
  document.getElementById("municipio").onkeyup = autocompleta;
  document.getElementById("municipio").focus();
                
                
            }



</script>

<style type="text/css">
#sugerencias {width:228px; position:absolute; background-color:white; border:1px solid black; display:none; margin-left:235px; margin-top:-192px; z-index:1000;}
#sugerencias ul {list-style: none; margin: 0; padding: 0; font-size:.85em;}
#sugerencias ul li {padding: .2em; border-bottom: 1px solid silver;}
.seleccionado {font-weight:bold; background-color: #FFFF00;}
</style>
<link href="estilos3.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>
<body>
<div id="general"><img id="foto1" src="Imagenes/logo-dacunha1.png" /><p class="titulo">"Especialista en Bicicletas, accesorios y componentes"</p><a class="miCuenta" href="miCuenta.php"><img id="foto2" src="Imagenes/user_3.png"/>Mi Cuenta</a>

<?php

session_start();


if(!empty($_SESSION["usuario"])){

echo "<p class=\"nombre\">Bienvenid@ ".$_SESSION["usuario"]."</p><a class=\"salir\" href=\"cerrarSesion.php\" title=\"Cerrar sesión\">(Salir)</a>";



}else{

	echo "<a class=\"identificarse\" href=\"identificarse.php\"><img id=\"foto3\" src=\"Imagenes/icon_login.png\"/>Identificarse</a>";
}

?>



<div id="hijo2">
<div id="hijo3">
<p class="parrafo">Patrocinadores</p>
</div>
<img id="bh" src="Imagenes/bh_logo[1].png"/>
<img id="orbea" src="Imagenes/orbea logo.png" />
<img id="specialized" src="Imagenes/specialized_logo.png" />
<img id="trek" src="Imagenes/l72084-trek-logo-95843.png"/>
</div>
<div id="hijo4" align="center">
<?php
			  session_start();
			  
			  
			  if(!empty($_SESSION["usuario"])){
			  
			  
			  $conexion=mysql_connect("localhost","u789964829_jm","trebujena") or die("Problemas en la conexion");

			  mysql_select_db("u789964829_proy",$conexion) or die("Problemas en la selección de la base de datos");
			  
			  
			  $sql="SELECT id_cliente, nombre, nombreUsuario, contrasena, email, telefono, direccion, localidad FROM clientes WHERE nombreUsuario='$_SESSION[usuario]'";
			  $rs = mysql_query($sql);
			   
              while($row = mysql_fetch_array($rs)){
				    $id=$row[0];
					$nombre=$row[1];
					$nombreUsuario=$row[2];
					$contrasena=$row[3];
					$email=$row[4];  
					$telefono=$row[5];
					$direccion=$row[6];
					$localidad=$row[7];
			  }
	
			  
			  ?>               
<form method="post" action="actualizarCuenta.php">
   <fieldset>
      <legend>Mis Datos</legend></br>
      <div>
         <label for="nombre">Nombre</label></br>
         <input type="text" id="nombre" name="nombre" value="<?php echo $nombre?>" />
      </div></br>
      <div>
         <label for="nick">Nick</label></br>
         <input type="text" id="nick" name="nick" size="35" value="<?php echo $nombreUsuario?>" />
      </div></br>
      <div>
         <label for="email">Email</label></br>
         <input type="text" id="email" name="email" size="35"  height="10" value="<?php echo $email?>"/>
      </div></br>
      <div>
         <label for="contrasena">Contraseña</label></br>
         <input type="password" id="contrasena" name="contrasena" size="35" value="<?php echo $_SESSION["clave"]?>" />
      </div></br>
      <div>
      <label for="comunidad">Comunidad Autónoma</label></br>
      <select name="comunidad" id="comunidad">
      <option>- Seleccione -</option>
      </select>
      </div></br>
      <div>
      <label for="provincia">Provincia</label></br>
      <select name="provincia" id="provincia">
      <option>- Seleccione -</option>
      </select>
      </div></br>
      <div>
         <label for="municipio">Localidad</label></br>
         <input type="text" id="municipio" name="municipio" size="35" value="<?php echo $localidad?>" /></br>
         <input type="text" id="oculto" name="oculto" style="display:none;"/>
      </div></br>
      <div>
         <label for="telefono">Telefono</label></br>
         <input type="tel" id="telefono" name="telefono" size="35" value="<?php echo $telefono?>" />
      </div></br>
      <div>
         <label for="direccion">Direccion</label></br>
         <input type="text" id="direccion" name="direccion" size="35" value="<?php echo $direccion?>"/>
      </div></br>
      <input type="hidden" id="id" name="id" size="35" value="<?php echo $id?>"/>
      
      <div>
      	<input type="submit" value="Actualizar Datos"/>
      
      </div></br>
   </fieldset>
</form>
                                
<?php

			  }else{
				  ?>
        			<script language="JavaScript">
						alert("No estás identificado!!!");
						window.location.href='index.php'; 
					</script>
							
 		<?php	
				  
			  }




?>


</div>
<div id="hijo5">
<div id="hijo3">
<p class="parrafo">Síguenos</p>
</div>
<a href="https://www.facebook.com/"><img id="fb" src="Imagenes/fb.png"/></a>
<a href="https://twitter.com"><img id="tw" src="Imagenes/twitter.png"/></a>
<a href="https://plus.google.com"><img id="google" src="Imagenes/google+.png"/></a>
<a href="https://es.pinterest.com"><img id="pinterest" src="Imagenes/pinterest.png"/></a>
</div>
<div id="menu">
<ul id="nav">
    <li><a href="index.php">Inicio</a></li>
    <li><a href="#">Bicicletas</a>
<ul class="submenu">
    <li><a href="#">Bicicletas MTB</a>
<ul class="subsubmenu">
    <li><a href="Bicicletas_MTB_BH.php">BH</a></li>
    <li><a href="Bicicletas_MTB_Orbea.php">Orbea</a></li>
    <li><a href="Bicicletas_MTB_Specialized.php">Specialized</a></li>
    <li><a href="Bicicletas_MTB_Trek.php">Trek</a></li>
</ul>
</li>
     <li><a href="#">Bicicletas de Carretera</a>
    <ul class="subsubmenu">
    <li><a href="Bicicletas_Carretera_BH.php">BH</a></li>
    <li><a href="Bicicletas_Carretera_Orbea.php">Orbea</a></li>
    <li><a href="Bicicletas_Carretera_Specialized.php">Specialized</a></li>
    <li><a href="Bicicletas_Carretera_Trek.php">Trek</a></li>
</ul>
</li>  
</ul>
</li>
    <li><a href="#">Accesorios</a>
<ul class="submenu">
    <li><a href="guantes.php">Guantes</a></li>
    <li><a href="cascos.php">Cascos</a></li>
    <li><a href="hinchadores.php">Hinchadores</a></li>
    <li><a href="gps.php">Cuentakilómetros, GPS</a></li>
    <li><a href="luces.php">Luces y Accesorios</a></li>
    <li><a href="bidones.php">Bidones, Mochilas de Agua</a></li>
</ul>
</li>
    <li><a href="#">Componentes</a>
    <ul class="submenu">
    <li><a href="frenos.php">Frenos</a></li>
    <li><a href="neumaticos.php">Neumáticos</a></li>
    <li><a href="pedales.php">Pedales</a></li>
    <li><a href="sillines.php">Sillines</a></li>
    <li><a href="transmicion.php">Transmición</a></li>
    <li><a href="camaras.php">Cámaras</a></li>
</ul>    
</li>
<li><a href="buscar.php">Buscar</a></li>
<li><a href="contactanos.php">Contáctanos</a></li>
</ul>
</div>
<div id="consulta">
</div>
<div id="cabecera">
	<?php
	if(!empty($_SESSION["usuario"])){
	?>
	<!-- Información de la cesta-->
	<div id="totales">
		<table>
			<tr align="right">
				<td><img width="30" height="30" src="Imagenes/buy-20clipart-shopping_cart_blue.png"/><strong>(
				<?php 
							if(isset($_SESSION["cantidadTotal"])){
								echo "<a style=\"color:#06F; text-decoration:underline;\" href=\"http://jmlopez.esy.es/Proyecto_Final/carro.php?id=1&action=mostrar\" title='lista de compra'>".$_SESSION["cantidadTotal"]."</a>";
							}else{
								echo "<a style=\"color:#06F; text-decoration:underline;\" href=\"http://jmlopez.esy.es/Proyecto_Final/carro.php?id=1&action=mostrar\" title='lista de compra'>0</a>";
								$_SESSION["totalcoste"] = 0;
							}
						?>
                       )</strong>
				</td></tr>
                
		</table>
	</div>
    
    
	<!-- FIN CESTA-->
	<?php
	}else{
		
		?>
		<div id="totales">
		<table>
			<tr align="right">
				<td><img width="30" height="30" src="Imagenes/buy-20clipart-shopping_cart_blue.png"/><strong>(
                <?php
                echo "<a style=\"color:#06F; text-decoration:underline;\" href=\"http://jmlopez.esy.es/Proyecto_Final/carro.php?id=1&action=mostrar\" title='lista de compra'>0</a>";
								$_SESSION["totalcoste"] = 0;
								?>
		  )</strong>
				</td></tr>
                
		</table>
	</div>
    <?php
	}
	?>
<div id="hijo6">
<p id="pie"><a href="condicionesGenerales.php">Condiciones Generales</a></p><p id="pie2"><a href="politicaPrivacidad.php">Política de Privacidad</a></p><p id="pie3"><a href="informacionContacto.php">Información de Contacto</a>
</p>
<p id="pie4"><img id="copy" src="Imagenes/copyright-1.png" width="18" height="18"/><p id="txt">CHAIN S.L. Todos los derechos reservados. 2015</p>
</div>

</div>
</body>
</html>
