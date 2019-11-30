<?php

include_once('database.php');

function registerUser() {
   
// DATABASE connection
$db = getConnection();

// get post from ajax
$pseudo   = $_POST['pseudo']; 
$email    = $_POST['email']; 
$password = sha1($_POST['password']); 

$query = $db->prepare(createUser());
$array = array('pseudo' => $pseudo , 'email' => $email, 'password' => $password);

if($query->execute($array)) {

	echo "<p><h3 class='success'>User was Created.</h3></p>";
}
else{
	
	echo "<p><h3  class='error'>Unable to create user.</h3></p>";
}

}

registerUser();

?>