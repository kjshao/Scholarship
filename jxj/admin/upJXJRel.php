<?php
session_start();
if(!isset($_SESSION['admin'])){
	header('Content-Type:text/html; charset=utf-8');
	echo "错误!没有权限!";
	exit(0);
}
include('../conn.php');

$file="../json/JXJKind.json";
//$infile = json_decode($_POST["pass"]);
$infile = ($_POST["pass"]);
file_put_contents($file,$infile);

$file="../json/JXJKindx.json";
//$infile = json_decode($_POST["pass"]);
$infile = ($_POST["passx"]);
file_put_contents($file,$infile);
?>
