<?php

include "dbh.inc.php";

if(isset($_POST['selectedRowId'])) {
  $selectedRowId = $_POST['selectedRowId'];
  $selectedRowRank = $_POST['selectedRowRank'];

  if ($selectedRowRank == "0") {
      $sql = "UPDATE users SET banned = '1' WHERE usersId='".$selectedRowId."';";
      $result = $conn->query($sql);
  } else if ($selectedRowRank == "1") {
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
      <td class='adminTd'> <a href='adminpage.php?ban=". $row["usersId"]. "' class='deleteButton'>BAN</a></td>
      <td class='adminTd'> <a href='adminpage.php?unban=". $row["usersId"]. "' class='deleteButton'>UNBAN</a></td>
      <td class='adminTd'> <a href='adminpage.php?id=". $row["usersId"] ."' class='deleteButton'>Delete </a></td>
    </tr>";
  };
}