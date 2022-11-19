<?php
header('Content-Type: application/json');
require("dbconnection.php");
$q = trim($_POST['keyword']);
$c = $_POST['college'];
$p = $_POST['page'];
$q2 = preg_replace('#[ ]#i','%',$q);
$q2 = preg_replace('#[_]#i','%',$q);
$q2 = preg_replace('#[,]#i','%',$q);
$q2 = trim($q);
$per_page=24;
if(preg_match('/^[0-9]+$/',$c) && $c !=0){
    $query = "select count(media_id) as count
             from media inner join teachers on teachers.teacher_id = media.teacher_id
             where (title like '%".$q2."%'
             or media_desc like '%".$q2."%' or MATCH (title,media_desc)
             AGAINST ('".$q."' IN Boolean MODE)) and media.college_id=".$c." ";

    $data = getData($con,$query);
    $max = $data['0']['count'];

    if(preg_match('/^[0-9]+$/',$p) && $p > 1){
      $start = ($p-1) * $per_page;
    }else {
      $p = 1;
      $start = 0;
    }
    $last_page = ceil($max/$per_page);

    $query = "select *,MATCH (title,media_desc)
             AGAINST ('".$q."' IN natural language MODE) as score
             from media inner join teachers on teachers.teacher_id = media.teacher_id
             where (title like '%".$q2."%'
             or media_desc like '%".$q2."%' or MATCH (title,media_desc)
             AGAINST ('".$q."' IN Boolean MODE)) and media.college_id=".$c." order by score DESC limit ".$start.",".$per_page;

    $data = getData($con,$query);
}else{
    $query = "select count(media_id) as count
             from media inner join teachers on teachers.teacher_id = media.teacher_id
             where title like '%".$q2."%'
             or media_desc like '%".$q2."%' or MATCH (title,media_desc)
             AGAINST ('".$q."' IN Boolean MODE)";

    $data = getData($con,$query);
    $max = $data['0']['count'];

    if(preg_match('/^[0-9]+$/',$p) && $p > 1){
      $start = ($p-1) * $per_page;
    }else {
      $p = 1;
      $start = 0;
    }
    $last_page = ceil($max/$per_page);

    $query = "select *,MATCH (title,media_desc)
             AGAINST ('".$q."' IN natural language MODE) as score
             from media inner join teachers on teachers.teacher_id = media.teacher_id
             where title like '%".$q2."%'
             or media_desc like '%".$q2."%' or MATCH (title,media_desc)
             AGAINST ('".$q."' IN Boolean MODE) order by score DESC limit ".$start.",".$per_page;

    $data = getData($con,$query);
}
if($p > 3){
  $start = $p - 3;
}else{
  $start = 1;
}
if(($last_page-$p) >= 3){
  $end = $p + 3;
}else{
  $end = $last_page;
}
print_r(json_encode(array("data"=>$data,"active"=>$p,"page_num"=>$last_page,"cat"=>$c,
'start'=>$start,"end"=>$end)));
?>