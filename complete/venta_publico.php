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
  <br />
<?php 
          require_once('Connections/bd_farmastock.php');
          if (!empty($_POST)){
              $id_producto=$_POST['select1'];
              $cantidad=$_POST['cantidad'];
              $link = mysql_connect('127.0.0.1', 'root', '')
    or die('No se pudo conectar: ' . mysql_error());
echo '';
$id_empleado=$_SESSION['id_empleado'];
mysql_select_db('farma_stock') or die('No se pudo seleccionar la base de datos');
$query="SELECT stock FROM producto WHERE id_producto=$id_producto";
$resultado = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
$row=mysql_fetch_array($resultado);
$stock=$row['stock'];
$hoy = getdate();
$d=$hoy['mday'];
$m=$hoy['mon'];
$y=$hoy['year'];
    if ($stock>=$cantidad){
$query = "INSERT INTO `ventas_realizadas`(`id_producto`, `id_empleado`, `cantidad`, `fecha`) VALUES ('$id_producto','$id_empleado', '$cantidad', '$y-$m-$d')";
$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());echo "<fieldset>";
$query2= "UPDATE `producto` SET `stock`=$stock-$cantidad WHERE id_producto=$id_producto";
$result2=  mysql_query($query2)or die('Consulta fallida: ' . mysql_error());
echo "Producto vendido";
echo "<br>";
echo "<br>";
echo "<a href=\"venta_publico.php\">Volver Venta Publico</a>";
echo "</fieldset>";   
    }else{
echo "<fieldset>";
echo "No disponemos de la suficiente cantidad para su venta";
echo "<br>";
echo "<br>";
echo "<a href=\"venta_publico.php\">Volver Venta Publico</a>";
echo "</fieldset>";   
}
}else{
// Conectando, seleccionando la base de datos
$link = mysql_connect('127.0.0.1', 'root', '')     or die('No se pudo conectar: ' . mysql_error());
echo '';
mysql_select_db('farma_stock') or die('No se pudo seleccionar la base de datos');
// sentencia SQL para la SELECCION de ese producto.
 		$consulta_mysql = "select * from producto";
  		$resultado_consulta_mysql=mysql_query ($consulta_mysql, $link);
echo "<fieldset>";
  echo "<legend>Realizar una venta</legend>";
  echo "<form action=venta_publico.php method='POST'>";
echo "PRODUCTO: ";
echo "<select name='select1'>" ; 
$precios=array();
while($fila=mysql_fetch_array($resultado_consulta_mysql))     //recupera una fila de resultados .
{
    echo "<option value='".$fila['id_producto']."'>"   .$fila['nombre']."---PVP:".$fila["precio_unid"]."</option>";
	$precios[$fila['id_producto']] = $fila["precio_unid"];
}
echo "</select>";
//$consulta = "select stock from producto where id_producto = $_POST'['select1']";
echo "<br /><br />";
echo "<br />";
echo "CANTIDAD:";
echo "<input type='text' name='cantidad' />";
echo "<br />";
echo "<input type='submit' value='Realizar venta' />";
echo "</form>";
echo "</fieldset>";

// Cerrar la conexi�n
		mysql_close($link);
}
?>
  
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
        
    margin-top: -33px;
    }
    form{
        margin-top: 0px; 
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
  background: #A9F5A9; 
}
    enviar{
      background-color:#A9F5A9;

    }
</style>