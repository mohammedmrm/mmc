<?php
header('Content-Type: application/json');
include_once('dbconnection.php');
$dir = $_POST['direction'];
$video = $_POST['videoID'];
$dira = array("b","t");
$current = $_POST['current'];
$query = "select count(media_id) as count from media INNER JOIN teachers on
    teachers.teacher_id = media.teacher_id WHERE  media.media_id <> ".$video."
    and (teachers.teacher_id in
    (SELECT teacher_id FROM media WHERE media.media_id =".$video."))";

$data = getData($con,$query);
$max = $data['0']['count'];
if(in_array($dir,$dira)){
  if($dir == "t" && $current !=0){
    $start = $current - 3;
  }else if ($dir == "b" && ($current+3) < $max ){
    $start = $current + 3;
  }else {
    $start = 0;
  }
}else{
$start = 0;
}
$query = "select * from media INNER JOIN teachers on
    teachers.teacher_id = media.teacher_id WHERE  media.media_id <> ".$video."
    and (teachers.teacher_id in
    (SELECT teacher_id FROM media WHERE media.media_id =".$video."))
    limit ".$start.",3";
$data = getData($con,$query);
print_r(json_encode(array("data"=>$data,"current"=>$start)));
?>