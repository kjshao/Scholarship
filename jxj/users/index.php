<?php
  session_start();
  if( $_SESSION['normal'] == "normal" ){
  }else{
    header("Location: ../index.php");
  }
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
  <script src="typeahead.bundle.min.js"></script>
  <script src="the-basics.js"></script>
  <script src="delete.js"></script>
  <script src="edit.js"></script>
  <link rel="stylesheet" href="examples.css">
  <script src="handlebars.js"></script>
  <script src="examples.js"></script>
  <link rel="stylesheet" href="outline.css">
  <link rel="stylesheet" href="custom.css">
</head>
<body>
<!-- title -->
<div class="jumbotron text-center">
  <br><br>
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-2 text-center">
        <img src='dicp.svg' height='100'>
      </div>
      <div class="col-sm-10 text-left">
        <h2>奖学金评审系统</h2> 
        <p> 中国科学院大连化学物理研究所</p>
      </div>
    </div>
  </div>
</div>
<!-- navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid" style="margin-left:20px; margin-right:20px;">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="#scheduler" style="outline:none" >文章列表</a></li>
        <li><a href="#contact" style="outline:none" >奖学金类别</a></li>
      </ul>
      <div class="navbar-right">
        <?php
          include "conn.php";
          $sql = "SELECT name FROM ${users} WHERE cardid='".mysql_real_escape_string($_SESSION['cardid'])."'"; 
          $res = mysql_query($sql);
          $row= mysql_fetch_row($res);
          echo "<ul class='nav navbar-nav'>
            <li style='margin-top:14px'><span class='glyphicon glyphicon-user'></span></li>
            <li style='margin-top:14px'>&nbsp;$row[0]</li>
            <li><a href='exit.php' style='outline:none'>&nbsp;&nbsp;&nbsp;退出</a></li>
          </ul>";
        ?>
      </div>
    </div>
  </div>
</nav>
<!-- table -->
<div id="scheduler" class="container-fluid">
<div class="container-fluid">
<div class="panel panel-default box-shadow" style="margin-top: 3px;">
<div class="table-responsive">
<table id="main_table" class='table table-bordered table-striped table-condensed table-hover'>
    <thead>
      <th>编号</th>
      <th>发表刊物</th>
      <th>论文（成果）名称</th>
      <th>doi 号</th>
      <th>作者总数</th>
      <th>影响因子</th>
      <th>权重</th>
      <th colspan=2>
        <button type="button" id="btn_add" class="btn btn-success btn-outline btn-small glyphicon glyphicon-plus" data-toggle="modal" data-target="#addpaper">添加</button>
      </th>
    </thead>
    <tbody>
    <?php
      include "conn.php";
      $sql = "SELECT id,journal,title,doi,nauthors,seq,ifactor,weight FROM $journals WHERE idcard='".mysql_real_escape_string($_SESSION['cardid'])."'";
      $result=mysql_query($sql,$con);
      $total=0.0;
      if(mysql_num_rows($result)>0){
        while($row=mysql_fetch_assoc($result)){
          $total=$total+$row['ifactor']*$row['weight'];
          $n=0;
          echo "<tr>";
          foreach($row as $x=>$x_value){
            $n++;
            //array_search($x_value,$row)=="doi"
            //if($x_value=="") {$x_value="&nbsp;";}
            if($n==4) {
              echo "<td><a href='https://doi.org/{$x_value}' target='_blank'>$x_value</a></td>";
            }elseif($n==5) {
              echo "<td>{$row['seq']}/$x_value</td>";
            }elseif($n==6) {
            }else{
              echo "<td>{$x_value}</td>";
            }
          }
          echo '
          <td>
            <button type="button" class="btn btn-default btn-small btn-delete glyphicon glyphicon-trash"></button>
          </td>
          <td>
            <button type="button" class="btn btn-default btn-small btn-edit glyphicon glyphicon-pencil" data-toggle="modal"></button>
          </td>';
          echo "</tr>";
        }
      }
      echo "<tr>";
      echo " 
        <td colspan=9>
          加权后总影响因子：$total
        </td>";
      echo "</tr>";
    ?>
  </tbody>
  </table>
</div>
</div>
</div>
</div>
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
