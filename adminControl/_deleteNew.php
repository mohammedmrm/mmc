<?php
header('Content-Type: application/json');
session_start(); 
error_reporting(0);
include_once('../script/dbconnection.php');
$id = ceil($_POST['id']);
$query = "select * from news where news_id=?";
$result = getData($con,$query,[$id]);
$path = $result[0]['file'];
$logo = $result[0]['logo'];
$result = 0;
unlink('../news/logo/'.$logo);
unlink('../news/docs/'.$path);
if($id > 0){
  $query = "delete from news where news_id =? and user_id=?";
  $result = setData($con,$query,[$id,$_SESSION['user_id']]);
  if($result == 1){
     $msg = "";
  }else{
    $msg = "خطأ!";
  }
}else{
   $msg = "فشل";
}
echo json_encode(['success'=>$result,'msg'=>$msg]);
?>