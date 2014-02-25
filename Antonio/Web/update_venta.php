<?php include("includes/sesiones.php"); ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//ES" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/principal.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>

<link href='http://fonts.googleapis.com/css?family=Exo+2:400,300' rel='stylesheet' type='text/css'>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Farmastock | Aplicación web stock farmacia</title>
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
<?php 

// Conectando, seleccionando la base de datos
$link = mysql_connect('127.0.0.1', 'root', '')     or die('No se pudo conectar: ' . mysql_error());
//echo '';
mysql_select_db('farma_stock') or die('No se pudo seleccionar la base de datos');

// esta es la pagina donde hacemos el update de productos
//Sentencia SQL para hacer UPDATE

$ssql = "update venta set ";
$ssql .= "cantidad='" . $_POST["cantidad"] . "', ";
$ssql .= "nombre_prod='" . $_POST["nombre_prod"] . "', ";
$ssql .= "precio_unidad='" . $_POST["precio_unidad"] . "' ";
$ssql .= "where id_producto = " . $_POST["id_producto"];

//echo "$ssql";

//ejecuto la sentencia de update me devuelve un si o un no ejecutada la sentencia
if (mysql_query ($ssql) ){
	echo "Producto actualizado con éxito en ventas";
}else{
	echo "Hubo un error al actualizar el producto de ventas";
}


// Cerrar la conexión
mysql_close($link);

 ?>
 <br /><br /><br /><br /><br /><br />
 <a href="venta_publico.php">Volver a seleccionar otro producto de ventas </a>


  <!-- InstanceEndEditable -->
  </div>
  <div class="footer">
    <?php include("includes/pie.php");?>
    <!-- end .footer --></div>
  <!-- end .container --></div>
</body>
<!-- InstanceEnd --></html>
