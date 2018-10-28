<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
error_reporting(E_ALL ^ E_DEPRECATED);
$hostname_cnAnime = "127.0.0.1";
$database_cnAnime = "watermelonanime";
$username_cnAnime = "root";
$password_cnAnime = "";
$cnAnime = mysql_pconnect($hostname_cnAnime, $username_cnAnime, $password_cnAnime) or trigger_error(mysql_error(),E_USER_ERROR);
/*
if(!$cnAnime){
	echo "connection failed";
}
else echo "connection successfully";
*/
mysql_query('SET NAMES UTF8');
?>