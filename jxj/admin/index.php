<?php
  session_start();
  if( $_SESSION['admin'] == "admin" ){
  }else{
    header("Location: ../index.php");
  }
  date_default_timezone_set('Asia/Shanghai');
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <title>大连化学物研究所奖学金评审系统</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="../jquery/1.12.4/jquery.min.js"></script>
  <script src="../bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="js/addJXJ.js"></script>
  <script src="js/addJXJKind.js"></script>
  <script src="js/addIF.js"></script>
  <script src="js/upJXJStatus.js"></script>
  <script src="js/upJXJRel.js"></script>
  <script src="js/jxjOC.js"></script>
  <script src="js/archive.js"></script>
  <script src="js/dropdown.js"></script>
  <script src="js/details.js"></script>
  <link rel="stylesheet" href="css/custom.css">
  <link rel="stylesheet" href="css/outline.css">
</head>
<body>
<!-- navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
  <?php include_once('navbar.php'); ?>
</nav>

<?php
  include "../conn.php";
  $sql = "SELECT * FROM jxjkind0";
  $res=mysql_query($sql);
  $jkinds=array();
  while($row=mysql_fetch_assoc($res)){
    $id = $row["id"]-1;
    $name = $row["jxjname"];
    $jkinds[$id] = $name;
  }

  $sql = "SELECT * FROM jxjkinds";
  $res = mysql_query($sql);
  $sql = "SELECT * FROM students";
  $resx = mysql_query($sql);
  $ntotal = 0;
  $nactive = 0;
  $np = 0;
  $ap = array(); // students
  while($rowx=mysql_fetch_row($resx)){
    $np++;
    $ap[$np] = $rowx;
  }
  echo "<div class='div1 container-fluid box-shadow'>";
  while($row=mysql_fetch_row($res)){
    $ntotal++;
    $id=$row[2];
    if($row[3]==0){
      $stat = "开启";
    }elseif($row[3]==1){
      $stat = "关闭";
    }
    if($row[4]==0){
      $nactive++;
      $statx = "未入档";
      $idown = "down".$nactive; // id of table
      $idt = "tab".$nactive; // id of table
      $idx = "t".$nactive; // id of table
      $ids = "s".$nactive; // id of award
      $idb = "b".$nactive; // id of buttun for archive
      $ido = "o".$row[0];
      echo "<p id='$idx' style='display:none'>{$nactive}、{$row[1]}</p>";
      if ( $nactive == 1 ) {
        echo "<table id='{$idt}' class='table table-bordered table-striped table-condensed table-hover'>";
      } else {
        echo "<table id='{$idt}' style='display:none' class='table table-bordered table-striped table-condensed table-hover'>";
      }
      echo "<tr style='background: #dcf0d6;'>";
      echo "<td colspan=11><span id='$ids' class='rowTitle'>{$row[1]}</span>";
      echo "<div class='btn-group' style='float:left'>";
      echo "<button type='button' class='btn btn-default dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'><span id='btnJXJDown'>奖学金</span><span>&nbsp;&nbsp;</span><span class='caret'></span></button>";
      echo "<ul class='dropdown-menu jxjDown'></ul>";
      echo "</div>";

      echo "<div class='btn-group' style='float:right'>";
      echo "<button id='{$idb}' type='button' class='btn btn-default btn-small btn-archive'>入档</button>";
      if ( $row[3] == 0 ) {
        echo "<button id='{$ido}' type='button' class='btn btn-success btn-small btn-oc'>关闭</button></td></div>";
      } else if ( $row[3] == 1 ) {
        echo "<button id='{$ido}' type='button' class='btn btn-warning btn-small btn-oc'>开启</button></td></div>";
      }
      echo "</tr>";
      echo "<tr>";
      echo "<td>编号</td>";
      echo "<td>选择</td>";
      echo "<td>姓名</td>";
      echo "<td>联系方式</td>";
      echo "<td>组别</td>";
      echo "<td>入学年份</td>";
      echo "<td>攻读类别</td>";
      echo "<td>专业</td>";
      echo "<td>指导教师</td>";
      echo "<td>文章总数</td>";
      echo "<td>影响因子</td>";
      echo "</tr>";
      $nl = 0;
      for ( $j=1; $j<=$np; $j++ ) {
        $jxjs = explode("|",$ap[$j][2]);
        $nif = explode("|",$ap[$j][3]);
        $n = count($jxjs) - 1;
        for ( $i=0; $i<$n; $i++ ) {
          if( $jxjs[$i] == $row[1] ) {
            $sql = "SELECT * FROM users WHERE cardid='".mysql_real_escape_string($ap[$j][1])."'";
            $resy = mysql_query($sql);
            $rowy=mysql_fetch_row($resy);
            $nl++;
            $idy = $idb."x".$nl;
            $idz = $idb."y".$nl;
            $idif = $idb."z".$nl;
            $idnp = $idb."p".$nl;
            $idhref = $ids."|".$idy;
            $idf1 = $ids."f";
            $idf2 = $ids."a";
            $idf3 = $ids."c";
            echo "<tr>";
            echo "<td>{$j}</td>";
            echo "<td><input id='$idz' type='checkbox' unchecked style='display:inline'/></td>";
            echo "<td> <a id='{$idhref}' class='hrefDetails lip'>{$rowy[2]}</a>
              <form action='details.php' method='POST' target='_blank' id='{$idf1}'>
                <input type='hidden' name='award' id='{$idf2}'/>
                <input type='hidden' name='cardid' id='{$idf3}'/>
              </form>
            </td>"; // name
            echo "<td>{$rowy[3]}</td>"; // phone
            echo "<td>{$rowy[4]}</td>"; // telp used as group name
            echo "<td>{$rowy[9]}</td>"; // year
            echo "<td>{$rowy[7]}</td>"; // kind
            echo "<td>{$rowy[6]}</td>"; // major
            echo "<td>{$rowy[8]}</td>"; // teacher
            $nifx = explode("x",$nif[$i]);
            echo "<td id='{$idnp}'>{$nifx[0]}</td>"; // number of papers
            echo "<td id='{$idif}'>{$nifx[1]}</td>"; // total if
            echo "</tr>";
            echo "<p id='$idy' style='display:none'>{$ap[$j][1]}</p>"; // cardid
          }
        }
      }
      $idy = $idb."num";
      echo "<p id='$idy' style='display:none'>{$nl}</p>";
      echo "</table>";
    }elseif($row[4]==1){ // 历年奖学金
      //$statx = "已入档";
      //echo "<p>序号：$ntotal 名称：{$row[1]} 类别：{$jkinds[$id]} 状态：$stat $statx</p>";
      //echo "<p>获奖名单：</p>";
      //for ( $j=1; $j<=$np; $j++ ) {
      //  $jxjs = explode("|",$ap[$j][2]);
      //  $n = count($jxjs) - 1;
      //  for ( $i=0; $i<$n; $i++ ) {
      //    if( $jxjs[$i] == $row[1] ) {
      //      $sql = "SELECT * FROM users WHERE cardid='".mysql_real_escape_string($ap[$j][1])."'";
      //      $resy = mysql_query($sql);
      //      $rowy=mysql_fetch_row($resy);
      //      echo "<p>姓名：{$rowy[2]}；身份证号：{$ap[$j][1]}</p>";
      //    }
      //  }
      //}
      //echo "<hr>";
    }
  }
  echo "</div>";
  echo "<p id='nactive' style='display:none'>{$nactive}</p>";
?>

<?php include_once('addJXJKindModal.php'); ?>
<?php include_once('upJXJRelModal.php'); ?>
<?php include_once('addJXJModal.php'); ?>
<?php include_once('addIFModal.php'); ?>
<?php include_once('upJXJStatusModal.php'); ?>
</body>
</html>
