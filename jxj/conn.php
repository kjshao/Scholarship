<?php
$dbname="jxj";
$con = mysql_connect("localhost","root","admin123");
mysql_query("set names 'UTF8'");
mysql_query("set character 'UTF8'");

if(!$con) {
  die('Could not connect: '.mysql_error());
}

$db_selected = mysql_select_db($dbname, $con);
if(!$db_selected) {
  $sql="CREATE DATABASE $dbname";
  if(mysql_query($sql,$con)){
    echo "Database $dbname created successfully\n";
    $db_selected=mysql_select_db($dbname,$con);
/////////////////// create table
$sql = "CREATE TABLE IF NOT EXISTS admin (
id        INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
username  VARCHAR(255) NOT NULL,
password  VARCHAR(255) NOT NULL)";	

$res = mysql_query($sql);

$sql = "CREATE TABLE IF NOT EXISTS users (
id        INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
cardid    VARCHAR(20)  NOT NULL,
name      VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
phone     VARCHAR(255) NOT NULL,
telp      VARCHAR(255) NOT NULL,
email     VARCHAR(255) NOT NULL,
major     VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
readway   VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
teacher   VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
year      INT(11)      NOT NULL,
password  VARCHAR(255) NOT NULL)";

$res = mysql_query($sql);

$sql = "CREATE TABLE IF NOT EXISTS journals (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  idcard VARCHAR(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  journal VARCHAR(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  title VARCHAR(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  doi VARCHAR(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  ifactor REAL NOT NULL,
  nauthors INT NOT NULL,
  seq INT NOT NULL,
  coaffi VARCHAR(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  coauthor VARCHAR(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  weight REAL NOT NULL,
  award VARCHAR(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  status VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
)";
$res = mysql_query($sql);

$sql = "CREATE TABLE IF NOT EXISTS impact (
id       INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
journal  VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
ifactor  REAL NOT NULL)";	

$res = mysql_query($sql);

$sql = "CREATE TABLE IF NOT EXISTS jxjkind0 (
id       INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
jxjname  VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
jxjid    VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL)";
$res = mysql_query($sql);

$sql = "CREATE TABLE IF NOT EXISTS jxjkinds (
id       INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
jxjname  VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
jxjid    INT(4) NOT NULL,
status   TINYINT(1) NOT NULL,
statusx  TINYINT(1) NOT NULL)";
$res = mysql_query($sql);

$sql = "CREATE TABLE IF NOT EXISTS students (
id       INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
idcard VARCHAR(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
award VARCHAR(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
nif VARCHAR(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
)";
$res = mysql_query($sql);

$sql = "CREATE TABLE IF NOT EXISTS archived (
id      INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
cardid  VARCHAR(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
award   VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
ifactor   VARCHAR(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
)";	
$res = mysql_query($sql);
/////////////////// create table
  }
}
?>
