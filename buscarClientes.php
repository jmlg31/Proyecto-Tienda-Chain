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






<link href="estilos7.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<style type="text/css">
#sugerencias {width:180px; position:absolute; background-color:white; border:1px solid black; display:none; margin-left:263px; margin-top:42px; z-index:1000;}
#sugerencias ul {list-style: none; margin: 0; padding: 0; font-size:.85em;}
#sugerencias ul li {padding: .2em; border-bottom: 1px solid silver;}
.seleccionado {font-weight:bold; background-color: #FFFF00;}
</style>
</head>
<body>
<div id="general">
<img id="foto1" src="Imagenes/logo-dacunha1.png" /><p class="titulo">Administración Web</p>

<?php

session_start();


if(!empty($_SESSION["usuario"])){

echo "<p class=\"nombre\">Bienvenid@ ".$_SESSION["usuario"]." (".$_SESSION['tipo'].")</p><a class=\"salir\" href=\"cerrarSesion2.php\" title=\"Cerrar sesión\">(Salir)</a>";

}


?>

<div id="hijo4" align="center">
</br></br>
<p class="mtbBh">Buscar Clientes</p></br></br></br>
<?php
		      
			  session_start();
		   
			 
			$conexion=mysql_connect("localhost","u789964829_jm","trebujena") or die("Problemas en la conexion");
			
			mysql_select_db("u789964829_proy",$conexion) or die("Problemas en la selección de la base de datos");
			
			
			
			echo "<div style=\"width:750px;\" align=\"center\">";
			echo "<form method=\"get\" action=\"consultaBuscarClientes.php\">";
			echo "<table border=\"0\" align=\"center\">";
			echo "<tr><td align=\"center\">Comunidad</td><td align=\"center\">Provincia</td><td colspan=\"4\" align=\"center\">Localidad</td><td align=\"left\">Año de Alta</td><td>Estado</td></tr>";
			
			echo "<tr><td align=\"right\"><select name=\"comunidad\" id=\"comunidad\"><option>- Seleccione -</option>";
			echo "</select></td><td align=\"right\"><select name=\"provincia\" id=\"provincia\"><option>- Seleccione -</option>";
			echo "</select></td><td colspan=\"4\" id=\"autocompletar\"><input type=\"text\" name=\"municipio\" id=\"municipio\" /></td>";
			
			echo "<td><select name=\"ano\"><option>- Seleccione -</option><option>2015</option><option>2014</option><option>2013</option><option>2012</option><option>2011</option><option>2010</option></select></td><td><select name=\"estado\"><option>- Seleccione -</option><option>Bloqueado</option><option>Nobloqueado</option></td><td align=\"left\"><input type=\"submit\" value=\"Buscar\"/></td></tr>";
			echo "</table>";
			echo "</form>"; 
			echo "</div></br>";

			  
			  
			  
			  
?>
</div>
<div id="menu">
<ul id="nav">
<?php
session_start();
$tipo="normal";
$tipo2="lectura";
if(empty($_SESSION["usuario"])){	
?> <li><a href="permiso.php">Ajustes</a></li>
    <li><a href="#">Clientes</a>
    <ul class="submenu">
    <li><a href="permiso.php">Añadir</a></li>
    <li><a href="permiso.php">Eliminar</a></li>
    <li><a href="permiso.php">Bloquear o Desbloquear</a></li>
</ul>
    </li>
    <li><a href="#">Productos</a>
<ul class="submenu">
    <li><a href="permiso.php">Añadir</a></li>
    <li><a href="permiso.php">Eliminar</a></li>
</ul>
</li>
    <li><a href="#">Pedidos</a>
    <ul class="submenu">
    <li><a href="permiso.php">Pedidos Pendientes</a></li>
    <li><a href="permiso.php">Pedidos Finalizados</a></li>
</ul>    
</li>
<li><a href="#">Usuarios</a>
    <ul class="submenu">
    <li><a href="permiso.php">Añadir Usuario Administrador</a></li>
    <li><a href="permiso.php">Añadir Usuario Normal</a></li>
    <li><a href="permiso.php">Añadir Usuario de Lectura</a></li>
</ul>    
</li> 
<li>
<a href="#">Consultas</a>
 <ul class="submenu">
    <li><a href="permiso.php">Buscar Clientes</a></li>
    <li><a href="permiso.php">Buscar Productos</a></li>
    </ul>
</li>   
    <?php
    }else if($tipo==$_SESSION['tipo'] ){
    ?>
   <li><a href="ajustes.php">Ajustes</a></li>
    <li><a href="#">Clientes</a>
    <ul class="submenu">
    <li><a href="permiso.php">Añadir</a></li>
    <li><a href="permiso.php">Eliminar</a></li>
    <li><a href="permiso.php">Bloquear o Desbloquear</a></li>
</ul>
    </li>
    <li><a href="#">Productos</a>
<ul class="submenu">
    <li><a href="anadirProductos.php">Añadir</a></li>
    <li><a href="eliminarProductos.php">Eliminar</a></li>
</ul>
</li>
    <li><a href="#">Pedidos</a>
    <ul class="submenu">
   <li><a href="pedidosPendientes.php">Pedidos Pendientes</a></li>
    <li><a href="pedidosFinalizados.php">Pedidos Finalizados</a></li>
</ul>    
</li>
<li><a href="#">Usuarios</a>
    <ul class="submenu">
    <li><a href="permiso.php">Añadir Usuario Administrador</a></li>
    <li><a href="permiso.php">Añadir Usuario Normal</a></li>
    <li><a href="permiso.php">Añadir Usuario de Lectura</a></li>
</ul>    
</li> 
<li>
<a href="#">Consultas</a>
 <ul class="submenu">
    <li><a href="buscarClientes.php">Buscar Clientes</a></li>
    <li><a href="buscarProductos.php">Buscar Productos</a></li>
    </ul>
</li>   
    <?php
    }else if($tipo2==$_SESSION['tipo']){
	?>
    <li><a href="permiso.php">Ajustes</a></li>
    <li><a href="#">Clientes</a>
    <ul class="submenu">
    <li><a href="permiso.php">Añadir</a></li>
    <li><a href="permiso.php">Eliminar</a></li>
    <li><a href="permiso.php">Bloquear o Desbloquear</a></li>
</ul>
</li>
<li><a href="#">Productos</a>
<ul class="submenu">
    <li><a href="permiso.php">Añadir</a></li>
    <li><a href="permiso.php">Eliminar</a></li>
</ul>
</li>
    <li><a href="#">Pedidos</a>
    <ul class="submenu">
    <li><a href="permiso.php">Pedidos Pendientes</a></li>
    <li><a href="permiso.php">Pedidos Finalizados</a></li>
</ul>    
</li>
<li><a href="#">Usuarios</a>
    <ul class="submenu">
    <li><a href="permiso.php">Añadir Usuario Administrador</a></li>
    <li><a href="permiso.php">Añadir Usuario Normal</a></li>
    <li><a href="permiso.php">Añadir Usuario de Lectura</a></li>
</ul>    
</li> 
<li>
<a href="#">Consultas</a>
 <ul class="submenu">
    <li><a href="buscarClientes.php">Buscar Clientes</a></li>
    <li><a href="buscarProductos.php">Buscar Productos</a></li>
    </ul>
</li>   
<?php

}else{
	?>
	<li><a href="ajustes.php">Ajustes</a></li>
    <li><a href="#">Clientes</a>
    <ul class="submenu">
    <li><a href="anadirClientes.php">Añadir</a></li>
    <li><a href="eliminarClientes.php">Eliminar</a></li>
    <li><a href="bloquear_o_desbloquear.php">Bloquear o Desbloquear</a></li>
</ul>
    </li>
    <li><a href="#">Productos</a>
<ul class="submenu">
    <li><a href="anadirProductos.php">Añadir</a></li>
    <li><a href="eliminarProductos.php">Eliminar</a></li>
</ul>
</li>
    <li><a href="#">Pedidos</a>
    <ul class="submenu">
    <li><a href="pedidosPendientes.php">Pedidos Pendientes</a></li>
    <li><a href="pedidosFinalizados.php">Pedidos Finalizados</a></li>
</ul>    
</li>
<li><a href="#">Usuarios</a>
    <ul class="submenu">
    <li><a href="anadirAdministrador.php">Añadir Usuario Administrador</a></li>
    <li><a href="anadirUsuarioNormal.php">Añadir Usuario Normal</a></li>
    <li><a href="anadirUsuarioLectura.php">Añadir Usuario de Lectura</a></li>
</ul>    
</li> 
<li>
<a href="#">Consultas</a>
 <ul class="submenu">
    <li><a href="buscarClientes.php">Buscar Clientes</a></li>
    <li><a href="buscarProductos.php">Buscar Productos</a></li>
    </ul>
</li>   
	<?php
}
?>
    
</div>
<div id="hijo6">
<p align="center" style="color:white; font-weight:bold;">Administración <img src="Imagenes/copyright-1.png" width="18" height="18"/>CHAIN S.L. 2015</p>
</div>
</div>
</body>
</html>
