<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <title>E-exam UoB</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <style type="text/css">
  body {
    background-image: url(img/bg.png);
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
  }
  .panel-body {
    background-color: #040051;
    transition-duration: 1s;
    border-radius: 10px;
    border: 1px solid #444444;
    opacity: 0.7;
  }
  .panel-body:hover {
    transform:scale(1.2,1.2);
  }
  .panel-heading {
    color:  !important;
    //background-color:  !important;
  }
  .panel-primary {
    background: none !important;
    border: none !important;
  }

  .title {
     text-align: center;
     color: #EEEEEE;
     font-size: 25px;
     padding: 25px;
   }
     .uni {
    height: 100%;
    background-image: url(img/uni.png);
    background-position: center;
    background-size: contain;
    background-repeat: no-repeat;
  }
  .bgc {
    background-position:  center;
    background-repeat: no-repeat;
    background-size: contain;
    height: 120px;
    text-align: center;
    vertical-align: middle;
    padding-top:35px;
    font-size: 25px;
    color: #FFFFFF;
  }
  .body {
    border-radius: 10px;
    //box-shadow: 5px 5px 8px 7px #999999;
    -webkit-box-shadow: 0px 0px 20px -2px rgba(171,171,171,1);
    -moz-box-shadow: 0px 0px 20px -2px rgba(171,171,171,1);
     box-shadow: 0px 0px 20px -2px rgba(171,171,171,1);

  }
  .header {
     height: 130px;
     background-color: #000033;
     margin-top: 0px;
     margin-bottom: 20px;
     background-image: url(img/mmc2.png);
     background-repeat: no-repeat;
     background-position: center bottom;
     background-size: contain;
  }
  .footer {
     height: 90px;
     background-color: #BCB9B5;
     margin-bottom: 0px;
     text-align: center;
  }
  .box {

  }

  </style>
</head>
<body dir="rtl">
<?php
include_once("header.php");
?>

<div class="container">

    <div class="col-md-12">
    <?php
      require_once("script/dbconnection.php");
        $query = "select * from colleges where college_id <> 26";
        $res = getData($con,$query);
        foreach($res as $key=>$val){
    ?>
      <div class="col-sm-3 box">
        <a href="<?php echo "listcourses.php?id=".$val['college_id'] ?>" title="Video Library">
        <div class="panel panel-primary box2">
          <div class="panel-body">
           <div class="col-sm-12 bgc" style="">
             <b><?php echo $val['college_name_a']; ?></b>
           </div>
          </div>
        </div>
        </a>
      </div>
    <?php
      }
    ?>
    </div>

</div>
<div class="col-md-12 footer">
<?php
include_once("footer.php");
?>
</div>
</body>

</html>
