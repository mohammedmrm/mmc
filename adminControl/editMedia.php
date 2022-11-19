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
        <div class="col-sm-8">
          <select id="teacher"  name="teacher" class="form-control">
         </select>
        </div>
     </div>
    </form>
    </div>
    <!-- -------------------------------------- -->
    <div class="col-sm-5">
      <table class="table table-striped table-responsive">
              <thead>
                <tr>
                  <th>Media title</th>
                  <th>Snap</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody id="AllVideos">
              <tr>
                  <th colspan="4">NO match result</th>
              </tr>
             </tbody>
      </table>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
      <div class="row">
      <div class="col-md-8">
        <form class="form-horizontal">
          <div class="form-group">
            <label class="col-sm-6 control-label" >Media Title</label>
            <div class="col-sm-6">
            <input id="title" name="title" type="text" placeholder="Title" class="form-control input-sm">
            <span class="text-danger" id="titleErr"></span>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-6 control-label" >Media Description</label>
            <div class="col-sm-6">
            <textarea id="desc"  name="desc" type="text" placeholder="Description" class="form-control input-sm"></textarea>
            <span class="text-danger" id="descErr"></span>
            </div>
          </div>
          <input type="hidden" id="videoID" value="0" />
        </form>
      </div>
      <div class="col-md-4">

      </div>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" onclick="updateVideoInfo()" class="btn btn-primary">Save changes</button>
      </div>
    </div>
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
$("#teacher").change(function(){
  getvideos($("#teacher").val());
});
function getvideos(teacher){
  $.ajax({
    url:"adminControl/_getAllTeacherVideos.php",
    type:"POST",
    data:{teacher:teacher},
    success:function(res){
       console.log(res);
       $('#AllVideos').html(" ");
       $.each(res.data,function(){
        $('#AllVideos').append(
         '<tr>'+
          '<td>'+this.title+'&nbsp; </td>'+
          '<td><img src="'+this.snap_path+'" width="50px" height="30px"/></td>'+
          '<td><button onclick="editMedia('+this.media_id+')" class="btn btn-default"><span class=" text-warning glyphicon glyphicon-edit"></span></button></td>'+
          '<td><button onclick="deleteMedia('+this.media_id+')" class="btn btn-default"><span class="text-danger glyphicon glyphicon-trash"></span></button></td>'+
         '</tr>'
        );
       });
    },
    error:function(e){
      console.log(e.responeText);
    }
  });
}
function editMedia(media){
  $("#videoID").val(media);
  $('#EditModal').modal('show');
}
function deleteMedia(media){
  $("#videoID").val(media);
  if(confirm("هل انت متاكد من حذف الفديو؟")){
    $.ajax({
      url:"adminControl/_deleteMedia.php",
      type:"POST",
      data:{media: media},
      success:function(res){
       if(res.success == 1){
         Toast.success('Media Info updated Successfully');
         getvideos($("#teacher").val());
       }else {
         Toast.warning('No media updated!');
       }
       console.log(res);
      },
      error:function(e){
       console.log(e.responseText);
       Toast.error('Unable to delete media!');
      }
    });
  }
}
$('#EditModal').on('show.bs.modal', function (event) {
  $.ajax({
    url:"script/_getVideo.php",
    type:"POST",
    data:{videoID: $("#videoID").val()},
    beforeSend:function(){
      $('.modal-body').addClass('loading');
    },
    success:function(res){
      $('.modal-body').removeClass('loading');
      console.log(res);
      $.each(res.data,function(){
        $("#title").val(this.title);
        $("#desc").val(this.media_desc);
      });
    },
    error:function(e){
     $('.modal-body').removeClass('loading');
    }
  });
});
function updateVideoInfo(){
  $.ajax({
    url:"adminControl/_updateVideoInfo.php",
    type:"POST",
    data:{media: $("#videoID").val(),title: $("#title").val(),desc:$("#desc").val()},
    beforeSend:function(){
     $('.modal-body').addClass('loading');
    },
    success:function(res){
     $('.modal-body').removeClass('loading');
     if(res.success == 1){
       Toast.success('Media Info updated Successfully');
       getvideos($("#teacher").val());
     }else {
       Toast.warning('No media updated!');
     }
     console.log(res);
    },
    error:function(e){
     $('.modal-body').removeClass('loading');
     console.log(e.responseText);
     Toast.error('Unable to update');
    }
  });
}
</script>
</html>
