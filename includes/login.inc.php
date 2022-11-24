<?php
if (isset($_POST['submit'])) {//Hvis submit knappen har blitt trukket på kjøres if statement
  $username = $_POST["uid"];
  $pwd = $_POST["pwd"];

  require_once 'dbh.inc.php';//Require once gjør at filen kjører bare hvis den får tak i disse filene
  require_once 'functions.inc.php';

  if (emptyInputLogin($username, $pwd) !== false){
    header("Location: ../login.php?error=emptyinput");
    exit(); //stopper scriten fra å kjøre
  }

  loginUser($conn, $username, $pwd);//Når du har trukket på log in kjøres loginUser funksjonen som ligger i function.inc.php
}
else {
  header("Location: ../login.php?dettefunaikkepenishodelol");
  exit();
}