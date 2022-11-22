<?php

  function emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat) {
    $result;
    if (empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat)) {
      $result = true;
    }
    else {
      $result = false;
    }
  return $result;
}

  function invalidUid($username) {
    $result;
    if (!preg_match("/^[a-zA-z0-9]*$/", $username)) {
      $result = true;
    }
    else {
      $result = false;
    }
    return $result;
}

  function invalidEmail($email) {
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $result = true;
    }
    else {
      $result = false;
    }
    return $result;
}

  function pwdMatch($pwd, $pwdRepeat) {
    $result;
    if ($pwd !== $pwdRepeat) {
      $result = true;
    }
    else {
      $result = false;
    }
    return $result;
}

function uidExists($conn, $username, $email) {
  $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)){
    header("Location: ../signup.php?stmtfailed");
    exit(); //stopper scriten fra å kjøre
  }

  mysqli_stmt_bind_param($stmt, "ss", $username, $email);
  mysqli_stmt_execute($stmt);

  $resultData = mysqli_stmt_get_result($stmt);

  if ($row = mysqli_fetch_assoc($resultData)){
    return $row;
  }
  else {
    $result = false;
    return $result; 
  }

  mysqli_stmt_close($stmt);
}

function createUser($conn, $name, $email, $username, $pwd) {
  $sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd, level) VALUES (?, ?, ?, ?, 0);";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)){
    header("Location: ../signup.php?stmtfailed");
    exit(); //stopper scriten fra å kjøre
  }

  $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);  //Gjør om passordet bruker skriver til hash passsord

  mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPwd);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  header("Location: ../login.php?error=none");
    exit(); //stopper scriten fra å kjøre
}

function emptyInputLogin($username, $pwd) {
  $result;
  if (empty($username) || empty($pwd)) {
    $result = true;
  }
  else {
    $result = false;
  }
  return $result;
}

function loginUser($conn, $username, $pwd){
  $uidExists = uidExists($conn, $username, $username);

  if ($uidExists === false) {
    header("location: ../login.php?error=wronglogin");
    exit();
  }

  $pwdHashed = $uidExists["usersPwd"];
  $checkedPwd = password_verify($pwd, $pwdHashed);

  if ($checkedPwd === false) {
    header("location: ../login.php?error=wronglogin");
    exit();
  }

  else if ($checkedPwd === true){
    session_start();
    $_SESSION["userid"] = $uidExists["usersId"];
    $_SESSION["useruid"] = $uidExists["usersUid"];
    $_SESSION["userlevel"] = $uidExists["level"];
    header("location: ../homepage.php");
    exit();
  }
}
