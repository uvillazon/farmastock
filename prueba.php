<html>
	<head>Prueba PHP</head>
	<body>
	<p>Prueba de base de datos<p>
	<?php
	// Conectando, seleccionando la base de datos
	$link = mysql_connect('localhost', 'farma', '1234')
    or die('No se pudo conectar: ' . mysql_error());
	echo 'Connected successfully'; 
	mysql_select_db('farma_stock') or die('No se pudo seleccionar la base de datos');

	// Realizar una consulta MySQL
	$query = 'insert into empleado values(25,1234567,"paco","pepe","Utrera",321654987,"paco",1234,1234,"paco@gmail.com");';
	$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

	// Imprimir los resultados en HTML
	echo "<table>\n";
	while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
    echo "\t<tr>\n";
    foreach ($line as $col_value) {
        echo "\t\t<td>$col_value</td>\n";
    }
    echo "\t</tr>\n";
	}
	echo "</table>\n";

	// Liberar resultados
	mysql_free_result($result);

	// Cerrar la conexión
	mysql_close($link);
	?>
	</body>
</html>