<?php
session_start();
error_reporting(0);
header('Content-Type: application/json');
require_once('dbconnection.php');
$page = $_POST['page'];
$sql = "select count(news_id) as count from news";
$data = getData($con,$sql);
$max = $data['0']['count'];
$max_page = ceil($max/30);
if(empty($page)){
  $page = 1;
}
if ($page <= $max_page && $page >= 1){
  $start = ($page-1) * 30;
  $current = $page;
}else{
  $start = 1;
  $current = 1;
}

$sql = "select * from news
LEFT join users on users.user_id = news.user_id order by time DESC
limit ".$start.",30";
$data = getData($con,$sql,[$start]);

echo (json_encode(["data"=>$data,"active"=>$current,"max"=>$max_page,"count"=>$max]));
?>