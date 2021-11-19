
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Console Administrateur</title>
</head>
<body>

  		
   

  </ul>
	<fieldset>
		<legend>Console Administrateur -- Ajout professeur</legend>
		<form method="POST" action="admin.php" id="formulaire" >
			Veuillez entrer le matricule: <input type="text" name="matriculeEN"> <br> <br>
				
				Veuillez entrer le nom: <input type="text" name="nomEN"><br>	<br>
				
					Veuillez entrer l'adresse: <input type="text" name="adresseEN"><br> <br>
				
						Veuillez entrer le telephone: <input type="text" name="telephoneEN"><br> <br>
				
							Veuillez entrer le mot de passe: <input type="password" name="mdpEN"><br> <br>


			<input type="submit" value="Valider">
	

		</form>
		
		
	</fieldset>
	<fieldset>
		<legend>Console Administrateur -- Ajout etudiant</legend>
		<form method="POST" action="admin.php" id="formulaire" >
			Veuillez entrer l'identifiant: <input type="text" name="matriculeET"> <br> <br>
				
				Veuillez entrer le mot de passe: <input type="password" name="mdpET"><br>	<br>
				


			<input type="submit" value="Valider">
	

		</form>
		
		
	</fieldset>
		<fieldset>
		<legend>Console Administrateur -- Ajout Cours</legend>
		<form method="POST" action="admin.php" id="formulaire" >
			Veuillez entrer le nom du cours: <input type="text" name="nomcours"> <br> <br>
			Veuillez entrer la classe: <input type="text" name="nomclasse"><br>	<br>
				
				Veuillez entrer le nom de l'enseignant: 		<br>    <?php

        
           try{
					$bdd = new PDO('mysql:host=localhost;dbname=plateforme', 'root', '');
			}catch(Exception $e){
					die( "Erreur :".$e->getMessage());
				}
           
            $reqsql= $bdd->query("SELECT nom FROM enseignant WHERE id<9 limit 8");
           
            $num=0;
                        
            while ($data = $reqsql->fetch())
			{
            //$num prend la valeur trouvé dans le champs 0
               
           
            $lenom=$data['nom'];
           
             echo '<input type="radio" name="lenom'.$num.'" value="1" />'.$lenom.'<br />';
			  
			}
            $reqsql->closeCursor();
            

    
?>

				<input type="text" name="llenom">
				<br><br>


			<input type="submit" value="Valider">

	<?php
		 if (isset($_POST['nomcours']) AND isset($_POST['nomclasse']) AND isset($_POST['llenom'])) {
		 	 $nomcours=$_POST['nomcours'];
		    $nomclasse=$_POST['nomclasse'];
		    $llenom=$_POST['llenom'];
		   
		 
		 $tab1 = $bdd->prepare('INSERT INTO plateforme.etudiant(nom, classe, enseignant) VALUES(:nom, :classe, :enseignant)');
		$tab1->execute(array( 
						'nom' => $nomcours, 
						'classe' => $nomclasse, 
						'enseignant' => $llenom, 

					));}


	?>
	

		</form>
		
	
	</fieldset>
	<?php

		try { 
			$bdd = new PDO('mysql:host=localhost;dbname=plateforme', 'root', '');
		
		 } catch(Exception $e) {     
		    die('Erreur : '.$e->getMessage());
		  
		 } 

		 if (isset($_POST['matriculeEN']) AND isset($_POST['nomEN']) AND isset($_POST['adresseEN']) AND isset($_POST['adresseEN']) AND isset($_POST['telephoneEN']) AND isset($_POST['mdpEN'])) {
		 	 $mat=$_POST['matriculeEN'];
		    $nom=$_POST['nomEN'];
		    $add=$_POST['adresseEN'];
		    $teleph=$_POST['telephoneEN'];
		    $motdepasse=$_POST['mdpEN'];# code...
		 
		    
		    

		$tab = $bdd->prepare('INSERT INTO plateforme.enseignant(matricule, nom, adresse, telephone, mdp) VALUES(:matricule, :nom, :adresse, :telephone, :mdp)');
		$tab->execute(array( 
						'matricule' => $mat, 
						'nom' => $nom, 
						'adresse' => $add, 
						'telephone' => $teleph, 
						'mdp' =>$motdepasse 

		));}

		 if (isset($_POST['matriculeET']) AND isset($_POST['mdpET'])) {
		 	 $matET=$_POST['matriculeET'];
		    $mdpET=$_POST['mdpET'];
		   
		 
		 $tab1 = $bdd->prepare('INSERT INTO plateforme.etudiant(identifiant, mdp) VALUES(:identifiant, :mdp)');
		$tab1->execute(array( 
						'identifiant' => $matET, 
						'mdp' => $mdpET, 
					));}

		    
	?>

</body>
</html>
