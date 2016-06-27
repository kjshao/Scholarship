<?php
include_once("conn.php");
include_once("varibles.php");

$sql = "DROP TABLE ${admin}";
//$res = mysql_query($sql);

$sql = "DROP TABLE ${users}";
$res = mysql_query($sql);
?>