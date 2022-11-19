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

<script src="//d2qrdklrsxowl2.cloudfront.net/js/hapyak.js"></script>
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
?>
   <!-- HTML code goes here -->

        <script type="text/javascript" src="//d2qrdklrsxowl2.cloudfront.net/js/hapyak-iframe.js"></script>
        <script type="text/javascript" src="//d2qrdklrsxowl2.cloudfront.net/js/hapyak.api.js"></script>

<div class="row">
    <div class="hidden-xs col-sm-4 col-lg-8">&nbsp;</div>
    <div class="col-xs-12 col-sm-8 col-lg-4">
        <div class="videoWrapper wideScreen">
            <div class="videoPadding">
                <div id="hapyak-player-{{ UUID }}"></div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
hapyak.viewer({
    apiKey: HAPYAK_API_KEY,
    /* ... */
    onLoad: function (viewer) {
        hapyak.responsive(viewer);
    }
});
</script>
<?php
require("footer.php");
?>
</body>

</html>

