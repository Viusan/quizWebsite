<?php
    session_start();
    include_once 'dbh.inc.php';
    //Hvis du trukker på enten et av disse knappene så kjøres if statement
    if(isset($_POST['levelComplete']) || isset($_POST['nextLevel'])){
      $usersLevel = $_SESSION['userlevel'];
      $levelValue = $_POST['levelvalue'];
      if($usersLevel <= $levelValue){ //Dette er hvis man repeterer quizen uten å fullføre neste quiz vil du kunne klare å jukse deg gjennom de andre nivåene
        $_SESSION['userlevel']++;//Oppdaterer level info på tabell
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