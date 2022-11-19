<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <title>Coruses</title>
<meta name="keywords" content="Administrationand Economics, ????, ??????? ????????, e-learning, Multimedia, Babylon University">
<meta name="author" content="Mohammed Ridha Mohammed">
<meta name="HandheldFriendly" content="True" />
<meta name="MobileOptimized" content="320" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="msapplication-TileColor" content="#222222" />
<meta content="text/html; charset=UTF-8" http-equiv="Content-Type" />
<meta property="og:site_name" content="University of Babylon" />
<meta property="og:type" content="university" />
<meta property="og:title" content="University of Babylon" />
<meta property="og:url" content="http://www.uobabylon.edu.iq/" />
<meta name="majestic-site-verification" content="MJ12_09cc9d5c-cd48-4b1f-8d17-b22564a80f78" />
<meta content="University of Babylon is devoted to excellence in teaching, learning, and research, University of Babylon is made up of 19 Faculty of academy." name="description" /><link rel="shortcut icon" href="http://www.uobabylon.edu.iq/nt/images/babylon.ico" /><meta name="keywords" content="University of Babylon, College, Education, Innovation, Teaching, Learning" />
<meta content="???? ????? ???? ???????????" name="copyright" />
  <style type="text/css">
.body {
  background-color: #222222;
  //min-height: 100px !important;
}
.coruses a{
   width:100%;
   display: block;
   height:80px;
   color:#EEEEEE;
   padding-top:10px;
   font-size: 22px;
   font-weight:bold;
   border-bottom: #6600FF 2px solid;

  }
 .coruses {
   height: 200px;
   background-color: #666666;
   background-size: contain;
   background-position: center;
   background-repeat: no-repeat;

   text-align: center;
   margin: 2px;
 }
 .desc {
   padding: 10px;
   font-size: 20px;
   color: #EEEEEE;
 }

  .title {
    color: #FFCC33;
    font-size:18px;
    padding:0px 10px;
    display: block;
    height: 25px;
    overflow: hidden;
  }
  .teacher {
    display: block;
    height: 20px;
    font-size: 16px;
    font-weight: 700;
    color: #fff;
    position: relative;
    text-shadow: 5px 5px 3px  #000000;
    overflow: hidden;
  }
  </style>
</head>

<body>

<?php
require("header.php");
//$id=$_GET['id'];
$perpage=24;
if(isset($_GET['page'])){
  if(!empty($_GET['page'])){
    $start =  $perpage*($_GET['page']-1);
  }else{
    $start = 0;
  }
}else{
    $start = 0;
}
?>
<div class="container">
<div class="col-md-12 body" id="body">
<?php
require("script/dbconnection.php");
$sql = "select count(*) as count from url
    INNER JOIN teachers
    ON url.teacher_id=teachers.teacher_id"
    /*where
    url.college_id=?*/;
//$coun = getData($con,$sql,[$id]);
$coun = getData($con,$sql);
$count = $coun[0]['count'];
$pages = ceil($count / $perpage);
$query ="select * from url
    INNER JOIN teachers
    ON url.teacher_id=teachers.teacher_id
     limit ".$start.",".$perpage;

//$data = getData($con,$query,[$id]);
$data = getData($con,$query);

foreach($data as $row){
echo '<div class="col-sm-3 coruses" style="background-image: url(\'mmc/'.$row['snap_path'].'\')">
      <a href="'.$row['url'].'" target="_blank">'.$row['title'].'</a>
      <div class="col-sm-12 desc">'.$row['url_desc'].'</div>
      </div>';
}
?>
</div>
  <div> <ul class="pagination">


   <?php
    for ($x = 1; $x <= $pages; $x++) {
    //echo "<li><a href='".$_SERVER['PHP_SELF']."?id=".$id."&page=".$x."'>".$x."</a></li>  ";
    echo "<li><a href='".$_SERVER['PHP_SELF']."?"."&page=".$x."'>".$x."</a></li>  ";
    }
   ?>
   </ul>
  </div>
</div>
<?php
require("footer.php");
?>
</body>

</html>

