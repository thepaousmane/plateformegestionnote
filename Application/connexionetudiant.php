
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Page de connexion etudiant</title>
</head>
<body>
	<fieldset>
		<legend>Connexion étudiant</legend>
		<form method="post" action="connexionetudiant.php">
			Entrez votre identifiant: <input type="text" name="nomET">
			Entrez votre mot de passe: <input type="password" name="mdpET">
			Entrez votre classe: <input type="text" name="classe">
			<input type="submit" value="Validez">
		</form>
	</fieldset>	
		<?php	
			

			
			try{
					$bdd = new PDO('mysql:host=localhost;dbname=plateforme', 'root', '');
			}catch(Exception $e){
					die("Erreur :".$e->getMessage());
				}
			if (isset($_POST['nomET']) AND isset($_POST['mdpET']) AND $_POST['classe']) {

			session_start();
			$_SESSION['classe']=$_POST['classe'];
				$nom=$_POST['nomET'];
				$mdp=$_POST['mdpET'];
				$ask= $bdd->prepare("SELECT COUNT(*) FROM etudiant WHERE identifiant = ?");
				$ask->execute(array($nom));
				$ask1= $bdd->prepare("SELECT COUNT(*) FROM etudiant WHERE mdp = ?");
				$ask1->execute(array($mdp));
				if ($ask->fetchColumn() !=0 AND $ask1->fetchColumn() != 0) {
					header("Location: page2.php");
				}else{
					echo "<script langage='javascript'>alert('Veuillez réesayer avec un bon mot de passe'); </script>";
				}
			}

		?>
	

</body>
</html>