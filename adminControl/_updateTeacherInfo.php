<?php
header('Content-Type: application/json');
require("../script/_validation.php");
require("../script/dbconnection.php");
$teacherNameE = $_POST['teacherNameE'];
$teacherNameA = $_POST['teacherNameA'];
$email = $_POST['email'];
$teacher = $_POST['teacher'];
$tne = validNameE($teacherNameE);
$tna = validNameA($teacherNameA);
$e = validEmail($email);

if ($tne == "" && $tna == "" && $e ==""){

   $sql = "update teachers set
   teacher_name_e=?,teacher_name_a=?,email=? where teacher_id=?";
   if(setData($con,$sql,[$teacherNameE,$teacherNameA,$email,$teacher]) == 1){
    $success = "1";
   }else{
    $success = "2";
   }
}else{
 $success = "0";
}
echo(json_encode(array(
'teacherNameE'=>$tne,'teacherNameA'=>$tna,
'email'=>$e,
'success'=>$success)));
?>