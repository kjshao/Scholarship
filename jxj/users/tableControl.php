<th colspan=8 style="background: #dcf0d6;">
  <div class="btn-group tabCtrl">
    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <span id="btnJXJSel">奖学金</span><span>&nbsp;&nbsp;</span><span class="caret"></span>
    </button>
    <ul class="dropdown-menu">
      <?php
        include "../conn.php";
        $sql = "SELECT * FROM jxjkinds";
        $res=mysql_query($sql);
        $ntotal = 0;
        echo "<p id='li0' style='display:none'>x</p>";
        echo "<li class='seljxj'><a href=#>1、所有文章</a></li>";
        while($row=mysql_fetch_row($res)){
          if($row[3]==0 && $row[4]==0){
            $ntotal++;
            $id='li'.$ntotal;
            $idn = $ntotal+1;
            echo "<p id='{$id}' style='display:none'>{$row[2]}</p>";
            echo "<li class='seljxj'><a href=#>{$idn}、{$row[1]}</a></li>";
          }
        }
        echo "<p id='nlis' style='display:none'>{$ntotal}</p>";
      ?>
    </ul>
  </div>
</th>
