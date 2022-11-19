<!DOCTYPE html>
<html>
<head>
  <script type="text/javascript" src='js/tinymce/js/tinymce/jquery.tinymce.min.js?apiKey=6sq87tiq57gcpowzczfptzqa054qkiuomc7magrqj6ulq7o0'></script>
  <script type="text/javascript">
  tinymce.init({
    selector: '#textarea',
    theme: 'modern',
    height: 300,
    plugins: [
      'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
      'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
      'save table contextmenu directionality emoticons template paste textcolor'
    ],
    toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons'
  });
  </script>
</head>

<body>
<br /><br />
<form class="form-horizontal" id="postNewsForm" enctype="multipart/form-data">
<fieldset>

<!-- Form Name -->
<legend>Post News</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-2 control-label" for="newstitle">News title</label>
  <div class="col-md-3">
  <input id="newstitle" name="newsTitle" type="text" placeholder="placeholder" class="form-control input-md">
  <span class="help-block">News Title</span>
  <span class="text-danger" id="titleErr"></span>
  </div>
  <label class="col-md-1 control-label" for="newsLogo">New logo</label>
  <div class="col-md-3">
    <input id="newsLogo" name="newsLogo" class="input-file form-control" type="file">
    <span class="help-block">An image that will be showed when news are displayed</span>
    <span class="text-danger" id="logoErr"></span>
  </div>
</div>
<div class="col-sm-12">
    <hr class="" />
</div><!-- File Button -->
<div class="form-group">
  <label class="col-md-2 control-label" for="filebutton">Select image</label>
  <div class="col-md-3">
    <input id="img" name="img" class="input-file form-control" type="file">
    <span class="help-block">Upload an image in order to use it in the news. by uploading image you will get URL thant can be used in the editor below.</span>
    <span class="text-danger" id="imgErr"></span>
  </div>
  <label class="col-md-2 control-label" for="filebutton">Upload an image</label>
  <div class="col-md-2">
    <input id="img-btn" name="img-btn" class="btn" value="Upload" type="button">
    <span class="help-block" id="img-url"></span>
  </div>
</div>
<!-- Textarea -->
<div class="form-group">
<div class="col-md-12">
    <textarea class="form-control" id="textarea" name="textarea"></textarea>
</div>
</div>
<div class="form-group">
  <label class="col-md-2 control-label" for="filebutton">Post</label>
  <div class="col-md-2">
    <input id="post-btn" name="post-btn" class="btn btn-primary" value="Post" type="button">
  </div>
</div>
</fieldset>
</form>
<script type="text/javascript">
function post(formID){
    tinyMCE.triggerSave();
    var myform = document.getElementById(formID);
    var fd = new FormData(myform);
    console.log(fd);
     $.ajax({
      url: 'adminControl/_addNews.php',
      type: 'POST',
      data:fd,
      cache: false,
      processData: false,  // tell jQuery not to process the data
      contentType: false,
      beforeSend:function(){
       $('#addNewsForm').addClass('loading');
      },
      success:function(res){
        $('#addNewsForm').removeClass('loading');
       console.log(res);
       alert($("#textarea").val());
       if (res.success == "1"){
         $('input').empty();
        Toast.defaults.displayDuration=5000;
        Toast.success('New Media Added Successfully');
        $("input").empty();
       }else{
        Toast.defaults.displayDuration=5000;
        Toast.error('Chek your inputs please!');
        $("#titleErr").text(res.title);
        $("#logoErr").text(res.file);
       }
      },
      error:function(e){
        $('#addNewsForm').removeClass('loading');
        console.log(e);
      }
     });
}
function imageUploader(formID){
    var myform = document.getElementById(formID);
    var fd = new FormData(myform);
    console.log(fd);
     $.ajax({
      url: 'adminControl/_newsImageUploader.php',
      type: 'POST',
      data:fd,
      cache: false,
      processData: false,  // tell jQuery not to process the data
      contentType: false,
      beforeSend:function(){
       $('#addNewsForm').addClass('loading');
      },
      success:function(res){
        $('#addNewsForm').removeClass('loading');
       console.log(res);
       if (res.success == "1"){
         $('input').empty();
        Toast.defaults.displayDuration=5000;
        Toast.success('New Media Added Successfully');
        $("input").empty();
        $("#img-url").text(res.url)
       }else{
        Toast.defaults.displayDuration=5000;
        Toast.error('Chek your inputs please!');
        $("#imgErr").text(res.error);
       }
      },
      error:function(e){
        $('#addNewsForm').removeClass('loading');
        console.log(e);
      }
     });
}
$("#img-btn").click(function(){
 imageUploader("postNewsForm");
});
$("#post-btn").click(function(){
 post("postNewsForm");
});
</script>
</body>
</html>
