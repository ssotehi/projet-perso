<?php

session_start();
require('db.php');

// Récupère la connexion base de donnée ( PDO ).
$db = getConnection();

$mbi01 = $_POST['mbi01'];
$mbi02 = $_POST['mbi02'];
$mbi03 = $_POST['mbi03'];
$mbi04 = $_POST['mbi04'];
$mbi05 = $_POST['mbi05'];
$mbi06 = $_POST['mbi06'];
$mbi07 = $_POST['mbi07'];
$mbi08 = $_POST['mbi08'];
$mbi09 = $_POST['mbi09'];
$mbi10 = $_POST['mbi10'];
$mbi11 = $_POST['mbi11'];
$mbi12 = $_POST['mbi12'];
$mbi13 = $_POST['mbi13'];
$mbi14 = $_POST['mbi14'];
$mbi15 = $_POST['mbi15'];
$mbi16 = $_POST['mbi16'];
$mbi17 = $_POST['mbi17'];
$mbi18 = $_POST['mbi18'];
$mbi19 = $_POST['mbi19'];
$mbi20 = $_POST['mbi20'];
$mbi21 = $_POST['mbi21'];
$mbi22 = $_POST['mbi22'];

$sep = $mbi01 + $mbi02 + $mbi03 + $mbi06 + $mbi08 + $mbi13 + $mbi14 + $mbi16 + $mbi20;
$sd = $mbi05 + $mbi10 + $mbi11 + $mbi15 + $mbi22;
$sap = $mbi04 + $mbi07 + $mbi09 + $mbi12 + $mbi17 + $mbi18 + $mbi19 + $mbi21;

// Requête pour insérer les données MBI
$query = "INSERT INTO ResultMBI (MBISepScore, MBISdScore, MBISapScore) VALUES (:SEP, :SD, :SAP)";
$stmt = $db->prepare($query);
$array = array( 'SEP' => $sep,'SD' => $sd,'SAP' => $sap );
$stmt->execute($array);
 
header ('location: results.php');

?>
