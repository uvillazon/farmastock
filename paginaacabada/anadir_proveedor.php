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
  <br><br>
         
          <?php 
          //utilizamos el archivo bd_farmastock para conectarnos
          require_once('Connections/bd_farmastock.php');
          //si no esta vacio
          if (!empty($_POST)){
              //seleccionamos 'nombre', 'direccion', etc.. del array
              $nombre=$_POST['nombre'];
              $direccion=$_POST ['direccion'];
			  $telefono=$_POST ['telefono'];
			  $email=$_POST ['email'];
                          //nos conectamos a la BD
              $link = mysql_connect('127.0.0.1', 'root', '')
    or die('No se pudo conectar: ' . mysql_error());
echo '';
//seleccionamos la BD
mysql_select_db('farma_stock') or die('No se pudo seleccionar la base de datos');


// Realizar una consulta MySQL
$query = "INSERT INTO `proveedor`(`nombre`, `direccion`, `telefono`, `email` ) VALUES ('$nombre','$direccion', '$telefono', '$email')";
//Almacenamos en $result el resultado de realizar la consulta ($query)
$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
//mensaje para comunicar que el proveedor ha sido añadido
echo "<fieldset>";
echo "Proveedor a&ntilde;adido";
echo "<br>";
echo "<br>";
echo "<a href=\"proveedor.php\">Volver a Proveedor</a>";
echo "</fieldset>";
          }else{
              //formulario de añadir proveedor
              echo "<form id=form name=form1 method=post action=anadir_proveedor.php >";
  echo "<fieldset>";
  echo "<legend>Registrar nuevo proveedor</legend>";
 
  echo "<div>";
   echo "<label for=nombre>Nombre:</label>";
   echo "<input type=text name=nombre id=nombre size=35 />";
  echo "</div>";
     
	  echo "<div>";
    echo "<label for=Direccion>Direccion:</label>";
   echo "<input type=text name=direccion id=stock size=35 />";
  echo "</div>";
 
  echo "<div>";
    echo "<label for=telefono>Telefono:</label>";
   echo "<input type=text name=telefono id=telefono size=35 />";
  echo "</div>";
 
  echo "<div>";
    echo "<label for=email>Email:</label>";
   echo "<input type=text name=email id=email size=35 />";
  echo "</div>";
  
  

echo "<input id=enviar type=submit value='Dar de alta'/>";
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
  <!-- InstanceEndEditable -->
  </div>
  <div class="footer">
    <?php include("includes/pie.php");?>
    <!-- end .footer --></div>
  <!-- end .container --></div>
</body>
<!-- InstanceEnd --></html>
