<!DOCTYPE HTML >
<html >
<head>
    <title>Quizz by Khalifa</title>
   <meta charset="utf-8">
 
</head>   
  <body>
    <div id="page"> 
    <div id="header">
    </div>
    <div id="search">
    <?php
        echo "Repondez aux questions suivantes. Une fois termine, donnez le code de l'examen puis clickez clicker sur 'VALIDER'<br />";
     ?>
    </div>
    <div id="Menu_V">
    </div>
    <div id="content">
    <?php
 session_start();
        
           try{
					$bdd = new PDO('mysql:host=localhost;dbname=plateforme', 'root', '');
			}catch(Exception $e){
					die( "Erreur :".$e->getMessage());
				}
           
            $reqsql= $bdd->query("SELECT * FROM examen_qcm WHERE id<21 limit 20");
           
            $num=0;
                        
            while ($data = $reqsql->fetch()){
            //$num prend la valeur trouvé dans le champs 0
               
            $num++;
            //$question prend la valeur trouvé dans le champs 1
            $question=$data['question'];
            //$reponse1 prend la valeur trouvé dans le champs 2
            $reponse1=$data['choix1'];
            //$reponse2 prend la valeur trouvé dans le champs 3
            $reponse2=$data['choix2'];
            //$reponse3 prend la valeur trouvé dans le champs 3
            $reponse3=$data['choix3'];
            //$reponse4 prend la valeur trouvé dans le champs 4
            $reponse4=$data['choix4'];
            //$repexact prend la valeur trouvé dans le champs 5
            $repexact=$data['rep'];
            
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
            echo '</h1>';
           
        }
            $reqsql->closeCursor();
            
       
    
    //Renseignement du nom pour enregistrement dans la base
   
    echo '<input type="submit" value="Valider" /></form>';
    
?>

    </div>
    
    </div>
  </body>
</html>

