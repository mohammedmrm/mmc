<?php
session_start();
error_reporting(0);
header('Content-Type: application/json');
include_once('dbconnection.php');
include_once('../secure/_crpt.php');
include_once('../secure/keys.php');
$username = htmlentities(($_POST['username']));
$password = htmlentities(($_POST['password']));
$remember = htmlentities(($_POST['remember']));
if ($username != "" && $password != ""){
$query = "select * from users where username='".$username."' or email='".$username."'";
$sql= $con->prepare($query);
$sql->execute();
   $count = $sql->rowCount();
   if ($data = $sql->fetch()) {
        do {
            $password_hash = $data['password'];
            if(crypt($password,$password_hash) == $password_hash){
               if($remember == 0){
                $_SESSION['login']='1';
                $_SESSION['user_id']=$data['user_id'];
                $_SESSION['name']=$data['name'];
                $_SESSION['permission'] = $data['permission'];
                $error = "";
                }else{
                $_SESSION['login']='1';
                $_SESSION['user_id']=$data['user_id'];
                $_SESSION['permission'] = $data['permission'];
                $error = "";
                }
            }else{
                $error = "Incorrect password or username";
            }

        } while ($data = $sql->fetch());
    } else {
        $error = "Incorrect password or username";
    }
}else {
  $error = "Fill all field please";
}
echo json_encode(array('error'=>$error));
?>