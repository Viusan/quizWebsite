<?php

include "dbh.inc.php";

if(isset($_POST['selectedRowId'])) {
  //Setter post variabler i vanlig variabler
  $selectedRowId = $_POST['selectedRowId'];
  $selectedRowRank = $_POST['selectedRowBan'];

  //Ser om du er banned eller ikke 
  if ($selectedRowRank == "0") {
    //Setter banned
      $sql = "UPDATE users SET banned = '1' WHERE usersId='".$selectedRowId."';";
      $result = $conn->query($sql);
  } else if ($selectedRowRank == "1") {
    //Setter unbanned
      $sql2 = "UPDATE users SET banned = '0' WHERE usersId='".$selectedRowId."';";
      $result = $conn->query($sql2);
  }

  $sql3 = "SELECT * FROM users";
  $result = $conn->query($sql3);

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
      <td class='adminTd'><button class='banBtn' id=".$row['usersId']." value=".$row['banned'].">Ban/Unban</button></td>
    </tr>";
  };
}

if(isset($_POST['searchedInput'])) {
  $searchedInput = $_POST['searchedInput'];
  //Henter brukere som du søker etter
  $sql = "SELECT * FROM users WHERE usersName like '%$searchedInput%'";
  $result = $conn->query($sql);

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
      <td class='adminTd'><button class='banBtn' id=".$row['usersId']." value=".$row['admin'].">Ban/Unban</button></td>
    </tr>";
  };
}