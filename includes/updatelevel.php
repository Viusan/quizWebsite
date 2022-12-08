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
        switch ($levelValue){ //Som en if statement. Ser om du er level 1 eller 2, så gir den deg mulighet til å gå til det neste nivået ditt
          case '1': header("Location: ../quiztwo.php"); break;
          case '2': header("Location: ../quizthree.php"); break;
        }
      }
    }else{
      header("Location: ../homepage.php");
    }
  ?>