<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_bd_farmastock = "localhost";
$database_bd_farmastock = "farma_stock";
$username_bd_farmastock = "root";
$password_bd_farmastock = "";


$bd_farmastock = mysql_pconnect($hostname_bd_farmastock, $username_bd_farmastock, $password_bd_farmastock) or trigger_error(mysql_error(),E_USER_ERROR); 
?>