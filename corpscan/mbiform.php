<?php
session_start();
if (!isset($_SESSION['loggedin']) OR $_SESSION['loggedin'] !==true) {
			header('Location: index.php');
			die();
}   
   //Ici on vérifie si la super variable $_SESSION est bien true afin d'éviter le changement de page en utilisant l'URL.
?>

<!DOCTYPE html>
<html lang="FR-fr">
<head>
	<title>CORPSCAN - Test Yourself</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta http-equiv="content-language" content="fr"/>  
	<link rel="stylesheet" href="styles.css" type="text/css" media="screen"/>
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
					<li><a href="wellbeing.quiz.php">Questionnnaire bien être</a></li>
					<li><a class="active" href="mbiform.php">Questionnaire MBI</a></li>
					<li><a href="results.php">Resultats</a></li>
				</ul>
			</div>
			<div class="form-quiz-div" id="form-quiz">
				<div class="quiz-div"> 
					<h1 style='color: #009999;'>Test d’Inventaire de Burnout de Maslach - MBI</h1>
					<h2 style='color:#FF5700;'>
						<ul>
							<li>Comment percevez-vous votre travail ?</li> 
							<li>Etes-vous épuisé(e) ?</li>
							<li>Quelle est votre capacité à gérer votre relation aux autres ?</li>
							<li>Où en êtes-vous sur votre degré d’accomplissement personnel ?</li>
						</ul>
					</h2>
					<h2 style='color: #009999;'>Précisez la fréquence à laquelle vous ressentez la description des propositions suivantes en cochant le chiffre correspondant avec :</h2>
					<ul style='color:#FF5700;'>
						<li><h3>0 = Jamais.</h3></li>
						<li><h3>1 = Quelques fois par an, au moins.</h3></li>
						<li><h3>2 = Une fois par mois au moins.</h3></li>
						<li><h3>3 = Quelques fois par mois.</h3></li>
						<li><h3>4 = Une fois par semaine.</h3></li>
						<li><h3>5 = Quelques fois par semaine.</h3></li>
						<li><h3>6 = Chaque jour.</h3></li>
					</ul>
				</div>
				<form method="POST" action="ajoutMBI.php">
					<div class="quiz">
						<ol style='color:#FF5700;'>
							<h3><li>Je me sens émotionnellement vidé(e) par mon travail:</li></h3>
							<div class="slidecontainer" align="center">
								<input type="range" min="0" max="6" value="0" name="mbi01" class="slider" id="slider-01" onclick="getSliderValue('slider-01', '01-value')">
								<h3>Value: <span class="slidervalue" id="01-value"></span></h3>
							</div>
							<h3><li>Je me sens à bout à la fin de ma journée de travail:</li></h3>
							<div class="slidecontainer" align="center">
								<input type="range" min="0" max="6" value="0" name="mbi02" class="slider" id="slider-02" onclick="getSliderValue('slider-02', '02-value')">
								<h3>Value: <span class="slidervalue" id="02-value"></span></h3>
							</div>
							<h3><li>Je me sens fatigué(e) lorsque je me lève le matin et que j’ai à affronter une autre journée de travail:</li></h3>
							<div class="slidecontainer" align="center">
								<input type="range" min="0" max="6" value="0" name="mbi03" class="slider" id="slider-03" onclick="getSliderValue('slider-03', '03-value')">
								<h3>Value: <span class="slidervalue" id="03-value"></span></h3>
							</div>
							<h3><li>Je peux comprendre facilement ce que mes patients/clients/élèves ressentent:</li></h3>
							<div class="slidecontainer" align="center">
								<input type="range" min="0" max="6" value="0" name="mbi04" class="slider" id="slider-04" onclick="getSliderValue('slider-04', '04-value')">
								<h3>Value: <span class="slidervalue" id="04-value"></span></h3>
							</div>
							<h3><li>Je sens que je m’occupe de certains patients/clients/élèves de façon impersonnelle, comme s’ils étaient des objets:</li></h3>
							<div class="slidecontainer" align="center">
								<input type="range" min="0" max="6" value="0" name="mbi05" class="slider" id="slider-05" onclick="getSliderValue('slider-05', '05-value')">
								<h3>Value: <span class="slidervalue" id="05-value"></span></h3>
							</div>
							<h3><li>Travailler avec des gens tout au long de la journée me demande beaucoup d’effort:</li></h3>
							<div class="slidecontainer" align="center">
								<input type="range" min="0" max="6" value="0" name="mbi06" class="slider" id="slider-06" onclick="getSliderValue('slider-06', '06-value')">
								<h3>Value: <span class="slidervalue" id="06-value"></span></h3>
							</div>
							<h3><li>Je m’occupe très efficacement des problèmes de mes patients/clients/élèves:</li></h3>
							<div class="slidecontainer" align="center">
								<input type="range" min="0" max="6" value="0" name="mbi07" class="slider" id="slider-07" onclick="getSliderValue('slider-07', '07-value')">
								<h3>Value: <span class="slidervalue" id="07-value"></span></h3>
							</div>
							<h3><li>Je sens que je craque à cause de mon travail:</li></h3>
							<div class="slidecontainer" align="center">
								<input type="range" min="0" max="6" value="0" name="mbi08" class="slider" id="slider-08" onclick="getSliderValue('slider-08', '08-value')">
								<h3>Value: <span class="slidervalue" id="08-value"></span></h3>
							</div>
							<h3><li>J’ai l’impression, à travers mon travail, d’avoir une influence positive sur les gens:</li></h3>
							<div class="slidecontainer" align="center">
								<input type="range" min="0" max="6" value="0" name="mbi09" class="slider" id="slider-09" onclick="getSliderValue('slider-09', '09-value')">
								<h3>Value: <span class="slidervalue" id="09-value"></span></h3>
							</div>
							<h3><li>Je suis devenu(e) plus insensible aux gens depuis que j’ai ce travail:</li></h3>
							<div class="slidecontainer" align="center">
								<input type="range" min="0" max="6" value="0" name="mbi10" class="slider" id="slider-10" onclick="getSliderValue('slider-10', '10-value')">
								<h3>Value: <span class="slidervalue" id="10-value"></span></h3>
							</div>
							<h3><li>Je crains que ce travail ne m’endurcisse émotionnellement:</li></h3>
							<div class="slidecontainer" align="center">
								<input type="range" min="0" max="6" value="0" name="mbi11" class="slider" id="slider-11" onclick="getSliderValue('slider-11', '11-value')">
								<h3>Value: <span class="slidervalue" id="11-value"></span></h3>
							</div>
							<h3><li>Je me sens plein(e) d’énergie:</li></h3>
							<div class="slidecontainer" align="center">
								<input type="range" min="0" max="6" value="0" name="mbi12" class="slider" id="slider-12" onclick="getSliderValue('slider-12', '12-value')">
								<h3>Value: <span class="slidervalue" id="12-value"></span></h3>
							</div>
							<h3><li>Je me sens frustré(e) par mon travail:</li></h3>
							<div class="slidecontainer" align="center">
								<input type="range" min="0" max="6" value="0" name="mbi13" class="slider" id="slider-13" onclick="getSliderValue('slider-13', '13-value')">
								<h3>Value: <span class="slidervalue" id="13-value"></span></h3>
							</div>
							<h3><li>Je sens que je travaille « trop dur » dans mon travail:</li></h3>
							<div class="slidecontainer" align="center">
								<input type="range" min="0" max="6" value="0" name="mbi14" class="slider" id="slider-14" onclick="getSliderValue('slider-14', '14-value')">
								<h3>Value: <span class="slidervalue" id="14-value"></span></h3>
							</div>
							<h3><li>Je ne me soucie pas vraiment de ce qui arrive à certains de mes patients/clients/élèves:</li></h3>
							<div class="slidecontainer" align="center">
								<input type="range" min="0" max="6" value="0" name="mbi15" class="slider" id="slider-15" onclick="getSliderValue('slider-15', '15-value')">
								<h3>Value: <span class="slidervalue" id="15-value"></span></h3>
							</div>
							<h3><li>Travailler en contact direct avec les gens me stresse trop:</li></h3>
							<div class="slidecontainer" align="center">
								<input type="range" min="0" max="6" value="0" name="mbi16" class="slider" id="slider-16" onclick="getSliderValue('slider-16', '16-value')">
								<h3>Value: <span class="slidervalue" id="16-value"></span></h3>
							</div>
							<h3><li>J’arrive facilement à créer une atmosphère détendue avec mes patients/clients/élèves:</li></h3>
							<div class="slidecontainer" align="center">
								<input type="range" min="0" max="6" value="0" name="mbi17" class="slider" id="slider-17" onclick="getSliderValue('slider-17', '17-value')">
								<h3>Value: <span class="slidervalue" id="17-value"></span></h3>
							</div>
							<h3><li>Je me sens ragaillardi(e) lorsque dans mon travail j’ai été proche de patients/clients/élèves:</li></h3>
							<div class="slidecontainer" align="center">
								<input type="range" min="0" max="6" value="0" name="mbi18" class="slider" id="slider-18" onclick="getSliderValue('slider-18', '18-value')">
								<h3>Value: <span class="slidervalue" id="18-value"></span></h3>
							</div>
							<h3><li>J’ai accompli beaucoup de choses qui en valent la peine dans ce travail:</li></h3>
							<div class="slidecontainer" align="center">
								<input type="range" min="0" max="6" value="0" name="mbi19" class="slider" id="slider-19" onclick="getSliderValue('slider-19', '19-value')">
								<h3>Value: <span class="slidervalue" id="19-value"></span></h3>
							</div>
							<h3><li>Je me sens au bout du rouleau:</li></h3>
							<div class="slidecontainer" align="center">
								<input type="range" min="0" max="6" value="0" name="mbi20" class="slider" id="slider-20" onclick="getSliderValue('slider-20', '20-value')">
								<h3>Value: <span class="slidervalue" id="20-value"></span></h3>
							</div>
							<h3><li>Dans mon travail, je traite les problèmes émotionnels très calmement:</li></h3>
							<div class="slidecontainer" align="center">
								<input type="range" min="0" max="6" value="0" name="mbi21" class="slider" id="slider-21" onclick="getSliderValue('slider-21', '21-value')">
								<h3>Value: <span class="slidervalue" id="21-value"></span></h3>
							</div>
							<h3><li>J’ai l’impression que mes patients/clients/élèves me rendent responsable de certains de leurs problèmes:</li></h3>
							<div class="slidecontainer" align="center">
								<input type="range" min="0" max="6" value="0" name="mbi22" class="slider" id="slider-22" onclick="getSliderValue('slider-22', '22-value')">
								<h3 >Value: <span class="slidervalue" id="22-value"></span></h3>
							</div>
						</ol>
						<input class="button-submit button-quiz" type="submit" value="Valider"/>
					</div>
				</form>
			</div>
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

