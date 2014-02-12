
<div class="logo_logout"> <a href="index.php?destruir=true"> <img src="images/logo_logout.png" width="50" height="50" alt="farmastock_logo" title="Salir de Farmastock" name="imagenlogout"> </a> </div> 

<div class="sesion">
<?php  
// page2.php


session_start();

   
//echo 'Bienvenido a Farmastock <br />';
echo 'Usuario: ';

echo  $_SESSION['login_usuario']; // green
/*echo $_SESSION['animal'];   // cat
echo date('Y m d H:i:s', $_SESSION['time']);*/

if(empty($_SESSION['login_usuario'])) { // Recuerda usar corchetes.
header('Location: index.php');} 

?>
</div>
 


