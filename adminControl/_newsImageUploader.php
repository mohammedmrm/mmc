<?php
session_start();
//error_reporting(0);
ini_set("upload_max_filesize","30M");
require("../script/_loginCheck.php");
header('Content-Type: application/json');
include_once('../script/dbconnection.php');
$success = 0;
$valid_file_extensions = array("jpg", "jpge", "png", "gif");
if(isset($_FILES['img']['tmp_name'])) {
    $media = count($_FILES['img']['name']);
    if ($media >= 2) {
        $file = "One file allowed";
    }else if ($_FILES['img']['size'] == 0){
       $file = "Upload Image please";
    }else{
      $file_type = strtolower($_FILES['img']['type']);
      $file_extension = strtolower(substr($_FILES["img"]["name"], strrpos($_FILES["img"]["name"], '.') + 1));
         if ($_FILES["img"]["size"] >= 30000000){
                    $file = "Maximum image size 30MB your (".$_FILES["img"]["name"].") is too larg";
         } else if (in_array($file_extension, $valid_file_extensions)){

         if ($_FILES['img']['error'] > 0)
                {
                    $file = "Unexpected error occured, please try again later.";
                } else {
                        $file = "";
                }
         } else {
                    $file = "Unacceptable file (".$_FILES["img"]["name"].")";
         }
    }
}else{
  $file = "Upload an image";
}



if($file == ""){
    $path = "../news/images/";
    if (!file_exists($path)) {
    mkdir($path, 0700,True);
    }
    $uniqid=uniqid();
    $destination = $path.$uniqid.".".$file_extension;
    move_uploaded_file($_FILES["img"]["tmp_name"], $destination);
    $sql="insert into newsimages (path) values(?)";
    setData($con,$sql,[$uniqid.".".$file_extension]);
    $success =1;
    $url = "http://".$_SERVER['HTTP_HOST']."/mmc/news/images/".$uniqid.".".$file_extension;
}

print_r(json_encode(['success'=>$success,"error"=>$file,"url"=>$url]));
?>