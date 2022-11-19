<?php
session_start();
error_reporting(0);
require("_loginCheck.php");
header('Content-Type: application/json');
include_once('dbconnection.php');
$update = "";
function validNameA($str){
  if(empty($str)){
  $err = "Field required";
  }else if(!preg_match("/^[\p{Arabic}\- .ـ]{3,50}+$/u",$str)) {
  $err = "Only letters acceptable! Between (3-50) in Arabic";
  }else {
  $err = "";
  }
  return $err;
}
function validNameE($str){
  if(empty($str)){
  $err = "Field required";
  }else if(!preg_match("/^[a-zA-Z\- .ـ]{3,50}+$/u",$str)) {
  $err = "Only letters acceptable! Between (3-50) in English";
  }else {
  $err = "";
  }
  return $err;
}
function validTitle($str){
  if(empty($str)){
  $err = "Field required";
  }else if(!preg_match("/^[\p{Arabic}a-zA-Z0-9\- .ـ&-,]{3,150}+$/u",$str)) {
  $err = "Only letters acceptable! Between (3-150)";
  }else {
  $err = "";
  }
  return $err;
}
function validDesc($str){
  if(empty($str)){
  $err = "";
  }else if(!preg_match("/^[\p{Arabic}a-zA-Z0-9\- .ـ&-,)(]{3,250}+$/u",$str)) {
  $err = "Only letters acceptable! Between (3-250)";
  }else {
  $err = "";
  }
  return $err;
}
function validID($id){
  if(empty($id)){
  $err_id = "Field required";
  }else if(preg_match('/^[0-9]{1,11}$/',$id)){
  $err_id="";
  }else {
  $err_id="Invalid input";
  }
  return $err_id;
}
$collegeID = validID($_POST['colleges']);
$teacherID = validID($_POST['teachers']);
$title = validTitle($_POST['title']);
$desc = validDesc($_POST['desc']);
if($_POST['display'] == 1 || $_POST['display'] == 2 || $_POST['display'] == 3){
  $display = "";
}else{
  $display = "Invaild";
}
//validate media file
$valid_file_extensions = array("jpg", "jpge", "png", "gif");
if(isset($_FILES['snap']['tmp_name'])) {
    $media = count($_FILES['snap']['name']);
    if ($media >= 2) {
        $file = "One file allowed";
    }else if ($_FILES['snap']['size'] == 0){
       $file = "Upload video please";
    }else{
      $file_type = strtolower($_FILES['snap']['type']);
      $file_extension = strtolower(substr($_FILES["snap"]["name"], strrpos($_FILES["snap"]["name"], '.') + 1));
         if ($_FILES["snap"]["size"] >= 300000000){
                    $file = "Maximum media size 300MB your (".$_FILES["snap"]["name"].") is too larg";
         } else if (in_array($file_extension, $valid_file_extensions)){
                   $file = "";
         } else {
                    $file = "Unacceptable file (".$_FILES["media"]["name"].")";
         }
    }
}else{
  $file = "Upload snap";
}
//----------------------
if($collegeID == "" && $teacherID == "" && $display == "" &&
    $title == "" && $desc == "" && $file == ""){
    $collegeID = ($_POST['colleges']);
    $teacherID = ($_POST['teachers']);
    $title = ($_POST['title']);
    $desc = ($_POST['desc']);
    $display = ($_POST['display']);
    $url = ($_POST['url']);


    $path = "../snap/".$collegeID."/".$teacherID;
    if (!file_exists($path)) {
    mkdir($path, 0700,True);
    }
    $outVideo = "../snap/".$collegeID."/".$teacherID.'/'.uniqid().".";
    $destination = $outVideo.$file_extension;
    move_uploaded_file($_FILES["snap"]["tmp_name"], $destination);
   $sql = "INSERT INTO url (url,title, url_desc, snap_path,college_id,teacher_id,display)
    VALUES ('".$url."','".$title."', '".$desc."', '".$destination."','".$collegeID."','".$teacherID."','".$display."')";
     if($con->exec($sql)){
        $success = "1";
     }else{
        $success = "0";
     }
}else {
     $success = "0";
}



echo (json_encode(array("success"=>$success,"collegeID"=>$collegeID,"display"=>$display,
"teacherID"=>$teacherID,"title"=>$title,"desc"=>$desc,"file"=>$file,"dataSent"=>$file_type)))
?>