function getTeacher(trigger,url,ID){
  trigger.html("");
$.ajax({
    dataType: 'text json',
    url:url,
    type:"POST",
    data:{collegeID: ID},
    success:function(res){
     if(res.success == 1){
       trigger.append("<OPTION value=''>--Select Teacher--</OPTION>");
       $.each(res.data,function(){
        trigger.append(
            "<OPTION VALUE='"+this.teacher_id+"'>"+this.teacher_name_e+" | "+this.teacher_name_a+"</OPTION>"
        );
       });
     }else{
       trigger.append("<OPTION></OPTION>");
     }
     console.log(res);
    },
    error:function(e){
     trigger.append("<OPTION></OPTION>");
     console.log(e);
    }
});
}