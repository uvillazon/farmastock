<html> 
<head> 

</head> 

<body> 

<? 
$nombre = $_POST["nombre"]; 
$apellido = $_POST["apellido"]; 
$ocupacion = $_POST["ocupacion"]; 
$edad = $_POST["edad"]; 
$sexo = $_POST["sexo"]; 

echo "Nombre: $nombre.<br>"; 
echo "Apellido: $apellido.<br>"; 
echo "Ocupacion: $ocupacion.<br>"; 
echo "Edad: $edad.<br>"; 
echo "Sexo: $sexo.<br><br>"; 

if ($edad < 18) { 
echo "Eres menor de edad"; 
}else{ 
echo "Eres mayor de edad"; 
} 
?> 
</body> 
</html> 