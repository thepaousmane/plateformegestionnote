<!DOCTYPE html>
<html>
<head>
	<title>Page enseignant </title>
</head>
	<style type="text/css">
  body {
    font: normal 100.01% Helvetica, Arial, sans-serif;
    color: black; background-color: #ffffe0;
  }

  ul#menu {
    margin: 0; padding: 0.8em;
    text-align: center;
    border: 1px solid black;
    background-color: silver;
  }
  ul#menu li {
    list-style: none;
    display: inline;
    margin: 0.4em; padding: 0;
  }

  ul#menu a, ul#menu span {
    padding: 0.2em 1em;
    text-decoration: none; font-weight: bold;
    border: 1px solid yellow;
    border-left-color: white; border-top-color: white;
    color: maroon; background-color: #ccc;
  }
  * html ul#menu a, * html ul#menu span {
    width: 1em;    /* nécessaire pour IE 5.0x seulement */
    w/idth: auto;  /* annulé par mesure de sécurité pour IE 6 */
  }
  ul#menu a:hover, ul#menu span {
    border-color: white;
    border-left-color: black; border-top-color: black;
    color: white; background-color: gray;
  }

</style>
	 <ul id="menu"> 
	 	<li><span>Page&nbsp;active</span></li>
	 	<li><a href="pprincipaleenseignant.php">Page&nbsp;QCM</a></li>
  		
   

  </ul>
	<?php
		try {
			$bdd = new PDO('mysql:host=localhost;dbname=plateforme','root','');
		} catch (Exception $e) {
			die("Error :".$e->getMessage());
		}
	
	?>

<form action="pprincipaleenseignantbis.php" method="POST">


	<fieldset>


	
		<legend>Question/Réponse</legend>	
		Matiere <input type="text" name="matiere"> <br>
		Classe <input type="text" name="classe">	<br>
		Question <input type="text" name="question"> <br>
		Point <input type="text" name="point"><br>
		malus <input type="text" name="malus"><br>
		Chrono<input type="text" name="chrono"><br>
<body>
	<?php

		 if (isset($_POST['matiere']) AND isset($_POST['classe']) AND isset($_POST['question']) AND isset($_POST['point']) AND isset($_POST['malus']) AND isset($_POST['chrono'])) {
		 	 $matiere=$_POST['matiere'];
		    $classe=$_POST['classe'];
		    $question=$_POST['question']; 
		     $point=$_POST['point'];
		     $malus=$_POST['malus'];
		     $chrono=$_POST['chrono'];
		    

		 
		    
		    

		$tab = $bdd->prepare('INSERT INTO plateforme.examen_qr(nom, classe, question, ppoint, malus, chrono) VALUES(:nom, :classe, :question,  :ppoint, :malus, :chrono)');
		$tab->execute(array( 
						'nom' => $matiere, 
						'classe' => $classe, 
						'question' => $question, 
						'ppoint'=>$point,
						'malus' =>$malus,
						'chrono' =>$chrono


		))
		;}
	?>
	</fieldset>

		<input type="submit" value="Validez">
	
</form>	

</body>
</html>