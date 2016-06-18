<?php
  include "conn.php";
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <title>奖学金评审系统</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="jquery/1.12.4/jquery.min.js"></script>
  <script src="bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<button type="button" id="btn_add" class="btn btn-info btn-outline btn-small" data-toggle="modal" data-target="#addpaper">添加文章</button>
<!-- Modal -->
<div class="modal fade" id="addpaper" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">文章录入</h4>
      </div>
     <form class="default" method="post" action="journal_add.php">
      <div class="modal-body">
          <div class="form-group">
            <label>期刊名：</label>
            <input type="text" class="form-control" id="journal" name="journal">
          </div>
          <div class="form-group">
            <label>文章标题：</label>
            <input type="text" class="form-control" id="title" name="title">
          </div>
          <div class="form-group">
            <label>DOI 号：</label>
            <input type="text" class="form-control" id="doi" name="doi">
          </div>
          <div class="form-group">
            <label>作者总数：</label>
            <input type="text" class="form-control" id="nauthors" name="nauthors">
          </div>
          <div class="form-group">
            <label>署名顺序：</label>
            <input type="text" class="form-control" id="seq" name="seq">
          </div>
          <div class="checkbox">
            <label> <input type="checkbox" id="coaffi" name="coaffi" value="true" />是否为第一单位</label>
          </div>
          <div class="checkbox">
            <label> <input type="checkbox" id="coauthor" name="coauthor" value="true" />是否为共同一作</label>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <button type="submit" id="submit" name="submit" class="btn btn-success" value="Add Journal">保存</button>
      </div>
     </form>
    </div>
  </div>
</div>
</body>
</html>
