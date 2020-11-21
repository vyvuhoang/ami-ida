<?php
  session_start();
  if(isset($_SESSION['logID']) && $_SESSION['logID']){
    unset($_SESSION['logID']);
  }
  header("Location: /");
?>