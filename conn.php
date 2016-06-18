<?php
$dbname="jxj_testdb";
$conn=mysql_connect("localhost","root","admin123");
// after connection to the database
mysql_query("set names 'UTF8'"); //write
mysql_query("set character 'UTF8'"); //read
////////////////////////////////////////////
if(!$conn) {
  die('Could not connect: '.mysql_error());
}
$db_selected=mysql_select_db($dbname,$conn);
if(!$db_selected) {
  $sql="CREATE DATABASE $dbname";
  if(mysql_query($sql,$conn)){
    echo "Database $dbname created successfully\n";
    $db_selected=mysql_select_db($dbname,$conn);
    $table="students";
    $sqlCreate = "CREATE TABLE IF NOT EXISTS {$table} (
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
    $result=mysql_query($sqlCreate);
    if(!$result){
      echo "Error in creating table: ".mysql_error()."\n";
    }else{
      echo "Table $table created successfully.\n";
    }
  }else{
    echo "Error in creating database: ".mysql_error()."\n";
  }
}
?>
