<?php
  $res=file_get_contents("../json/JXJKindx.json","r");
  $jxjs=json_decode($res,true);
  $ntotal=sizeof($jxjs);
  echo "<p style='display:none' id='nrels'>$ntotal</p>";
  echo "<p style='display:none' id='idselect'></p>";
  for($i=0;$i<$ntotal;$i++){
    $j = 0;
    foreach ($jxjs[$i] as $jxj => $name) {
      $j++;
      $idx = "relx".$i."y".$j;
      echo "<p style='display:none' id='{$idx}'>$name</p>";
    }
    $idx = "rel".$i;
    echo "<p style='display:none' id='{$idx}'>$j</p>";
  }
  $sql = "SELECT id,award,nif FROM students WHERE idcard='".mysql_real_escape_string($_SESSION['cardid'])."'";
  $result=mysql_query($sql,$con);
  if(mysql_num_rows($result)>0){
    while($row=mysql_fetch_assoc($result)){
      echo "<p style='display:none' id='myjxjid'>{$row['id']}</p>";
      echo "<p style='display:none' id='myjxjs'>{$row['award']}</p>";
      echo "<p style='display:none' id='myjxjsx'>{$row['nif']}</p>";
    }
   } else {
      echo "<p style='display:none' id='myjxjid'>F</p>";
      echo "<p style='display:none' id='myjxjs'></p>";
      echo "<p style='display:none' id='myjxjsx'></p>";
   }
?>
