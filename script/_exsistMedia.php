<?php
header('Content-Type: application/json');
require("dbconnection.php");
$college = $_POST['college'];
$teacher = $_POST['teacher'];
$title = $_POST['title'];
$desc = $_POST['desc'];
$t2 = preg_replace('#[ ]#i','%',$title);
$t2 = preg_replace('#[_]#i','%',$title);
$t2 = preg_replace('#[,]#i','%',$title);

$d2 = preg_replace('#[ ]#i','%',$desc);
$d2 = preg_replace('#[_]#i','%',$desc);
$d2 = preg_replace('#[,]#i','%',$desc);

if(!empty($title) && !empty($desc)){
$query = "select * from media where (college_id=? and teacher_id=?) and
((title like '%".$t2."%' or media_desc like '%".$d2."%' or MATCH (title,media_desc) AGAINST ('".$title." ".$desc."' IN Boolean MODE)))";
}else if(!empty($title)){
$query = "select * from media where (college_id=? and teacher_id=?) and
((title like '%".$t2."%' or MATCH (title,media_desc) AGAINST ('".$title."' IN Boolean MODE)))";
}else if(!empty($desc)){
$query = "select * from media where (college_id=? and teacher_id=?) and
((media_desc like '%".$d2."%' or MATCH (title,media_desc) AGAINST ('".$desc."' IN Boolean MODE)))";
}else{
  $query = "select * from media where (college_id=? and teacher_id=?)";
}
$data = getData($con,$query,[$college,$teacher]);
 echo json_encode(['data'=>$data,'sent'=>$_POST]);
?>
