<?php
  header('Content-Type:text/html; charset=utf-8');
  session_start();
  session_unset();

  include_once("conn.php");
  include_once("varibles.php");
  include_once("libs.php");

  $cardid   = $_POST['cardid'];
  $password = $_POST['password'];

  $mps = md5($password);
  $sql = "SELECT * FROM ${admin} WHERE cardid='${cardid}'"; 
  $res = mysql_query($sql);

  if($row = mysql_fetch_row($res)){
    $sps = $row[2];
    if($sps == $mps){
      $_SESSION['cardid'] = $cardid;
      $_SESSION['admin']  = "admin";
      header("Location: admin.php");
    }else{
      echo "错误! 用户:'${cardid}' 密码错误！";
      exit();
    }
  }else{
    if(checkIdCard($cardid)){
      $sql = "SELECT * FROM ${users} WHERE cardid='${cardid}'"; 
      $res = mysql_query($sql);
          if($row = mysql_fetch_row($res)){
            $cardid = $row[1];
        $sps    = $row[10];
          if($sps == $mps){
            $_SESSION['cardid'] = $cardid;
              $_SESSION['normal'] = "normal";
              header("Location: users/index.php");
          }else{
               echo "错误! 用户: '${cardid}' 密码错误！";
               exit();
          }
          }

      echo "错误! 用户:'${cardid}' 不存在。";
      exit();
      }else{
      echo "错误! 身份证号:'${cardid}' 不是有效身份证号。";
      exit();
    }
    } 
?>
