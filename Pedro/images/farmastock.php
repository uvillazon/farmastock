<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_farmastock = "mysql13.000webhost.com";
$database_farmastock = "a3745235_webasir";
$username_farmastock = "a3745235_root";
$password_farmastock = "sherco1985";
$farmastock = mysql_pconnect($hostname_farmastock, $username_farmastock, $password_farmastock) or trigger_error(mysql_error(),E_USER_ERROR); 
?>