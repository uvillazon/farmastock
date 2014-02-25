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
 <p>Esto es modificar venta </p> <br />
 
 <?php
 // Conectando, seleccionando la base de datos
$link = mysql_connect('127.0.0.1', 'root', '')
    or die('No se pudo conectar: ' . mysql_error());
echo '';
mysql_select_db('farma_stock') or die('No se pudo seleccionar la base de datos');
 
 
 //esta pagina recibe el id del producto a editar.
 $id_producto = $_GET["id_producto"];   //id_producto es el que tengo en almacen.php <a href=\"borrar_producto.php?id_producto=$id\">
 
 // sentencia SQL para la SELECCION de ese producto.
 $ssql = "select * from venta where id_producto=" . $id_producto;
//ejecuto la sentencia
$producto_editar = mysql_query($ssql);
//consigo los datos de ese producto
$line = mysql_fetch_object($producto_editar);


// Cerrar la conexión
mysql_close($link);

//creo un  formulario con los datos de ese producto.

 ?>
 
 <form action="update_venta.php" method="post">
 	<input type="hidden" name="id_producto" value="<?php echo $id_producto;?>"> <!-- Sirve para pasarle a la siguiente pagina cual es el registro concreto que quiero modificar, o sea se le pasa a la siguiente pagina el id_producto que quiero editar.HIDDEN es un campo oculto para que el usuario no lo vea, sea a nivel interno. name es cualquier nombre.  -->
 	Cantidad:
    <br />
    <input type="text" name="cantidad" value="<?php echo $line->cantidad;?>" /> <!-- name es cualquier nombre, value debe llamarse igual a 																					                                                                             lo que tenemos en la base de datos -->
    <br />
    <br />
    Nombre:
    <br />
    <input type="text" name="nombre_prod" value="<?php echo $line->nombre_prod;?>" />
     <br />
      Precio :
	  <br />
	  <input type="text" name="precio_unidad" value="<?php echo $line->precio_unidad;?>" />
     <br />
      <br />
      <input type="submit" value="Modificar" />
     </form>
     
     <br />
     <br />
     <a href="almacen.php">Cancelar y seleccionar otra venta</a>
 
  <!-- InstanceEndEditable -->
  </div>
  <div class="footer">
    <?php include("includes/pie.php");?>
    <!-- end .footer --></div>
  <!-- end .container --></div>
</body>
<!-- InstanceEnd --></html>
