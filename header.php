  <?php
    session_start();//Starter session sånn at jeg kan bruke session variabler over alt (Siden header.php er med i alle filer så trenger jeg bare å starte session her)
  ?>

  <div class="headerContainer">
    <div class="logoContainer">
      <a href="index.php"><img src="bilder/quizLogo.png"></a>
      <a href="index.php"><p>Quiz</p></a>
    </div>
    <div class="headerSection2">
      <?php
      //Hvis det eksister et session so heter ['useruid'] så vil den displaye denne html-en
        if (isset($_SESSION["useruid"])){
          echo "<p>Hello " . $_SESSION['useruid'] . "! </p>";
          echo "<a href='faqpage.php' class='adminPageATag'>FAQ Page</a>";
          $admin = $_SESSION['admin'];
          if($admin == 1){ //Hvis du er admin så vil du få tilgang til å komme deg til admin siden
            echo "<a href='admin.php' class='adminPageATag'>Admin Page</a>";
          }
          echo "<a href='includes/logout.inc.php' class='logoutATag'><p>Log out</p></a>";
          
        }
      ?>
    </div>
  </div>