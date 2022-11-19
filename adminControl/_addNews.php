<?php
session_start();
error_reporting(0);
$url="";
ini_set("upload_max_filesize","30M");
require("../script/_loginCheck.php");
header('Content-Type: application/json');
include_once('../script/dbconnection.php');
$success = 0;
$valid_file_extensions = array("jpg", "jpge", "png", "gif");
if(isset($_FILES['newsLogo']['tmp_name'])) {
    $media = count($_FILES['newsLogo']['name']);
    if ($media >= 2) {
        $file = "One file allowed";
    }else if ($_FILES['newsLogo']['size'] == 0){
       $file = "Upload Image please";
    }else{
      $file_type = strtolower($_FILES['newsLogo']['type']);
      $file_extension = strtolower(substr($_FILES["newsLogo"]["name"], strrpos($_FILES["newsLogo"]["name"], '.') + 1));
         if ($_FILES["newsLogo"]["size"] >= 30000000){
                    $file = "Maximum image size 30MB your (".$_FILES["newsLogo"]["name"].") is too larg";
         } else if (in_array($file_extension, $valid_file_extensions)){

         if ($_FILES['newsLogo']['error'] > 0)
                {
                    $file = "Unexpected error occured, please try again later.";
                } else {
                        $file = "";
                }
         } else {
                    $file = "Unacceptable file (".$_FILES["newsLogo"]["name"].")";
         }
    }
}else{
  $file = "Upload an image";
}
function validTitle($str){
  if(empty($str)){
  $err = "Field required";
  }else if(!preg_match("/^[\p{Arabic}a-zA-Z0-9\- .ـ]{3,50}+$/u",$str)) {
  $err = "Only letters acceptable! Between (3-50)";
  }else {
  $err = "";
  }
  return $err;
}
$success=0;
$title = validTitle($_POST['newsTitle']);
if($file == "" && $title == "" ){

  $path = "../news/logo/";
  if (!file_exists($path)) {
  mkdir($path, 0700,True);
  }
  $uniqid = uniqid();
  $destination = $path.$uniqid.".".$file_extension;
  move_uploaded_file($_FILES["newsLogo"]["tmp_name"], $destination);
  $logo = $uniqid.".".$file_extension;


  $newsPage = $uniqid.".php";
  $news = fopen("../news/docs/".$newsPage, "w");
  $txt = $_POST['textarea'];
  fwrite($news, $txt);
  fclose($news);

  $sql= "insert into news (file,logo,user_id,title) values (?,?,?,?)";
  setData($con,$sql,[$newsPage,$logo,$_SESSION['user_id'],$_POST['newsTitle']]);
  $success =1;
}

print_r(json_encode(['success'=>$success,"file"=>$file,'title'=>$title,"url"=>$url,"content"=>$_POST]));
?>