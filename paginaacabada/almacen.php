<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//ES" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href='http://fonts.googleapis.com/css?family=Exo+2:400,300' rel='stylesheet' type='text/css'>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Farmastock | Aplicaci&oacute;n web stock farmacia</title>
<link href="css/principal.css" rel="stylesheet" type="text/css" />
<?php include("includes/header.php"); ?> 
</head>
<body>
<?php include("includes/afterbody.php"); ?>

<div class="container">
  <div class="header">
  <?php include("includes/cabecera.php"); ?>
      <div class="logo_logout">
           <?php include("includes/logo_logout.php"); ?>
      </div>
  </div> 
  <div class="menuizqu">
      <?php include("includes/menuizquierda.php"); ?>
</div>
<div class="content">
 
 <div class="tabla_productos">
   
     <p class="tit_stoc_alma"> STOCK DE ALMACEN: </p>
   <p>&nbsp;</p>
   <p>&nbsp;</p>
 <div class="boton_agregar_producto"> <a href="anadir_producto.php"> <img src="images/icono_anadir_contacto.png" width=36 height=36 alt="modificar" title="Agregar Producto" /> </a> </div> 
<?php 

// Nos conectamos a la base de datos
$link = mysql_connect('127.0.0.1', 'root', '')
    or die('No se pudo conectar: ' . mysql_error());
echo '';
/*seleccionamos la bd*/
mysql_select_db('farma_stock') or die('No se pudo seleccionar la base de datos');

// Realizar una consulta MySQL
$query = 'SELECT * FROM producto';
/*Se envia la consulta que esta en la variable $query*/
$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

// Imprimir los resultados en HTML
echo "<table border=1 class=\"tabla\" >\n";
echo "<tr><td>Id Productos</td><td> Productos</td><td>Cantidad</td><td>Precio Unidad</td>      </tr>";
/*mysql_fetch_array($result) lo que hace es tomar el primer registro y ponerlo en forma de array en este caso en la variable $line,
 y cada nombre de campo del registro se convierte en el nombre del elemento del array*/
while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) { /*MySQL_ASSOC, es para que use los nombre de los campos y/o alias que se coloco en la consulta*/
    echo "\t<tr>\n";/*tr fila dentro de una tabla*/
	$id= $line["id_producto"];
        //Bucle 
    foreach ($line as $col_value) {   /*se recorre el array dado por $line y en cada iteraci�n, el valor del elemento actual se asigna $col_value y el puntero interno del array avanza una posici�n  */  
	    echo "\t\t<td>$col_value</td> \n";		
    }
        //se hace una peticion get a modificar_producto donde se manda el id_producto y se guarda en la variable $id.
    echo "<td> <a href=\"modificar_producto.php?id_producto=$id\"> <img src=\"images/icono_modificar.gif\" width=12 height=12 alt=\"modificar\" title=\"Modificar\" /> </a> </td>";	
	echo "<td> <a href=\"borrar_producto.php?id_producto=$id\"  onclick=\"return confirmar()\"> <img src=\"images/ico-borrar.gif\" width=12 height=12 alt=\"borrar\" title=\"Borrar\" /> </a></td>";
	echo "";
	
	echo "\t</tr>\n";	 	
}
echo "</table>\n";
// Liberar resultados
mysql_free_result($result);
// Cerrar la conexi�n
mysql_close($link);
?>
<!-- SCRIPT DE CONFIRMACION ELIMINACION DE PRODUCTOS,(va asociado al onclick del href borrar_producto de arriba(onclick=\"return confirmar() )  ) -->
<script language="JavaScript"> 
function confirmar(url){ 
if (!confirm("�Est� seguro de que desea eliminar el Producto ?")) { 
return false; 
} 
else { 
document.location= url; 
return true; 
} 
} 
</script> 
</div>
<p>&nbsp;</p>
<p>&nbsp;</p>
  <p>&nbsp;</p>
  </div>
  <div class="footer">
    <?php include("includes/pie.php");?>
   </div>
 </div>
</body>
</html>
