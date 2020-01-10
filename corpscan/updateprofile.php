<?php
session_start();
require('db.php');

// Récupère la connexion base de donnée ( PDO ). 
$db = getConnection();

if (isset($_POST['changepassword'])) {
	if (!empty($_POST['currentpassword'])) {
		$id = $_SESSION['user-id'];
		$password = $_POST['currentpassword'];
		$row = null;
		// Nous vérifions ici l'existence du contenu de la variable $id dans la bdd. 
		try {
			$stmt = $db->prepare('SELECT * FROM User WHERE UserID = ? AND Password = ?');        
			$stmt->execute(array($id, $password));      
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$exists = $stmt->rowCount() == 1;
		} 
		catch (PDOException $error) {
			die($error->getMessage());
		}
		// Si elle existe nous démarrons la session ici.
		if ($exists === true && ($password = $row['Password'])) {
			if (!empty($_POST['newpassword']) && !empty($_POST['confirmpassword'])) {
				$id = $_SESSION['user-id'];
				$newpassword = $_POST['newpassword'];
				$confirmpassword = $_POST['confirmpassword'];
				if ($newpassword === $confirmpassword) {
					try {
						$stmt = $db->prepare('UPDATE User SET Password = ? WHERE UserID= ?');
						$stmt->execute(array($confirmpassword, $id));
						echo '<body onLoad="alert(\'Le mot de passe a été changé.\')">';
						echo '<meta http-equiv="refresh" content="0;URL=index.php">';
						die();
					}
					catch (PDOException $error) {
						die($error->getMessage());
					}
				}
				else {
				// Aucune correspondance de mot de passe.
					echo '<body onLoad="alert(\'Le nouveau mot de passe ne correspond pas au mot de passe de confirmation.\')">';
					echo '<meta http-equiv="refresh" content="0;URL=profile.php">';
					die();
				}
			}
			else {
			// Un des champs du formulaire n'a pas été remplie.
				echo '<body onLoad="alert(\'Formulaire non remplie.\')">';
				echo '<meta http-equiv="refresh" content="0;URL=profile.php">';
				die();
			}
		}
		else {
		// L'utilisateur n'a pas renseigné le bon mot de passe.
			echo '<body onLoad="alert(\'Mot de passe incorrect.\')">';
			echo '<meta http-equiv="refresh" content="0;URL=profile.php">';
			die();
		}
	}
	else {
	// L'utilisateur n'a pas renseigné le champ de mot de passe.
		echo '<body onLoad="alert(\'Mot de passe non renseigné.\')">';
		echo '<meta http-equiv="refresh" content="0;URL=profile.php">';
		die();
	}
}

elseif (isset($_POST['changemail'])) {
	if (!empty($_POST['mailpassword'])) {
		$id = $_SESSION['user-id'];
		$password = $_POST['mailpassword'];
		$row = null;
		// Nous vérifions ici l'existence du contenu de la variable $id dans la bdd. 
		try {
			$stmt = $db->prepare('SELECT * FROM User WHERE UserID = ? AND Password = ?');        
			$stmt->execute(array($id, $password));      
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$exists = $stmt->rowCount() == 1;
		} 
		catch (PDOException $error) {
			die($error->getMessage());
		}
		// Si elle existe nous démarrons la session ici.
		if ($exists === true && ($password = $row['Password'])) {
			if (!empty($_POST['newmail']) && !empty($_POST['confirmmail'])) {
				$id = $_SESSION['user-id'];
				$newmail = $_POST['newmail'];
				$confirmmail = $_POST['confirmmail'];
				// Nous vérifions ici si l'utilisateur rentre bien une adresse email.
				if (filter_var($newmail, FILTER_VALIDATE_EMAIL) && filter_var($confirmmail, FILTER_VALIDATE_EMAIL)) {
					if ($newmail === $confirmmail) {
						try {
							$stmt = $db->prepare('UPDATE User SET Email = ? WHERE UserID = ?');
							$stmt->execute(array($confirmmail, $id));
							echo '<body onLoad="alert(\'Le mail a été changé.\')">';
							echo '<meta http-equiv="refresh" content="0;URL=index.php">';
							die();
						}
						catch (PDOException $error) {
							die($error->getMessage());
						}
					}
					else {
					// Les adresses emails ne correspondent pas.
						echo '<body onLoad="alert(\'Les adresse emails ne correspondent pas.\')">';
						echo '<meta http-equiv="refresh" content="0;URL=profile.php">';
						die();
					}
				}
				else {
				// L'utilisateur n'a pas rentré une adresse email.
					echo '<body onLoad="alert(\'Adresse email non valide.\')">';
				// On le redirige ensuite vers la page d'accueil.
					echo '<meta http-equiv="refresh" content="0;URL=profile.php">';
					die();
				}
			}
			else {
			// Un des champs n'a pas été renseigné.
				echo '<body onLoad="alert(\'Formulaire non remplie.\')">';
				echo '<meta http-equiv="refresh" content="0;URL=profile.php">';
				die();
			}
		}
		else {
		// L'utilisateur n'a pas renseigné le bon mot de passe.
			echo '<body onLoad="alert(\'Mot de passe incorrect.\')">';
			echo '<meta http-equiv="refresh" content="0;URL=profile.php">';
			die();
		}
	}
	else {
	// L'utilisateur n'a pas renseigné le mot de passe.
		echo '<body onLoad="alert(\'Mot de passe non renseigné.\')">';
		echo '<meta http-equiv="refresh" content="0;URL=profile.php">';
		die();
	}
}
?>
