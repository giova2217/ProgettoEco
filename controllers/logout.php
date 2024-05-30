<?php
  session_start();
  $_SESSION = array(); 
  session_unset();
  session_destroy();

  echo "<script type='text/javascript'>alert('Utente disconnesso.');
          window.location.href = '../views/home.php';  
        </script>";
  exit();
?>
