<?php include_once "header.php";?>
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
<?php
  include_once "includes/dbh.inc.php";
  //Ser om du er admin, hvis du er det kan du komme deg til siden, ellers vil den altid ta deg med til homepage.php
  if(isset($_SESSION["admin"])){
    $admin = $_SESSION['admin'];
    if(!$admin == 1){
      header("Location: index.php");
    }
  }else{
    header("Location: index.php");
  }
  //Disse if statementene ser hva som dukker i url-en og kjører sql kode
  if (isset($_GET['id'])){//Ser etter id som dukker opp i url og sletter den id-en fra databasen
    $id = $_GET['id'];
    $delete = mysqli_query($conn, "DELETE FROM users WHERE usersId = '$id'");
  }

  if(isset($_GET['ban'])){//ser etter id igjen i database og setter ban value til 1 som gjør at brukeren blir bannet
    $banNumber = $_GET['ban'];
    $banChange = mysqli_query($conn, "UPDATE users SET banned = '1' WHERE usersId = '$banNumber'");
  }

  if(isset($_GET['unban'])){//Ser etter id og gjør om ban value til 0 som unbanner
    $unbanNumber = $_GET['unban'];
    $banChange = mysqli_query($conn, "UPDATE users SET banned = '0' WHERE usersId = '$unbanNumber'");
  }
  
  $searchName = "1";

  if(isset($_GET['search'])){
    if ($_GET['search'] != "") {
      $searchName = $_GET['search'];
    }
    $fetchUserSQL = "SELECT * FROM users WHERE usersName like '%$searchName%';";
    $fetchResult =  $conn-> query($fetchUserSQL);
    if($fetchResult -> num_rows > 0){
      while ($row = $fetchResult -> fetch_assoc()){
        
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
        <td style='background-color:#50C878;' class='adminTd'>". $row["usersId"] . "</td>
        <td style='background-color:#50C878;' class='adminTd'>". $row["usersName"] . "</td>
        <td style='background-color:#50C878;' class='adminTd'>". $row["usersEmail"] ."</td>
        <td style='background-color:#50C878;' class='adminTd'>". $row["usersUid"] ."</td>
        <td style='background-color:#50C878;' class='adminTd'>". $row["level"] ."</td>
        <td style='background-color:#50C878;' class='adminTd'>". $adminText ."</td>";
        if($banText == "BANNED"){
          echo "<td style='background-color:#50C878;' class='banned'>". $banText ."</td>";
        }else{
          echo "<td style='background-color:#50C878;' class='notBanned'>". $banText ."</td>";
        }
        echo "<td style='background-color:#50C878;' class='adminTd'> <a href='adminpage.php?ban=". $row["usersId"]. "' class='deleteButton'>BAN</a></td>
        <td style='background-color:#50C878;' class='adminTd'> <a href='adminpage.php?unban=". $row["usersId"]. "' class='deleteButton'>UNBAN</a></td>
        <td style='background-color:#50C878;' class='adminTd'> <a href='adminpage.php?id=". $row["usersId"] ."' class='deleteButton'>Delete </a></td>
      </tr>";
      
      }
    }
  } else {
    $searchName = "1";
  }

    $sql = "SELECT * FROM users WHERE NOT usersName like '%$searchName%';";
    $result = $conn-> query($sql);

    if($result -> num_rows > 0){//Displaye resultat fra database
      while ($row = $result -> fetch_assoc()) {
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

        //Lager tabellen
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
          <td class='adminTd'> <a href='adminpage.php?ban=". $row["usersId"]. "' class='deleteButton'>BAN</a></td>
          <td class='adminTd'> <a href='adminpage.php?unban=". $row["usersId"]. "' class='deleteButton'>UNBAN</a></td>
          <td class='adminTd'> <a href='adminpage.php?id=". $row["usersId"] ."' class='deleteButton'>Delete </a></td>
        </tr>";
      }
      echo "
          </table>
          </div>
          </div>
        ";
    }
    else{//Hvis det er ingen brukere
      echo "No users found";
    }
  ?>
</body>
</html>