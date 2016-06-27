$(document).ready(function($){
  $(".btn-delete").click(function(){
   var tds=$(this).parent().parent("tr").children("td");
   var i=tds.eq(0).text();
   if(i != null) {
    $.post("delete.php", {
      id:i
      },function(){window.location.href='index.php';});
    }
    });
});
