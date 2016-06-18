<?php
include('conn.php');
$tbname="students";
// check if variable is set and Add Journal Button pressed.
if(isset($_POST["submit"])=="Add Journal")
{
$idcard = "id number";
$journal = $_POST["journal"];
$title = $_POST["title"];
$doi = $_POST["doi"];
$ifactor = 1.0;
$nauthors = $_POST["nauthors"];
$seq = $_POST["seq"];
$coaffi = $_POST["coaffi"];
$coauthor = $_POST["coauthor"];
$weight = 1.0;
$award_nat = 0;
$award_ent = 0;
$award_oth = 0;

$sql = "INSERT INTO $tbname (idcard,journal,title,doi,ifactor,nauthors,seq,coaffi,coauthor,weight,award_nat,award_ent,award_oth) VALUES ('$idcard','$journal','$title','$doi','$ifactor','$nauthors','$seq','$coaffi','$coauthor','$weight','$award_nat','$award_ent','$award_oth')";
$result=mysql_query($sql,$conn);
$sql = "SET @count=0";
$result=mysql_query($sql,$conn);
$sql = "UPDATE  SET $tbname.id=@count:=@count+1";
$result=mysql_query($sql,$conn);
}
header("location: index.php");
?>
