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
  <?php 
          require_once('Connections/bd_farmastock.php');
          if (!empty($_POST)){
              $valor = $_GET ['id_producto'];
              
              $link = mysql_connect('127.0.0.1', 'root', '')
    or die('No se pudo conectar: ' . mysql_error());
echo '';
mysql_select_db('farma_stock') or die('No se pudo seleccionar la base de datos');
//var_dump($nombre);
//var_dump($stock);

// Realizar una consulta MySQL
$query = "UPDATE `producto` SET `id_producto`=['$valor'],`nombre`=[nombre],`stock`=[stock] WHERE id='$valor')";
$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

echo "<fieldset>";
echo "Producto añadido";
header ("Location: almacen.php");
echo "</fieldset>";
          }else{
              $valor = $_GET ['id_producto'];
              $link = mysql_connect('127.0.0.1', 'root', '')
    or die('No se pudo conectar: ' . mysql_error());
echo '';
mysql_select_db('farma_stock') or die('No se pudo seleccionar la base de datos');
              $query = "SELECT * FROM producto WHERE id_producto='$valor'";
              $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
            
              echo "<form id=form name=form1 method=post action=anadir_producto.php?id=11>";
  echo "<fieldset>";
  echo "<legend>Modificar producto</legend>";
  echo "<div>";
   echo "<label for=nombre>Nombre:</label>";
   echo "<input type=text name=nombre id=nombre value='' size=35 />";
  echo "</div>";
      echo "<div>";
    echo "<label for=cantidad>Cantidad:</label>";
   echo "<input type=text name=stock id=stock value=''  size=35/></input>";
  echo "</div>";
echo "<input id=enviar type=submit value='Dar de alta'/>";
echo "</fieldset>";
  echo "</form>";   
          }
          ?>    
  </div>
  <div class="footer">
    <?php include("includes/pie.php");?>
    </div>
 </div>
<style type="text/css"> 
    fieldset{
        
    margin-top: 50px;
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
  background: #A9F5A9; 
}
    enviar{
      background-color:#A9F5A9;

    }
    </style>
</body>
</html>
