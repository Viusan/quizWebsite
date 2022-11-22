<?php
  $servername = "localhost";
  $dBUsername = "root";
  $dBPassword = "";
  $dBName = "quizproject";

  $conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

  //Hvis det connection ikke fungerer
  if (!$conn){
    die("Connection failed: " . mysqli_connect_error);
  }