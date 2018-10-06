<?php
if(!isset($_POST['regsubmit'])){
    exit('<script language=\'JavaScript\'>alert(\'Illegal visit\');history.back(-1);</script>');
}
$myusername = $_POST['myname'];
$mypassword = $_POST['mypass'];
$myemail = $_POST['myemail'];
include('conn.php');
$sql = mysql_query("select * from user where mimaz_username='".$myusername."'");
if(mysql_fetch_array($sql)){
    echo 'username ',$myusername,' error';
    exit;
}
$regdate = time();
$sql = "INSERT INTO user(mimaz_username,mimaz_password,mimaz_email,mimaz_regdate)VALUES('$myusername','$mypassword','$myemail',
$regdate)";
if(mysql_query($sql,$conn)){
    exit('<script language=\'JavaScript\'>alert(\'OK!\');history.back(-1);</script>');
} else {
    echo 'error：',mysql_error(),'<br />';
}
?>