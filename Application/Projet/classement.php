<!DOCTYPE HTML PUBLIC "-//W3C// DTD XHTML 4.01 Transmitional//EN"
"http://www.w3.org/TR/xhtml/DTD/xhtml-transmitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Quizz by Dez</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-15"/>
    <link media="screen" type="text/css" 
    href="templates\style.css" rel="stylesheet" />
</head>   



  <body>
    <div id="page">  
    <div id="header"></div>
    
    <div id="Menu_V">
       <br>
    </div>
    <div id="content">
<?php
        echo "<h4>Voici le classement final :</h4>";
        //connection à la base quizz
        require ("connectdb.php");
        //On recupere les donné avec la requete dans la table classement
        $reqclt="SELECT *FROM `classement` ORDER BY `score` DESC LIMIT 0, 30 ";
        $resclt=mysql_query($reqclt,$cnx) or die ("Echec de $sqlquest");
        //Indice du classement
        $num=1;
        //On affiche toutes les données du classement
        while($indexclt=mysql_fetch_array($resclt)){
            
            $nom=$indexclt[1];  
            $score=$indexclt[2];
            echo "</br>";
            echo "</br>";
            echo "<h1>".$num.") ".$nom." avec ".$score." points </h1>";
            $num++;}
       
      //fermeture de la connection         
      mysql_close();
    echo "  <form method=get action =\"index.php\">" ;
    echo "</br>";
    echo "</br>";
    echo "</br>";
    echo "  <input type=\"submit\" value=\"Retour à l'acueil\"><br />";
?>
</div>
    
    </div>
  </body>
</html>
