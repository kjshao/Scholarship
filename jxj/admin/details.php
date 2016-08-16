<?php
  date_default_timezone_set('Asia/Shanghai');
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <title>文章具体信息</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="../jquery/1.12.4/jquery.min.js"></script>
  <script src="../bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container-fluid" style="margin-top:10px">
 <table class='table table-bordered table-condensed table-hover'>
 <?php
   $award = $_POST["award"];
   include "../conn.php";
   $sql = "SELECT id,journal,title,doi,nauthors,seq,ifactor,weight,coaffi,coauthor,award FROM journals WHERE idcard='".mysql_real_escape_string($_POST['cardid'])."'";
   $result=mysql_query($sql);
   $total=0.0;
   $count = 0;
   echo "
     <th>编号</th>
     <th>刊物</th>
     <th>标题</th>
     <th>DOI</th>
     <th>作者</th>
     <th>第一单位</th>
     <th>共同一作</th>
     <th>权重</th>
     <th>影响因子</th>
   ";
   while($row=mysql_fetch_assoc($result)){
     $x = explode("|",$row["award"]);
     $n = count($x) - 1;
     for ( $i=0; $i<$n; $i++ ) {
       if( $x[$i] == $award ) {
         $total=$total+$row['ifactor']*$row['weight'];
         $count++;
         $n=0;
         echo "<tr>";
         echo "<td>{$count}</td>";
         echo "<td>{$row['journal']}</td>";
         echo "<td>{$row['title']}</td>";
         echo "<td><a href='https://doi.org/{$row['doi']}' target='_blank'>{$row['doi']}</a></td>";
         echo "<td>{$row['seq']}/{$row['nauthors']}</td>";
         if ( $row['coaffi'] == "true" ) {
           echo "<td>是</td>";
         } else if ( $row['coaffi'] == "false" ) {
           echo "<td>否</td>";
         }
         if ( $row['coauthor'] == "true" ) {
           echo "<td>是</td>";
         } else if ( $row['coauthor'] == "false" ) {
           echo "<td>否</td>";
         }
         echo "<td>{$row['weight']}</td>";
         echo "<td>{$row['ifactor']}</td>";
         echo "</tr>";
///////////////////////// main if
       }
     }
   }
     echo "<tr>";
     echo " 
       <td colspan=9>
         加权后总影响因子：<span>$total</span>
       </td>";
     echo "</tr>";
 ?>
 </table>
</div>
</body>
</html>
