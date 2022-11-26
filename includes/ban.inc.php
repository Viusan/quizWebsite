<?php
  if(isset($_SESSION["banned"])){
    $banned = $_SESSION["banned"];
    if($banned == 1){
      header("Location: banpage.php");
    }
  }