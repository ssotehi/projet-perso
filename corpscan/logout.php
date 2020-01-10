<?php
       
  session_start ();

  // Variables destruction
  session_unset ();

  // Session destruction
  session_destroy ();
  
  // Home redirect
  header ('location: index.php');

?>