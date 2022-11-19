<?php
header('Content-Type: application/json');
include_once('../script/dbconnection.php');
$media = ceil($_POST['media']);
$query = "select * from media where media_id=?";
$result = getData($con,$query,[$media]);
$path = $result[0]['path'];
$snap = $result[0]['snap_path'];
unlink($snap);
$result = 0;
if(unlink($path)){
  $query = "delete from media where media_id =? LIMIT 1 ";
  $result = setData($con,$query,[$media]);
}
echo json_encode(['success'=>$result]);
?>