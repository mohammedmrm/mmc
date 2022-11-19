<?php
//error_reporting(0);
header('Content-Type: application/json');
require("../script/_validation.php");
require("../script/dbconnection.php");
$teacherNameE = $_POST['teacherNameE'];
$teacherNameA = $_POST['teacherNameA'];
$email = $_POST['email'];
$collegeID = $_POST['college'];

$tne = validNameE($teacherNameE);
$tna = validNameA($teacherNameA);
$e = validEmail($email);
$ci = validID($collegeID);

if ($tne == "" && $tna == "" && $e =="" && $ci == ""){

   $sql = "INSERT INTO teachers (teacher_name_e, teacher_name_a, email,college_id)
    VALUES ('".$teacherNameE."', '".$teacherNameA."', '".$email."','".$collegeID."')";
     if($con->exec($sql)){
        $success = "1";
     }else{
        $success = "0";
     }
}else{
 $success = "0";
}
print_r(json_encode(array(
'teacherNameE'=>$tne,'teacherNameA'=>$tna,
'email'=>$e,'CollegeID'=>$ci,'data'=>$_POST,
'success'=>$success)));
?>
