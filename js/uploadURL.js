function uploadURL(formID){
    var myform = document.getElementById(formID);
    var fd = new FormData(myform);
    console.log(fd);
     $.ajax({
      url: 'script/_uploadURL.php',
      type: 'POST',
      data:fd,
      cache: false,
      processData: false,  // tell jQuery not to process the data
      contentType: false,
      beforeSend:function(){
       $('#uploadForm').addClass('loading');
      },
      xhr: function()
      {
        var xhr = new window.XMLHttpRequest();
        //Upload progress
        xhr.upload.addEventListener("progress", function(evt){
          if (evt.lengthComputable) {
            var percentComplete = evt.loaded / evt.total;
            x = Math.ceil((percentComplete * 100))
            $("#porgrass").html(
             '<div class="progress ">'+
                '<div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="40"'+
                'aria-valuemin="0" aria-valuemax="100" style="width:'+x+'%"> '+
                 x+'% '+
                '</div>'+
              '</div>'
            );
            console.log(Math.ceil(x));
            if (x == 100){
              $("#porgrass").html(('<b>Formating...</b>'));
            }
          }
        }, false);
        //Download progress
        xhr.addEventListener("progress", function(evt){
          if (evt.lengthComputable) {
            var percentComplete = evt.loaded / evt.total;
            //Do something with download progress
            $("#porgrass").html(('<b>Completed Successfully</b>'));
            console.log(percentComplete);
          }
        }, false);
        return xhr;
      },
      success:function(res){

        $('#uploadForm').removeClass('loading');
       console.log(res);
       if (res.success == "1"){
         $('input').empty();
        Toast.defaults.displayDuration=5000;
        Toast.success('New Media Added Successfully');
        $("input").empty();
       }else{
        Toast.defaults.displayDuration=5000;
        $("#porgrass").html('');
        Toast.error('Chek your inputs please!');
        $("#collegesErr").text(res.collegeID)
        $("#teachersErr").text(res.teacherID)
        $("#descErr").text(res.desc)
        $("#titleErr").text(res.title)
        $("#fileErr").text(res.file)
        $("#displayErr").text(res.display)
       }
      },
      error:function(e){
        $('#uploadForm').removeClass('loading');
        console.log(e);
      }
     });
}