<?php

session_start();
echo 'Usuarioaaaaaaa: ';

echo  $_SESSION['login_usuario']; 

if(empty($_SESSION['login_usuario'])) { // Recuerda usar corchetes.
header('Location: index.php');}

?>
