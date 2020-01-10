<?php

session_start();
require('db.php');

// Récupère la connexion de la base de donnée ( PDO ).
$db = getConnection();

// Récupérer les posts du formaulaire de bien être.
$sommeil = $_POST['sommeil'];
$stress  = $_POST['stress'];
$anxiete = $_POST['anxiete'];
$energie = $_POST['energie'];
$digestion = $_POST['digestion'];

// faire la moyenne
$average = ($sommeil + (10 - $stress) + (10 - $anxiete) + $energie + $digestion)/5;

// Requête pour insérer les données de la table bien être.
$query = "INSERT INTO ResultWB (QuizzAverage, QuizzSleep, QuizzStress, QuizzAnxiety, QuizzEnergy, QuizzDigestion) 
                 VALUES (:Average, :Sleep, :Stress, :Anxiety,:Energy,:Digestion)";
$stmt = $db->prepare($query);
$array = array( 'Average' => $average,
	            'Sleep' => $sommeil,
	            'Stress' => $stress, 
	            'Anxiety' => $anxiete, 
	            'Energy' => $energie, 
	            'Digestion' => $digestion );
$stmt->execute($array); 
 
header ('location: results.php');
?>
