<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <title>Hello!</title>
</head>

<body>
<form id="form" action="test.php" method="post" enctype="multipart/form-data">
<input type="file" name="file" />
<input type="submit" name="submit"/>
</form>
<?php
if(isset($_POST['submit'])){
  $ffmpeg= "C:\\xampp\\htdocs\\mmc\\ffmpeg-latest-win64-static\\bin\\ffmpeg";
  $video = "C:\\xampp\\htdocs\\mmc\\media\\2\\1\\5887af41bd5fc.wmv";
  $size = "120x90";
  $imgFile = "C:\\xampp\\htdocs\\mmc\\snap\\3.jpg";
  $getFormSecond=5;
  $cmd = $ffmpeg." -i ".$video." -an -ss ".$getFormSecond." -s ".$size." ".$imgFile;
  exec($cmd);
}
?>

</body>

</html>
