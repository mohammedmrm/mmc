<?php
session_start();
header('Content-Type: application/json');
require("dbconnection.php");
try{
  $query = "select college_id,college_name_e,college_name_a from colleges";
  $data = getData($con,$query);
  $success="1";
} catch(PDOException $ex) {
   $data=["error"=>$ex];
   $success="0";
}
print_r(json_encode(array("success"=>$success,"data"=>$data)));
?>