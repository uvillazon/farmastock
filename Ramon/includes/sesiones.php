<?php
// page2.php

session_start();


echo 'Usuario: ';

echo  $_SESSION['login_usuario']; // green
/*echo $_SESSION['animal'];   // cat
echo date('Y m d H:i:s', $_SESSION['time']);*/

if(empty($_SESSION['login_usuario'])) { // Recuerda usar corchetes.
header('Location: index.php');}
?>