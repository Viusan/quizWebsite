<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link rel="icon" href="bilder/quizLogo.png">
  <title>Quiz</title>
</head>
<body class="homepageBody">
  <?php
    //På hele siden har jeg SESSION variabler som er tilkoblet til brukeren som er logget inn. Den ser etter om brukeren er over et spesifik level og hvis de er vil den displaye nivåer.
    include_once 'header.php';  
    include_once 'includes/ban.inc.php';
    if (isset($_SESSION["useruid"])){
      $userLevel = $_SESSION["userlevel"];
      echo "<div class='headerInformationContainer'>
        <h2>Welcome to the website</h2>
        <p>Scroll down to check out our quiz</p>";
      if($userLevel == 3){
        echo "<h1 id='completeTitle'>Wow, you completed everything!</h1>";
      }
      echo "</div>";

      echo "<div class='quizContainer'>
      <div class='quiz'>
        <img class='quizImg' src='bilder/level1.jpg'>
        <a href='quizone.php'><button class='quizButton'>Start</button></a>
      </div>";

      if(isset($_SESSION['userlevel'])){
        $userLevel = $_SESSION['userlevel'];
        if($userLevel > 0){
          echo "  <div class='quiz'>
              <img class='quizImg' src='bilder/level2.jpg'>
              <a href='quiztwo.php'><button class='quizButton'>Start</button></a>
            </div>";
        }else {
          echo "  <div class='quiz'>
              <img class='quizImg' src='bilder/completePreviousLevel.jpg'>
              <a href=''><button class='quizButton' disabled>Start</button></a>
            </div>";
        }
      }

      if(isset($_SESSION['userlevel'])){
        $userLevel = $_SESSION['userlevel'];
        if($userLevel > 1){
          echo "  <div class='quiz'>
              <img class='quizImg' src='bilder/level3.jpg'>
              <a href='quizthree.php'><button class='quizButton'>Start</button></a>
            </div>";
        }else {
          echo "  <div class='quiz'>
              <img class='quizImg' src='bilder/completePreviousLevel.jpg'>
              <a href=''><button class='quizButton' disabled>Start</button></a>
            </div>";
        }
      }

    }else {
      echo "<div class='headerInformationContainer'>
        <h2>Welcome to the website</h2>
        <p>log in or sign up to get access to the quiz</p>
        <div class='homepageButtonContainer'>
          <a href='signup.php'><button class='homepageOptionButton'>Sign up</button></a>
          <a href='login.php'><button class='homepageOptionButton'>Log In</button></a>
        </div>
      </div>";

      echo "<div class='quizContainer'>
        <div class='quiz'>
          <img class='quizImg' src='bilder/notPlayable.jpg'>
          <a href=''><button class='quizButton' disabled>Start</button></a>
        </div>
        <div class='quiz'>
          <img class='quizImg' src='bilder/notPlayable.jpg'>
          <a href=''><button class='quizButton' disabled>Start</button></a>
        </div>
        <div class='quiz'>
          <img class='quizImg' src='bilder/notPlayable.jpg'>
          <a href=''><button class='quizButton' disabled>Start</button></a>
        </div>
      </div>";
    }
  ?>
</body>
</html>