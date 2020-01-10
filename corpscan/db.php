<?php

// Fonction de connexion à la base de donnée
function getConnection(){
  
  // Initialisation de la variable connexion
  $connection = null;
  
  // Bloc try, catch pour lever les execeptions de connexion à la base de donnée     
  try {
        $connection = new PDO("mysql:host=mysql-groupeorange.alwaysdata.net; dbname=groupeorange_corpscan; charset=utf8", "193376", "UtopLab2020");

        $connection->exec("set names utf8");
    }
    catch (PDOException $exception) {      
        die("Connection error: " . $exception->getMessage()); 
    }
        
    return $connection;    // retournée la connexion, objet PDO
}
