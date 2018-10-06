<?php
session_start();
if(!isset($_SESSION['username'])||!isset($_SESSION['securitysession1'])){
    header("Location:../index.php");
    exit();
}
$username = $_SESSION['username'];
echo 'information:<br />';
echo 'name:',$username,'<br />';
echo '<a href="../login.php?action=logout">logout</a>';
?>