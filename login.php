<?php
session_start();
if($_GET['action'] == "logout"){
    unset($_SESSION['username']);
	unset($_SESSION['securitysession1']);
    echo 'Logout Ok!';
    exit;
}
if(!isset($_POST['loginsubmit'])){
    exit('<script language=\'JavaScript\'>alert(\'Illegal visit\');history.back(-1);</script>');
}
if($_POST['emaillogin']==""||$_POST['passwordlogin']==""){
    exit('<script language=\'JavaScript\'>alert(\'No email or password!\');history.back(-1);</script>');
}else{
	$username = $_POST['emaillogin'];
    $password = $_POST['passwordlogin']; 
}
include('conn.php');
$sql = mysql_query("select * from user where mimaz_email='".$username."' and mimaz_password='".$password."'");
if($result = mysql_fetch_array($sql)){
    $_SESSION['username'] = $username;
	$_SESSION['securitysession1'] = md5(rand(0,999999));
    echo '<script language=\'JavaScript\'>alert(\'Welcome '.$username.'_SGK_Security_System\');history.back(-1);</script>';
    exit;
} else {
    echo '<script language=\'JavaScript\'>alert(\'Incorrect username or password\');history.back(-1);</script>';
	exit;
}
?>