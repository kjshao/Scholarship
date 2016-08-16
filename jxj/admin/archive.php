<?php
  include('../conn.php');
  $idcard = $_POST["idcard"];
  $award = $_POST["award"];
  $ifactor = $_POST["ifactor"];

  $sql = "INSERT INTO archived (cardid,award,ifactor) VALUES ('$idcard','$award','$ifactor')";
  $res=mysql_query($sql);

  $sql = "SELECT id,award,status FROM journals WHERE idcard='".mysql_real_escape_string($idcard)."'";
  $res=mysql_query($sql);
  while($row=mysql_fetch_row($res)){
    // loop through papers
    $statx = "";
    $jxjs = explode("|",$row[1]);
    $stat = explode("|",$row[2]);
    $n = count($jxjs);
    $n--;
    for ( $i=0; $i<$n; $i++ ) {
      if ( $jxjs[$i] == $award ) {
        $x = explode(".",$stat[$i])[0];
        $statx = $statx.$x.".T|";
      } else {
        $statx = $statx.$stat[$i]."|";
      }
    }
    $sql = "UPDATE journals SET award='{$row[1]}', status='{$statx}' WHERE id=$row[0] and idcard='".mysql_real_escape_string($idcard)."'";
    $result=mysql_query($sql);
    // loop through papers
  }
  $tmp = 1;
  $sql = "UPDATE jxjkinds SET statusx=$tmp WHERE jxjname='{$award}'";
  $result=mysql_query($sql);
?>
