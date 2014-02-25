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
 <p> Esto es venta al publico </p>
 <br />


<?php 



// Conectando, seleccionando la base de datos
$link = mysql_connect('127.0.0.1', 'root', '')     or die('No se pudo conectar: ' . mysql_error());
echo '';
mysql_select_db('farma_stock') or die('No se pudo seleccionar la base de datos');

// sentencia SQL para la SELECCION de ese producto.
 		$consulta_mysql = "select * from producto";
  		$resultado_consulta_mysql=mysql_query ($consulta_mysql, $link);
 
// Cerrar la conexión
		mysql_close($link);
?>





<form action=anadir_venta.php method="POST">

ID EMPLEADO:     
<input type="text" name="nombre" value="<?php echo  $_SESSION['login_usuario'];?>" /> <br /><br />

PRODUCTO: 

<?php echo "<select name='select1'>";
while($fila=mysql_fetch_array($resultado_consulta_mysql))     //recupera una fila de resultados .
{
    echo "<option value='".$fila['nombre']."'>"   .$fila['nombre']."   </option>";
}
echo "</select>";


?>
<br /><br />



CANTIDAD:
<input type="text" name="cantidad" />
<br />
<input type="submit" value="Realizar venta" />

</form>


 
  <!-- InstanceEndEditable -->
  </div>
  <div class="footer">
    <?php include("includes/pie.php");?>
    <!-- end .footer --></div>
  <!-- end .container --></div>
</body>
<!-- InstanceEnd --></html>
