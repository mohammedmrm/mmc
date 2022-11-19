<?php
session_start();
error_reporting(0);
header('Content-Type: application/json');
include_once('../script/dbconnection.php');
$college =  $_SESSION['college_id'];
$query = " select * from news  inner join users on users.user_id = news.user_id where college_id=? limit 30";
$data = getData($con,$query,[$college]);

echo json_encode(['data'=>$data]);
?>