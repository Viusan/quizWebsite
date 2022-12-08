<?php
//Blir kjørt i hver side, og den ser om du har blir bannet. Hvis du er bannet vil den ikke la det gå til noen andre sider en banpage.php
  if(isset($_SESSION["banned"])){
    $banned = $_SESSION["banned"];
    if($banned == 1){
      header("Location: banpage.php");
    }
  }