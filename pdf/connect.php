<?php
/*$server="localhost";
$database="pvbiogym";
$dbpass="toor";
$dbuser="root";
*/
$server="biogym.com.mx";
$database="biogymco_pvbiogym";
$dbpass="@dminBIO.";
$dbuser="biogymco_admin";

$link=mysql_connect($server,$dbuser,$dbpass);
mysql_select_db($database,$link);
?>