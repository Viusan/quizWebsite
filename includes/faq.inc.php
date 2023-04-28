<?php

  include "dbh.inc.php";

  if(isset($_POST['faqsubmit'])){
      $sentQuestion = $_POST['question'];
      $sql = "INSERT INTO faq (question) VALUES (?);";
      $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
      header("Location: ../faqpage.php?stmtfailed");
      exit(); //stopper scriten fra å kjøre
    }
    mysqli_stmt_bind_param($stmt, "s", $sentQuestion);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location: ../faqpage.php?error=none");
  }

  if(isset($_POST['faqanswersubmit'])){
    $answeredQuestion = $_POST['answer'];
    $questionId = $_POST['answerid'];
    $sql = "UPDATE faq SET answer=?, display=? WHERE id=?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
      header("Location: ../admin.php?stmtfailed");
      exit(); //stopper scriten fra å kjøre
    }
    $one = 1;
    mysqli_stmt_bind_param($stmt, "sii", $answeredQuestion, $one, $questionId);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location: ../admin.php?error=none");
  }

  if(isset($_POST['deletequestion'])){
    $questionId = $_POST['answerid'];
    $sql = "DELETE FROM faq WHERE id=?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
      header("Location: ../admin.php?stmtfailed");
      exit(); //stopper scriten fra å kjøre
    }
    mysqli_stmt_bind_param($stmt, "i", $questionId);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location: ../admin.php?error=none");
  }
  