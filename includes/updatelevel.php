<?php
    session_start();
    include_once 'dbh.inc.php';
    if(isset($_POST['levelComplete']) || isset($_POST['nextLevel'])){
      $usersLevel = $_SESSION['userlevel'];
      $levelValue = $_POST['levelvalue'];
      if($usersLevel <= $levelValue){ //This is here incase the user plays the quiz again when they completed, it wil add they score level by 1 every time they play which will allow them to cheat their ways into different level
        $_SESSION['userlevel']++;
        $sql = "UPDATE users SET level = '" . $levelValue . "' WHERE usersUid = '" . $_SESSION['useruid'] . "';";
        $conn->query($sql);
      }

      if(isset($_POST['levelComplete'])){
        header("Location: ../homepage.php");
      }else if(isset($_POST['nextLevel'])){
        switch ($levelValue){
          case '1': header("Location: ../quiztwo.php"); break;
          case '2': header("Location: ../quizthree.php"); break;
        }
      }
    }else{
      header("Location: ../homepage.php");
    }
  ?>