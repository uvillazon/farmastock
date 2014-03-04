<h3>Agregar nueva ciudad</h3>
<form mtehod="POST" action="/modulo/ciudad/guardar">
<label for="nombre">Ciudad:</label><br/>
<input type="text" name="nombre" id="nombre"/><br/><br/>
<label for="provincia">Provincia:</label><br/>
<select name="provincia" id="provincia">
 <!--ESTA PARTE DEL CODIGO SE ITERA-->
 <option value="1">Buenos Aires</option>
 <!--ESTA PARTE DEL CODIGO SE ITERA-->
</select><br/><br/>
<input type="submit" value="Agregar ciudad"/>
</form>
<!--PROVINCIAS-->
 <option value="{provincia_id}">{nombre}</option>
 <!--PROVINCIAS-->
 <?php
 # Defino la expresión regular
$regex = "/<!--PROVINCIAS-->(.|\n){1,}<!--PROVINCIAS-->/";
# Busco la el patrón coincidente en mi plantilla HTML
preg_match($regex, file_get_contents('archivo.html'),
$array_coincidencias);
$codigo = $array_coincidencias[0];
$comodines = array('{provincia_id}', '{nombre}');
$render_options = '';
foreach($array_de_resultados as $array_asociativo) {
$sustituciones = array_values($array_asociativo);
$render_options .= str_replace($comodines, $sustituciones,
$codigo);
}
print str_replace($codigo, $render_options,
file_get_contents('archivo.html'));
$html = str_replace($codigo, $render_options,
file_get_contents('archivo.html'));
print str_replace('<!--PROVINCIAS-->', '', $html);
?>