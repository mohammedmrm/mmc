<?php
header('Content-Type: application/json');
include_once('../script/dbconnection.php');
$teacher = $_POST['teacher'];
$query = "select * from media where teacher_id=?";
$data= getData($con,$query,[$teacher]);

echo json_encode(['data'=>$data]);
?>