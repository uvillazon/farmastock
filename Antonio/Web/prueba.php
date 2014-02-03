<?php
  
    $nombre=$_POST["nombre"]; 
    $apellido=$_POST["stock"]; 
    // Conectando, seleccionando la base de datos
$link = mysql_connect('127.0.0.1', 'root', '')
    or die('No se pudo conectar: ' . mysql_error());
echo '';
mysql_select_db('farma_stock') or die('No se pudo seleccionar la base de datos');
echo $nombre;
echo $stock;
//$query = 'INSERT INTO `producto`(`id_producto`, `nombre`, `stock`) VALUES ()';
$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
?>