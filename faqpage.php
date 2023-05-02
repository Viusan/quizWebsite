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
<body id="faqPageBody">
  <?php
  //På hele siden har jeg SESSION variabler som er tilkoblet til brukeren som er logget inn. Den ser etter om brukeren er over et spesifik level og hvis de er vil den displaye nivåer.
    include_once 'header.php';  
    include_once 'includes/ban.inc.php';
    include_once 'includes/dbh.inc.php';
    echo "
    <div class='questionSendContainer'>
      <h1>Send in questions</h1>
      <form action='includes/faq.inc.php' method='POST' class='sendForm'>
        <input name='question' type='text' placeholder='Write your question'>
        <button type='submit' name='faqsubmit'>Send inn</button>
      </form>
    </div>
    ";
    $sql = "SELECT * FROM faq";
    $result = $conn->query($sql);
    echo "<div class='faqContainerDiv'>";
    while ($row = $result -> fetch_assoc()){
      $display = $row["display"];
      if($display == 1){
        echo "
          <button class='dropDownButton'>".$row["question"]."</button>
          <div class='faqDiv'>
            <p>".$row["answer"]."</p>
          </div>
        ";
      }
    }
    echo "</div>";
  ?>
  <script>
    var dropDownButton = document.getElementsByClassName("dropDownButton");
    var i;

    for (i = 0; i < dropDownButton.length; i++) {
      dropDownButton[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
          panel.style.display = "none";
        } else {
          panel.style.display = "block";
        }
      });
    }
  </script>
</body>
</html>