<?php
include('../conn.php');

$jxjname = $_POST["newJXJKind"];
$jxjid = $_POST["kind"];

$sql = "INSERT INTO jxjkind0 (jxjname,jxjid) VALUES ('$jxjname','$jxjid')";
$res=mysql_query($sql);
?>
