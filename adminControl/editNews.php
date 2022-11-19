<h1>تعديل الاخبار</h1>
<form id="newsForm">
<table>
<table id="newsTable" class="display table table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Title</th>
                <th>file path</th>
                <th>Logo</th>
                <th>Eidter</th>
                <th>date</th>
                <th>control</th>
            </tr>
        </thead>
        <tbody id="tbody">
        </tbody>

    </table>
</table>
</form>
<script>
function getNews(){
    var myform = document.getElementById("newsForm");
    var fd = new FormData(myform);
  $.ajax({
    url:"adminControl/_getNews.php",
    type:"POST",
    data:fd,
    cache: false,
    processData: false,  // tell jQuery not to process the data
    contentType: false,
    success:function(res){
       console.log(res);
       $('#tbody').html(" ");
       $.each(res.data,function(){
        $('#tbody').append(
         '<tr>'+
          '<td>'+this.title+'&nbsp; </td>'+
          '<td>'+this.file+'&nbsp; </td>'+
          '<td><img src="news/logo/'+this.logo+'" width="50px" height="30px"/></td>'+
          '<td>'+this.name+'&nbsp; </td>'+
          '<td>'+this.time+'&nbsp; </td>'+
          "<td><button type='button' onclick='deleteNew("+this.news_id+")'>حذف</button></td>"+
         '</tr>'
        );
       });
    },
    error:function(e){
      console.log(e);
    }
  });
}
getNews();

function deleteNew(id){
  if(confirm("هل انت متاكد من حذف الخبر")){
    $.ajax({
      url:"adminControl/_deleteNew.php",
      type:"POST",
      data:{id: id} ,
      success:function(res){
        console.log(res);
         if(res.success == 1){
           Toast.success("تم الحذف");
           getNews();
         } else{
           Toast.success(res.msg);
         }
      },
      error:function(e){
        console.log(e);
      }
    });
  }
}
</script>