<?php
header('Content-Type: application/json');
require("dbconnection.php");
$college = $_POST['college'];
$a = $_POST['an'];
$e = $_POST['en'];
$a2 = preg_replace('#[ ]#i','%',$a);
$a2 = preg_replace('#[,]#i','%',$a);

$e2 = preg_replace('#[ ]#i','%',$e);
$e2 = preg_replace('#[,]#i','%',$e);

if(!empty($a) && !empty($e)){
$query = "select *,count(media.media_id) as vno from teachers
left join media on teachers.teacher_id = media.teacher_id
where
(media.college_id=?) and
((
   teacher_name_a like '%".$a2."%'
or teacher_name_e like '%".$e2."%'
or MATCH (teacher_name_e) AGAINST ('".$e."' IN Boolean MODE)
or MATCH (teacher_name_a) AGAINST ('".$a."' IN Boolean MODE)
)) group by media.teacher_id order by teacher_name_e";
}else if(!empty($a)){
$query = "select *,count(media.media_id) as vno from teachers
left join media on teachers.teacher_id = media.teacher_id
where (media.college_id=?) and
((teacher_name_a like '%".$a2."%'
or MATCH (teacher_name_a) AGAINST ('".$a."' IN Boolean MODE)
)) group by media.teacher_id order by teacher_name_e";
}else if(!empty($e)){
$query = "select *,count(media.media_id) as vno from teachers
left join media on teachers.teacher_id = media.teacher_id
where (media.college_id=?) and
(( teacher_name_e like '%".$e2."%'
or MATCH (teacher_name_e) AGAINST ('".$e."' IN Boolean MODE)
)) group by media.teacher_id order by teacher_name_e";
}else{
  $query = "select *,count(media.media_id) as vno from teachers
  left join media on teachers.teacher_id = media.teacher_id
  where (media.college_id=?) group by media.teacher_id order by teacher_name_e";
}
$data = getData($con,$query,[$college]);
 echo json_encode(['data'=>$data,'sent'=>$_POST]);
?>
