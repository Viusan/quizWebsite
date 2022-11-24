  <?php
    session_start();//Starter session sånn at jeg kan bruke session variabler over alt (Siden header.php er med i alle filer så trenger jeg bare å starte session her)
  ?>

  <div class="headerContainer">
    <div class="logoContainer">
      <a href="homepage.php"><img src="bilder/quizLogo.png"></a>
      <a href="homepage.php"><p>Quiz</p></a>
    </div>
    <div class="headerSection2">
      <?php
      //Hvis det eksister et session so heter ['useruid'] så vil den displaye denne html-en
        if (isset($_SESSION["useruid"])){
          echo "<p>Hello " . $_SESSION['useruid'] . "! </p>";
          echo "<a href='includes/logout.inc.php' class='logoutATag'><p>Log out</p></a>";
        }
      ?>
    </div>
  </div>