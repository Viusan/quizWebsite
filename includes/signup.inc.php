<?php

  if(isset($_POST["submit"])){

    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat) !== false){ //Du sender in de valusa i functionen
      header("Location: ../signup.php?error=emptyinput");
      exit();
    }

    if (invalidUid($username) !== false){
      header("Location: ../signup.php?error=invaliduid");
      exit(); //stopper scriten fra å kjøre
    }

    if (invalidEmail($email) !== false){
      header("Location: ../signup.php?error=invalidemail");
      exit(); //stopper scriten fra å kjøre
    }
  
    if (pwdMatch($pwd, $pwdRepeat) !== false){
      header("Location: ../signup.php?error=passworddontmatch");
      exit(); //stopper scriten fra å kjøre
    }
    if (uidExists($conn, $username, $email) !== false){
      header("Location: ../signup.php?error=usernametaken");
      exit(); //stopper scriten fra å kjøre
    }

    createUser($conn, $name, $email, $username, $pwd);
  }
  else {
    header("Location: ../signup.php");
    exit();
  }

  