<!DOCTYPE HTML PUBLIC "-//W3C// DTD XHTML 4.01 Transmitional//EN"
"http://www.w3.org/TR/xhtml/DTD/xhtml-transmitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Quizz by Khalifa</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-15"/>
    <link media="screen" type="text/css" 
    href="templates\style.css" rel="stylesheet" />
</head>   
  <body>
    <div id="page"> 
    <div id="header">
    </div>
    <div id="search">
    <?php
        echo "Repondez aux 20 questions suivantes. Une fois terminé, donnez votre Nom et clickez clicker sur 'VALIDER'<br />";
     ?>
    </div>
    <div id="Menu_V">
    </div>
    <div id="content">
    <?php
 
        
           try{
					$bdd = new PDO('mysql:host=localhost;dbname=plateforme', 'root', '');
			}catch(Exception $e){
					die( "Erreur :".$e->getMessage());
				}
           //connection à la base
            //Execution de la requete SQL
            //$reqsql="Select numquest,question,rep1,rep2,rep3,rep4,rep from questionnaire where numquest=".$id;
            $reqsql="SELECT * FROM questionnaire WHERE numquest<21 limit 20";
  
            
                        
            while ($quizz=mysql_fetch_assoc($resbase)){
            //$num prend la valeur trouvé dans le champs 0
            $num=$quizz['numquest'];
            //$question prend la valeur trouvé dans le champs 1
            $question=$quizz['question'];
            //$reponse1 prend la valeur trouvé dans le champs 2
            $reponse1=$quizz['rep1'];
            //$reponse2 prend la valeur trouvé dans le champs 3
            $reponse2=$quizz['rep2'];
            //$reponse3 prend la valeur trouvé dans le champs 3
            $reponse3=$quizz['rep3'];
            //$reponse4 prend la valeur trouvé dans le champs 4
            $reponse4=$quizz['rep4'];
            //$repexact prend la valeur trouvé dans le champs 5
            $repexact=$quizz['rep'];
            
            echo '<h1>';
            //Affichage à l'ecran du numero de la question et de la question       
            echo $num.") ".$question;
            echo "<br />";
            //Affichage du choix des réponses avec des radiobutton
            echo '<h2>';
            echo '<input type="radio" name="rep'.$num.'" value="1" />'.$reponse1.'<br />';
			      echo '<input type="radio" name="rep'.$num.'" value="2" />'.$reponse2.'<br />';
			      echo '<input type="radio" name="rep'.$num.'" value="3" />'.$reponse3.'<br />';
			      echo '<input type="radio" name="rep'.$num.'" value="4" />'.$reponse4.'<br />';
            echo "<br />";
            echo "<br />";
            echo '</h2>';
            echo '</h1>';}
            
        //ferme la connection à la base
        mysql_close();
    
    //Renseignement du nom pour enregistrement dans la base
    echo "  Quel est votre nom ?<br />";
    echo $nom="  <input type=\"text\" name=\"nom\" value=\"Machin\" size=\"20\"><br /> ";
    echo '<input type="submit" value="Valider" /></form>';
    
?>

    </div>
    
    </div>
  </body>
</html>

