$(document).ready(function($){

$(".btn-archive").click(function(){
  //var test;
  //$("#confirmArchive").modal();

  //test = 0;
  //$("#aconfirm").click(function(){
  //  test = 1;
  //});
  //if ( test == 1 ) {
  //alert(test);
  var i, action;
  var btn, id, ntotal, pass, idnp;
  var idy, idz, stat, npaper;
  btn = $(this);
  idb = btn.attr("id");
  id = idb.split("b")[1];
  ntotal = $("#"+idb+"num").text(); // number of students
  pass = {};
  pass.award = $("#s"+id).text();
  for ( i=1; i<=ntotal; i++ ) {
    idy = idb+"x"+i;
    idz = idb+"y"+i;
    idnp = idb+"p"+i;
    npaper = $("#"+idnp).text();
    pass.idcard = $("#"+idy).text();
    pass.ifactor = npaper+"x"+$("#"+idb+"z"+i).text();
    pass.stat = $("#"+idz).prop("checked");
  
    $.ajax({
      method: "POST",
      url: "archive.php",
      async: false,
      data: pass
    });
  }
  //}
  location.reload();
});

});
