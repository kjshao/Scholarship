$(document).ready(function($){

$(".btn-archive").click(function(){
  var i;
  var btn, id, ntotal, pass, idnp;
  var idy, idz, stat, npaper;
  btn = $(this);
  pass = {};
  idb = btn.attr("id");
  id = idb.split("b")[1];
  pass.award = $("#s"+id).text();
  ntotal = $("#"+idb+"num").text(); // number of students
  for ( i=1; i<=ntotal; i++ ) {
    idy = idb+"x"+i;
    idz = idb+"y"+i;
    idnp = idb+"p"+i;
    npaper = $("#"+idnp).text();
    pass.idcard = $("#"+idy).text();
    pass.ifactor = npaper+"x"+$("#"+idb+"z"+i).text();
    stat = $("#"+idz).prop("checked");
    if (stat) { $.post("archive.php", pass, function(){}); }
  }
  location.reload();
});

});
