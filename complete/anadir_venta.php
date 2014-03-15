<?php include("includes/sesiones.php"); ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//ES" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/principal.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>

<link href='http://fonts.googleapis.com/css?family=Exo+2:400,300' rel='stylesheet' type='text/css'>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Farmastock | Aplicaci&oacute;n web stock farmacia</title>
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
  <br><br>
         
          <?php 
          require_once('Connections/bd_farmastock.php');
          if (!empty($_POST)){
             // $id_empleado=$_POST['id_empleado'];
			  $cantidad=$_POST['cantidad'];
              $id_producto=$_POST['id_producto'];
			  $precio_unidad=$_POST['precio_unidad'];
              $link = mysql_connect('127.0.0.1', 'root', '')
    or die('No se pudo conectar: ' . mysql_error());
echo '';
mysql_select_db('farma_stock') or die('No se pudo seleccionar la base de datos');
//var_dump($cantidad);
//var_dump($nombre_prod);
//var_dump($precio_uniadad);

// Realizar una consulta MySQL
$query = "INSERT INTO `venta`(`cantidad`, `id_producto`, `precio_unidad`) VALUES ('$cantidad','$id_producto', '$precio_unidad')";
$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
$query2 = 'SELECT * FROM venta where id_producto = id_producto';

echo "<fieldset>";
echo "Producto añadido en ventas";
echo "<br>";
echo "<br>";
echo "<a href=\"venta_publico.php\">Volver a venta al pï¿½blico</a>";
echo "</fieldset>";
          } else{
              echo "<form id=form name=form1 method=post action=anadir_venta.php >";
  echo "<fieldset>";
  echo "<legend>Registrar nuevo producto en ventas</legend>";
 
 echo "<div>";
   echo "<label for=id_empleado>id_empleado:</label>";
   echo "<input type=text name=id_empleado id=id_empleado size=35 />";
  echo "</div>";
  
  echo "<div>";
   echo "<label for=nombre>Nombre:</label>";
   mysql_select_db('farma_stock') or die('No se pudo seleccionar la base de datos');
   $ssql = "select * from productos where nombre=" . $nombre;
      echo "<option value='$nombre' selected='selected'>'$nombre'</option>";       
  echo "</select>";
  echo "</div>";
  
  echo "<div>";
   echo "<label for=cantidad>Cantidad:</label>";
   echo "<input type=text name=cantidad id=cantidad size=35 />";
  echo "</div>";
    
   echo "<div>";
    echo "<label for=precio_unidad>Precio Unid:</label>";
   echo "<input type=text name=precio_unidad id=precio_unidad size=35 />";
  echo "</div>";

echo "<input id=enviar type=submit value='Realizar la venta'/>";
echo "</fieldset>";
  echo "</form>";   
		  }
          ?>
<style type="text/css"> 
    fieldset{
        
    margin-top: -50px;
    }
    form{
        margin-top: -50px; 
    }
 div {
    margin: .4em 0; //margen para que no esten pegados.
}
div label {
  width: 15%; 
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
<p>&nbsp;</p>
  <p>&nbsp;</p>
  <!-- InstanceEndEditable -->
  </div>
  <div class="footer">
    <?php include("includes/pie.php");?>
    <!-- end .footer --></div>
  <!-- end .container --></div>
</body>
<!-- InstanceEnd --></html>
