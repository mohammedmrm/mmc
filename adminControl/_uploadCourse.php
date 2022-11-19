<?php
session_start();
//error_reporting(0);
ini_set("upload_max_filesize","560M");
ini_set("max_execution_time","1050");
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
$valid_file_extensions = array("zip");
if(isset($_FILES['media']['tmp_name'])) {
    $media = count($_FILES['media']['name']);
    $realName = $_FILES['media']['name'];
    if ($media >= 2) {
        $file = "One file allowed";
    }else if ($_FILES['media']['size'] == 0){
       $file = "Upload archived course please";
    }else{
      $file_type = strtolower($_FILES['media']['type']);
      $file_extension = strtolower(substr($_FILES["media"]["name"], strrpos($_FILES["media"]["name"], '.') + 1));
         if ($_FILES["media"]["size"] >= 500000000){
                    $file = "Maximum media size 500MB your (".$_FILES["media"]["name"].") is too larg";
         } else if (in_array($file_extension, $valid_file_extensions)){

                if ($_FILES['media']['error'] > 0)
                {
                    $file = "Unexpected error occured, please try again later.";
                } else {
                    $file = "";
                }

         }else{
            $file = "Upload Kotobee Course in (Zip) format";
         }
    }
}else{
  $file = "Upload Kotobee Course in (Zip) format";
}
//----------------------
if($collegeID == "" && $teacherID == "" && $display == "" &&
    $title == "" && $desc == "" && $file == ""){
    $collegeID = ($_POST['colleges']);
    $teacherID = ($_POST['teachers']);
    $title = ($_POST['title']);
    $desc = ($_POST['desc']);
    $display = ($_POST['display']);


    $path = "../courses/".$collegeID."/".$teacherID;
    if (!file_exists($path)) {
     mkdir($path, 0700,True);
    }
    $outCourse = "../courses/".$collegeID."/".$teacherID.'/'.uniqid().".";
    $destination = $outCourse.$file_extension;
    move_uploaded_file($_FILES["media"]["tmp_name"], $destination);
   $sql = "INSERT INTO courses (title, coruses_desc, path,college_id,teacher_id,display)
    VALUES ('".$title."', '".$desc."', '".$destination."','".$collegeID."','".$teacherID."','".$display."')";
     if($con->exec($sql)){
        $success = "1";
        $last_id = $con->lastInsertId();

        $pathA = pathinfo(realpath($destination), PATHINFO_DIRNAME);
        $zipArchive = new ZipArchive();
        $result = $zipArchive->open($destination);
        if ($result === TRUE) {
            $zipArchive ->extractTo($pathA);
            $zipArchive ->close();
            $newName = uniqid();
            $newPath = "../courses/".$collegeID."/".$teacherID.'/'.$newName;
            $realName = str_replace(".zip", "",$realName);
            rename("../courses/".$collegeID."/".$teacherID.'/'.$realName,$newPath);
            $update = "update courses set path = ? where course_id = ? ";
            $result = setData($con,$update,[$newPath,$last_id]);
            unlink($destination);
        } else {
            $success = "01";
        }
     }else{
        $success = "02";
     }
}else {
     $success = "03";
}



echo (json_encode(array("success"=>$success,"collegeID"=>$collegeID,"display"=>$display,
"teacherID"=>$teacherID,"title"=>$title,"desc"=>$desc,"file"=>$file,"dataSent"=>$file_type,'fileinfo'=>$_FILES)))
?>