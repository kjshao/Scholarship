<div class="modal fade" id="modalUpJXJRel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="myModalLabel">编辑奖学金关系</h4>
  </div>
  <div class="modal-body">
    <?php
      include "../conn.php";
      $sql = "SELECT * FROM jxjkind0";
      $res=mysql_query($sql);
      $ntotal = -1;
      $jxjkinds=array();
      while($row=mysql_fetch_row($res)){
        $ntotal++;
        $jxjkinds[$ntotal]=$row[1];
      }
      $res=file_get_contents("JXJKind.json","r");
      $jxjs=json_decode($res,true);
      $ntotaly=sizeof($jxjs);
      echo "<p style='display:none' id='nkindsx'>$ntotal</p>";
      echo "<p style='display:none' id='nkindsy'>$ntotaly</p>";
      
      for($i=0;$i<$ntotaly;$i++){
        $ids="JXJRel".$i;
        echo "<div class='container-fluid' id='$ids'>";
        $ids="btnKindm".$i;
        $ida="btnKindmn".$i;
        echo "<button type='button' id='$ids' class='btnKindm btn btn-warning btn-small glyphicon glyphicon-trash' style='display:none'><span style='display:none'>$i</span></button>";
        echo "<label>类别 {$i}：</label>";
        for($j=0;$j<=$ntotal;$j++){
          $xflag="unchecked";
          echo "<div class='checkbox' style='display:inline'>";
          foreach ($jxjs[$i] as $xjxj => $xname) {
            if($xname==$jxjkinds[$j]){
              $xflag="checked";
            }
          }
          $idy="upx".$i."y".$j;
          $idz="upsx".$i."y".$j;
          echo "<label><input type='checkbox' {$xflag} id='$idy'/><span id='$idz'>{$jxjkinds[$j]}&nbsp;&nbsp;&nbsp;</span></label>";
          echo "</div>";
        }
        echo "</div>";
        echo "<hr>";
      }
      echo "<div class='container-fluid'>";
      echo "<div class='btn-group' role='group' aria-label='...'>";
      echo "<button type='button' id='btnKind' class='btn btn-default btn-small glyphicon glyphicon-plus'></button>";
      echo "<button type='button' id='btnKindm' class='btn btn-default btn-small glyphicon glyphicon-minus'></button>";
      echo "</div>";
      echo "</div>";
        
      //foreach ($jxjs as $jxj => $name) {
      //  echo "<label>类别 {$jxj}：</label>";
      //  foreach ($name as $xjxj => $xname) {
      //    $ids="ax".$jxj."y"."$xjxj";
      //    echo "<div class='checkbox' style='display:inline'>";
      //    echo "<label><input type='checkbox' id='{$ids}' name='{$ids}' unchecked/>{$xname}&nbsp;&nbsp;&nbsp;</label>";
      //    echo "</div>";
      //  }
      //  echo "<br>";
      //}
      //}
      //echo "<p style='display:none' id='njxjs'>{$jxj}</p>";

      //include "../conn.php";
      //$sql = "SELECT * FROM jxjkind0";
      //$res=mysql_query($sql);
      //$ntotal = -1;
      //while($row=mysql_fetch_row($res)){
      //  $ntotal++;
      //  echo "<div class='form-group'>";
      //  echo "<label>{$row[1]}：</label>";
      //  $idx = "JXJRelUp".$ntotal;
      //  $idy = "JXJRelUpId".$ntotal;
      //  echo "<input class='form-control' id='$idx' name='$idx' value={$row[2]}></input>";
      //  echo "<p style='display:none' id='$idy' name='$idy'>$row[0]</p>";
      //  echo "</div>";
      //}
      //echo "<p style='display:none' id='nJXJRelUp'>$ntotal</p>";
    ?>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal" id="closeRel" name="closeRel">关闭</button>
    <button type="submit" id="submitRel" name="submitRel" class="btn btn-success">提交</button>
  </div>
</div>
</div>
</div>
