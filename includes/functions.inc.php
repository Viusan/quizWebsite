<?php
  //Måten mange av disse funksjonene fungere på er at de sender true eller false til enten signup.inc.php eller login.inc.php. Deretter vil den displaye error melding hvis den er true
  function emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat) { //Ser om inputsa er tomme
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
    if (!preg_match("/^[a-zA-z0-9]*$/", $username)) {//Du kan bare bruke bokstavene a til z og tallene 0 - 9. 
      $result = true;
    }
    else {
      $result = false;
    }
    return $result;
}

  function invalidEmail($email) {
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { //Ser om du skrev inn et email format i inputen (tekst@tekst.tekst)
      $result = true;
    }
    else {
      $result = false;
    }
    return $result;
}

  function pwdMatch($pwd, $pwdRepeat) {
    $result;
    if ($pwd !== $pwdRepeat) {//Ser om passord og repeat passord input er lik
      $result = true;
    }
    else {
      $result = false;
    }
    return $result;
}

//Her bruker jeg prepeared statements og det er på en måte en blueprint der ? blir erstattet med det du skriver i input fielden (Grunnen til at jeg bruker prepeared statements er for å ungå sql injections)
function uidExists($conn, $username, $email) {
  $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;"; //Henter bruker navn og email som du skrev i input fielden
  $stmt = mysqli_stmt_init($conn); //Starter prepeared statementen
  if (!mysqli_stmt_prepare($stmt, $sql)){//Ser om det kom en error
    header("Location: ../signup.php?stmtfailed");
    exit(); //stopper scriten fra å kjøre
  }

  mysqli_stmt_bind_param($stmt, "ss", $username, $email);//Dette er det som erstatter ? med det du skriver i input fielden og gjør dem til en string.
  mysqli_stmt_execute($stmt);//Kjører prepeared statementen

  $resultData = mysqli_stmt_get_result($stmt);//Ser om det er resultat

  if ($row = mysqli_fetch_assoc($resultData)){//Henter info og putter i en assisiative array
    return $row;
  }
  else {
    $result = false;
    return $result; 
  }

  mysqli_stmt_close($stmt);//Lukker statement
}

function createUser($conn, $name, $email, $username, $pwd) {
  //Samme konsept som uidExists() (kommentert der om prepeared statements)
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

function emptyInputLogin($username, $pwd) {//Hvis inputs er empty sender den true hvis ikke, false.
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
  //Hivs uidExists returner false kjøres denne
  if ($uidExists === false) {
    header("location: ../login.php?error=wronglogin");
    exit();
  }

  $pwdHashed = $uidExists["usersPwd"];//Henter det hashed passorder i databasen
  $checkedPwd = password_verify($pwd, $pwdHashed);//Ser om det hashed passorder er samme som den som ligger i databasen

  if ($checkedPwd === false) {
    header("location: ../login.php?error=wronglogin");
    exit();
  }

  else if ($checkedPwd === true){
    session_start();//Starter en session som er et globalt variabel som kjøres på siden over alle filer
    $_SESSION["userid"] = $uidExists["usersId"];
    $_SESSION["useruid"] = $uidExists["usersUid"];
    $_SESSION["userlevel"] = $uidExists["level"];
    $_SESSION["banned"] = $uidExists["banned"];
    $_SESSION["admin"] = $uidExists["admin"];
    header("location: ../homepage.php");
    exit();
  }
}
