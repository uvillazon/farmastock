




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
     
     
     
       <div class="logo_logout"><!-- InstanceBeginEditable name="logo_logout" -->
           <?php include("includes/logo_logout.php"); ?>
       <!-- InstanceEndEditable --></div>
  
</div>  
  
  <div class="menuizqu"><!-- InstanceBeginEditable name="menu" -->
      <?php include("includes/menuizquierda.php"); ?>
  <!-- InstanceEndEditable --></div>
  
  
  <div class="content">
  <!-- InstanceBeginEditable name="Contenido" -->
 <?php
 // Conectando, seleccionando la base de datos
$link = mysql_connect('127.0.0.1', 'root', '')
    or die('No se pudo conectar: ' . mysql_error());
echo '';
mysql_select_db('farma_stock') or die('No se pudo seleccionar la base de datos');
 
 
 //esta pagina recibe el id del proveedor a editar.
 $id_proveedor = $_GET["id_proveedor"];   //id_producto es el que tengo en almacen.php <a 		           href=\"borrar_proveedor.php?id_producto=$id\">
 
 // sentencia SQL para la SELECCION de ese proveedor.
 $ssql = "select * from proveedor where id_proveedor=" . $id_proveedor;
//ejecuto la sentencia
$proveedor_editar = mysql_query($ssql);
//consigo los datos de ese producto
$line = mysql_fetch_object($proveedor_editar);


// Cerrar la conexion
mysql_close($link);

//creo un  formulario con los datos de ese producto.

 ?>
 
 <form action="update_proveedor.php" method="post">
     <fieldset>
 <legend>Modificar proveedor</legend>
 	<input type="hidden" name="id_proveedor" value="<?php echo $id_proveedor;?>"> <!-- Sirve para pasarle a la siguiente pagina cual es el registro concreto que quiero modificar, o sea se le pasa a la siguiente pagina el id_producto que quiero editar.HIDDEN es un campo oculto para que el usuario no lo vea, sea a nivel interno. name es cualquier nombre.  -->
 	Proveedor:
    <br />
    <input type="text" name="nombre" value="<?php echo $line->nombre;?>" /> <!-- name es cualquier nombre, value debe llamarse igual a 																					                                                                             lo que tenemos en la base de datos -->
    <br />
    <br />
    Direccion:
    <br />
    <input type="text" name="direccion" value="<?php echo $line->direccion;?>" />
     <br />
      <br />
      
      Telefono:
    <br />
    <input type="text" name="telefono" value="<?php echo $line->telefono;?>" />
     <br />
      <br />
      
      Email:
    <br />
    <input type="text" name="email" value="<?php echo $line->email;?>" />
     <br />
      <br />
      <input type="submit" value="Modificar" />
     </fieldset>
      </form>
     
     <br />
     <br />
     <a href="proveedor.php">Cancelar y seleccionar otro proveedor</a>
  <!-- InstanceEndEditable -->
  </div>
  <div class="footer">
    <?php include("includes/pie.php");?>
    <!-- end .footer --></div>
  <!-- end .container --></div>
</body>
<!-- InstanceEnd --></html>
<style type="text/css"> 
    fieldset{
        
    margin-top: 35px;
    }
    form{
        margin-top: -50px; 
    }
 div {
    margin: .4em 0; //margen para que no esten pegados.
}
div label {
  width: 10%; 
  float: left;
}
    input:focus { //estilos al hacer focus
  border: 2px solid #000;
background: #BDBDBD;
    }
    enviar{
      background-color:#A9F5A9;

    }
