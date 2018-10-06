<?php
require_once("sgk.php");
$conn = @mysql_connect($dbhost,$dbusername,$dbpassword);
if (!$conn){
    die("error conn" . mysql_error());
}
mysql_select_db($db, $conn);
mysql_query("set character set 'gbk'");
mysql_query("set names 'gbk'");
?>