<?php
session_start();
require('db.php');

// Récupère la connexion base de donnée ( PDO ).
$db = getConnection();

if (!isset($_SESSION['loggedin']) OR $_SESSION['loggedin'] !==true) {
   header('Location: index.php');
   die();
}   
else {

	$userid = $_SESSION['user-id'];

  // Recupérer les données MBI de la base de données
  $stmt = $db->prepare("SELECT * FROM ResultMBI WHERE '$userid'");        
  $stmt->execute(array());      
  $row = $stmt->fetch(PDO::FETCH_ASSOC);

  // Recupérer les données de la table ResultWB
  $stmt = $db->prepare("SELECT * FROM ResultWB WHERE '$userid'");        
  $stmt->execute(array());      
   
  $Sleep     = array();    // déclaration d'un tableau pour le sommeil
  $Stress    = array();    // déclaration d'un tableau pour le stress
  $Anxiety   = array();    // déclaration d'un tableau pour l'anxieté
  $Energys   = array();    // déclaration d'un tableau pour l'energie
  $Digestion = array();    // déclaration d'un tableau pour la digestion
  $Average   = array();    // déclaration d'un tableau pour la moyenne (average)

  $rowCounter = 0;            // Compteur utilisé pour la boucle while et pour javascript plus loin
  while($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
    
    ++$rowCounter;

    $Sleep[$rowCounter]     = $data['QuizzSleep'];
    $Stress[$rowCounter]    = $data['QuizzStress'];
    $Anxiety[$rowCounter]   = $data['QuizzAnxiety'];
    $Energy[$rowCounter]    = $data['QuizzEnergy'];
    $Digestion[$rowCounter] = $data['QuizzDigestion'];
    $Average[$rowCounter]   = $data['QuizzAverage'];  
  }
}

?>
<!DOCTYPE html>
<html lang="FR-fr">
<head>
	<title>CORPSCAN - Test Yourself</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta http-equiv="content-language" content="fr"/>  
	<link rel="stylesheet" href="styles.css" type="text/css" media="screen"/>
	<script src="chart.min.js"></script>
	<script src="utils.js"></script>
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
					<li><a href="mbiform.php">Questionnaire MBI</a></li>
					<li><a class="active" href="results.php">Resultats</a></li>
				</ul>
			</div>
			<div class="result-div" id="quiz-results">
				<div class="quiz-div"> 
					<h1 style='color: #009999;'>Resultats</h1>
					<h2 style='color:#FF5700;'>Veuillez trouver ici vos résultats :</h2>
				</div>
				<div class="result-content" align="center">
				<!-- DIV MBI PLOT-->
					<div class="graph-div" align="center">   
						<canvas id="canvas-MBI"></canvas>
					</div>
				<!-- END MBI PLOT -->
				</div>
				<div class="result-content" align="center">
				<!-- DIV Well-BEING PLOT-->
					<button id="removeData">-S</button>
					<div class="graph-div" align="center">
						<canvas id="canvas-WB"></canvas>
					</div>
					<button id="addData">S+</button>
				<!-- END WB PLOT -->
				</div>
			</div>
		</div>
	</div>
	<div class="footer-div">
		<h1>FOOTER</h1>
	</div>
    <script>
       
       // fonction pour gérer les couleurs selon les valeurs du SEP 
       var sepColor = function( pSEP ){ 
          if(pSEP <= 17){
            return '#33CC33';
          }
          if((pSEP >= 18) && (pSEP <= 29)){
            return '#FF9933';
          }
          if(pSEP >= 30){
            return '#FF0000';
          }
        };
        
        // fonction pour gérer les couleurs selon les valeurs du SD
        var sdColor = function( pSD ){
          if(pSD <= 5){
            return '#33CC33';
          }
          if((pSD >= 6) && (pSD <= 11)){
            return '#FF9933';
          }
          if(pSD >= 12){
            return '#FF0000';
          }
        };
        
        // fonction pour gérer les couleurs selon les valeurs du SAP
        var sapColor = function( pSAP ){
           if(pSAP <= 33){
             return '#FF0000';
           }
           if((pSAP >= 34) && (pSAP <= 39)){
             return '#FF9933';
           }
           if(pSAP >= 40){
             return '#33CC33';
           }
        };

	    // Variable de configuration de Chart.js pour le MBI
		var configMBI = {
			type: 'pie',
			data: {
				datasets: [{
					data: [
						"<?= $row['MBISepScore'] ?>",         
						"<?= $row['MBISdScore'] ?>",
					    "<?= $row['MBISapScore'] ?>",
					],
					backgroundColor: [
						sepColor("<?= $row['MBISepScore'] ?>"),
						sdColor("<?= $row['MBISdScore'] ?>"),
						sapColor("<?= $row['MBISapScore'] ?>"),
					],
					label: 'MBI'
				}],
				labels: [
					'SEP (Score épuisement physique)',
					'SD (Score dépersonnalisation)',
					'SAP (Score accomplissement personnel)',	
				]
			},
			options: {
				responsive: true,
				title: {
					display: true,
					text: 'Graphique MBI'
				}
			}
		};
        
        // Convertir les rows (sommeil,stress,anxieté,energie,digestion,average) php en javascript
        var Sommeil   = JSON.parse('<?= json_encode($Sleep) ?>');
        var Stress    = JSON.parse('<?= json_encode($Stress) ?>');
        var Anxiety   = JSON.parse('<?= json_encode($Anxiety) ?>');
        var Energy    = JSON.parse('<?= json_encode($Energy) ?>');
        var Digestion = JSON.parse('<?= json_encode($Digestion) ?>');
        var Average   = JSON.parse('<?= json_encode($Average) ?>');
   
        var maxCount = '<?= $rowCounter ?>';           // compteur du nombre de rows
        var weekCount = 8;            
        var weeks = new Array("S1");                   // tableau pour les labels des semaines initialisé
        
        for(var idx = 1;  idx < weekCount; idx++ ){    // Nombre de semaine par defaut pour l'affichage des données
        	weeks.push("S"+(idx+1));                   // Labels semaines
        }

        // Variable de configuration de Chart.js, pour le bien être
        var configWB = {
			type: 'line',
			data: {
				labels: weeks,
				datasets: [{
					label: 'Sommeil',
					backgroundColor: window.chartColors.red,
					borderColor: window.chartColors.red,
					data: Object.values(Sommeil), 
					fill: false,
				}, {
					label: 'Stress',
					fill: false,
					backgroundColor: window.chartColors.blue,
					borderColor: window.chartColors.blue,
					data: Object.values(Stress),
				},
				{
					label: 'Anxiété',
					fill: false,
					backgroundColor: window.chartColors.green,
					borderColor: window.chartColors.green,
					data: Object.values(Anxiety),
				},
				{
					label: 'Energie',
					fill: false,
					backgroundColor: window.chartColors.yellow,
					borderColor: window.chartColors.yellow,
					data: Object.values(Energy),
				},
				{
					label: 'Digestion',
					fill: false,
					backgroundColor: window.chartColors.grey,
					borderColor: window.chartColors.grey,
					data: Object.values(Digestion),
				}
				,{
					label: 'Moyenne',
					fill: false,
					backgroundColor: '#662a64',
					borderColor: '#662a64',
					data: Object.values(Average),
				}

				]
			},
			options: {
				responsive: true,
				title: {
					display: true,
					text: 'Graphique bien être'
				},
				tooltips: {
					mode: 'index',
					intersect: false,
				},
				hover: {
					mode: 'nearest',
					intersect: true
				},
				scales: {
					xAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'Semaine'
						}
					}],
					yAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'Score'
						},
						ticks: {
                            suggestedMin: 0,
                            suggestedMax: 10
                        }
						
					}]
				}
			}
		};
		
		// Chargement des graphiques MBI et WB
		window.onload = function(){
			var ctxMBI = document.getElementById('canvas-MBI').getContext('2d');
			window.MBI = new Chart(ctxMBI, configMBI);
			var ctxWB = document.getElementById('canvas-WB').getContext('2d');
			window.WellBeing = new Chart(ctxWB, configWB);
		};

		document.getElementById('addData').addEventListener('click', function() {
	      if (configWB.data.datasets.length >  0 && weekCount < maxCount) {
    	    weeks.push("S"+(++weekCount));
			window.WellBeing.update();
		  }
		});

		document.getElementById('removeData').addEventListener('click', function() {     
          if(weekCount > 2){
             weeks.pop();
             --weekCount;
             window.WellBeing.update();
		  }
		});

	</script>
</body>
</html>
