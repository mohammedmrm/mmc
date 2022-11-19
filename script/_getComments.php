<?php
header('Content-Type: application/json');
include_once('dbconnection.php');
$media_id=$_POST['id'];
$query = "select *,DATE_FORMAT(time, '%W %M %Y') as time2 from comments where media_id=? order by time";
$result = getData($con,$query,[$media_id]);
if($result){
  $success = 1;
}else{
  $success = 0;
}
echo json_encode(array('success'=>$success,"data"=>$result));
?>

