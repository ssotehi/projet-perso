<?php
session_start();
//Ici on vérifie si la super variable $_SESSION est bien true afin d'éviter le changement de page en utilisant l'URL.

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
			<div class="input-profil"><input class="button-submit" type="button" value="Mon profil" onclick="window.location='./profile.php'"></div>
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
					<li><a class="active" href="wellbeing.quiz.php">Questionnnaire bien être</a></li>
					<li><a href="mbiform.php">Questionnaire MBI</a></li>
					<li><a href="results.php">Resultats</a></li>
				</ul>
			</div>
			<div class="form-quiz-div" id="form-quiz">
				<div class="quiz-div"> 
					<h1 style='color: #009999;'> Suivit de bien être</h1>
					<h2 style='color:#FF5700;'>Comment percevez-vous sentez vous au quotidien ?</h2>
				</div>
			<form method="POST" action="ajoutSuivit.php">
				<div class="quiz">
					<h3 class="title-quiz">Sommeil</h3>
					<ul style='color:#FF5700;'>
						<li><h4>Avant d'évaluer la qualité de votre sommeil, posez vous les questions suivantes:</h4></li>  
						<li><h4>Avez vous des insomnies ?</h4></li>
							<ol>
								<h5><li>Avant de dormir?</li></h5>
								<h5><li>Pendant la nuit?</li></h5>
							</ol>
						<li><h4>Vous levez vous pendant la nuit, ce peut être pour:</h4></li>
							<ol>
								<h5><li>Aller manger ?</li></h5>
								<h5><li>Fumer ?</li></h5>
								<h5><li>Aller aux toilettes ?</li></h5>
							</ol>
						<li><h4>Vous réveillez vous en forme ou fatigué le matin?</h4></li>
						<li><h4>Avez-vous du mal à vous réveiller?</h4></li>
						<li><h4>En moyenne combien de temps dormez-vous par nuit?</h4></li>
					</ul>
					<div class="slidecontainer" align="center">
						<h3> Sur une échelle de 1 à 10 comment dormez-vous ?</h3>
						<input type="range" min="1" max="10" value="1" name="sommeil" class="slider" id="slider-sommeil" onclick="getSliderValue('slider-sommeil', 'sommeil-value')">
						<h3><span class="slidervalue" id="sommeil-value">Value: </span></h3>
					</div>
				</div>     
				<div class="quiz">
					<p><h3 class="title-quiz">Stress</h3></p>
					<ul style='color:#FF5700;'>
						<li><h4>Avant de d'évaluer votre taux de stress, posez vous les questions suivantes:</h4></li>
						<li><h4>Vous arrive t'il:</h4></li>
						<li><h4>D'être irritable ?</h4></li>
						<li><h4>De faire des mouvments brusques ?</h4></li>
						<li><h4>De cumuler les erreurs ?</h4></li>
						<li><h4>D'avoir des réactions disproportionnées ?</h4></li>
						<li><h4>D'être tendu ?</h4></li>
						<li><h4>De transpirer alors qu'il ne fait pas chaud ?</h4></li>
						<li><h4>D'avoir de noeuds à l'estomac ?</h4></li>
					</ul>
					<div class="slidecontainer" align="center">
						<h3>Sur une échelle de 1 à 10 quel est votre niveau de stress (10 étant insupportable)</h3>
						<input type="range" min="1" max="10" value="1" name="stress" class="slider" id="slider-stress" onclick="getSliderValue('slider-stress', 'stress-value')">
						<h3>Value: <span class="slidervalue" id="stress-value"></span></h3>
					</div>
				</div>
				<div class="quiz">
					<p><h3 class="title-quiz">Anxieté</h3></p>
					<ul style='color:#FF5700;'>
						<li><h4>Avant de d'évaluer votre taux de anxieté, posez vous les questions suivantes:</h4></li> 
						<li><h4>Vous arrive t'il d'avoir :</h4></li>
						<li><h4>Des douleurs musculaires ?</h4></li>
						<li><h4>Des palpitations ?</h4></li>
						<li><h4>Des tremblements ?</h4></li>
						<li><h4>Les mains moites ?</h4></li>
						<li><h4>Des vertiges ?</h4></li>
						<li><h4>Des frissons ?</h4></li>
						<li><h4>Des maux de tête ?</h4></li>
						<li><h4>Une sensation de serrement au niveau de la poitrine, l'impression d'étouffer ?</h4></li>
					</ul>
					<div class="slidecontainer" align="center">
						<h3>Sur une échelle de 1 à 10 quel est votre niveau d’anxiété (10 étant insupportable)</h3>
						<input type="range" min="1" max="10" value="1" name="anxiete" class="slider" id="slider-anxiete" onclick="getSliderValue('slider-anxiete', 'anxiete-value')">
						<h3>Value: <span class="slidervalue" id="anxiete-value"></span></h3>
					</div><br>
				</div>
				<div class="quiz">
					<p><h3 class="title-quiz">Energie</h3></p>
					<div class="slidecontainer" align="center">
						<h3>Sur une échelle de 1 à 10 quel est votre niveau de vitalité.</h3>
						<input type="range" min="1" max="10" value="1" name="energie" class="slider" id="slider-energie" onclick="getSliderValue('slider-energie', 'energie-value')">
						<h3>Value: <span class="slidervalue" id="energie-value"></span></h3>
					</div> 
				</div><br>
				<div class="quiz">
					<p><h3 class="title-quiz">Digestion</h3></p>
					<ul style='color:#FF5700;'>
						<li><h4>Avant de d'évaluer la qualité de votre transit, posez vous les questions suivantes:</h4></li> 
						<li><h4>Souffrez vous de :</h4></li>
						<li><h4>Reflux gastriques ?</h4></li>
						<li><h4>Ballonnements ?</h4></li>
						<li><h4>Constipation ?</h4></li>
						<li><h4>Remontées acides ?</h4></li>
						<li><h4>Diarrhée ?</h4></li>
					</ul>
					<div class="slidecontainer" align="center">
						<h3>Sur une échelle de 1 à 10 comment évaluez-vous votre digestion</h3>
						<input class="slider" id="slider-digestion" type="range" min="1" max="10" value="1" name="digestion" onclick="getSliderValue('slider-digestion', 'digestion-value')">
						<h3>Value: <span class="slidervalue" id="digestion-value"></span></h3>
					</div>
					<input class="button-submit button-quiz" type="submit" value="Valider"/>
				</div>
			</form>
		</div>
	</div>
	<div class="footer-div">
		<h1>FOOTER</h1>
	</div>
	<script>
	  function getSliderValue(sliderID, sValue) {

		var slider = document.getElementById(sliderID);
		var sliderValue = document.getElementById(sValue);
		
		if(slider !== null && sliderValue !== null) {
			
			sliderValue.innerHTML = slider.value;
			slider.oninput = function() {
			sliderValue.innerHTML = this.value;
		}

	  }
	  else {
			console.log('Object NULL');
		}

	  }
	</script>
</body>
</html>
