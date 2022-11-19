<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<style type="text/css">
.systemVideo{
    width:100%;
    height: 300px;
    padding-left:10px;
    border-left: 1px #FFCC66 solid;
    border-right: 1px #FFCC66 solid;
  }
  .systemVideo video{
    width:100%;
    height: 100%;
    padding-left:10px;
    padding-right:10px;
    display: inline-block;
    position: relative;
  }
  .systemVideoTitle {
    display: inline-block;
    position: relative;
    width:100%;
    font-size: 30px;
    background-color: #333333;
    color: #FFFFFF;
    padding-right: 10px;
  }
  .sysBlock {
    border-bottom: 3px #6600CC solid;
    margin-bottom: 15px;
  }
  .sysPanel {
    border-top-left-radius:10px;
    border-top-right-radius:10px;
    margin-bottom: 5px;
    background-color: #666666;
    color: #FFFFFF;
  }

  </style>
</head>

<body>
<?php
require("header.php");
?>
<div class="row">
  <div class="container">
   <div class="col-md-12 sysBlock padding-none">
    <div class="row sysPanel">
       <div class="col-md-6" ><h1>University systems</h1></div>
       <div class="col-md-6" dir="rtl"><h1>أنظمة الجامعة</h1></div>
    </div>
       <div class="col-sm-6 padding-none">
          <div class="col-sm-12 padding-none systemVideo">
            <video  controls>
              <source src="media\sys\mo.mp4" type="video/mp4">
              Your browser does not support the video tag.
            </video>
          </div>
          <div class="systemVideoTitle" dir="rtl">نظام التسجيل الصباحي</div>
       </div>

       <div class="col-sm-6 padding-none">
          <div class="col-sm-12 padding-none systemVideo">
            <video controls>
              <source src="media\sys\ev.mp4" type="video/mp4">
              Your browser does not support the video tag.
            </video>
          </div>
          <div class="systemVideoTitle" dir="rtl">نظام التسجيل المسائي</div>
       </div>

   </div>
  </div>
</div>
<?php
require("footer.php");
?>
</body>

</html>
