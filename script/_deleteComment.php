<?php
session_start();
error_reporting(0);
header('Content-Type: application/json');
include_once('dbconnection.php');
$comment_id=$_POST['comment_id'];
$query = "delete from comments where comment_id=? and session=?";

if(setData($con,$query,[$comment_id,$_SESSION['comment_session']]) == 1){
  $success = 1;
  $msg = "Deleted";
}else{
  $success = 0;
  $msg = "Unable to delete";
}
echo json_encode(["success"=>$success,"msg"=>$msg]);
?>