<?php
header('Content-Type: application/json');
include_once('dbconnection.php');
$comment_id=$_POST['comment_id'];
$query = "select * from comments where comment_id=?";
$result = getData($con,$query,[$comment_id]);
if($result){
  $success = 1;
}else{
  $success = 0;
}
echo json_encode(array('success'=>$success,"data"=>$result));
?>
