<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <title>Login</title>
</head>

<body>

<?php require("header.php");?>
<div class="row">
<div class="container" style="margin-top:30px">
<div class="col-md-4 col-md-offset-4">
    <div class="panel panel-default">
  <div class="panel-heading"><h3 class="panel-title"><strong>Sign in </strong></h3>
      <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Forgot password?</a></div>
  </div>

  <div class="panel-body">
   <form role="form">
   <div class=" text-danger" id="error">

   </div>
  <div style="margin-bottom: 12px" class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        <input id="username" type="text" class="form-control" name="username" value="" placeholder="username or email">
  </div>

  <div style="margin-bottom: 12px" class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
      <input id="password" type="password" class="form-control" name="password" placeholder="password">
  </div>

  <div class="input-group">
    <div class="checkbox" style="margin-top: 0px;">
      <label>
        <input id="remember" type="checkbox" name="remember" value="1"> Remember me
      </label>
    </div>
  </div>

  <button type="button" id="login" class="btn btn-success">Sign in</button>

  <hr style="margin-top:10px;margin-bottom:10px;" >
</form>
  </div>
</div>
</div>
</div>
</div>
<?php require("footer.php");?>

<script language="javascript">
$("#login").click(function(){
  if($('#remember').is(':checked')){
    rem = 1;
  }else{
    rem = 0;
  }
    $.ajax({
       url:'script/_login.php',
       type:"POST",
       data:{password: $('#password').val(), username: $("#username").val(),remember: rem},
       beforeSend:function(){

       },
       success:function(res){
         $("#error").text(res.error);
         if(res.error == "" || res.error == "null"){
          window.location.href = "../mmc/videoLib.php";
         }
       },
       error:function(e){

       }
    });
});

</script>
</body>
</html>
