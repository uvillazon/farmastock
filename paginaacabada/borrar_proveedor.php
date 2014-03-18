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
  
  <?php 
// Conectando, seleccionando la base de datos
$link = mysql_connect('127.0.0.1', 'root', '')
    or die('No se pudo conectar: ' . mysql_error());
echo '';
//seleccionamos la BD
mysql_select_db('farma_stock') or die('No se pudo seleccionar la base de datos');
// Actualizamos en funcion del id que recibimos 
if (isset ($_GET ['id_proveedor']) ) //si la variable $_GET existe
	{       //de la variable $_GET almacenamos en $valor id_proveedor
		$valor = $_GET ['id_proveedor'];
                //realizamos la consulta
		$query = "delete from proveedor where id_proveedor = $valor";  
		//ejecutamos la consulta $query
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
	 }
//mostramos un mensaje diciendo que el proveedor que contiene la variable $valor ha sido eliminado         
echo " <p>El proveedor $valor ha sido eliminado con exito.</p> "; 
echo "<br>";
echo "<p><a href='proveedor.php'>VOLVER A PRODUCTOS</a></p> ";
?>  
  </div>
  <div class="footer">
    <?php include("includes/pie.php");?>
    </div>
  </div>
</body>
</html>
