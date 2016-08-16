<?php
include('../conn.php');

$jxjname = $_POST["newJXJ"];
$jxjid = $_POST["kind"];
$jxjstatus = 0;
$jxjstatusx= 0;

$sql = "INSERT INTO jxjkinds (jxjname,jxjid,status,statusx) VALUES ('$jxjname','$jxjid','$jxjstatus','$jxjstatusx')";
$res=mysql_query($sql);
?>
