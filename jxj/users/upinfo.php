<?php
session_start();
include_once("../conn.php");

$idcard= $_SESSION['cardid'];
$name    = $_POST["name"];
$phone   = $_POST["phone"];
$telp    = $_POST["telp"];
$email   = $_POST["email"];
$major   = $_POST["major"];
$readway = $_POST["readway"];
$teacher = $_POST["teacher"];
$year    = $_POST["year"];

$sql = "UPDATE users SET name='$name', phone='$phone', telp='$telp', email='$email', major='$major', readway='$readway', teacher='$teacher', year='$year' WHERE cardid='$idcard'";
$result=mysql_query($sql);

?>
