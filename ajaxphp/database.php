<?php 
  
# get database connection
function getConnection(){

  $connection = null;
        
  try {
        $connection = new PDO("mysql:host=localhost;dbname=ajax_php","ssotehi","ssotehi");	
        $connection->exec("set names utf8");
    }
    catch (PDOException $exception) {      
           echo "Connection error: " . $exception->getMessage(); 
    }
        
    return $connection;
}

#SQL request to create user
function createUser(){

    return "INSERT INTO users (pseudo,email,password) VALUES (:pseudo,:email,:password)";
}

#SQL request to  select user
function selectUser(){

   return 'SELECT * FROM users WHERE email = :email';     
}

#SQL request to get all users
function selectUsers() {

  return 'SELECT * FROM users WHERE 1';
}

?>