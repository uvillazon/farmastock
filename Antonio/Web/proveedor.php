<?php include("includes/sesiones.php"); ?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//ES" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/principal.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>

<link href='http://fonts.googleapis.com/css?family=Exo+2:400,300' rel='stylesheet' type='text/css'>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Farmastock | Aplicaci�n web stock farmacia</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
<link href="css/principal.css" rel="stylesheet" type="text/css" />
<?php include("includes/header.php"); ?> 


</head>

<body>
<?php include("includes/afterbody.php"); ?>

<div class="container">
  <div class="header">
  <?php include("includes/cabecera.php"); ?>
     
     </div>
     
       <div class="logo_logout"><!-- InstanceBeginEditable name="logo_logout" -->
           <?php include("includes/logo_logout.php"); ?>
       <!-- InstanceEndEditable --></div>
  
  
  
  <div class="menuizqu"><!-- InstanceBeginEditable name="menu" -->
      <?php include("includes/menuizquierda.php"); ?>
  <!-- InstanceEndEditable --></div>
  
  
  <div class="content">
  <!-- InstanceBeginEditable name="Contenido" -->
  <div class="iconos1">
   <img src="images/bayer.jpeg" width="100" height="100" alt="Bayer" />
   <span class="iconos2"><img src="images/durex.jpeg" width="100" height="100" alt="Durex" /></span><img class="iconos2" src="images/canifarma.jpeg" width="100" height="100" alt="Canifarma" />
   <img class="iconos2" src="images/europharm.jpeg" width="100" height="100" alt="Europharm" /></div>
  
  <div class="tabla_proveedores">
<p>Datos de nuestros Proveedores:</p>
   <p>&nbsp;</p>
  
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
echo "<table border=1>\n";

echo "<tr><td>Id Proveedor</td><td> Proveedor</td><td>Ciudad</td><td>Tel�fono</td><td>Email</td><td><a href=\"anadir_proveedor.php\"> <img src=\"images/icono_anadir_contacto.png\" width=16 height=16 alt=\"modificar\" title=\"Agregar\" /> </a></td></tr>";



while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
    echo "\t<tr>\n";
    $id_proveed= $line["id_proveedor"];
	
	foreach ($line as $col_value) {
        echo "\t\t<td>$col_value</td>\n";
    }
	 echo "<td> <a href=\"modificar_proveedor.php?id_proveedor=$id_proveed\"> <img src=\"images/icono_modificar.gif\" width=12 height=12 alt=\"modificar\" title=\"Modificar\" /> </a> </td>";
	 echo "<td> <a href=\"borrar_proveedor.php?id_proveedor=$id_proveed\"> <img src=\"images/ico-borrar.gif\" width=12 height=12 alt=\"borrar\" title=\"Borrar\" /> </a></td>";
    echo "\t</tr>\n";
}
echo "</table>\n";

// Liberar resultados
mysql_free_result($result);

// Cerrar la conexi�n
mysql_close($link);
?>
</div>
  <!-- InstanceEndEditable -->
  </div>
  <div class="footer">
    <?php include("includes/pie.php");?>
    <!-- end .footer --></div>
  <!-- end .container --></div>
</body>
<!-- InstanceEnd --></html>
