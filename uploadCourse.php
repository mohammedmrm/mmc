<?php session_start(); error_reporting(0); require("script/_loginCheck.php");  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
 <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Upload Course</title>
</head>

<body>
<?php
 require("header.php");
?>
<div class="row">
<div class="col-md-12">
<div   class="col-md-12">
<div  id="porgrass" class="col-md-6">
</div>
</div>
<div class="col-md-8">
  <form class="form-horizontal" id="uploadForm" enctype="multipart/form-data">
  <fieldset>
  <!-- Form Name -->
  <legend>Upload Course</legend>

  <!-- Select Basic -->
  <div class="form-group">
    <label class="col-md-4 control-label" for="colleges">College</label>
    <div class="col-md-4">
      <select id="colleges" name="colleges" onchange="callme()" class="form-control">
        <option value="">--Select College--</option>
      </select>
    </div>
    <label class="col-md-4 text-danger" id="collegesErr" for="colleges"></label>
  </div>

  <!-- Select Basic -->
  <div class="form-group">
    <label class="col-md-4 control-label" for="teacher">Teacher</label>
    <div class="col-md-4">
      <select id="teachers" onchange="callme()" name="teachers" class="form-control">
      </select>
    </div>
    <label class="col-md-4 text-danger" id="teachersErr" for="colleges"></label>
  </div>

  <!-- Text input-->
  <div class="form-group">
    <label class="col-md-4 control-label" for="title">Media Title</label>
    <div class="col-md-4">
    <input id="title" onkeyup="callme()" name="title" type="text" placeholder="Media Title" class="form-control input-md">
    </div>
    <label class="col-md-4 text-danger" id="titleErr" for="colleges"></label>
  </div>

   <div class="form-group">
    <label class="col-md-4 control-label" for="desc">Media Description</label>
    <div class="col-md-4">
    <TEXTAREA id="desc" name="desc" onkeyup="callme()" type="text" placeholder="Media Description" class="form-control input-md"></TEXTAREA>

    </div>
    <label class="col-md-4 text-danger" id="descErr" for="colleges"></label>
  </div>

  <div class="form-group">
    <label class="col-md-4 control-label" for="desc">Select Media</label>
    <div class="col-md-4">
    <input id="media" name="media" type="file" placeholder="Drag & Drop Media" class="form-control input-md">

    </div>
    <label class="col-md-4 text-danger" id="fileErr" for="colleges"></label>
  </div>
  <div class="form-group">
    <label class="col-md-4 control-label" for="display">Display Type</label>
    <div class="col-md-4">
      <select id="display" name="display" class="form-control">
       <option value="1">Public</option>
       <option value="2">unlisted</option>
      </select>
    </div>
    <label class="col-md-4 text-danger" id="displayErr" for="colleges"></label>
  </div>
  <!-- Button -->
  <div class="form-group">
   <label class="col-sm-4 control-label" for="upload">Save chanages</label>
    <div class="col-sm-4">
      <button id="upload" type="button" name="upload" class="btn btn-primary">Upload</button>
    </div>
  </div>
  </fieldset>
  </form>

</div>
<div class="col-md-4">
<h4>Already exsist media</h4>
 <div class="col-sm-12" id="exsistMedia">

 </div>
 <hr />
</div>
</div>
</div>
<?php
 require("footer.php");
?>
<script src="js/getColleges.js"></script>
<script src="js/getTeacher.js"></script>
<script src="js/uploadCourse.js"></script>
<script>
getColleges($("#colleges"),"script/_getColleges.php");
$("#colleges").change(function(){
    $("#teachers").html("");
    getTeacher($("#teachers"),"script/_getTeacher.php",$("#colleges").val());
});
getTeacher($("#teachers"),"script/_getTeacher.php",$("#colleges").val());

$("#upload").click(function(){
uploadCourse("uploadForm");
});
function callme(){
exsistMedia($("#colleges").val(),$('#teachers').val(),$('#title').val(),$('#desc').val(),'#exsistMedia')
}
function exsistMedia(college,teacher,title,desc,pointer){
 $.ajax({
   url:'script/_exsistMedia.php',
   type:'POST',
   method:"POST",
   data:{college: college , teacher: teacher,title:title,desc:desc},
   success:function(res){
     $(pointer).html(" ");
     $(pointer).append(
      '<table class="table table-bordered">'+
        '<thead>'+
          '<tr>'+
            '<th>title</th>'+
            '<th>snap</th>'+
          '</tr>'+
        '</thead>'+
        '<tbody>'
     );
      $.each(res.data,function(){
       $(pointer).append(
         '<tr>'+
          '<td>'+this.title+'&nbsp; </td>'+
          '<td><img src="'+this.snap_path+'" width="150px" height="90px"/></td>'+
         '</tr>'
       );
      })
     $(pointer).append(
      '</tbody>'+
      '</table>'
     );
     console.log(res);
   },
   error:function(e){
     console.log(e);
   }
 })
}
</script>
</body>
</html>
