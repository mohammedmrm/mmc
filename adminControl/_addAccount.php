<?php
session_start();
error_reporting(0);
header('Content-Type: application/json');
require_once("../script/_validation.php");
require_once("../script/dbconnection.php");
require_once("_crpt.php");
$name = $_POST['name'];
$college= $_POST['college'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$permission = $_POST['permission'];

$name_err = validNameA($name);
$email_err = validEmail($email);
$permission_err = validID($permission);
$college_err = validID($college);

if ($name_err == "" && $emaill_err== "" && $college_err =="" && $permission_err == ""){
   $password = hashPass($password);
   $sql = "INSERT INTO users (name, email, username,college_id,password,permission)
    VALUES ('".$name."', '".$email."', '".$username."','".$college."','".$password."','".$permission."')";
     if($con->exec($sql)){
        $success = "1";
     }else{
        $success = "0";
     }
}else{
 $success = "0";
}
echo json_encode(array(
'name'=>$name_err,
'email'=>$email_err,
'college'=>$college_err,
 'permission'=>$permission_err,
'data'=>$_POST,
'success'=>$success));
?>
