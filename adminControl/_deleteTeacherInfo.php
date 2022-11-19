<?php
header('Content-Type: application/json');
include_once('../script/dbconnection.php');
$teacher = ceil($_POST['teacher']);
$query = "select count(*) as num from media where teacher_id=?";
$data = getData($con,$query,[$teacher]);
$result = $data[0]['num'];
if($result == 0){
$query = "delete from teachers where teacher_id =? LIMIT 1 ";
$result = setData($con,$query,[$teacher]);
}else{
  $result = 2;
}
echo json_encode(['success'=>$result]);
?>