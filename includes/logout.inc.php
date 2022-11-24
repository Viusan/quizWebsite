<?php
  //Når du logger ut vil jeg at sessionen blir ødelagt sånn at neste gang du går på siden så er du ikke logget på
  session_start();
  session_unset();
  session_destroy();
  header("location: ../homepage.php");