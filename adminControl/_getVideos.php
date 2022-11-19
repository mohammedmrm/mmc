<?php
header('Content-Type: application/json');
include_once('dbconnection.php');
$set = $_POST['gname'];
$dir = $_POST['direction'];
$current = $_POST['current'];
$groups = array("health","eng","it","bsc","edu","law","art","others");
$dira = array("b","n");
if(in_array($set,$groups)){
  if($set == "health"){
    $query = "select count(media_id) As count from media where
     college_id=6 or
     college_id=7 or
     college_id=9 or
     college_id=28 or
     college_id=24 ";
  }else if($set == "eng"){
    $query = "select count(media_id) As count from media where
     college_id=8 or
     college_id=11 or
     college_id=25";
  }else if($set == "it"){
    $query = "select count(media_id) As count from media where
    college_id=10 ";
  }else if($set == "bsc"){
    $query = "select count(media_id) As count from media where
     college_id=27 or
     college_id=12 ";
  }else if($set == "edu"){
    $query = "select count(media_id) As count from media where
     college_id=16 or
     college_id=17 or
     college_id=20 or
     college_id=21 or
     college_id=22 ";
  }else if($set == "law"){
    $query = "select count(media_id) As count from media where
     college_id=13 or
     college_id=23";
  }else if($set == "art"){
    $query = "select count(media_id) As count from media where
     college_id=14 or
     college_id=15";
  }else if($set == "others"){
    $query = "select count(media_id) As count from media where
     college_id=26";
  }
}

$data2 = getData($con,$query);
$max = $data2['0']['count'];
if(in_array($dir,$dira)){
  if($dir == "b" && $current !=0){
    $start = $current - 4;
  }else if ($dir == "n" && ($current+4) < $max ){
    $start = $current + 4;
  }else {
    $start = 0;
  }
}else {
$start = 0;
}

if(in_array($set,$groups)){
  if($set == "health"){
    $query = "select * from media
    INNER JOIN teachers
    ON media.teacher_id=teachers.teacher_id
    where
     media.college_id=6 or
     media.college_id=7 or
     media.college_id=9 or
     media.college_id=24  order by  watch,  time DESC
    limit ".$start.",4";
  }else if($set == "eng"){
    $query = "select * from media
    INNER JOIN teachers
    ON media.teacher_id=teachers.teacher_id
     where
     media.college_id=8 or
     media.college_id=11 or
     media.college_id=25 order by  time DESC
     limit ".$start.",4";
  }else if($set == "it"){
    $query = "select * from media
    INNER JOIN teachers
    ON media.teacher_id=teachers.teacher_id
     where
    media.college_id=10  order by  time DESC
    limit ".$start.",4";
  }else if($set == "bsc"){
    $query = "select * from media
    INNER JOIN teachers
    ON media.teacher_id=teachers.teacher_id
     where
     media.college_id=27 or
     media.college_id=12  order by  time DESC
    limit ".$start.",4";
  }else if($set == "edu"){
    $query = "select * from media
    INNER JOIN teachers
    ON media.teacher_id=teachers.teacher_id
     where
     media.college_id=16 or
     media.college_id=17 or
     media.college_id=20 or
     media.college_id=21 or
     media.college_id=22   order by  time DESC
    limit ".$start.",4";
  }else if($set == "law"){
    $query = "select * from media
    INNER JOIN teachers
    ON media.teacher_id=teachers.teacher_id
     where
     media.college_id=13 or
     media.college_id=23  order by  time DESC
    limit ".$start.",4";
  }else if($set == "art"){
    $query = "select * from media
    INNER JOIN teachers
    ON media.teacher_id=teachers.teacher_id
     where
     media.college_id=14 or
     media.college_id=15  order by  time DESC
    limit ".$start.",4";
  }else if($set == "others"){
    $query = "select * from media
    INNER JOIN teachers
    ON media.teacher_id=teachers.teacher_id
     where
     media.college_id=26  order by  time DESC
    limit ".$start.",4";
  }
}
$data = getData($con,$query);
print_r(json_encode(array("data"=>$data,"current"=>$start,"max"=>$max))); 
?>