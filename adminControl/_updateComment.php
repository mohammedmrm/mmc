<?php
session_start();
header('Content-Type: application/json');
include_once('dbconnection.php');
$comment_id=$_POST['comment_id'];
$comment=$_POST['comment'];
$success = 0;
if(empty($comment)){
  $msg="الحقل مطلوب";
}else if(!preg_match("/^[\p{Arabic}a-zA-Z0-9\- .ـ&]{3,250}+$/u",$comment)){
 $msg = "يمكن ادخال حروف او ارقام فقط";
}else{
  $msg="";
}
if($msg==""){
  $query = "update comments set comment=? where comment_id=? and session=?";
  $result = setData($con,$query,[$comment,$comment_id,$_SESSION['comment_session']]);
  if($result == 1){
    $success = 1;
    $msg = "Updated";
  }else{
    $success = 0;
    $msg = "Unable to Update";
  }
}
echo json_encode(array('success'=>$success,"msg"=>$msg));
?>