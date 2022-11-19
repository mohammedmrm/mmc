<div class="col-sm-7">
<form class="form-horizontal" id="addTeacherForm">
<fieldset>
<!-- Form Name -->
<legend>Add new Teacher</legend>
<!-- Select Basic -->
<div class="form-group">
  <label class="col-sm-4 control-label" for="college">College</label>
  <div class="col-sm-4">
    <select id="college" onchange="callme()" name="college" class="form-control">
        <option value=""></option>
    </select>
  </div>
  <label class="col-sm-4 text-danger" id="collegeErr" for="college"></label>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-sm-4 control-label" for="teacherNameE">Teacher name (English)</label>
  <div class="col-sm-4">
  <input id="teacherNameE" onkeyup="callme()" name="teacherNameE" type="text" placeholder="Teacher Name " class="form-control input-sm">
  <span class="help-block">In English</span>
  </div>
  <label class="col-sm-4 text-danger" id="teacherNameErrE" for="college"></label>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-sm-4 control-label" for="teacherNameA">Teacher name (Arabic)</label>
  <div class="col-sm-4">
  <input id="teacherNameA" onkeyup="callme()" name="teacherNameA" type="text" placeholder="Teacher name" class="form-control input-sm">
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
  <div class="col-sm-4">
    <button id="addTeacher" type="button" name="addTeacher" class="btn btn-primary">Add</button>
  </div>
</div>
</fieldset>
</form>
</div>
<div class="col-sm-5">
<h5>Already exsist names</h5>
<div class="row" id="exsistName">
<table class="table table-striped table-responsive">
        <thead>
          <tr>
            <th>English Name</th>
            <th>Arabic Name</th>
            <th>ID</th>
            <th>VNo.</th>
          </tr>
        </thead>
        <tbody id="exsistnames">
        <tr>
            <th colspan="4">NO match result</th>
        </tr>
       </tbody>
</table>
</div>
<hr />
</div>
<script src="js/getColleges.js"></script>
<script>
  getColleges($("#college"),"script/_getColleges.php");
 $('#addTeacher').click(function(){
    $.ajax({
       url:"adminControl/_addTeacher.php",
       type:"POST",
       data:$('#addTeacherForm').serialize(),
       beforeSend:function(){
         $("#addTeacherForm").addClass('loading');
       },
       success:function(res){
         $("#addTeacherForm").removeClass('loading');
         if(res.success != "1"){
         $("#collegeErr").text(res.CollegeID);
         $("#teacherNameErrE").text(res.teacherNameE);
         $("#teacherNameErrA").text(res.teacherNameA);
         $("#emailErr").text(res.email);
         }else{
          Toast.defaults.displayDuration=5000;
          Toast.success.width='400px';
          Toast.success("New Teacher added to the system");
          $("#teacherNameE").val("");
          $("#teacherNameA").val("");
          $("#email").val("");
         }
         console.log(res);
       },
       error:function(e){
         $("#addTeacherForm").removeClass('loading');
         console.log(e);
       }

    });
 });
function callme(){
exsistName($("#college").val(),$('#teacherNameE').val(),$('#teacherNameA').val(),'#exsistnames')
}
 function exsistName(college,en,an,pointer){
 $.ajax({
   url:'script/_exsistName.php',
   type:'POST',
   method:"POST",
   data:{college: college,en:en,an:an},
   success:function(res){
     $(pointer).html("");

      $.each(res.data,function(){
       $(pointer).append(
         '<tr>'+
          '<td>'+this.teacher_name_e+'&nbsp; </td>'+
          '<td>'+this.teacher_name_a+'&nbsp; </td>'+
          '<td>'+this.teacher_id+'&nbsp; </td>'+
          '<td>'+this.vno+'&nbsp; </td>'+
         '</tr>'
       );
      });

     console.log(res);
   },
   error:function(e){
     console.log(e);
   }
 })
}
</script>