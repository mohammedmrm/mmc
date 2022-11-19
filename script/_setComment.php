<?php
session_start();
header('Content-Type: application/json');
include_once('dbconnection.php');
$media_id=$_POST['media_id'];
$commenter=$_POST['commenter'];
$comment=$_POST['comment'];

$success = 0;

if(empty($commenter) || empty($comment)){
 $msg = "جميع الحقول مطلوبة";
}else if(!preg_match("/^[\p{Arabic}a-zA-Z0-9\- .ـ&]{3,250}+$/u",$commenter) || !preg_match("/^[\p{Arabic}a-zA-Z0-9\- .ـ&]{3,250}+$/u",$comment)){
 $msg = "يمكن ادخال حروف او ارقام فقط";
}else if (empty($media_id)){
 $msg = "حدث خطأ حاول لاحقاً";
}else {
  $msg = "";
}

if($msg == ""){
  $_SESSION['comment_session'] = uniqid();
  $query = "insert into comments (media_id,commenter,comment,session) values (?,?,?,?)";
  $result = setData($con,$query,[$media_id,$commenter,$comment,$_SESSION['comment_session']]);
  if($result){
    $success = 1;
  }else{
    $success = 0;
    $msg = "Unknown error";
  }
}

echo json_encode(array('success'=>$success,"msg"=>$msg));
?>

