<?php

session_start();
// Ici on vérifie si la super variable $_SESSION est bien true afin d'éviter le changement de page en utilisant l'URL.
if (!isset($_SESSION['loggedin']) OR $_SESSION['loggedin'] !==true) {
			header('Location: index.php');
			die();
}   
  
?>
<!DOCTYPE html>
<html lang="FR-fr">
<head>
	<title>CORPSCAN - Test Yourself</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta http-equiv="content-language" content="fr"/>  
	<link rel="stylesheet" href="styles.css" type="text/css" media="screen">
</head>
<body>
	<div class="header-div">
		<div class="logo">
			<img src="corpscan.png" alt="company logo" width="200" height="200"/>
		</div>
		<div class="title-div">
			<h1>CORPSCAN</h1>
		</div>
		<div class="login-form-div" align="center">
			<div class="input-profil"><input class="button-submit active" type="button" value="Mon profil" onclick="window.location='./profile.php'"></div>
			<div class="input-deco"><input class="button-submit" type="button" value="Déconnexion" onclick="window.location='./logout.php'"></div>
		</div>
	</div>
	<div class="horz-menu-nav">
		<nav>
			<div><a href="index.php" >Accueil</a></div>
			<div><a href="documentation.php">Documentations</a></div>
			<div><a href="contact.php" >Contact</a></div>
			<div><a href="about.php" >A propos</a></div>
		</nav>
	</div>
	<div class="container-div">
		<div class="content-div" id="content-div">
			<div class="nav-vertical-div">
				<ul>
					<li><a href="wellbeing.quiz.php">Questionnnaire bien être</a></li>
					<li><a href="mbiform.php">Questionnaire MBI</a></li>
					<li><a href="resultats.php">Resultats</a></li>
				</ul>
			</div>
			<div class="result-div" id="quiz-results">
				<div class="quiz-div"> 
					<div>
						<h1 style='color:#0C779E;'>Changer votre adresse email:</h1>
						<form action="updateprofile.php" method="POST">
							<p><label style='color:#FF5700;'>Entrez votre mot de passe:</label></p>
							<input type="password" placeholder="Mot de passe" name="mailpassword" required>
							<p><label style='color:#FF5700;'>Entrez votre nouvelle adresse email:</label></p>
							<input name="newmail" type="email" placeholder="Adresse email" required>
							<p><label style='color:#FF5700;'>Confirmez votre nouvelle adresse email:</label></p>
							<input name="confirmmail" type="email" placeholder="Adresse email" required><br><br>
							<input name="changemail" class="button-submit" type="submit" value="Valider">
						</form>
					</div>
					<div>
						<h1 style='color:#0C779E;'>Changer votre mot de passe:</h1>
						<form action="updateprofile.php" method="POST">
							<p><label style='color:#FF5700;'>Entrez votre mot de passe:</label></p>
							<input type="password" placeholder="Mot de passe" name="currentpassword" required>
							<p><label style='color:#FF5700;'>Entrez votre nouveau mot de passe:</label></p>
							<input type="password" placeholder="Mot de passe" name="newpassword" required>
							<p><label style='color:#FF5700;'>Confirmez votre nouveau mot de passe:</label></p>
							<input type="password" placeholder="Mot de passe" name="confirmpassword" required><br><br>
							<input class="button-submit" type="submit" name="changepassword" value="Valider">
						</form>
					</div>
					<div>
						<p style='color:#0C779E;'>Si vous souhaitez supprimer votre compte, veuillez vous référer à votre employeur.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="footer-div">
		<h1>FOOTER</h1>
	</div>
</body>
</html>
