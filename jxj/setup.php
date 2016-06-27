<?php
include_once("conn.php");
include_once("varibles.php");

$sql = "CREATE TABLE IF NOT EXISTS ${admin} (
id        INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
username  VARCHAR(255) NOT NULL,
password  VARCHAR(255) NOT NULL)";	

$res = mysql_query($sql);

$sql = "CREATE TABLE IF NOT EXISTS ${users} (
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

$sql = "CREATE TABLE IF NOT EXISTS {$journals} (
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
  award_nat INT NOT NULL,
  award_ent INT NOT NULL,
  award_oth INT NOT NULL
)";
$res = mysql_query($sql);

$sql = "CREATE TABLE IF NOT EXISTS ${impact} (
id       INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
journal  VARCHAR(255) NOT NULL,
ifactor  REAL NOT NULL)";	

$res = mysql_query($sql);

?>
