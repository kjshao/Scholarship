<?php
  date_default_timezone_set('Asia/Shanghai');
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <title>已入档奖学金</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="../jquery/1.12.4/jquery.min.js"></script>
  <script src="../bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="js/jxjstudents.js"></script>
</head>
<body>
<?php
  include('../conn.php');
  //$idcard = $_POST["idcard"];
  //$award = $_POST["award"];
  //$ifactor = $_POST["ifactor"];

  $sql = "SELECT DISTINCT award FROM archived";
  $res=mysql_query($sql);
  $n = 0;
  while($row=mysql_fetch_row($res)){
    $n++;
    $id1 = "a".$n;
    $id2 = "b".$n;
    $id3 = "c".$n;
    echo "<div class='container-fluid' style='margin-top:10px'>
         <table class='table table-bordered table-condensed table-hover'>";
    echo "<tr>
          <td>
            <a id='{$id1}' class='award'>{$row[0]}</a>
            <form action='jxjstudents.php' method='POST' target='_blank' id='{$id3}'>
              <input type='hidden' name='award' id='{$id2}'/>
            </form>
          </td>
          </tr>";
    echo "</table></div>";
  }

?>
</body>
</html>
