<?php

require('db.php');

// Récupère la connexion à la base de donnée ( PDO ). 
$db = getConnection();

if (isset($_POST['connexion'])) {
	if (!empty($_POST['user-login']) && !empty($_POST['user-pwd'])) {
		$login = $_POST['user-login'];
		$password = $_POST['user-pwd'];
		$row = null;
		// Nous vérifions ici si l'utilisateur rentre bien une adresse email.
		if (filter_var($login, FILTER_VALIDATE_EMAIL)) {
			// Nous vérifions ici l'existence du contenu de la variable $login dans la bdd. 
			try {
				$stmt = $db->prepare('SELECT * FROM User WHERE Email = ? AND Password = ?');        
				$stmt->execute(array($login, $password));      
				$row = $stmt->fetch(PDO::FETCH_ASSOC);
				$exists = $stmt->rowCount() == 1;
			} 
			catch (PDOException $error) {
				die($error->getMessage());
			}
			// Si elle existe nous démarrons la session ici.
			if ($exists === true && ($password = $row['Password'])) {

                session_start();   // démarrer la session

				$_SESSION['user-login'] = $row['Email'];
				$_SESSION['user-id'] = $row['UserID'];
				$_SESSION['loggedin'] = true;
			// On redirige notre visiteur vers une page de notre section membre.
				header ('Location: wellbeing.quiz.php');
				die();
			}
			else {
			// Le visiteur n'a pas été reconnu comme étant membre de notre site. On utilise alors un petit javascript lui signalant ce fait.
				echo '<body onLoad="alert(\'Membre non reconnu.\')">';
			// On le redirige ensuite vers la page d'accueil.
				echo '<meta http-equiv="refresh" content="0;URL=index.php">';
				die();
			}
		}
		else {
		// L'utilisateur n'a pas rentré une adresse email.
			echo '<body onLoad="alert(\'Adresse email non valide.\')">';
		// On le redirige ensuite vers la page d'accueil.
			echo '<meta http-equiv="refresh" content="0;URL=index.php">';
			die();
		}
	}
	else {
	// L'utilisateur n'a pas remplie un des champs du formulaire.
		echo '<body onLoad="alert(\'Formulaire non remplie.\')">';
	// On le redirige ensuite vers la page d'accueil.
		echo '<meta http-equiv="refresh" content="0;URL=index.php">';
		die();
	}
}
?>
