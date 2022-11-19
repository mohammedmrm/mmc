<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <title>Multimedia Centre</title>
<meta name="keywords" content="الطب, المكتبة الفديوية, e-learning, Multimedia, Babylon University">
<meta name="author" content="Mohammed Ridha Mohammed">
<meta name="msapplication-TileColor" content="#222222" />
<meta content="text/html; charset=UTF-8" http-equiv="Content-Type" />
<meta property="og:site_name" content="University of Babylon" />
<meta property="og:type" content="university" />
<meta property="og:title" content="University of Babylon" />
<meta property="og:url" content="http://www.uobabylon.edu.iq/" />
<meta property="og:description" content="University of Babylon is devoted to excellence in teaching, learning, and research, University of Babylon is made up of 19 Faculty of academy." />
<meta property="og:image" content="http://uobabylon.edu.iq/logo.png" />
<meta name="google-site-verification" content="GW_ZcQ08Jv4CdmLsvQa2WuNU1tOzyUTtcbMuHYL9gRM" />
<meta content="University of Babylon is devoted to excellence in teaching, learning, and research, University of Babylon is made up of 19 Faculty of academy." name="description" /><link rel="shortcut icon" href="http://www.uobabylon.edu.iq/nt/images/babylon.ico" />
 <style>
  .rec {
    height: 200px;
    background-color: #222222;
  }
  .next,.back {
   background: rgba(200,200,200,0.2);
  }
  .next:hover,.back:hover {
   background: rgba(200,200,200,0.8);
  }

  .fn {
    font-size: 30px;
    color: #666666;
    padding:80px 20px;
  }
  .fn:hover {
    color: #33FF33;
  }

  .block {
    margin-bottom: 20px;
  }
  .video{
   width:25%;
   height: 100%;
   padding:2px;
  }
  .sub {
    width:100%;
    height: 100%;
    background-color: #444444;
  }
  .thum {
    height: 70%;
    width:100%;
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    text-align: center;
  }
  .title {
    color: #FFCC66;
    font-size:17px;
    font-weight: bold;
    padding:0px 10px;
    display: block;
    height: 21px;
    overflow: hidden;
  }
  .date {
    color: #AAAAAA;
    display: block;
    padding:0px 10px;
  }
  .play-btn {
    width:50px;
    height: 50px;
    text-align: center;
    border-radius: 360px;
    border: #EEEEEE 1px solid;
    background-color: #222222;
    opacity: 0.5;
    color: #FFFFFF;
    padding:5px;
    margin: auto;
    margin-top: 20px;
    font-size: 30px;
    vertical-align: middle;
    position: relative;
  }
  .play-btn:hover {
    color: #669933;
    cursor:pointer;
  }
  .block-head {
    background-color: #666666;
    color: #DDDDDD;
    border-radius: 10px 10px 0px 0px;
    padding: 5px;
  }
  .teacher {
    display: block;
    height: 20px;
    font-size: 16px;
    font-weight: 700;
    color: #fff;
    background: #000000;
    position: relative;
    text-shadow: 5px 5px 3px  #000000;
    overflow: hidden;
  }
  .views {
    color: #FFFFFF;
    padding-left:10px;

  }
  .systemVideo{
    width:100%;
    height: 270px;
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

    <div class="row block">
      <div class="col-xs-12 block-head">
        <div class="col-sm-6"><h3 class="margin-none" align="left">Health care group</h3></div>
        <div class="col-sm-6"><h3 class="margin-none" align="right">المجموعة الطبية</h3></div>
      </div>
      <hr />
      <div class="col-sm-1 back rec" id="back1" onclick="getHomeVideos('b','1','health');">
        <span class="glyphicon glyphicon-chevron-left fn"></span>
      </div>
      <input type="hidden" id="pointer1" value="0"/> 
      <div class="col-sm-10 rec" id="block1">
      </div>
      <div class="col-sm-1 next rec" id="next1" onclick="getHomeVideos('n','1','health');">
        <span class="glyphicon glyphicon-chevron-right fn"></span>
      </div>
    </div>
<!-- group 2--------------------- -->
    <div class="row block">
      <div class="col-xs-12 block-head">
        <div class="col-sm-6"><h3 class="margin-none" align="left">Engineering group</h3></div>
        <div class="col-sm-6"><h3 class="margin-none" align="right">المجموعة الهندسيه</h3></div>
      </div>
      <div class="col-sm-1 back rec" id="back2" onclick="getHomeVideos('b','2','eng');">
        <span class="glyphicon glyphicon-chevron-left fn"></span>
      </div>
      <input type="hidden" id="pointer2" value="0"/>
      <div class="col-sm-10 rec" id="block2">

      </div>
      <div class="col-sm-1 next rec" id="next2" onclick="getHomeVideos('n','2','eng');">
        <span class="glyphicon glyphicon-chevron-right fn"></span>
      </div>
    </div>
<!-- group 3--------------------------- -->
    <div class="row block">
      <div class="col-xs-12 block-head">
        <div class="col-sm-6"><h3 class="margin-none" align="left">Technology</h3></div>
        <div class="col-sm-6"><h3 class="margin-none" align="right">تكنولوجيا المعلومات</h3></div>
      </div>
      <div class="col-sm-1 back rec" id="back3" onclick="getHomeVideos('b','3','it');">
        <span class="glyphicon glyphicon-chevron-left fn"></span>
      </div>
      <input type="hidden" id="pointer3" value="0"/>
      <div class="col-sm-10 rec" id="block3">

      </div>
      <div class="col-sm-1 next rec" id="next3" onclick="getHomeVideos('n','3','it');">
        <span class="glyphicon glyphicon-chevron-right fn"></span>
      </div>
    </div>
<!-- group 4--------------------------- -->
    <div class="row block">
      <div class="col-xs-12 block-head">
        <div class="col-sm-6"><h3 class="margin-none" align="left">Applied and Pure Sciences</h3></div>
        <div class="col-sm-6"><h3 class="margin-none" align="right">مجموعة العلوم</h3></div>
      </div>
      <div class="col-sm-1 back rec" id="back4" onclick="getHomeVideos('b','4','bsc');">
        <span class="glyphicon glyphicon-chevron-left fn"></span>
      </div>
      <input type="hidden" id="pointer4" value="0"/>
      <div class="col-sm-10 rec" id="block4">

      </div>
      <div class="col-sm-1 next rec" id="next4" onclick="getHomeVideos('n','4','bsc');">
        <span class="glyphicon glyphicon-chevron-right fn"></span>
      </div>
    </div>
<!-- group 5--------------------------- -->
    <div class="row block">
      <div class="col-xs-12 block-head">
        <div class="col-sm-6"><h3 class="margin-none" align="left">Law, Administration and  Economics </h3></div>
        <div class="col-sm-6"><h3 class="margin-none" align="right">القانون, ادارة واقتصاد</h3></div>
      </div>
      <div class="col-sm-1 back rec" id="back5" onclick="getHomeVideos('b','5','law');">
        <span class="glyphicon glyphicon-chevron-left fn"></span>
      </div>
      <input type="hidden" id="pointer5" value="0"/>
      <div class="col-sm-10 rec" id="block5">

      </div>
      <div class="col-sm-1 next rec" id="next5" onclick="getHomeVideos('n','5','law');">
        <span class="glyphicon glyphicon-chevron-right fn"></span>
      </div>
    </div>
<!-- group 6--------------------------- -->
    <div class="row block">
      <div class="col-xs-12 block-head">
        <div class="col-sm-6"><h3 class="margin-none" align="left">Education</h3></div>
        <div class="col-sm-6"><h3 class="margin-none" align="right">التربية</h3></div>
      </div>
      <div class="col-sm-1 back rec" id="back6" onclick="getHomeVideos('b','6','edu');">
        <span class="glyphicon glyphicon-chevron-left fn"></span>
      </div>
      <input type="hidden" id="pointer6" value="0"/>
      <div class="col-sm-10 rec" id="block6">

      </div>
      <div class="col-sm-1 next rec" id="next6" onclick="getHomeVideos('n','6','edu');">
        <span class="glyphicon glyphicon-chevron-right fn"></span>
      </div>
    </div>
<!-- group 7--------------------------- -->
    <div class="row block">
      <div class="col-xs-12 block-head">
        <div class="col-sm-6"><h3 class="margin-none" align="left">Arts,  Sport Sciences </h3></div>
        <div class="col-sm-6"><h3 class="margin-none" align="right">الفنون والرياضة</h3></div>
      </div>
      <div class="col-sm-1 back rec" id="back7" onclick="getHomeVideos('b','7','art');">
        <span class="glyphicon glyphicon-chevron-left fn"></span>
      </div>
      <input type="hidden" id="pointer7" value="0"/>
      <div class="col-sm-10 rec" id="block7">

      </div>
      <div class="col-sm-1 next rec" id="next7" onclick="getHomeVideos('n','7','art');">
        <span class="glyphicon glyphicon-chevron-right fn"></span>
      </div>
    </div>
<!-- group 8--------------------------- -->
    <div class="row block">
      <div class="col-xs-12 block-head">
        <div class="col-sm-6"><h3 class="margin-none" align="left">Patents</h3></div>
        <div class="col-sm-6"><h3 class="margin-none" align="right">براءات الاختراع</h3></div>
      </div>
      <div class="col-sm-1 back rec" id="back8" onclick="getHomeVideos('b','8','others');">
        <span class="glyphicon glyphicon-chevron-left fn"></span>
      </div>
      <input type="hidden" id="pointer8" value="0"/>
      <div class="col-sm-10 rec" id="block8">

      </div>
      <div class="col-sm-1 next rec" id="next8" onclick="getHomeVideos('n','8','others');">
        <span class="glyphicon glyphicon-chevron-right fn"></span>
      </div>
    </div>
<!-- group 9--------------------------- -->
<!--    <div class="row block">
      <div class="col-xs-12 block-head">
        <div class="col-sm-6"><h3 class="margin-none" align="left">Others</h3></div>
        <div class="col-sm-6"><h3 class="margin-none" align="right">أخرى</h3></div>
      </div>
      <div class="col-sm-1 back rec" id="back8" onclick="getHomeVideos('b','8','others');">
        <span class="glyphicon glyphicon-chevron-left fn"></span>
      </div>
      <input type="hidden" id="pointer9" value="0"/>
      <div class="col-sm-10 rec" id="block9">

      </div>
      <div class="col-sm-1 next rec" id="next9" onclick="getHomeVideos('n','8','others');">
        <span class="glyphicon glyphicon-chevron-right fn"></span>
      </div>
    </div>-->
  </div>
</div>
<?php
require("footer.php");
?>
<script>
function getHomeVideos(direction,group,gname){
  $.ajax({
    url:"script/_getVideos.php",
    type:"POST",
    data:{gname: gname, direction:direction, current:$("#pointer"+group).val()},
    beforeSend:function(){
        $('#block'+group).empty();
        $('#block'+group).addClass("loading");
    },
    success:function(res){
      $("#pointer"+group).val(res.current);
      $('#block'+group).removeClass("loading");
      $.each(res.data, function(){
        $('#block'+group).append(
            '<div class="col-sm-3 video">'+
              '<div class="sub">'+
                '<div class="thum" style="background-image:url('+this.snap_path+')">'+
                    '<span class="teacher">By '+this.teacher_name_e+'</span>'+
                    '<a href="show.php?v='+this.media_id+'&title='+this.title+'&description='+this.media_desc+
                    '&teacher='+this.teacher_name_a+'"><div class="play-btn"><span class="glyphicon glyphicon-play"></span></div></a>'+
                    '<span class="teacher">'+this.teacher_name_a+'</span>'+
                '</div>'+
                '<span class="title">'+this.title+'</span>'+
                '<span class="date">'+this.time+'</span>'+
                '<span class="views">'+this.watch+' <span class="glyphicon glyphicon-eye-open"></span> </span>'+
              '</div>'+
            '</div>'
        );
      });
     console.log(res);
    },
    error:function(e){
     $('#block'+group).removeClass("loading");
     console.log(e);
    }

  })
}
getHomeVideos('b','1','health');
getHomeVideos('b','2','eng');
getHomeVideos('b','3','it');
getHomeVideos('b','4','bsc');
getHomeVideos('b','5','law');
getHomeVideos('b','6','edu');
getHomeVideos('b','7','art');
getHomeVideos('b','8','others');
</script>
</body>
</html>
