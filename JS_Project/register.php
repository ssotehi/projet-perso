<?php
  

  // jQuery ajax post
  $pseudo = $_POST['username'];
  $lastname = $_POST['lastname'];
  $firstname = $_POST['firstname'];
  $birthday = $_POST['birthday'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirmPWD = $_POST['confirmPWD'];
  /*
  $gender = $_POST['gender'];
  $adult  = $_POST['adult']; */

  // PHP Response
  echo 'Pseudo: '.$pseudo.'<br>'.
       'LastName: '.$lastname.'<br>'.
       'firstname: '.$firstname.'<br>'.  
       'BirthDay: '.$birthday.'<br>'.
       'Email: '.$email.'<br>'.
       'Password: '.$password.'<br>'.
       'Confirm PWD: '.$confirmPWD.'<br>';
 
?>