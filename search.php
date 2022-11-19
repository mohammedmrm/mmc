

<head>
  <title>Media Search</title>
<style>
.search-body {
  background-color: #222222;
  min-height: 100px !important;
}
  .video{
   width:25%;
   height:222px;
   padding:10px;
  }
  .sub {
    width:100%;
    height: 100%;
    background-color: #444444;
  }
  .thum {
    height: 130px;
    width:100%;
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    text-align: center;
  }
  .title {
    color: #FFCC33;
    overflow:hidden;
    font-size:18px;
    padding:0px 10px;
    display: block;
    height: 45px;
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
    top:25px;
    font-size: 30px;
    vertical-align: middle;
    position: relative;
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
  .play-btn:hover {
    color: #669933;
    cursor:pointer;
  }
  .a {
    top:30px;
  }

</style>
</head>

<body>
<?php require("header.php");?>
<div class="row">
  <div class="container">
    <div class="col-md-12 search-body" id="search-body"></div>
    <div class="col-md-12">
        <center><ul class="pagination" id="pagination"></ul></center>
    </div>
  </div>
</div>
<?php require("footer.php");?>
</body>
<script>
function getSearch(keyword,college,page){

   $.ajax({
      url:"script/_getSearch.php",
      type:"POST",
      data:{keyword:keyword,college:college,page:page},
      beforeSend:function(){
        $('#search-body').addClass('loading');
      },
      success:function(res){
        $('#search-body').removeClass('loading');
        console.log(res);
        $.each(res.data,function(){
          $("#search-body").append(
            '<div class="col-sm-3 video">'+
              '<div class="sub">'+
                '<div class="thum" style="background-image:url('+this.snap_path+')">'+
                    '<span class="teacher">By '+this.teacher_name_e+'</span>'+
                    '<a class="" href="show.php?v='+this.media_id+'&title='+this.title+
                     '&desc='+this.media_desc+'&t=teacher='+this.teacher_name_a+'"><div class="play-btn"><span class="glyphicon glyphicon-play"></span></div></a>'+
                    '<span class="teacher a">'+this.teacher_name_a+'</span>'+
                '</div>'+
                '<span class="title">'+this.title+'</span>'+
                '<span class="date">'+this.time+'</span>'+
              '</div>'+
            '</div>'
          );
        });
        if(parseInt(res.page_num)>=1 && res.active !=1) {
          $('#pagination').append(
           '<li class="previous"><a href="search.php?q='+keyword+'&c='+college+'&p='+parseInt(page-1)+'">Previous</a></li>'
           );
        }
        for(i=parseInt(res.start);i<= parseInt(res.end);i++){
          if(i == res.active){
           $('#pagination').append(
           '<li class="active"><a href="#">'+i+'</a></li>'
           );
          } else {
           $('#pagination').append(
           '<li><a href="search.php?q='+keyword+'&c='+college+'&p='+i+'">'+i+'</a></li>'
           );
          }

        }
        if(parseInt(res.page_num)>6 && (res.active) != parseInt(res.page_num)){
        $('#pagination').append(
           '<li class="next"><a href="search.php?q='+keyword+'&c='+college+'&p='+(Number(page)+1)+'">Next</a></li>'
           );
        }
      },
      error:function(e){
        console.log(e);
        $('#search-body').removeClass('loading');
      }
   });
}
$('#search-txt').val(getUrlParameter("q"));
$('#search-sel').val(getUrlParameter("c"));
getSearch(getUrlParameter("q"),getUrlParameter("c"),getUrlParameter("p"));
</script>

