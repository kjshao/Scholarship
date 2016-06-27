<?php
$admin = "admin";
$users = "users";
$journals="journals";
$impact="impact";
$con = mysql_connect("localhost","root","admin123");
mysql_query("set names 'UTF8'");
$db_selected = mysql_select_db("jxj", $con);
?>
