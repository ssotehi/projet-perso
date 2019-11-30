<?php
session_start();
include_once('database.php');

if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
 
   header('location: planet.php');
}
else {
  echo "<p><h1 class='error'>Session expired !!!.</h1></p>";
}

?>