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
<body class="signUpBody">
  <?php
    include_once "header.php";
    include_once 'includes/ban.inc.php';
  ?>
  <div id="websiteContainer">
    <div id="signUpContainer">
      <div id="logo"></div>
      <div id="informasjonsContainer">
        <h1 id="createAccountTitle">Create an account</h1>
        <form action="includes/signup.inc.php" method="post">
          <input class="informasjonInput" name="name" type="text" placeholder="Fullname">
          <input class="informasjonInput" name="email" type="text" placeholder="E-Mail">
          <input class="informasjonInput" name="uid" type="text" placeholder="Username">
          <input class="informasjonInput" name="pwd" type="password" placeholder="Password">
          <input class="informasjonInput" name="pwdrepeat" type="password" placeholder="Repeat Password">
          <?php
          //Måten jeg displayer error er ved å se i url om det displayer error meldinger (Det er funksjoner som jeg har laget i functions.inc.php som gjør at det displayer ulike error meldinger)
            if (isset($_GET["error"])) {
              if ($_GET["error"] == "emptyinput") {
                echo "<p style='align-self: center;'>Fill in all fields.</p>";
              }
              else if ($_GET["error"] == "invaliduid") {
                echo "<p style='align-self: center;'>Choose a proper username.</p>";
              }
              else if ($_GET["error"] == "invalidemail") {
                echo "<p style='align-self: center;'>Choose a proper email.</p>";
              }
              else if ($_GET["error"] == "passworddontmatch") {
                echo "<p style='align-self: center;'>Pasword doesnt match.</p>";
              }
              else if ($_GET["error"] == "stmtfailed") {
                echo "<p style='align-self: center;'>Something went wrong.</p>";
              }
              else if ($_GET["error"] == "usernametaken") {
                echo "<p style='align-self: center;'>Username already in use.</p>";
              }
              else if ($_GET["error"] == "none") {
                echo "<p style='align-self: center;'>You have signed up.</p>";
              }
            }
          ?>
          <button class="submitButton" type="submit" name="submit">Sign Up</button>
          <a class="memberATag" href="login.php"><p>already have an account?</p></a>
        </form>
      </div>
    </div>
    <div id="imageContainer">
      <img src="bilder/quizSignUp.jpg" alt="">
    </div>
  </div>
</body>
</html>