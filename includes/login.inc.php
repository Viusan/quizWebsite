<?php
if (isset($_POST['submit'])) {
  $username = $_POST["uid"];
  $pwd = $_POST["pwd"];

  require_once 'dbh.inc.php';
  require_once 'functions.inc.php';

  if (emptyInputLogin($username, $pwd) !== false){
    header("Location: ../login.php?error=emptyinput");
    exit(); //stopper scriten fra å kjøre
  }

  loginUser($conn, $username, $pwd);
}
else {
  header("Location: ../login.php?dettefunaikkepenishodelol");
  exit();
}