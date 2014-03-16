
<?php


session_start();

   
//echo 'Bienvenido a Farmastock <br />';
echo "<div id='usuario'>Usuario: ";

	echo  $_SESSION['login_usuario']; 


	if(empty($_SESSION['login_usuario'])) 
	{ 
		header('Location: index.php');
	}
echo "</div>";
?>
