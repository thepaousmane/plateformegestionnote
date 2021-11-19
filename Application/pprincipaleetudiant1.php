<!DOCTYPE html>
<html>
<head>
	<title>Page etudiant</title>
</head>
<body>
	<?php
		try{
					$bdd = new PDO('mysql:host=localhost;dbname=plateforme', 'root', '');
			}catch(Exception $e){
					die(echo "Erreur :".$e->getMessage());
				}
				
	?>
</body>
</html>