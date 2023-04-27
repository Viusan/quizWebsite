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

    $sql = "SELECT * FROM faq";
    $result = $conn->query($sql);
    while ($row = $result -> fetch_assoc()){
      $display = $row["display"];
      if($display == 1){
        echo "
          <div>
            <p>".$row["question"]."</p>
            <p>".$row["answer"]."</p>
          </div>
        ";
      }
    }
    echo "
      <div>
        <h1>Send in questions</h1>
        <form action='includes/faqsend.php' method='POST'>
          <input name='question' type='text' placeholder='Write your question'>
          <button type='submit' name='faqsubmit'>Send inn</button>
        </form>
      </div>
    ";
  ?>
</body>
</html>