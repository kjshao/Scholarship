$(document).ready(function($){
  $("#btnAddJXJKind").click(function(){
     $("#modalAddJXJKind").modal();
     $("#newJXJKind").val('');
  });

  function errchk(id, str){
    blank = '不能为空';
    alert(str + blank);
    $(id).focus();
    return false;
  }

  $("#submitJXJKind").click(function(){
    $("#submitJXJKind").attr('disabled','disabled');
    pass = {};
    id = '#newJXJKind';
    pass.newJXJKind = $(id).val();
    if(pass.newJXJKind == ''){
      return errchk(id, '奖学金名称');
    }
    pass.kind = null;

    action = "addJXJKind.php";
    $.post(action, pass, function(){
      location.reload();
    });
  });
});
