<?php
session_start();
error_reporting(0);
ini_set("upload_max_filesize","500M");
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
$valid_file_extensions = array("mp4", "wmv", "mov", "flv","avi","ogv");
if(isset($_FILES['media']['tmp_name'])) {
    $media = count($_FILES['media']['name']);
    if ($media >= 2) {
        $file = "One file allowed";
    }else if ($_FILES['media']['size'] == 0){
       $file = "Upload video please";
    }else{
      $file_type = strtolower($_FILES['media']['type']);
      $file_extension = strtolower(substr($_FILES["media"]["name"], strrpos($_FILES["media"]["name"], '.') + 1));
         if ($_FILES["media"]["size"] >= 524000000){
                    $file = "Maximum media size 500MB your (".$_FILES["media"]["name"].") is too larg";
         } else if (in_array($file_extension, $valid_file_extensions)){
            if (( ($file_type == "video/x-ms-wmv") ||($file_type == "video/avi") ||
                  ($file_type == "video/quicktime") || ($file_type == "video/x-ms-flv") ||
                  ($file_type == "video/x-ms-webm") || ($file_type == "video/mp4") ||
                  ($file_type == "video/x-ms-ogv") || ($file_type == "application/octet-stream")))
            {
                if ($_FILES['media']['error'] > 0)
                {
                    $file = "Unexpected error occured, please try again later.";
                } else {
                        $file = "";
                    }
            }else{
                $file = "Upload video!";
            }
         } else {
                    $file = "Unacceptable file (".$_FILES["media"]["name"].")";
         }
    }
}else{
  $file = "Upload video";
}
//----------------------
if($collegeID == "" && $teacherID == "" && $display == "" &&
    $title == "" && $desc == "" && $file == ""){
    $collegeID = ($_POST['colleges']);
    $teacherID = ($_POST['teachers']);
    $title = ($_POST['title']);
    $desc = ($_POST['desc']);
    $display = ($_POST['display']);


    $path = "../media/".$collegeID."/".$teacherID;
    if (!file_exists($path)) {
    mkdir($path, 0700,True);
    }
    $outVideo = "../media/".$collegeID."/".$teacherID.'/'.uniqid().".";
    $destination = $outVideo.$file_extension;
    move_uploaded_file($_FILES["media"]["tmp_name"], $destination);
   $sql = "INSERT INTO media (title, media_desc, path,college_id,teacher_id,display)
    VALUES ('".$title."', '".$desc."', '".$destination."','".$collegeID."','".$teacherID."','".$display."')";
     if($con->exec($sql)){
        $success = "1";
        $last_id = $con->lastInsertId();


          $ffmpeg= "C:\\inetpub\\wwwroot\\mmc\\mmc\\ffmpeg-latest-win64-static\\bin\\ffmpeg";

           //prepare video path
          $destination = str_replace("/","\\",$destination);
          $destination = str_replace("..","",$destination);
          $video = "C:\\inetpub\\wwwroot\\mmc\\mmc\\".$destination;

          $size = "500x280";
          $id = (string) uniqid();
          $imgFile = "C:\\inetpub\\wwwroot\\mmc\\mmc\\snap\\".$id.".jpg";
          $getFormSecond=5;
          $cmd = $ffmpeg." -i ".$video." -an -ss ".$getFormSecond." -s ".$size." ".$imgFile;
          $WMVtoMP4 = $ffmpeg." -i ".$video." -c:v libx264 -crf 23 -c:a aac -strict -2 -q:a 100 ".$outVideo."mp4";
          exec($cmd);
          if($file_extension == "wmv"){
          exec($WMVtoMP4);
          $path = "snap/".$id.".jpg";

          //update
          $update = "update media set snap_path=?
          , path = ? where media_id=?";
          $result = setData($con,$update,[$path,$outVideo.'mp4',$last_id]);
          unlink($video);
          }else{
          $path = "snap/".$id.".jpg";

          //update
          $update = "update media set snap_path='".$path."' where media_id=".$last_id;
          $stmt = $con->prepare($update);
          $stmt->execute();
          }
     }else{
        $success = "0";
     }
}else {
     $success = "0";
}



echo (json_encode(array("success"=>$success,"collegeID"=>$collegeID,"display"=>$display,
"teacherID"=>$teacherID,"title"=>$title,"desc"=>$desc,"file"=>$file,"dataSent"=>$file_type)))
?>