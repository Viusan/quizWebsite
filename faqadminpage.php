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
    if(isset($_SESSION["admin"])){
      $admin = $_SESSION['admin'];
      if(!$admin == 1){
        header("Location: index.php");
      }
    }else{
      header("Location: index.php");
    }
    echo "<div>";
    $sql = "SELECT * FROM faq";
    $result = $conn->query($sql);
    while ($row = $result -> fetch_assoc()){
      $display = $row["display"];
      if($display == 0){
        echo "
        <div class='questionContainer'>
          <form action='includes/faqsend.php' method='POST'>
            <p id='".$row["id"]."'>".$row["question"]."</p>
            <input name='answer' type='text' placeholder='Write your answer'>
            <input type='hidden' value='".$row["id"]."' name='answerid'>
            <button type='submit' name='faqanswersubmit'>Send inn</button>
            <button type='submit' name='deletequestion'>Delete Question</button>
          </form>
        </div>
        ";
      }
    }
  ?>
  </div>
</body>
</html>