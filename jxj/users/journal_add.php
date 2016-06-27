<?php
session_start();
include('conn.php');
// check if variable is set and Add Journal Button pressed.
if(isset($_POST["submit"])=="Add Journal")
{
$idcard=$_SESSION['cardid'];
$journal = $_POST["journal"];
$title = $_POST["title"];
$doi = $_POST["doi"];

$sql = "SELECT journal,ifactor FROM $impact where journal='{$journal}'"; 
$res=mysql_query($sql);
if( $r = mysql_fetch_assoc($res) ){
  $ifactor=$r['ifactor'];
}

$nauthors = $_POST["nauthors"];
$seq = $_POST["seq"];
$coaffi = $_POST["coaffi"];
$coauthor = $_POST["coauthor"];

if($coaffi=="true"){
  if($coauthor=="true"){
    $weight=1.0;
  }elseif($seq==1){
    $weight=1.0;
  }elseif($seq==2){
    $weight=0.5;
  }elseif($seq==3){
    $weight=0.3;
  }else{
    $weight=0.0;
  }
}else{
  $weight = 0.0;
}

$award_nat = 0;
$award_ent = 0;
$award_oth = 0;

$sql = "INSERT INTO {$journals} (idcard,journal,title,doi,ifactor,nauthors,seq,coaffi,coauthor,weight,award_nat,award_ent,award_oth) VALUES ('$idcard','$journal','$title','$doi','$ifactor','$nauthors','$seq','$coaffi','$coauthor','$weight','$award_nat','$award_ent','$award_oth')";
$result=mysql_query($sql,$con);
$sql = "SET @count=0";
$result=mysql_query($sql,$con);
$sql = "UPDATE  SET $journals.id=@count:=@count+1";
$result=mysql_query($sql,$con);
}
header("location: index.php");
?>
