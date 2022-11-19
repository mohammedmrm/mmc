<?php
require("script/dbconnection.php");
if(!empty($_GET['v'])){
  $query = "update media set watch=watch + 1 where media_id=?";
  setData($con,$query,[$_GET['v']]);
}
?>
<head>
  <title>Display</title>
<style>
.video-block{
    min-height: 550px !Important;
    max-height: 750px !Important;
    height: 550px;
    background-color: #fff;
}
.video-play {
margin:auto;
background-color: #666666;
position: relative;
height: 100%;
}
.video-related {
background-color: #666666;
position: relative;
height: 107%;
width:100%;
margin-left: 10px;
}

.center {
  width: 100%;
  height: 84%;
  text-align: center;
}
.bottom,.top {
  width: 100%;
  height: 8%;
  font-size: 150%;
  text-align: center;
  padding: 10px;
  background-color: #222;
  color: #999999;
}
.bottom:hover,.top:hover{
  color: #669933;
  cursor: pointer;
}
.lecturer {
  font-size: 12px;
  color: #FFFFFF;
  height: 20px;;
}

 .show {
   width: 100%;
   height: 100% ;
 }
  .video{
   width:25%;
   height: 33%;
   padding:10px;
  }
  .sub {
    width:100%;
    height: 100%;
    background-color: #444444;
  }
  .thum {
    height: 70%;
    width:100%;
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    text-align: center;
  }
  .title {
    color: #FFCC33;
    font-size:18px;
    padding:0px 10px;
    display: block;
    height: 20px;
    overflow: hidden;
  }
   .title2 {
    color: #fff;
    font-size:18px;
    padding:0px 10px;
    display: block;
    //margin-left: -45px;
    height: 48px;
    margin-top: 5px;
    border-radius: 2px;
    box-shadow: 1px 1px 3px #A9A9A9;
    background-color: #000000;
  }
  .date {
    color: #AAAAAA;
    display: block;
    padding:0px 10px;
  }
  .play-btn {
    width:50px;
    height: 50px;
    text-align: center;
    border-radius: 360px;
    border: #EEEEEE 1px solid;
    background-color: #222222;
    opacity: 0.5;
    color: #FFFFFF;
    padding:5px;
    margin: auto;
    top:25px;
    font-size: 30px;
    vertical-align: middle;
    position: relative;
  }
    .teacher {
    display: block;
    height: 20px;
    font-size: 16px;
    font-weight: 700;
    color: #fff;
    position: relative;
    text-align: center;
    background: #000000;
    //margin-right:-30px;
    margin-top:5px;
    overflow: hidden;
  }
  .play-btn:hover {
    color: #669933;
    cursor:pointer;
  }
  .video-real {
    height: 70%;
  }
  .desc {
    font-size: 14px;
    color: #EEEEEE;
    text-align: justify;
    background: #333333;
    display: block;
    //margin-left:-45px;
    padding: 10px;
    min-height: 80px;
    //width:115%;
}
.comment-block {
 display: block;
 background:#555555;
 border-top: 1px #F5F5F5 solid;
 border-top-left-radius: 10px;
 border-bottom-right-radius: 10px;

}
.comment-text{
 display: block;
 background: #222222;
 color: #fff;
 padding: 10px 15px;
 font-size:16px;
}
.comment-time{
 display: inline-block;
 color: #999999;
 padding-left: 15px;
 font-size:12px;
 font-style: italic;
}
.commenter{
 display: inline-block;
 font-weight: bold;
 color: #FFCC33;
 padding-left: 15px;
}
.comment-edit,.comment-delete{
  color: #A9A9A9;
  display: inline-block;
  width: 100px;
  text-align: center;
  cursor: pointer;
}
.comment-edit:hover,.comment-delete:hover{
  color: #fff;

}
.comment-form{
  position:relative;
  display: block;
  height: 40px;
  margin:0px;
  padding:3px;
  background: #A9A9A9;
}

</style>
</head>

<?php require("header.php");?>
<div class="row">
    <div class="container">
        <div class="row">
        <div class="col-md-12 video-block">
        <div class="row">
            <div class=" col-sm-9 video-play" id="video-play">

            </div>
            <div class="col-sm-3" id="moreVideos">
                <div class="video-related">
                <div class="top" id="top" onclick="getTeacherVideos(getUrlParameter('v'),'t')">
                   <span class="glyphicon glyphicon-chevron-up"></span>
                </div>
                <div class="center">
                   <div class="row ">
                     <input  type="hidden" id="btn1" value="0"/>
                     <span class="lecturer" id="who"></span>
                     <div class="col-sm-12" id="more">

                     </div>
                   </div>
                </div>
                <div class="bottom" onclick="getTeacherVideos(getUrlParameter('v'),'b')">
                    <span class="glyphicon glyphicon-chevron-down"></span>
                </div>
                </div>
            </div>
        </div>
        </div>
        </div>
        <div class="row">
            <div class="col-md-9 padding-none">
                 <div class="comment-form">
                   <div class="col-sm-12">
                       <form>
                       <div class="col-sm-4" ><input placeholder="الاســـم Name" type="text" class="form-control" id="commenter" /></div>
                       <div class="col-sm-6"><textarea placeholder="التعليـــق Comment" rows="1" class="form-control" id="comment" ></textarea></div>
                       <div class="col-sm-1"><input  type="button" value="Post" class="btn btn-primary" id="post"  /></div>
                       </form>
                   </div>
                 </div>
                 <hr />
                 <div class="comments" id="comments">
                  No comment yet!
                 </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="comment_editer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <input type="text" class="form-control" id="comment_edit"/>
      </div>
      <div class="modal-footer">
        <input type="hidden" id="tamp_commment_id"  />
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="update_comment">Save changes</button>
      </div>
    </div>
  </div>
</div>









<?php require("footer.php");?>
<script>
function getComments(media_id){
  $.ajax({
    url:"script/_getComments.php",
    type:'POST',
    data:{id: media_id},
    beforeSend:function(){
       $('#comments').addClass("loading");
    },
    success:function(res){
       $("#comments").html("");
      $('#comments').removeClass("loading");
      console.log(res);
      $.each(res.data,function(){
         $("#comments").append(
         '<div class="comment-block">'+
           '<span class="commenter">'+this.commenter+'</span><br />'+
           '<span class="comment-time">'+this.time2+'</span><br />'+
           '<span class="comment-text">'+this.comment+'</span>'+
           '<span class="comment-edit" onclick="editComment('+this.comment_id+')"><span class="glyphicon glyphicon-pencil  "> Edit </span></span> '+
           '<span class="comment-delete" onclick="deleteComment('+this.comment_id+')"><span class="glyphicon glyphicon-trash"> Delete </span></span> <br />'+
         '</div>'

         )
      });
    },
    error:function(e){
      $('#comments').removeClass("loading");
      console.log(e);
    }

  })
}
$("#moreVideos").hide();
function getTeacherVideos(videoID,dir){
  $.ajax({
    url:'script/_getTeacherVideos.php',
    type:'POST',
    data:{videoID: videoID,direction:dir,current:$("#btn1").val()},
    beforeSend:function(){
      $("#more").addClass("loading");
      $("#more").empty();
    },
    success:function(res){
      $("#more").removeClass("loading");
      $("#btn1").val(res.current);
      $.each(res.data, function(){
        $("#moreVideos").show();
        $("#who").html("<b>More by</b> <i>"+this.teacher_name_e+"</i>");
        $('#more').append(
            '<div class="col-sm-12 video">'+
              '<div class="sub">'+
                '<div class="thum" style="background-image:url('+this.snap_path+')">'+
                    '<a href="show.php?v='+this.media_id+'"><div class="play-btn"><span class="glyphicon glyphicon-play"></span></div></a>'+
                '</div>'+
                '<span class="title">'+this.title+'</span>'+
              '</div>'+
            '</div>'
        );
      });
      console.log(res);
    },
    error:function(e){
      $("#more").removeClass("loading");
      console.log(e);
    }
  });
}
getTeacherVideos(getUrlParameter("v"),"t");

function getVideo(videoID){
  $.ajax({
    url:'script/_getVideo.php',
    type:'POST',
    data:{videoID: videoID},
    beforeSend:function(){
      $("#video-play").addClass("loading");
    },
    success:function(res){
      $("#video-play").removeClass("loading");
      console.log(res);
      $.each(res.data,function(){
        $("#video-play").append(
         "<div class='video-real flowplayer'>"+
            '<video class="show" poster="'+this.snap_path+'" controls>'+
              '<source src="mmc/'+this.path+'" type="video/mp4">'+
              '<source src="mmc/'+this.path+'" type="video/ogg">'+
              '<source src="mmc/'+this.path+'" type="video/wmb">'+
              '<source src="mmc/'+this.path+'" type="video/avi">'+
              '<source src="mmc/'+this.path+'" type="video/flv">'+
              '<source src="mmc/'+this.path+'" type="video/wmv">'+
              'Your browser does not support HTML5 video.'   +
            '</video>'+
         "</div>"+
         "<div class='video-info'>"+
            "<div class='row'>"+
              "<div class='col-xs-8'>"+
                  "<span class='title2'>"+this.title+"</span>"+
              "</div>"+
              "<div class='col-xs-4'>"+
                  "<span class='teacher'>Lecturer : <i>"+this.teacher_name_e+"</i></span>"+
                  "<span class='teacher ar'> المحاضر : <i>"+this.teacher_name_a+"</i></span>"+
              "</div>"+
            "</div>"+

            "<span class='desc'>"+this.media_desc+"</span>"+
            "<span class='date'>"+this.time+"</span>"+ 
         "</div>"
        );
      });
    },
    error:function(e){
      $("#video-play").removeClass("loading");
      console.log(e);
    }
  });
}
function deleteComment(id){

   if(confirm("are you suer you want ot delete this comment?")){
      $.ajax({
        url:'script/_deleteComment.php',
        type:'POST',
        data:{comment_id: id},
        success:function(res){
          console.log(res);
          if(res.success == 1){
            getComments(getUrlParameter("v"));
          }else{
            alert(res.msg);
          }
        },
        error:function(e){
        console.log(e);
        alert("Unable to delete");
        }
      });
   }else{

   }
}
function setComment(media){
  $.ajax({
    url:"script/_setComment.php",
    type:"POST",
    beforeSend:function(){

    },
    data:{commenter:$("#commenter").val(),comment:$("#comment").val(),media_id:media},
    success:function(res){
      if(res.success == 1){
       getComments(getUrlParameter("v"));
      }else{
       alert(res.msg);
      }
      console.log(res);
    },
    error:function(e){
     console.log(e);
    }
  })
}

function editComment(comment_id){
  $('#comment_editer').modal('show');
  $("#tamp_commment_id").val(comment_id);
  $.ajax({
    url:"script/_getComment.php",
    type:"POST",
    data:{comment_id:comment_id},
    beforeSend:function(){
     $(".modal-body").addClass("loading");
    } ,
    success:function(res){
      $(".modal-body").removeClass("loading");
      if(res.success == 1){
        $("#comment_edit").val(res.data[0]["comment"]);
        getComments(getUrlParameter("v"));
      }
      console.log(res);

    },
    error:function(e){
      $(".modal-body").removeClass("loading");
      console.log(e);
    }
  });
}

function updateComment(comment_id){
  $.ajax({
    url:"script/_updateComment.php",
    data:{comment_id:comment_id,comment:$("#comment_edit").val()},
    type:"POST",
    beforeSend:function(){
     $(".modal-body").addClass("loading");
    } ,
    success:function(res){
      $(".modal-body").removeClass("loading");
      if(res.success == 1){
        $('#comment_editer').modal('hide');
        getComments(getUrlParameter("v"));
      }else {
        alert(res.msg);
      }
      console.log(res);

    },
    error:function(e){
      $(".modal-body").removeClass("loading");
      console.log(e);
    }
  });
}
$("#update_comment").click(function(){
 updateComment($("#tamp_commment_id").val());
 $("#tamp_commment_id").val("");
});
$("#post").click(function(){
 if(confirm("تاكد من كتابة التعليق بشكل صحيح قبل النشر او غلق المتصفح")){
   setComment(getUrlParameter("v"));
 }
});
getVideo(getUrlParameter("v"));
getComments(getUrlParameter("v"));
</script>