<?php
header('Content-Type: application/json');
include_once('dbconnection.php');
$video = $_POST['videoID'];
if(preg_match('/^[0-9]+$/',$video) ){
$query = "select * from media inner join teachers
on media.teacher_id = teachers.teacher_id
where media_id=".$video;
}else{
  $success = "0";
}
$data = getData($con,$query);
if(count($data)==1){
 $success = "1";
}
print_r(json_encode(array("data"=>$data,"success"=>$success)));
?>