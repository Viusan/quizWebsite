  <?php
    session_start();
  ?>

  <div class="headerContainer">
    <div class="logoContainer">
      <a href="homepage.php"><img src="bilder/quizLogo.png"></a>
      <a href="homepage.php"><p>Quiz</p></a>
    </div>
    <div class="headerSection2">
      <?php
        if (isset($_SESSION["useruid"])){
          echo "<p>Hello " . $_SESSION['useruid'] . "! </p>";
          echo "<a href='includes/logout.inc.php' class='logoutATag'><p>Log out</p></a>";
        }
      ?>
    </div>
  </div>