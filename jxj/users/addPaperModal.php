<div class="modal fade" id="addpaper" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">文章录入</h4>
      </div>
      <div class="modal-body">
		  <div id="paper-id"></div>
          <div class="form-group" id="prefetch">
            <label>期刊名：</label>
            <input type="text" class="typeahead form-control" id="journal" name="journal" placeholder="请在期刊列表中选择">
          </div>
          <div class="form-group">
            <label>文章标题：</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="<sup>上标</sup>，<sub>下标</sub>">
          </div>
          <div class="form-group">
            <label>DOI 号：</label>
            <input type="text" class="form-control" id="doi" name="doi" placeholder="文章 DOI 号">
          </div>
          <div class="form-group">
            <label>作者总数：</label>
            <input type="text" class="form-control" id="nauthors" name="nauthors" placeholder="正整数">
          </div>
          <div class="form-group">
            <label>署名顺序：</label>
            <input type="text" class="form-control" id="seq" name="seq" placeholder="正整数">
          </div>
          <div class="checkbox">
		  <label style="padding: 0px;"><input type="checkbox" id="coaffi" name="coaffi"/>&nbsp;是否为第一单位</label>
          </div>
          <div class="checkbox">
		  <label style="padding: 0px;"><input type="checkbox" id="coauthor" name="coauthor"/>&nbsp;是否为共同一作</label>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <button type="submit" id="submit" name="submit" class="btn btn-success">保存</button>
      </div>
    </div>
  </div>
</div>
