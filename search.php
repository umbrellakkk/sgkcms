<?php
session_start();
  if(!isset($_SESSION['username'])||!isset($_SESSION['securitysession1'])){
     echo "[{\"result\":\"3\"}]";
 }
  else{
header("Content-type:application/json");
$keywords = $_GET["keywords"];
require_once("sgk.php");
$con = mysql_connect($dbhost,$dbusername,$dbpassword);
  if (!$con)
    {
      die('error con:' . mysql_error());
    }
  mysql_query("SET NAMES UTF8");
  mysql_select_db($db, $con);
  $keyword = trim($keywords);
  if (empty($keyword)) {
  echo "[{\"result\":\"0\"}]";
    }else{
      $result = mysql_query("SELECT * FROM $sgk WHERE email like '%$keyword%'");
      $num = mysql_num_rows($result);
      if ($num) {
        $search_result = array();
          while($row = mysql_fetch_array($result)){
              $search_result[] = $row;
          }
          echo json_encode($search_result);
  }else{
    echo "[{\"result\":\"1\"}]";
  }
}
  }
?>