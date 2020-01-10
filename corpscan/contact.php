<!DOCTYPE html>
<html lang="FR-fr">
<head>
	<title>CORPSCAN - Test Yourself</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta http-equiv="content-language" content="fr"/>  
	<link rel="stylesheet" href="styles.css" type="text/css" media="screen"/>
	<script type="text/javascript" src="corpscan.js"></script>
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
			<form action="login.php" method="post">
				<input class="input-login" type="email" name="user-login" placeholder="Email" required /><br>
				<input class="input-login" type="password" name="user-pwd" placeholder="Mot de passe" required /><br>
				<input class="button-submit" type="submit" name="connexion" value="Connexion"/>    
				<p id="reset-link"><a href="#">Mot de passe oublié ?</a></p>
			</form> 
		</div>
		<!-- The Modal -->
		<div id="reset-modal" class="modal">
			<!-- Modal content -->
			<div class="modal-content">
				<div class="modal-header">
					<span class="close">&times;</span>
					<h3 style='margin-top: 5px'>Initialisation de votre mot de passe</h3>
				</div>
				<div class="modal-body">
					<h4>Merci de renseigner votre adresse email, une procédure de changement de mot de passe vous sera envoyée par mail.</h4>
					<form>
						<input type="text" name="reset-pwd" placeholder="Veuillez entrer votre email." required/><br>
						<input class="button-submit" type="button" name="reset-btn" value="Envoyer" placeholder="Veuillez entrer votre email." onclick="send.mail.php"/>   <!-- utiliser ajax -->
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="horz-menu-nav">
		<nav>
			<div><a href="index.php" >Accueil</a></div>
			<div><a href="documentation.php">Documentations</a></div>
			<div><a class="active" href="contact.php" >Contact</a></div>
			<div><a href="about.php" >A propos</a></div>
		</nav>
	</div>
	<div class="container-div">
		<h1>CONTACT EN CONSTRUCTION...</h1>
	</div>
	<div class="footer-div">
		<h1>FOOTER</h1>
	</div>
	<script>resetPassword();</script>
</body>
</html>
