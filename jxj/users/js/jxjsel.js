$(document).ready(function($){

$(".btn-select").click(function(){
  var idx, idy, stat, tmp;
  var ifx, wtx, j, totalif;
  idx = $(this).attr("id");
  idy = idx.split("l");
  j = idy[1];
  ifx = $("#if"+j).text();
  wtx = $("#w"+j).text();
  tmp = $("#totalIF").text();
  stat = $("#btnCheck"+j).prop("checked");
  if ( stat ) {
    $("#btnCheck"+j).prop("checked",false);
    totalif = parseFloat(tmp) - parseFloat(ifx*wtx);
  } else {
    $("#btnCheck"+j).prop("checked",true);
    totalif = parseFloat(tmp) + parseFloat(ifx*wtx);
  }
  totalif = totalif.toFixed(3);
  $("#totalIF").html(totalif);
});

$(".seljxj").click(function(){
  var i, j, k, id1, id2, idx, idy;
  var tmp, ntotal, ntr, x, n;
  var idjxj, nrel, flag, i1, j1, k1, nz;
  var tmpx, flagx;
  var totalif, ifx, wtx;
  
// clean up content in idselect
  $("#idselect").html("0");
// read in relationship of scholarship
  nrel = $("#nrels").text();
  var rels = new Array(nrel);
  for ( i=0; i<nrel; i++ ){
    n = $("#rel"+i).text();
    rels[i] = new Array(n);
    for ( j=1; j<=n; j++ ){
      rels[i][j-1] = $("#relx"+i+"y"+j).text();
    }
  }

// get the id of selected scholarship
  tmp = $(this).text();
  var jxjname = tmp.split("、")[1];
  i = tmp.split("、")[0];
  j = parseFloat(i-1);
  idjxj = $("#li"+j).text(); // id of scholarship
  $("#btnJXJSel").html(tmp);

  //ntotal = $("#nlis").text();
  //for ( i=1; i<=ntotal; i++ ) {
  //  tmp = $("#li"+i).text();
  //  alert(tmp);
  //}

// loop through journals
  totalif = 0;
  ntr = $("#ntrs").text();
  for ( j=1; j<=ntr; j++ ) {
    tmp = $("#jstatus"+j).text();
    x = tmp.split("|");
    n = x.length;
    tmp = $("#jstatusx"+j).text();
    flag = 0;
    flagx = 0;
    for ( k=0; k<n; k++) {
      id1 = tmp.split("|")[k];
      id2 = id1.split(".");
      // idx is the id of sholarship with the journal
      idx = id2[0];
      idy = id2[1];
      if ( idy == "T" ) { flagx = 1; }
      //alert(x[k]);
      //alert(idx);
      //alert(idy);
      if ( x[k] == jxjname ) {
        flag = 2;
        break;
      }

      // if idx and idjxj not belong to the same set.
      for ( i1=0; i1<nrel; i1++ ){
        nz = rels[i1].length;
        for ( j1=0; j1<nz; j1++ ) {
          if ( idjxj == rels[i1][j1] ) {
           for ( k1=0; k1<nz; k1++ ) {
             if ( idx == rels[i1][k1] ) {
               flag = 1;
             }
           }
          }
        }
      }
////////////////////////////
    }
    ifx = $("#if"+j).text();
    wtx = $("#w"+j).text();
    if ( flagx == 1 ) { // paper has been archived.
      $("#btn-delete"+j).attr('disabled','disabled');
      $("#btn-edit"+j).attr('disabled','disabled');
    } else if ( flagx == 0 ) {
      $("#btn-delete"+j).prop('disabled',false);
      $("#btn-edit"+j).prop('disabled',false);
    }
    if ( idjxj == "x" ) { // show all papers
      totalif = parseFloat(totalif) + parseFloat(ifx*wtx);
      $("#btn_update").hide();
      $("#tr"+j).show();
      $("#btnSel"+j).hide();
      $("#btnCheck"+j).prop("checked",false);
    }else if ( idjxj != "x" ) {
      $("#btn_update").show();
    if ( flag == 0 ) {
      $("#tr"+j).show();
      $("#btnSel"+j).show();
      $("#btnCheck"+j).attr('disabled','disabled');;
      $("#btnCheck"+j).prop("checked",false);
      tmpx = $("#idselect").text();
      tmpx = tmpx + "|" + j;
      $("#idselect").html(tmpx);
    }else if ( flag == 1 ) {
      $("#tr"+j).hide();
      $("#btnSel"+j).hide();
      $("#btnCheck"+j).prop("checked",false);
    }else if ( flag == 2 ) {
      $("#tr"+j).show();
      $("#btnSel"+j).show();
      $("#btnCheck"+j).attr('disabled','disabled');;
      $("#btnCheck"+j).prop("checked",true);
      totalif = parseFloat(totalif) + parseFloat(ifx*wtx);
      tmpx = $("#idselect").text();
      tmpx = tmpx + "|" + j;
      $("#idselect").html(tmpx);
    }
    }
  }
// loop through journals
  totalif = totalif.toFixed(3);
  $("#totalIF").html(totalif);
});

});
