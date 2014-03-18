
<?php
session_start();  
echo "<div id='usuario'>Usuario: ";
	echo  $_SESSION['login_usuario']; 
	if(empty($_SESSION['login_usuario'])) 
	{ 
		header('Location: index.php');
	}
echo "</div>";
?>
