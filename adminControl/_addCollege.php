<?php
error_reporting(0);
header('Content-Type: application/json');
require("../script/_validation.php");
require("../script/dbconnection.php");
$collegeNameE = $_POST['collegeNameE'];
$collegeNameA = $_POST['collegeNameA'];
$collegeDesc = $_POST['collegeDesc'];

$cne = validNameE($collegeNameE);
$cna = validNameA($collegeNameA);
$cd = validDesc($collegeDesc);

if ($cne == "" && $cna == "" && $cd ==""){

   $sql = "INSERT INTO colleges (college_name_e, college_name_a, college_desc)
    VALUES ('".$collegeNameE."', '".$collegeNameA."', '".$collegeDesc."')";
     if($con->exec($sql)){
        $success = "1";
     }else{
        $success = "0";
     }
}else{
 $success = "0";
}

print_r(json_encode(array(
'collegeNameE'=>$cne,'collegeNameA'=>$cna,
'collegeDesc'=>$cd,'data'=>$_POST,
'success'=>$success)));
?>
