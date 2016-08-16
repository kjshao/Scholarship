<?php
include('../conn.php');
$sql = "DELETE FROM impact";
$res=mysql_query($sql);
$row = 1;
if (($handle = fopen("ifactor.csv", "r")) !== FALSE) {
  while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
    if ($row >= 3) {
      $name=$data[1];
      $ifactor=$data[3];
      //echo $name .$ifactor ."<br />\n";
      $sql = "INSERT INTO impact (journal,ifactor) VALUES ('$name','$ifactor')";
      $res=mysql_query($sql);
    }
    $row++;
  }
  fclose($handle);
}

$myfile=fopen("../users/journals.json","w");
$sql = "SELECT journal FROM impact"; 
$res=mysql_query($sql);
$rows=array();
while( $r = mysql_fetch_assoc($res) ){
  $rows[]=$r['journal'];
}
//fwrite($myfile,$rows);
fwrite($myfile,json_encode($rows));
fclose($myfile);
?>
