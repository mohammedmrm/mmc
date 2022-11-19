<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
</head>

<body>
<div class="row">
    <div class="col-sm-7">
    <form>
     <legend>Edit and Delete Media</legend>
     <div class="form-group">
        <div class="col-sm-4">
          <select id="college"  name="college" class="form-control">
              <option value="">--Select College--</option>
         </select>
        </div>
        <div class="col-sm-4">
          <select id="teacher"  onchange="getTeacherInfo()" name="teacher" class="form-control">
         </select>
        </div>
     </div>
    </form>
    </div>
    <!-- -------------------------------------- -->
    <div class="col-sm-5">
      <form class="form-horizontal" id="TeacherinfoForm">
      <fieldset>
      <!-- Form Name -->
      <legend>Add new Teacher</legend>

      <!-- Text input-->
      <div class="form-group">
        <label class="col-sm-4 control-label" for="teacherNameE">Teacher name (English)</label>
        <div class="col-sm-4">
        <input id="teacherNameE"  name="teacherNameE" type="text" placeholder="Teacher Name " class="form-control input-sm">
        <span class="help-block">In English</span>
        </div>
        <label class="col-sm-4 text-danger" id="teacherNameErrE" for="college"></label>
      </div>
      <!-- Text input-->
      <div class="form-group">
        <label class="col-sm-4 control-label" for="teacherNameA">Teacher name (Arabic)</label>
        <div class="col-sm-4">
        <input id="teacherNameA" name="teacherNameA" type="text" placeholder="Teacher name" class="form-control input-sm">
        <span class="help-block">In Arabic</span>
        </div>
        <label class="col-sm-4 text-danger" id="teacherNameErrA" for="college"></label>
      </div>

      <!-- Text input-->
      <div class="form-group">
        <label class="col-sm-4 control-label" for="email">Email</label>
        <div class="col-sm-4">
        <input id="email" name="email" type="text" placeholder="Teacher email" class="form-control input-sm">
        <span class="help-block">example@example.com</span>
        </div>
        <label class="col-sm-4 text-danger" id="emailErr" for="college"></label>
      </div>

      <!-- Button -->
      <div class="form-group">
        <label class="col-sm-4 control-label" for="add">Save changes</label>
        <div class="col-sm-8">
          <button id="updateTeacher" onclick="updateTeacherInfo()" type="button" name="addTeacher" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
          <button id="deleteTeacher" onclick="deleteTeacherInfo()" type="button" name="addTeacher" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</button>
        </div>
      </div>
      </fieldset>
      </form>
    </div>
</div>

</body>
<script src="js/getColleges.js"></script>
<script src="js/getTeacher.js"></script>
<script>
  getColleges($("#college"),"script/_getColleges.php");
$("#college").change(function(){
  $("#AllVideos").html("");
  $("#teacher").html("");
  getTeacher($("#teacher"),"script/_getTeacher.php",$("#college").val());
});
$('#EditModal').on('show.bs.modal', function (event) {

});
function updateTeacherInfo(){
$.ajax({
  url:"adminControl/_updateTeacherInfo.php",
  type:"POST",
  data:{teacher: $("#teacher").val(),teacherNameE:$("#teacherNameE").val(),
       teacherNameA:$("#teacherNameA").val(),email:$("#email").val(),},
  beforeSend:function(){
    $("#TeacherinfoForm").addClass("loading");
  },
  success:function(res){
    $("#TeacherinfoForm").removeClass("loading");
    console.log(res);
     $("#teacherNameErrA").text("");
     $("#teacherNameErrE").text("");
     $("#emailErr").text("");
    if(res.success == 1){
     Toast.success('Teacher Info updated Successfully');
     getTeacher($("#teacher"),"script/_getTeacher.php",$("#college").val());
     updateVideoInfo();
    }else if(res.success == 2){
     Toast.warning('Nothing to change');
    }else{
     $("#teacherNameErrA").text(res.teacherNameA);
     $("#teacherNameErrE").text(res.teacherNameE);
     $("#emailErr").text(res.email);
    }
  },
  error:function(e){
   $("#TeacherinfoForm").removeClass("loading");
   Toast.error('Unable to process your request');
   console.log(e.responseText);
  }
});
}
function deleteTeacherInfo(){
  if(confirm("هل انت متاكد من حذف قيد التدريسي؟")){
    $.ajax({
      url:"adminControl/_deleteTeacherInfo.php",
      type:"POST",
      data:{teacher: $("#teacher").val()},
      befoerSend:function(){
      $("#TeacherinfoForm").addClass("loading");
      },
      success:function(res){
        console.log(res);
        if(res.success == 1){
          Toast.success('Teacher Info deleted!');
          getTeacher($("#teacher"),"script/_getTeacher.php",$("#college").val());
            $("#teacherNameErrA").text("");
            $("#teacherNameErrE").text("");
            $("#emailErr").text("");
            $("#teacherNameE").val("");
            $("#teacherNameA").val("");
            $("#email").val("");
        }else if(res.success == 2){
           Toast.warning("The teacher has linked videos",'Unable to delete');
        }else{
          Toast.error('Unable to process your request');
        }
      },
      error:function(e){
        console.log(e.responseText);
      }
    });
  }
}
function getTeacherInfo(){
  $.ajax({
    url:"adminControl/_getTeacherInfo.php",
    type:"POST",
    data:{teacher: $("#teacher").val()},
    befoerSend:function(){
      $("#TeacherinfoForm").addClass("loading");
    },
    success:function(res){
      $.each(res.data,function(){
        $("#teacherNameE").val(this.teacher_name_e);
        $("#teacherNameA").val(this.teacher_name_a);
        $("#email").val(this.email);
      });
        console.log(res);
    },
    error:function(e){
      console.log(e.responseText);
    }
  });
}
</script>
</html>
