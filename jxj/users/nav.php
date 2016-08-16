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
      <li><a class='lip' id="upinfo" style="outline:none;margin-top:13px;padding:0px 20px 0px 0px" >个人信息</a></li>
      <li><a href="jxjwait.php" id="jxjwait" target="_blank" style="outline:none;margin-top:13px;padding:0px 20px 0px 0px" >申请中</a></li>
      <li><a href="myjxj.php" id="myjxj" target="_blank" style="outline:none;margin-top:13px;padding:0px 20px 0px 0px" >已获得</a></li>
    </ul>
    <div class="navbar-right">
      <?php
        include "../conn.php";
        $sql = "SELECT name FROM users WHERE cardid='".mysql_real_escape_string($_SESSION['cardid'])."'"; 
        $res = mysql_query($sql);
        $row= mysql_fetch_row($res);
        echo "<ul class='nav navbar-nav'>
          <li style='margin-top:12px'><span class='glyphicon glyphicon-user' style='margin:0px; padding:0px 5px 0px 0px'></span></li>
          <li style='margin-top:12px'>$row[0]&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
          <li><a href='exit.php' style='outline:none;margin-top:12px;padding:0px'>退出</a></li>
        </ul>";
      ?>
    </div>
  </div>
</div>
