
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
        </div>
  </div>

  <div class="menuizqu">¡
      <?php include("includes/menuizquierda.php"); ?>
  ¡</div>
  
  
  <div class="content">
  
  <br><br>
         
          <?php 
          require_once('Connections/bd_farmastock.php');
          //si no esta vacio el formulario
          if (!empty($_POST)){
              //elegimos de post 'nombre', 'stock', 'precio unidad'
              $nombre=$_POST['nombre'];
              $stock=$_POST['stock'];
			  $precio_unid=$_POST['precio_unid'];
                //Nos conectamos a la BD
              $link = mysql_connect('127.0.0.1', 'root', '')
    or die('No se pudo conectar: ' . mysql_error());
echo '';
//Seleccionamos la BD
mysql_select_db('farma_stock') or die('No se pudo seleccionar la base de datos');

// Realizar una consulta MySQL
$query = "INSERT INTO `producto`(`nombre`, `stock`, `precio_unid`) VALUES ('$nombre','$stock', '$precio_unid')";
//Almacenamos en $result el resultado de realizar la consulta ($query)
$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
echo "<fieldset>";
echo "Producto a&ntilde;adido";
echo "<br>";
echo "<br>";
echo "<a href=\"almacen.php\">Volver Almac&eacute;n</a>";
echo "</fieldset>";
//si no esta vacio mostramos el formulario
          } else{
              echo "<form id=form name=form1 method=post action=anadir_producto.php >";
  echo "<fieldset>";
  echo "<legend>Registrar nuevo producto</legend>";
 
  echo "<div>";
   echo "<label for=nombre>Nombre:</label>";
   echo "<input type=text name=nombre id=nombre size=35 />";
  echo "</div>";
      echo "<div>";
    echo "<label for=cantidad>Cantidad:</label>";
   echo "<input type=text name=stock id=stock size=35 />";
  echo "</div>";
  
   echo "<div>";
    echo "<label for=precio_unid>Precio Unid:</label>";
   echo "<input type=text name=precio_unid id=precio_unid size=35 />";
  echo "</div>";
echo "<input id=enviar type=submit value='Dar de alta'/>";
echo "</fieldset>";
  echo "</form>";   		 
		  }
          ?>

<style type="text/css"> 
    fieldset{
        
    margin-top: -33px;
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
</style>
<p>&nbsp;</p>
  <p>&nbsp;</p>
  
  </div>
  <div class="footer">
    <?php include("includes/pie.php");?>
  </div>
 </div>
</body>
</html>
