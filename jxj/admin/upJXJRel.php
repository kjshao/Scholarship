<?php
include('../conn.php');

//for($i=0; $i<=$_POST["ntotal"]; $i++){
//  $name = "ax".$i;
//  $idx = "id".$i;
//  $tmp = $_POST[$name];
//  $id = $_POST[$idx];
//  $sql = "UPDATE jxjkind0 SET jxjid='{$tmp}' WHERE id='{$id}'";
//  $res=mysql_query($sql);
//}
$file="JXJKind.json";
//$infile = json_decode($_POST["pass"]);
$infile = ($_POST["pass"]);
file_put_contents($file,$infile);

$file="JXJKindx.json";
//$infile = json_decode($_POST["pass"]);
$infile = ($_POST["passx"]);
file_put_contents($file,$infile);
?>
