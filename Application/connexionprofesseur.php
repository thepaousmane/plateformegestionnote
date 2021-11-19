<!DOCTYPE html>
<html>
<head>
	<title>Page de connexion professeur</title>
	<meta charset="utf-8">
</head>
<body>
	<fieldset>
		<legend>Bienvenue sur l'interface de connexion pour les professeurs</legend>
		<form method="post" action="connexionprofesseur.php">
		Entrez votre matricule: <input type="text" name="matriculeEN">
		Entrez votre mot de passe: <input type="password" name="mdpEN">
		<input type="submit" value="Validez">		
	</form>		
	</fieldset>
	<?php
			if (isset($_POST['matriculeEN']) AND isset($_POST['mdpEN'])) {
				try { 
						$bdd = new PDO('mysql:host=localhost;dbname=plateforme', 'root', '');
			 } catch(Exception $e) {     
		   				 die('Erreur : '.$e->getMessage());
				 } 	
				$mdp=$_POST['mdpEN'];
				$mat=$_POST['matriculeEN'];
				$ask = $bdd->prepare('SELECT COUNT(*) FROM enseignant WHERE mdp = ?');
				$ask->execute(array($mdp));
				$ask2 = $bdd->prepare('SELECT COUNT(*) FROM enseignant WHERE matricule = ?');
				$ask2->execute(array($mat));
				if (($ask->fetchColumn() != 0) && ($ask2->fetchColumn() != 0)) {
								header("Location: pprincipaleenseignant.php");
							}else
				echo "<script langage='javascript'>alert('veuiilez saisir un bon nom et un bon mot de passe');</script>";
			}				
		?>	
</body>
</html>