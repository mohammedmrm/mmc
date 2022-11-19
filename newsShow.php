<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <title>Hello!</title>
  <style>
  .newslogo{
    height: 180px;
    padding:0px;
    background-position: center;
    background-size: cover;
  }
  #title {
    font-size: 25px;
    color: #6495ED;
    margin:10px;
  }
  #date {
    color: #D3D3D3;
    font-size:16;
    font-style: italic;
    margin:10px;
  }
  #editor {
    font-size: 14px;
    margin:10px;
    color: #F8F8FF;
  }
  .newsSh {
    background-color: #696969;
  }

  </style>
</head>

<body>

<?php  require("header.php");?>
<div class="container">
  <dir class="row">
      <div class="col-md-12 newsSh">
        <div class="col-sm-3">
            <div class="row newslogo" id="newslogo">

            </div>
        </div>
        <div class="col-sm-9">
            <div class="row"><div class="col-xs-12" id="title">

            </div></div>
            <div class="row"><div class="col-xs-12" id="date">

            </div></div>
            <div class="row"><div class="col-xs-12" id="editor">

            </div></div>
        </div>
      </div>
  </dir>
  <div class="row">
    <hr />
  </div>
  <dir class="row">
    <div class="col-sm-12" id="news">


    </div>
  </dir>
</div>
<script type="text/javascript">
    $.ajax({
      url:"script/_newsShow.php",
      type:"POST",
      data:{ref: getUrlParameter("ref")},
      beforeSend:function(){

      },
      success:function(res){
        $.each(res.data,function(){
          console.log(res);
          $("#title").text(this.title);
          $("#editor").text("Edited by: "+this.name);
          $("#date").text("Posted on: "+this.time);
          $("#news").load("news/docs/"+this.file);
          $("#newslogo").css("background-image","url(news/logo/"+this.logo+")");
        })
      },
      error:function(e){
        console.log(e);
      }
    })
</script>
<?php  require("footer.php");?>
</body>

</html>
