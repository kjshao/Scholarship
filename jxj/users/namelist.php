<?php
session_start();
include('../conn.php');

$idcard=$_SESSION['cardid'];
$award = $_POST["jxj"];
$nif = $_POST["nif"];
$id = $_POST["id"];

if( $id == "F") {
  $sql = "INSERT INTO students (idcard,award,nif) VALUES ('$idcard','$award','$nif')";
} else {
  $sql = "UPDATE students SET idcard='$idcard', award='$award', nif='$nif' WHERE id='$id'";
}
$result=mysql_query($sql,$con);

?>
