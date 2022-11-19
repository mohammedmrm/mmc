<div class="col-sm-7">
<form class="form-horizontal" id="addAccountForm">
<fieldset>
<!-- Form Name -->
<legend>Add new Account</legend>
<!-- Select Basic -->
<div class="form-group">
  <label class="col-sm-4 control-label" for="college">   </label>
  <div class="col-sm-4">
    <select id="college" name="college" class="form-control">
        <option value="">-- select --</option>
    </select>
  </div>
  <label class="col-sm-4 text-danger" id="college_err" for="college"></label>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-sm-4 control-label" for="teacherNameE">Name</label>
  <div class="col-sm-4">
  <input id="name"  name="name" type="text" placeholder="Name " class="form-control input-sm">
  </div>
  <label class="col-sm-4 text-danger" id="name_err" for="college"></label>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-sm-4 control-label" for="email">email</label>
  <div class="col-sm-4">
  <input id="email"  name="email" type="text" placeholder="email" class="form-control input-sm">
   </div>
  <label class="col-sm-4 text-danger" id="teacherNameErrA" for="college"></label>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-sm-4 control-label" for="username">username</label>
  <div class="col-sm-4">
  <input id="username" name="username" type="text" placeholder="username" class="form-control input-sm">
  </div>
  <label class="col-sm-4 text-danger" id="email_err" for="college"></label>
</div>
<div class="form-group">
  <label class="col-sm-4 control-label" for="password">password</label>
  <div class="col-sm-4">
  <input id="password" name="password" type="text" placeholder="username" class="form-control input-sm">
  </div>
  <label class="col-sm-4 text-danger" id="password_err" for="college"></label>
</div>
<div class="form-group">
  <label class="col-sm-4 control-label" for="college">permission</label>
  <div class="col-sm-4">
    <select id="permission" name="permission" class="form-control">
        <option value="2">basic Account</option>
        <option value="1">Admin</option>
    </select>
  </div>
  <label class="col-sm-4 text-danger" id="permission_err" for="college"></label>
</div>
<!-- Button -->
<div class="form-group">
  <label class="col-sm-4 control-label" for="add">Save changes</label>
  <div class="col-sm-4">
    <button id="addAccount" type="button" name="addAccount" class="btn btn-primary">Add</button>
  </div>
</div>
</fieldset>
</form>
</div>
<script src="js/getColleges.js"></script>
<script>
  getColleges($("#college"),"script/_getColleges.php");
 $('#addAccount').click(function(){
    $.ajax({
       url:"adminControl/_addAccount.php",
       type:"POST",
       data:$('#addAccountForm').serialize(),
       beforeSend:function(){
         $("#addAccountForm").addClass('loading');
       },
       success:function(res){
         $("#addAccountForm").removeClass('loading');
         if(res.success != "1"){
         $("#college_err").text(res.college);
         $("#name_err").text(res.name);
         $("#email_err").text(res.email);
         $("#password_err").text(res.email);
         }else{
          Toast.defaults.displayDuration=5000;
          Toast.success.width='400px';
          Toast.success("New Account added to the system");
          $("#name").val("");
          $("#email").val("");
          $("#password").val("");
          $("#username").val("");
         }
         console.log(res);
       },
       error:function(e){
         $("#addAccountForm").removeClass('loading');
         console.log(e);
       }

    });
 });
</script>