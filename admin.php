<?php include_once "header.php";
      include "includes/dbh.inc.php";
      include_once 'includes/ban.inc.php';
?>
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
<body class="adminBody">
  <div class="searchBarDiv">
    <form action="" method="GET">
      <input type="text" name="search" placeholder="Search for a user" class="searchBar" id="searchInput">
      <button type="submit" class="searchButton">Search</button>
    </form>
  </div>
  <div class="webcontainer">
    <div class="tableDiv">
      <table class="adminTable">
        <tr>
          <th>User ID</th>
          <th>User Name</th>
          <th>User Email</th>
          <th>User Uid</th>
          <th>User Level</th>
          <th>User Admin</th>
          <th>User Banned</th>
        </tr>
      </table>

      <table id="dbTable" class="adminTable">
        <?php
          $sql = "SELECT * FROM users";
          $result = $conn-> query($sql);
          while ($row = $result->fetch_assoc()){
            $banText = "";//Gjør om 0 og 1 til tekst for utsene
            if($row['banned'] == 0){
              $banText = "NOT BANNED";
            }else if($row['banned'] == 1){
              $banText = "BANNED";
            }
          
            $adminText = "";//Gjør om 0 og 1 til tekst for utsene
            if($row['admin'] == 0){
              $adminText = "NOT ADMIN";
            }else if($row['admin'] == 1){
              $adminText = "ADMIN";
            }
          
            echo "<tr>
            <td class='adminTd'>". $row["usersId"] . "</td>
            <td class='adminTd'>". $row["usersName"] . "</td>
            <td class='adminTd'>". $row["usersEmail"] ."</td>
            <td class='adminTd'>". $row["usersUid"] ."</td>
            <td class='adminTd'>". $row["level"] ."</td>
            <td class='adminTd'>". $adminText ."</td>";
              if($banText == "BANNED"){
                echo "<td class='banned'>". $banText ."</td>";
              }else{
                echo "<td class='notBanned'>". $banText ."</td>";
              }
            echo "
            <td class='adminTd'><button class='banBtn' id=".$row['usersId']." value=".$row['banned'].">Ban/Unban</button></td>
            <td class='adminTd'> <a href='admin.php?id=". $row["usersId"] ."' class='deleteButton'>Delete </a></td>
          </tr>";
          }
        ?>
      </table>
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>
      $("#dbTable").on("click", ".banBtn", function(){
          console.log(this.id);
          $.post("includes/admin.inc.php", {
          selectedRowId: this.id,
          selectedRowBan: this.value
          }, function(data) {
              $("#dbTable").html(data);
          });
      });

      $("#searchInput").keyup(function(){
          $.post("includes/admin.inc.php", {
          searchedInput: this.value
          }, function(data) {
              $("#dbTable").html(data);
          });
      });
  </script>

  
<?php
    if(isset($_SESSION["admin"])){
      $admin = $_SESSION['admin'];
      if(!$admin == 1){
        header("Location: index.php");
      }
    }else{
      header("Location: index.php");
    }
    echo "<div class='answerFAQContainer'>";
    echo "<h2>Answer FAQ questions below</h2>";
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
</body>
</html>