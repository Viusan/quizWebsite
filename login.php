<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link rel="icon" href="bilder/quizLogo.png">
  <title>Quiz</title>
<body id="logInBody">
  <?php
    include_once "header.php";
  ?>
  <div id="logInWebsiteContainer">
    <div id="loginContainer">
      <h1 id="logInTitle">Log in</h1>
      <form action="includes/login.inc.php" method="POST">
        <input class="loginInput" name="uid" type="text" placeholder="Username">
        <input class="loginInput" name="pwd" type="password" placeholder="Password">
        <?php
          if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyinput") {
              echo "<p style='align-self: center;'>Fill in all fields.</p>";
            }
            else if ($_GET["error"] == "wronglogin") {
              echo "<p style='align-self: center;' class='errorPTag'>Incorrect login information.</p>";
            }
          }
        ?>
        <button class="submitButtonLogIn" name="submit" type="submit">Next</button>
        <a href="signup.php" class="memberATag"><p>do not have an account?</p></a>
      </form>
    </div>

  </div>
</body>
</html>