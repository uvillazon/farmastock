<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//ES" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/principal.dwt.php" codeOutsideHTMLIsLocked="false" -->
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
     
     
     
       <div class="logo_logout"><!-- InstanceBeginEditable name="logo_logout" -->
           <?php include("includes/logo_logout.php"); ?>
       <!-- InstanceEndEditable --></div>
  
  </div>
  
  <div class="menuizqu"><!-- InstanceBeginEditable name="menu" -->
      <?php include("includes/menuizquierda.php"); ?>
  </div>
  
  
  <div class="content">
  <!-- InstanceBeginEditable name="Contenido" -->
  <div class="iconos">
   <img src="images/bayer.jpeg" width="80" height="80" alt="Bayer" />
   <span class="iconos"><img src="images/durex.jpeg" width="80" height="80" alt="Durex" /></span><img class="iconos" src="images/canifarma.jpeg" width="80" height="80" alt="Canifarma" />
   <img class="iconos" src="images/europharm.jpeg" width="80" height="80" alt="Europharm" /></div>
  
  <div class="tabla_proveedores">
<h3>Datos de nuestros Proveedores:</h3>
   <p>&nbsp;</p>
 <div class="boton_agregar_proveedor"> <a href="anadir_proveedor.php"> <img src="images/icono_anadir_contacto.png" width=36 height=36 alt="modificar" title="Agregar Proveedor" /> </a> </div> 
<?php
// Conectando, seleccionando la base de datos
$link = mysql_connect('127.0.0.1', 'root', '')
    or die('No se pudo conectar: ' . mysql_error());
echo '';
mysql_select_db('farma_stock') or die('No se pudo seleccionar la base de datos');

// Realizar una consulta MySQL
$query = 'SELECT * FROM proveedor';
$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

// Imprimir los resultados en HTML
echo "<table border=1 class=\"tabla\">\n";

echo "<tr><td>Id Proveedor</td><td> Proveedor</td><td>Ciudad</td><td>Tel&eacute;fono</td><td>Email</td></tr>";



while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
    echo "\t<tr>\n";
    $id_proveed= $line["id_proveedor"];
	
	foreach ($line as $col_value) {
        echo "\t\t<td>$col_value</td>\n";
    }

	 echo "<td> <a href=\"modificar_proveedor.php?id_proveedor=$id_proveed\"> <img src=\"images/icono_modificar.gif\" width=12 height=12 alt=\"modificar\" title=\"Modificar\" /> </a> </td>";
	 
	 echo "<td> <a href=\"borrar_proveedor.php?id_proveedor=$id_proveed\" onclick=\"return confirmar()\"> <img src=\"images/ico-borrar.gif\" width=12 height=12 alt=\"borrar\" title=\"Borrar\" /> </a></td>";
   

	 

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
if (!confirm("�Est� seguro de que desea eliminar el Proveedor ?")) { 
return false; 
} 
else { 
document.location= url; 
return true; 
} 
} 
</script> 
</div>
  <!-- InstanceEndEditable -->
  </div>
  <div class="footer">
    <?php include("includes/pie.php");?>
    <!-- end .footer --></div>
  <!-- end .container --></div>
</body>
<!-- InstanceEnd --></html>
