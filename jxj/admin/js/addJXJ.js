$(document).ready(function($){
  var njxjs = $("#njxjs").html();

  $("#btnAddJXJ").click(function(){
     $("#modalAddJXJ").modal();
       $("#newJXJ").val('');
       for(i=0; i<=njxjs; i++){
         $('#jxj'+i).prop('checked',false);
       }
       $("#submitJXJ").val("Add JXJ");
  });

  function errchk(id, str){
    blank = '不能为空';
    alert(str + blank);
    $(id).focus();
    return false;
  }

  $("#submitJXJ").click(function(){
    pass = {};
    id = '#newJXJ';
    pass.newJXJ = $(id).val();
    if(pass.newJXJ == ''){
      return errchk(id, '奖学金名称');
    }

    var tmp, ntotal, idx;
    ntotal = 0;
    var njxjs = $("#njxjs").html();
    for(i=0; i<=njxjs; i++){
      tmp = $('#jxj'+i).prop('checked');
      if(tmp) {
        ntotal++;
        idx = i;
      }
    }
    if(ntotal>1){
      $('#jxj'+idx).focus();
      alert("奖学金类别不能多于 1 个");
      return false;
    }else if(ntotal==0){
      $('#jxj0').focus();
      alert("请选择一个奖学金类别");
      return false;
    }else if(ntotal==1){
      pass.kind = idx;
    }

    action = "addJXJ.php";
    $.post(action, pass, function(){
      location.reload();
    });
  });
});
