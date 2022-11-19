<?php
//session_start();
header('Content-Type: application/json');
require("dbconnection.php");
$collegeID = $_POST['collegeID'];
$data=[];
if(empty($collegeID)){
    $err_id = "Field required";
}else if(preg_match('/^[0-9]{1,11}$/',$collegeID)){
    $err_id="";
}else {
    $err_id="Invalid input";
}
if($err_id == ""){
  try{
  $query = "select * from teachers where college_id=?";
  $data = getData($con,$query,[$collegeID]);
  $success="1";
  } catch(PDOException $ex) {
   $data=["error"=>$ex];
   $success ="0";
  }
}else{
  $success ="0";
}
print_r(json_encode(array("success"=>$success,"data"=>$data,"dataSent"=>$_POST)));
?>