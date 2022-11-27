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
  <table class="adminTable">
    <tr>
      <th>User ID</th>
      <th>User Name</th>
      <th>User Email</th>
      <th>User Uid</th>
      <th>User Level</th>
      <th>User Amin</th>
      <th>User Banned</th>
    </tr>
  <?php
  include_once "header.php";
  include_once "includes/dbh.inc.php";
  if(isset($_SESSION["admin"])){
    $admin = $_SESSION['admin'];
    if(!$admin == 1){
      header("Location: homepage.php");
    }
  }else{
    header("Location: homepage.php");
  }

  if (isset($_GET['id'])){
    $id = $_GET['id'];
    $delete = mysqli_query($conn, "DELETE FROM users WHERE usersId = '$id'");
    /*delete = mysqli_query($conn, "UPDATE users SET banned = '1' WHERE usersId = '22'");*/ 
  }

  if(isset($_GET['ban'])){
    $banNumber = $_GET['ban'];
    $banChange = mysqli_query($conn, "UPDATE users SET banned = '1' WHERE usersId = '$banNumber'");
  }

  if(isset($_GET['unban'])){
    $unbanNumber = $_GET['unban'];
    $banChange = mysqli_query($conn, "UPDATE users SET banned = '0' WHERE usersId = '$unbanNumber'");
  }

    $sql = "SELECT usersId, usersName, usersEmail, usersUid, level, admin, banned FROM users;";
    $result = $conn-> query($sql);

    if($result -> num_rows > 0){
      while ($row = $result -> fetch_assoc()) {
        $banText = "";
        if($row['banned'] == 0){
          $banText = "NOT BANNED";
        }else if($row['banned'] == 1){
          $banText = "BANNED";
        }


        echo "<tr>
          <td>". $row["usersId"] . "</td>
          <td>". $row["usersName"] . "</td>
          <td>". $row["usersEmail"] ."</td>
          <td>". $row["usersUid"] ."</td>
          <td>". $row["level"] ."</td>
          <td>". $row["admin"] ."</td>
          <td>". $banText ."</td>
          <td> <a href='adminpage.php?ban=". $row["usersId"]. "' class='deleteButton'>BAN</a></td>
          <td> <a href='adminpage.php?unban=". $row["usersId"]. "' class='deleteButton'>UNBAN</a></td>
          <td> <a href='adminpage.php?id=". $row["usersId"] ."' class='deleteButton'>Delete </a></td>
        </tr>";
      }
      echo "</table>";
    }
    else{
      echo "No users found";
    }
  ?>
</body>
</html>