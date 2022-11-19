<?php
function validNameA($str){
  if(empty($str)){
  $err = "Field required";
  }else if(!preg_match("/^[\p{Arabic}\- .ـ]{3,50}+$/u",$str)) {
  $err = "Only letters acceptable! Between (3-50) in Arabic";
  }else {
  $err = "";
  }
  return $err;
}
function validNameE($str){
  if(empty($str)){
  $err = "Field required";
  }else if(!preg_match("/^[a-zA-Z\- .ـ]{3,50}+$/u",$str)) {
  $err = "Only letters acceptable! Between (3-50) in English";
  }else {
  $err = "";
  }
  return $err;
}
function validTitle($str){
  if(empty($str)){
  $err = "Field required";
  }else if(!preg_match("/^[\p{Arabic}a-zA-Z0-9\- .ـ]{3,50}+$/u",$str)) {
  $err = "Only letters acceptable! Between (3-50)";
  }else {
  $err = "";
  }
  return $err;
}
function validDesc($str){
  if(empty($str)){
  $err = "";
  }else if(!preg_match("/^[\p{Arabic}a-zA-Z0-9\- .ـ]{3,250}+$/u",$str)) {
  $err = "Only letters acceptable! Between (3-250)";
  }else {
  $err = "";
  }
  return $err;
}
function validEmail($str){
  if(empty($str)){
    $err = "";
  }else if(!filter_var($str, FILTER_VALIDATE_EMAIL)){
    $err = "Invalid email";
  }else {
    $err = "";
  }
  return $err;
}

function validPhone($str){
  if(empty($str)){
    $err = "Field required";
  }else if(preg_match('/^\+?[0-9]{4,20}$/',$str)){
    $err = "Invalid Phone Number";
  }else {
    $err = "";
  }
  return $err;
}

function validPassword($password){
  if(empty($password)){
  $err_password = "Field required";
  }else if(!preg_match('/(?=.*\d)/',$password)){
    $err_password="Password must contain at least one digit";
  }else if(!preg_match('/(?=.*[a-z])/',$password)){
     $err_password = "Password must contain lower case letter";
  }else if(!preg_match('/(?=.*[A-Z])/',$password)){
     $err_password = "Password must contain upper case letter";
  }else if(preg_match('/(?=.*[%;`])/',$password)){
    $err_password ='Password contain unacceptable symbol (`;%)';
  }else {
    $err_password="";
  }
  return $err_password;
}
function validUsername($str){
  if(empty($str)){
    $err_username = "Field required";
  }else if(!preg_match('/^[a-zA-Z0-9_]+$/',$str)){
    $err_username="Username must contain letters,numbers and (_) only";
  }else {
   // check avaliblity code

  $err_username="";
  }
  return $err_username;
}
function validID($id){
  if(empty($id)){
  $err_id = "Field required";
  }else if(preg_match('/^[0-9]{1,11}$/',$id)){
  $err_id="";
  }else {
  $err_id="Invalid input";
  }
  return $err_id;
}
?>