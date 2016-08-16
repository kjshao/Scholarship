<?php
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
  <script src="js/details.js"></script>
  <link rel="stylesheet" href="css/custom.css">
</head>
<body>
<?php
  $award = $_POST["award"];
  include "../conn.php";
  $sql = "SELECT cardid, ifactor FROM archived WHERE award='{$award}'";
  $res=mysql_query($sql);
  $np = 0;
  $ap = array(); // students
  echo "<div class='div1 container-fluid box-shadow'>";
  echo "<table class='table table-bordered table-striped table-condensed table-hover'>";
  echo "<td colspan=11><span class='rowTitle'>获奖名单：{$award}</span>";
      echo "</tr>";
      echo "<tr>";
      echo "<td>编号</td>";
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
  while($row=mysql_fetch_row($res)){
    $np++;
    $ap[$np] = $row; //$ap[$np][0]: cardid; $ap[$np][1]: ifactor
    $sql = "SELECT * FROM users WHERE cardid='".mysql_real_escape_string($ap[$np][0])."'";
    $resy = mysql_query($sql);
    $rowy=mysql_fetch_row($resy);

    echo "<tr>";
    echo "<td>{$np}</td>";
    // name
    $id1 = $np;
    $idf1 = "a".$id1;
    echo "<td> <a id='{$id1}' class='hrefx lip'>{$rowy[2]}</a>
      <form action='details.php' method='POST' target='_blank' id='{$idf1}'>
        <input type='hidden' name='award' value='{$award}'/>
        <input type='hidden' name='cardid' value='{$ap[$np][0]}'/>
      </form>
    </td>";
    // name
    echo "<td>{$rowy[3]}</td>"; // phone
    echo "<td>{$rowy[4]}</td>"; // telp used as group name
    echo "<td>{$rowy[9]}</td>"; // year
    echo "<td>{$rowy[7]}</td>"; // kind
    echo "<td>{$rowy[6]}</td>"; // major
    echo "<td>{$rowy[8]}</td>"; // teacher
    $nifx = explode("x",$ap[$np][1]);
    echo "<td>{$nifx[0]}</td>"; // number of papers
    echo "<td id=''>{$nifx[1]}</td>"; // total if
    echo "</tr>";
  }
?>
</body>
</html>
