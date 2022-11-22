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
    include_once 'header.php';
    if (isset($_SESSION["useruid"])){
      $userLevel = $_SESSION["userlevel"];
      echo "<div class='headerInformationContainer'>";
      echo "  <h2>Welcome to the website</h2>";
      echo "  <p>scroll down to check out our quiz</p>";
      if($userLevel == 3){
        echo "<h1 id='completeTitle'>Wow, you completed everything!</h1>";
      }
      echo "</div>";

      echo "<div class='quizContainer'>";
      echo "  <div class='quiz'>";
      echo "    <img class='quizImg' src='bilder/level1.jpg'>";
      echo "    <a href='quizone.php'><button class='quizButton'>Start</button></a>";
      echo "  </div>";


      if(isset($_SESSION['userlevel'])){
        $userLevel = $_SESSION['userlevel'];
        if($userLevel > 0){
          echo "  <div class='quiz'>";
          echo "    <img class='quizImg' src='bilder/level2.jpg'>";
          echo "    <a href='quiztwo.php'><button class='quizButton'>Start</button></a>";
          echo "  </div>";
        }else {
          echo "  <div class='quiz'>";
          echo "    <img class='quizImg' src='bilder/completePreviousLevel.jpg'>";
          echo "    <a href=''><button class='quizButton' disabled>Start</button></a>";
          echo "  </div>";
        }
      }

      if(isset($_SESSION['userlevel'])){
        $userLevel = $_SESSION['userlevel'];
        if($userLevel > 1){
          echo "  <div class='quiz'>";
          echo "    <img class='quizImg' src='bilder/level3.jpg'>";
          echo "    <a href='quizthree.php'><button class='quizButton'>Start</button></a>";
          echo "  </div>";
        }else {
          echo "  <div class='quiz'>";
          echo "    <img class='quizImg' src='bilder/completePreviousLevel.jpg'>";
          echo "    <a href=''><button class='quizButton' disabled>Start</button></a>";
          echo "  </div>";
        }
      }

    }else {
      echo "<div class='headerInformationContainer'>";
      echo "  <h2>Welcome to the website</h2>";
      echo "  <p>log in or sign up to get access to the quiz</p>";
      echo "  <div class='homepageButtonContainer'>";
      echo "    <a href='signup.php'><button class='homepageOptionButton'>Sign up</button></a>";
      echo "    <a href='login.php'><button class='homepageOptionButton'>Log In</button></a>";
      echo "  </div>";
      echo "</div>";

      echo "<div class='quizContainer'>";
      echo "  <div class='quiz'>";
      echo "    <img class='quizImg' src='bilder/notPlayable.jpg'>";
      echo "    <a href=''><button class='quizButton' disabled>Start</button></a>";
      echo "  </div>";
      echo "  <div class='quiz'>";
      echo "    <img class='quizImg' src='bilder/notPlayable.jpg'>";
      echo "    <a href=''><button class='quizButton' disabled>Start</button></a>";
      echo "  </div>";
      echo "  <div class='quiz'>";
      echo "    <img class='quizImg' src='bilder/notPlayable.jpg'>";
      echo "    <a href=''><button class='quizButton' disabled>Start</button></a>";
      echo "  </div>";
      echo "</div>";
    }
    /*
    if(isset($_SESSION['useruid'])){
      $loggedInUserName = $_SESSION['useruid'];
      if($loggedInUserName == "Sanchay"){
        echo "whats up blackie chan";
        echo $_SESSION["userlevel"];
      }else {
        echo "hey yo are cool";
      }
    }
    */
  ?>

  
</body>
</html>