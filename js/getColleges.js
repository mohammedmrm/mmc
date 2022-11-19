function getColleges(trigger,url){
$.ajax({
    url:url,
    type:"POST",
    success:function(res){
     if(res.success == 1){
       $.each(res.data,function(){
        trigger.append(
            "<OPTION VALUE='"+this.college_id+"'>"+this.college_name_e+" | "+this.college_name_a+"</OPTION>"
        );
       });
     }else{
       trigger.append("<OPTION>ERROR</OPTION>");
     }
     console.log(res);
    },
    error:function(e){
     trigger.append("<OPTION>ERROR</OPTION>");
     console.log(e);
    }
});
}