<!DOCTYPE html>
<html>
<head>
	<title>Page Enseignant</title>
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
    <li><a href="pprincipaleenseignantbis.php">Page&nbsp;Question/Reponse</a></li>

  </ul>
	<?php
		try {
			$bdd = new PDO('mysql:host=localhost;dbname=plateforme','root','');
		} catch (Exception $e) {
			die("Error :".$e->getMessage());
		}
	
	?>

<form action="pprincipaleenseignant.php" method="POST">


	<fieldset>


	
		<legend>QCM</legend>	
		Matiere <input type="text" name="matiere"> <br>
		Classe <input type="text" name="classe">	<br>
		Question <input type="text" name="question"> <br>
		Choix 1 <input type="text" name="choix1"><br>
		Choix 2	<input type="text" name="choix2"><br>
		Choix 3 <input type="text" name="choix3"><br>
		Choix 4	<input type="text" name="choix4"><br>
		Point <input type="text" name="point"><br>
		malus <input type="text" name="malus"><br>
		Chrono<input type="text" name="chrono"><br>
		Numéro question <input type="text" name="numq">
	
<?php 	
		


		 if (isset($_POST['matiere']) AND isset($_POST['classe']) AND isset($_POST['question']) AND isset($_POST['choix1']) AND isset($_POST['choix2']) AND isset($_POST['choix3']) AND isset($_POST['choix4']) AND isset($_POST['point']) AND isset($_POST['malus']) AND isset($_POST['chrono'])) {
		 	 $matiere=$_POST['matiere'];
		    $classe=$_POST['classe'];
		    $question=$_POST['question'];
		    $choix1=$_POST['choix1'];
		    $choix2=$_POST['choix2'];
		    $choix3=$_POST['choix3'];
		     $choix4=$_POST['choix4'];
		     $point=$_POST['point'];
		     $malus=$_POST['malus'];
		     $chrono=$_POST['chrono'];
		    

		 
		    
		    

		$tab = $bdd->prepare('INSERT INTO plateforme.examen_qcm(nom, classe, question, choix1, choix2, choix3, choix4, ppoint, malus, chrono) VALUES(:nom, :classe, :question, :choix1, :choix2, :choix3, :choix4, :ppoint, :malus, :chrono)');
		$tab->execute(array( 
						'nom' => $matiere, 
						'classe' => $classe, 
						'question' => $question, 
						'choix1' => $choix1, 
						'choix2' =>$choix2,
						'choix3' =>$choix3,
						'choix4' =>$choix4,
						'ppoint'=>$point,
						'malus' =>$malus,
						'chrono' =>$chrono


		));}
 ?>
</fieldset>

		<input type="submit" value="Validez">
	
</form>	


	

</body>
</html>
