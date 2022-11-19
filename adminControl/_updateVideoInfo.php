<?php
header('Content-Type: application/json');
include_once('../script/dbconnection.php');
function validTitle($str){
  if(empty($str)){
  $err = "Field required";
  }else if(!preg_match("/^[\p{Arabic}a-zA-Z0-9\- .ـ&-]{3,150}+$/u",$str)) {
  $err = "Only letters acceptable! Between (3-150)";
  }else {
  $err = "";
  }
  return $err;
}
function validDesc($str){
  if(empty($str)){
  $err = "";
  }else if(!preg_match("/^[\p{Arabic}a-zA-Z0-9\- .ـ&-]{3,250}+$/u",$str)) {
  $err = "Only letters acceptable! Between (3-250)";
  }else {
  $err = "";
  }
  return $err;
}
$result = 0;
$media = ceil($_POST['media']);
$titleErr = validTitle($_POST['title']);
$title = $_POST['title'];
$descErr = validDesc($_POST['desc']);
$desc=$_POST['desc'];

if($titleErr == "" && $descErr == ""){
  $query = "update media set title=?, media_desc=? where media_id=?";
  $result = setData($con,$query,[$_POST['title'],$_POST['desc'],$media]);
}
echo json_encode(['title'=>$titleErr,'desc'=>$descErr,'success'=>$result,"sent"=>$_POST]);
?>
