<?php
error_reporting(0);
session_start();
require("script/_loginCheck.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
 <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>admin Controls</title>
</head>

<body>

<?php require("header.php");?>
<div class="row">
<div class="container">
    <div class="col-sm-12">
       <hr class="colorgraph"/>
    </div>
    <div class="col-sm-12">
        <ul class="nav nav-tabs" id="admin-list">

         <?php

          if($_SESSION['permission'] ==  1){
            $a1 = "active";
            $a2 = "";
          }else{
            $a2 = "active";
            $a1 = "";
          }
          if($_SESSION['permission'] ==  1){
          ?>
          <li class="<?php echo $a1; ?>"><a href="adminControl/addCollege.php">اضافه كلية</a></li>
          <li><a href="adminControl/addTeacher.php">اضافة تدريسي</a></li>
          <li><a href="adminControl/editMedia.php">تعديل فديو</a></li>
          <li><a href="adminControl/editTeacher.php">تعديل بيانت تدريسي</a></li>
          <li><a href="adminControl/addAccount.php">اضافه حساب</a></li>
          <?php } ?>
          <li class="<?php echo $a2; ?>"><a href="adminControl/addNews.php">اضافه خبر</a></li>
          <li><a href="adminControl/editNews.php">حذف خبر</a></li>
        </ul>
    </div>
    <div class="col-sm-12 content" id="content">

    </div>
</div>
</div>
<script>
$('#content').empty();
$("#admin-list li").click(function(e){
    e.preventDefault();
    var scroll = $(document).scrollTop();
    $("#admin-list li").removeClass("active");
    $(this).addClass("active");
    page = $( this ).find('a').attr('href');
    $('#content').empty();
    $('#content').load(page);
    $(document).scrollTop(scroll);
});


</script>
<?php
 if($_SESSION['permission'] ==  1){
    echo "
    <script>
    $('#content').load('adminControl/addCollege.php');
    </script>
    ";
}else{
  echo "
  <script>
  $('#content').load('adminControl/addNews.php');
  </script>
  ";
}
require("footer.php");?>
</body>

</html>
