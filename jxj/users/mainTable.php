<?php
  include "../conn.php";
  $sql = "SELECT id,journal,title,doi,nauthors,seq,ifactor,weight,coaffi,coauthor,award,status FROM journals WHERE idcard='".mysql_real_escape_string($_SESSION['cardid'])."'";
  $result=mysql_query($sql,$con);
  $total=0.0;
  $count = 0;
  if(mysql_num_rows($result)>0){
    while($row=mysql_fetch_assoc($result)){
      $count++;
      $total=$total+$row['ifactor']*$row['weight'];
      $n=0;
      $idr="tr".$count;
      echo "<tr id='{$idr}'>";
      foreach($row as $x=>$x_value){
        $n++;
        //array_search($x_value,$row)=="doi"
        //if($x_value=="") {$x_value="&nbsp;";}
        if($n==1) {
          echo "<td id='{$x_value}'>{$count}</td>";
        }elseif($n==4) {
          echo "<td><a href='https://doi.org/{$x_value}' target='_blank'>$x_value</a></td>";
        }elseif($n==5) {
          echo "<td>{$row['seq']}/$x_value</td>";
        }elseif($n==6) {
        }elseif($n==9 || $n==10){ // first author, first affi...
          echo "<td style='display:none'>{$x_value}</td>";
        }elseif($n==11){
          $idx = "jstatus".$count;
          echo "<p id=$idx style='display:none'>{$x_value}</p>";
        }elseif($n==12){
          $idx = "jstatusx".$count;
          echo "<p id=$idx style='display:none'>{$x_value}</p>";
          if (strpos($x_value, 'T') !== false) {
            $disabled = "disabled";
          } else {
            $disabled = "";
          }
        }elseif($n==7){
          $idx = "if".$count;
          echo "<td id=$idx>{$x_value}</td>";
        }elseif($n==8){
          $idx = "w".$count;
          echo "<td id=$idx>{$x_value}</td>";
        }else{
          echo "<td>{$x_value}</td>";
        }
      }
      $idy="btnCheck".$count;
      $idz="btnSel".$count;
      $ndy="btn-delete".$count;
      $ndz="btn-edit".$count;
      echo '
      <td>
        <button type="button" id="'.$ndy.'" class="btn btn-default btn-small btn-delete glyphicon glyphicon-trash" data-toggle="modal" data-target="#confirmDelete" data-id="'.$row['id'].'" data-count="'.$count.'" '.$disabled.'></button>
        <button type="button"  id="'.$ndz.'" class="btn btn-default btn-small btn-edit glyphicon glyphicon-pencil" data-toggle="modal" '.$disabled.'></button>
        <button type="button" id="'.$idz.'" class="btn btn-default btn-select btn-small" style="display:none"><input id="'.$idy.'" type="checkbox" unchecked style="display:inline;"/>选择</button>
      </td>';
      echo "</tr>";
    }
  }
  echo "<tr>";
  echo " 
    <td colspan=9>
      加权影响因子：<span id='totalIF'>$total</span>
    </td>";
  echo "</tr>";
  echo "<p id='ntrs' style='display:none'>{$count}</p>";
?>
