<div class="modal fade" id="modalAddJXJ" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="myModalLabel">设置新的奖学金</h4>
  </div>
  <div class="modal-body">
    <div class="form-group">
      <textarea class="form-control" id="newJXJ" name="newJXJ" placeholder="奖学金名称"></textarea>
    </div>
  <label>奖学金类别：</label>
  <br>
  <?php
  //  $res=file_get_contents("JXJ.json","r");
  //  $jxjs=json_decode($res,true);
  //  foreach ($jxjs as $jxj => $name) {
  //    $ids="jxj".$jxj;
  //    echo "<div class='checkbox' style='display:inline'>";
  //    echo "<label><input type='checkbox' id='{$ids}' name='{$ids}'/>{$name}&nbsp;&nbsp;&nbsp;</label>";
  //    echo "</div>";
  //  }
  //  echo "<p style='display:none' id='njxjs'>{$jxj}</p>";
      include "../conn.php";
      $sql = "SELECT * FROM jxjkind0";
      $res=mysql_query($sql);
      $ntotal = -1;
      while($row=mysql_fetch_row($res)){
        $ntotal++;
        $ids="jxj".$ntotal;
        echo "<div class='checkbox' style='display:inline'>";
        echo "<label><input type='checkbox' id='{$ids}' name='{$ids}'/>{$row[1]}&nbsp;&nbsp;&nbsp;</label>";
        echo "</div>";
      }
      echo "<p style='display:none' id='njxjs'>$ntotal</p>";
  ?>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
    <button type="submit" id="submitJXJ" name="submitJXJ" class="btn btn-success">提交</button>
  </div>
</div>
</div>
</div>
