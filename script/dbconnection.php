<?php
try{
 $con= new PDO("mysql:host=localhost;dbname=mc", "root", "M2016#C_mc");
 $con2= new PDO("mysql:host=localhost;dbname=mc", "root", "M2016#C_mc");
 $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 $con->exec("SET CHARACTER SET UTF8");
}catch(PDOException  $e ){
echo "Error: ".$e;
}
function getData($db,$query,$parm = []) {
  $stmt = $db->prepare($query);
  $stmt->execute($parm);
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $rows;
}
function setData($db,$query,$parm = []) {
  $stmt = $db->prepare($query);
  $stmt->execute($parm);
  $count = $stmt->rowCount();
  return $count;
}
