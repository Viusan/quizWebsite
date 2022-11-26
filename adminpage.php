<?php
session_start();
if(isset($_SESSION["admin"])){
  $admin = $_SESSION['admin'];
  if($admin == 1){
    echo "admin";
  }else{
    header("Location: homepage.php");
  }
}else{
  header("Location: homepage.php");
}
