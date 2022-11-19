<?php
header('Content-Type: application/json');
include_once('../script/dbconnection.php');
$news = $_POST['ref'];
$sql = "select *  from news
left join users on news.user_id = users.user_id
where news_id=?";
$data = getData($con,$sql,[$news]);
print_r(json_encode(["data"=>$data,"post"=>$_POST]));
?>