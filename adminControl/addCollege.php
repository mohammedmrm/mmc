
<body>
<form class="form-horizontal" id="addCollegeForm">
<fieldset>

<!-- Form Name -->
<legend>Add new college to the system</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-sm-4 control-label" for="collegeNameE">College name (English)</label>
  <div class="col-sm-4">
  <input id="collegeNameE" name="collegeNameE" type="text" placeholder="College name" class="form-control input-md">
  <span class="help-block">In English </span>
  </div>
  <label class="col-sm-4 text-danger" id="collegeNameErrE" for="addCollege"></label>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-sm-4 control-label" for="collegeNameA">College name (Arabic)</label>
  <div class="col-sm-4">
  <input id="collegeNameA" name="collegeNameA" type="text" placeholder="College name" class="form-control input-md">
  <span class="help-block">in Arabic</span>
  </div>
  <label class="col-sm-4 text-danger" id="collegeNameErrA" for="addCollege"></label>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-sm-4 control-label" for="collegeDesc">College description</label>
  <div class="col-sm-4">
    <textarea class="form-control" id="collegeDesc" name="collegeDesc"></textarea>
  </div>
  <label class="col-sm-4 text-danger" id="collegeDescErr" for="addCollege"></label>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-sm-4 control-label" for="addCollege">Save chanages</label>
  <div class="col-sm-4">
    <button id="addCollege" type="button" name="addCollege" class="btn btn-primary">Add</button>
  </div>
</div>

</fieldset>
</form>

<script>
 $('#addCollege').click(function(){
    $.ajax({
       url:"adminControl/_addCollege.php",
       type:"POST",
       data:$('#addCollegeForm').serialize(),
       beforeSend:function(){
         $("#addCollegeForm").addClass('loading');
       },
       success:function(res){
         $("#addCollegeForm").removeClass('loading');
         if(res.success != "1"){
         $("#collegeNameErrE").text(res.collegeNameE);
         $("#collegeNameErrA").text(res.collegeNameA);
         $("#collegeDescErr").text(res.collegeDesc);
         }else{
          Toast.defaults.displayDuration=5000;
          Toast.success.width='400px';
          Toast.success("New college added to the system");
          $("#collegeNameE").empty();
          $("#collegeNameA").empty();
          $("#collegeDesc").empty();
         }
         console.log(res);
       },
       error:function(e){
         $("#addCollegeForm").removeClass('loading');
         console.log(e.responseText);
       }

    });
 });
</script>
</body>


