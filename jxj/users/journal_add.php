<?php
session_start();
include('../conn.php');
// check if variable is set and Add Journal Button pressed.
$idcard=$_SESSION['cardid'];
$journal = $_POST["journal"];
$title = $_POST["title"];
$doi = $_POST["doi"];

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

$sql = "SELECT journal,ifactor FROM impact where journal='{$journal}'"; 
$res=mysql_query($sql);
if( $r = mysql_fetch_assoc($res) ){
  $ifactor=$r['ifactor'];
} else {
  $ifactor = 0;
  $weight = 0.0;
}

$award = "";
$status = "";

if($_POST["submit"]=="Add Journal")
{
  $sql = "SELECT * FROM journals where idcard='{$idcard}' and doi='{$doi}'"; 
  $res=mysql_query($sql);
  if( $r = mysql_fetch_row($res) ){
    echo -1;
    exit;
  }
  $sql = "INSERT INTO journals (idcard,journal,title,doi,ifactor,nauthors,seq,coaffi,coauthor,weight,award,status) VALUES ('$idcard','$journal','$title','$doi','$ifactor','$nauthors','$seq','$coaffi','$coauthor','$weight','$award','$status')";
  $result=mysql_query($sql,$con);
  $sql = "SET @count=0";
  $result=mysql_query($sql,$con);
  $sql = "UPDATE  SET $journals.id=@count:=@count+1";
  $result=mysql_query($sql,$con);
}

if($_POST["submit"]=="Edit Journal"){
  $id = $_POST["id"];

  $sql = "SELECT * FROM journals where idcard='{$idcard}' and doi='{$doi}' and id<>'{$id}'"; 
  $res=mysql_query($sql);
  if( $r = mysql_fetch_row($res) ){
    echo -1;
    exit;
  }
  $sql = "UPDATE journals SET journal='$journal', title='$title', doi='$doi', ifactor='$ifactor', nauthors='$nauthors', seq='$seq', coaffi='$coaffi', coauthor='$coauthor', weight='$weight' WHERE idcard='$idcard' and id='$id'";
  $result=mysql_query($sql,$con);
}
?>
