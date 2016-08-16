$(document).ready(function($){
  $("#btnUpJXJRel").click(function(){
     $("#modalUpJXJRel").modal();
     $("#btnKindm").prop('disabled',false);
      var nx = $("#nkindsy").html();
      var ny = $("#nkindsx").html();
      for(i=0;i<nx;i++){
        $("#btnKindm"+i).hide();
      }
  });

  function errchk(id, str){
    blank = '不能为空';
    alert(str + blank);
    $(id).focus();
    return false;
  }

  $("#closeRel").click(function(){
    location.reload();
  });
///////////////////////////////////
  $("#btnKindm").click(function(){
    $("#btnKindm").attr('disabled','disabled');
    var nx = $("#nkindsy").html();
    var ny = $("#nkindsx").html();
    for(i=0;i<nx;i++){
      $("#btnKindm"+i).show();
    }
    $(".btnKindm").click(function(){
      var nz = parseFloat(nx)-1;
      var pass = new Array(nz);
      var passx = new Array(nz);
      var id=$(this).text();
      var ntotal = -1;
      for(i=0;i<nx;i++){
       if(i!=id){
        ntotal++;
        var nz=0;
        for(j=0;j<=ny;j++){
          var tmp = $("#upx"+i+"y"+j).prop("checked");
          if(tmp){
            nz++;
          }
        }
        pass[ntotal]= new Array(nz);
        passx[ntotal]= new Array(nz);
        var k=-1;
        for(j=0;j<=ny;j++){
          var tmp = $("#upx"+i+"y"+j).prop("checked");
          if(tmp){
            k++;
            var text = $("#upsx"+i+"y"+j).text();
            pass[ntotal][k]=text.trim();
            passx[ntotal][k]=j;
          }
        }
       }
      }
      var out={};
      out.pass=JSON.stringify(pass);
      out.passx=JSON.stringify(passx);
      action = "upJXJRel.php";
      $.post(action, out, function(){
        location.reload();
      });
    });
  });
///////////////////////////////////
  $("#btnKind").click(function(){
    $("#btnKind").attr('disabled','disabled');
    var nx = $("#nkindsy").html();
    var ny = $("#nkindsx").html();
    var pass = new Array(nx);
    var passx = new Array(nx);
    for(i=0;i<nx;i++){
      var nz=0;
      for(j=0;j<=ny;j++){
        var tmp = $("#upx"+i+"y"+j).prop("checked");
        if(tmp){
          nz++;
        }
      }
      pass[i]= new Array(nz);
      passx[i]= new Array(nz);
      var k=-1;
      for(j=0;j<=ny;j++){
        var tmp = $("#upx"+i+"y"+j).prop("checked");
        if(tmp){
          k++;
          var text = $("#upsx"+i+"y"+j).text();
          pass[i][k]=text.trim();
          passx[i][k]=j;
        }
      }
    }
    pass[nx]=new Array();
    passx[nx]=new Array();
    var out={};
    out.pass=JSON.stringify(pass);
    out.passx=JSON.stringify(passx);
    action = "upJXJRel.php";
    $.post(action, out, function(){
      location.reload();
    });
  });
///////////////////////////////////
  $("#submitRel").click(function(){
    $("#submitRel").attr('disabled','disabled');
    var nx = $("#nkindsy").html();
    var ny = $("#nkindsx").html();
    var pass = new Array(nx);
    var passx = new Array(nx);
    for(i=0;i<nx;i++){
      var nz=0;
      for(j=0;j<=ny;j++){
        var tmp = $("#upx"+i+"y"+j).prop("checked");
        if(tmp){
          nz++;
        }
      }
      pass[i]= new Array(nz);
      passx[i]= new Array(nz);
      var k=-1;
      for(j=0;j<=ny;j++){
        var tmp = $("#upx"+i+"y"+j).prop("checked");
        if(tmp){
          k++;
          var text = $("#upsx"+i+"y"+j).text();
          pass[i][k]=text.trim();
          passx[i][k]=j;
        }
      }
    }
    var out={};
    out.pass=JSON.stringify(pass);
    out.passx=JSON.stringify(passx);
    action = "upJXJRel.php";
    $.post(action, out, function(){
      location.reload();
    });
  });
//  $("#submitRel").click(function(){
//  $("#submitRel").attr('disabled','disabled');});
//  pass = {};
//  var ntotal = $("#nJXJRelUp").html();
//  var name,id,id1,idx;
//  pass.ntotal = ntotal;
//  for(i=0; i<=ntotal; i++){
//    id1 = '#JXJRelUpId'+i;
//    idx = "id"+i;
//    pass[idx] = $(id1).html();
//  }
//  for(i=0; i<=ntotal; i++){
//    id = '#JXJRelUp'+i;
//    name = "ax"+i;
//    pass[name] = $(id).val();
//    if(pass[name] == ''){
//      $("#submitRel").removeAttr('disabled');
//      return errchk(id, '名称');
//    }
//  }
//                                               
//  action = "upJXJRel.php";
//  $.post(action, pass, function(){
//    location.reload();
//  });
});
