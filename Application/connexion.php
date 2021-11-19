<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Connexion utilisateur</title>
</head>
<body>
	<fieldset>
		<legend>Connexion admin</legend>
		<form method="post" action="connexion.php">
		Login: <input type="text" name="login"> <br><br>
		Password: <input type="password" name="password"> <br>
		<input type="submit" value="Validez">
		</form>
	
	</fieldset>		<?php
				if (isset($_POST['login']) AND isset($_POST['password'])) {
					$login=$_POST['login'];
					$mdp=$_POST['password'];
					$reallog="admin";
					$realpass="admin";
					if (($login==$reallog)AND($mdp==$realpass)) {
						header('Location: admin.php');
 						 exit();
					}else
					echo "<script langage='javascript'>alert('Veuillez réesayer avec un bon mot de passe'); </script>";
				}
			?>
		
	<fieldset>	

		<legend>User Type</legend>
	<form>
		
		
		 Professeur	<input type="checkbox" id="choixb" value="2" onclick="redirection1()">
		 <br>
		 Etudiant <input type="checkbox" id="choixc" value="3" onclick="redirection2()">

	</form>
    </fieldset>
	<script type="text/javascript">

		function redirection1() {
			document.location.href="connexionprofesseur.php"
		}
		function redirection2(){
			document.location.href="connexionetudiant.php"
		}
	</script>
</body>
</html>