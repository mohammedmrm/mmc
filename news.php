<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <title>Hello!</title>
  <meta name="keywords" content="الطب, المكتبة الفديوية, e-learning, Multimedia, Babylon University">
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
<meta property="og:description" content="University of Babylon is devoted to excellence in teaching, learning, and research, University of Babylon is made up of 19 Faculty of academy." /><meta property="og:image" content="http://uobabylon.edu.iq/logo.png" />
<meta name="google-site-verification" content="7klDc9kDcy2m2nVsXpzMf3forD04rcsU_asfEQD8_mI" />
<meta name="majestic-site-verification" content="MJ12_09cc9d5c-cd48-4b1f-8d17-b22564a80f78" />
<meta content="University of Babylon is devoted to excellence in teaching, learning, and research, University of Babylon is made up of 19 Faculty of academy." name="description" /><link rel="shortcut icon" href="http://www.uobabylon.edu.iq/nt/images/babylon.ico" /><meta name="keywords" content="University of Babylon, College, Education, Innovation, Teaching, Learning" />
<meta content="شبكة جامعة بابل الالكترونية" name="copyright" />
  <style>
  .new {
    background: #FDFDFD;
    box-shadow: 5px 5px 5px #838383;
    margin: 5px 0px;
    padding: 0px !important;
  }
  .newsLogo{
    height: 80px;
    padding:0px;
    background-position: center;
    background-size: cover;
  }
  .data {
    font-size: 14px;
    color:#858585;
  }
  .title {
    color : #6495ED;
    font-size: 20px;
  }
  .editor {
    font-size: 12;
    color: #A9A9A9;
    font-style: italic;
  }

  </style>
</head>

<body>

<?php require("header.php");?>
<div class="row">
    <div class="container">
        <h1>الاخبار</h1>
        <div class="input-group">
        <select class="college form-control" onchange="news(1)" id="college">
            <option value="all">الكل</option>
        </select>
       </div>
       <hr />
       <div class="col-md-12" id="newsHolder">

       </div>
        <div class="col-md-12">
		<nav aria-label="...">
			<ul class="pagination" id="pagination">

			</ul>
        <input type="hidden" id="p" name="p" value="<?php if(!empty($_GET['p'])){ echo $_GET['p'];}else{ echo 1;}?>"/>
		</nav>
     	</div>
    </div>
</div>
<?php require("footer.php");?>

</body>
<script src="js/getColleges.js"></script>
<script>
getColleges($("#college"),"script/_getColleges.php");
function news(page){
$.ajax({
  url:"script/_news.php",
  type:"POST",
  data:{page: page,college:$("#college").val()},
  beforeSend:function(){
   $("#newsHolder").addClass("loading");
  },
  success:function(res){
   $("#newsHolder").html("");
   $("#pagination").html("");
   if(res.pages >= 1){
     if(res.page > 1){
         $("#pagination").append(
          '<li class="page-item"><a href="#" onclick="getorderspage('+(Number(res.page)-1)+')" class="page-link">السابق</a></li>'
         );
     }else{
         $("#pagination").append(
          '<li class="page-item disabled"><a href="#" class="page-link">السابق</a></li>'
         );
     }
     if(Number(res.pages) <= 5){
       i = 1;
     }else{
       i =  Number(res.page) - 5;
     }
     if(i <=0 ){
       i=1;
     }
     for(i; i <= res.pages; i++){
       if(res.page != i){
         $("#pagination").append(
          '<li class="page-item"><a href="#" onclick="getorderspage('+(i)+')"  class="page-link">'+i+'</a></li>'
         );
       }else{
         $("#pagination").append(
          '<li class="page-item active"><span class="page-link">'+i+'</span></li>'
         );
       }
       if(i == Number(res.page) + 5 ){
         break;
       }
     }
     if(res.page < res.pages){
         $("#pagination").append(
          '<li class="page-item"><a href="#" onclick="getorderspage('+(Number(res.page)+1)+')" class="page-link">التالي</a></li>'
         );
     }else{
         $("#pagination").append(
          '<li class="page-item disabled"><a href="#" class="page-link">التالي</a></li>'
         );
     }
   }
   $("#newsHolder").removeClass("loading");
   $.each(res.data,function(){
     $("#newsHolder").append(
        "<a href='newsShow.php?ref="+this.news_id+"'>"+
        "<div class='col-sm-4'>"+
        "<div class='col-sm-12 new'>"+
            "<div class='col-xs-3 newsLogo' "+
                "style='background-image:url(news/logo/"+this.logo+")'"+
            "></div>"+
            "<div class='col-xs-9 details'>"+
                "<div class='row'>"+
                  "<div class='col-xs-12 title'>"+this.title+"</div>"+
                "</div>"+
                "<div class='row'>"+
                  "<div class='col-xs-12 editor'>Edited by: "+this.name+"</div>"+
                "</div>"+
                "<div class='row'>"+
                  "<div class='col-xs-12 data'>Posted on: "+this.time+" </div>"+
                "</div>"+
            "</div>"+
        "</div>"+
        "</div></a>"
     );
   })
  },
  error:function(e){
    console.log(e);
   $("#newsHolder").removeClass("loading");
   $("#newsHolder").html(e.responseText);
  }
})
}
news(1);
</script>
</html>
