<?php
$server="localhost";
$database="mastravel";
$dbpass="toor";
$dbuser="root";
$link=mysql_connect($server,$dbuser,$dbpass);
mysql_select_db($database,$link);
?>