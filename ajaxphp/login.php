<?php

include_once('database.php');

function loginUser(){
   
// DATABASE connection
global $db;
$db = getConnection();

// get post from ajax
$email    = $_POST['email']; 
$password = sha1($_POST['password']); 

// prepare query 
$query = $db->prepare(selectUser());       // SQL query
$array = array('email' => $email);         // user identifier
$query->execute($array);                   // execute query
$data = $query->fetch();                   // fecth data

 if($email == $data['email'] && $password == $data['password']) {
   
   // session start
   session_start();
   // save user array into session 
   $_SESSION['id'] = $data['id'];
   $_SESSION['email'] = $data['email'];
   $_SESSION['password'] = $data['password'];
   $_SESSION['pseudo'] = $data['pseudo'];

   header ('location: profile.php');
 }
 else{
  
    // error message
	  echo  '<p><h3 class="error">Connection error, please verify your Email and/or Password.</h3></p>';  
    echo  '<meta http-equiv="refresh" content="0;URL=index.php">';      
 }
}

loginUser();

?>