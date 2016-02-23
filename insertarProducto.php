<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>
<body>
 <p>
            <form enctype="multipart/form-data" method="post" action="FotoInsert3.php">
            <p>
<label for="modelo">Categoria</label>
<input name="categoria" id="modelo" type="text" />
</p>
<label for="cuadro">Producto</label>
<input name="producto" id="cuadro" type="text" />
</p>
<p>
<label for="color">Color</label>
<input name="color" id="color" type="text" />
</p>
<p>
<label for="horquilla">Precio</label>
<input name="precio" id="horquilla" type="text" />
</p>
<label for="imagen">Imagen</label><INPUT type="file" name="imagen" size="30"><br/>
<p>
<INPUT type="submit" name="enviar" value="Enviar">
</p>
</form>
</body>
</html>