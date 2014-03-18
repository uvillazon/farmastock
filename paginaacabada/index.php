<?php require_once('Connections/bd_farmastock.php'); ?>
<?php 
 if (isset($_GET['destruir'])) {
	session_start();
	session_destroy();	 
 }
?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}
?>
<?php
// Verificamos si la variable existe, SI no existe ejecutamos el codigo.*/
if (!isset($_SESSION)) { /*Si la variable $_SESSION no est� definida, ISSET se utiliza cuando queremos comprobar si estamos entrando 	                         por primera vez a una pagina con un formulario o estamos entrando porque se presion� el bot�n de SUBMIT y hay                         que verificar si los campos han sido rellenados correctamente. */
  session_start();       /*abrimos la sessi�n*/
}
   $loginFormAction = $_SERVER['PHP_SELF']; /*$ _SERVER Es una variable global que contiene informaci�n acerca de los encabezados,                                             rutas y ubicaciones de scripts.*/
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}
if (isset($_POST['campo_usuario'])) { /*Si la variable $_POST est� definida con campo_usuario que es el usuario haz...*/
  $loginUsername=$_POST['campo_usuario'];
  $password=$_POST['textfield2'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "inicio.php"; /*Si el login es correcto pasa a la pagina inicio.php*/
  $MM_redirectLoginFailed = "fallo_login.php"; /*Si el login no es correcto para a la pagina fallo_login.php*/
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_bd_farmastock, $bd_farmastock); /*Selecciona la bd farmastock*/
  
  /*Selecciona de la bd el id_empleado, nombre_login y contrase�a de la tabla empleado cuando el nombre_login sea igual a (%s) una cadena de texto pasada pasada como argumento en la funcion sprintf*/
  $LoginRS__query=sprintf("SELECT id_empleado, nombre_login, contrasena FROM empleado WHERE nombre_login=%s AND contrasena=password (%s)",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $bd_farmastock) or die(mysql_error());/* mysql_query envia  a la bd la consulta que contiene                                                                                la variable $LoginRS__query*/
  $loginFoundUser = mysql_num_rows($LoginRS); /*mysql_num_rows recupera el numero de filas que ha obtenido de la consulta*/
  $row=mysql_fetch_array($LoginRS); /*mysql_fetch_array recupera una fila de resultados como un array asociativo*/
  $idUsuario=$row['id_empleado'];
  var_dump($login);
  if ($loginFoundUser) { /*si existe el numero de fila realizado en la consulta haz...*/
     $loginStrGroup = "";
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    $_SESSION['login_usuario'] = $loginUsername;
    $_SESSION['id_empleado'] = $idUsuario;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//ES" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/principal.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>

<link href='http://fonts.googleapis.com/css?family=Exo+2:400,300' rel='stylesheet' type='text/css'>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Farmastock | Aplicaci&oacuten web stock farmacia</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<style type="text/css">
.container .content h1 table tr td strong {
	text-align: center;
}
inicio_sesion {
}
.letra_sesion_inicio {
	text-align: right;
}
.dd {
	text-align: center;
	font-family: Verdana, Geneva, sans-serif;
	font-weight: bold;
	color: #069;
}
.dd {
	text-align: center;
	font-weight: bold;
}
</style>
<!-- InstanceEndEditable -->
<link href="css/principal.css" rel="stylesheet" type="text/css" />
<?php include("includes/header.php"); ?> 


</head>

<body>
<?php include("includes/afterbody.php"); ?>

<div class="container">
  <div class="header">
  <?php include("includes/cabecera.php"); ?>
     
     </div>
     
       <div class="logo_logout"><!-- InstanceBeginEditable name="logo_logout" -->
           
       <!-- InstanceEndEditable --></div>
  
  
  
  <div class="menuizqu"><!-- InstanceBeginEditable name="menu" -->
   
    
    <p>Inicio de Sesi&oacuten</p>
  <img src="images/login.jpg" width="121" height="161" alt="login" /> <!-- InstanceEndEditable --></div>
  
  
  <div class="content">
  <!-- InstanceBeginEditable name="Contenido" -->
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td height="58" style="color: #096; text-align: center; font-weight: bold;">Iniciar Sesion</td>
    </tr>
    <tr>
      <td height="197">Usuario:
        <form id="form1" name="form1" method="POST" action="<?php echo $loginFormAction; ?>">
          <p>
            <label for="textfield6"></label>
            <input type="text" name="campo_usuario" id="textfield6" />
          </p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>Contrase&ntildea: </p>
          <p>
            <label for="textfield8"></label>
            <input type="password" name="textfield2" id="textfield8" />
          </p>
          <p>&nbsp;</p>          
          <input type="submit" name="submit" value="Iniciar Sesion" />
          <p>&nbsp;</p>
          <p>&nbsp;</p>
        </form></td>
    </tr>
  </table>
  <!-- InstanceEndEditable -->
  </div>
  <div class="footer">
    <?php include("includes/pie.php");?>
    <!-- end .footer --></div>
  <!-- end .container --></div>
</body>
<!-- InstanceEnd --></html>
