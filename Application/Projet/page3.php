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
    <div id="search">
    <?php
    echo "Vos réponses sont en blanc, les réponses exactes en rouge<br />";
     ?>
    </div>
    
    <div id="Menu_V">
       <br>
    </div>
    <div id="content">
<?php
    //Initialise le score à 0
    $score=0;
    //conection à la base
        try{
                    $bdd = new PDO('mysql:host=localhost;dbname=plateforme', 'root', '');
            }catch(Exception $e){
                    die("Erreur :".$e->getMessage());
                }
    if(isset($_POST['nominvitequizz'])){ $nominvitequizz = $_POST['nominvitequizz']; }
    //pour tous les enregistrement dans la base de la table questionnaire
    for ($i = '1'; $i <21; $i++) {
        //on recupere toutes l'index de la réponse données par le joueur pour toutes les questions
        $numrep=$_POST['rep'.$i];
        if(isset($_POST['rep'.$i])){
        //Requete SQL pour recupéré la question et la réponse donné par l'utilisateur dans la table questionnaire
        $reqsql= $bdd ->query('SELECT num, rep FROM ');
        $resbasereputil=mysql_query($reqsql,$cnx) or die ("Echec de $reqsql");
        $quizzutil=mysql_fetch_array($resbasereputil);
        //$repexact correspond à la réponse du joueur
        $repexactutil=$quizzutil[1];
        //$question correspond à la question
        $question=$quizzutil[0];
        
        //affichage du numero de question et de la question
        echo $i.") ".$question."</br>";
        //affichage de la reponse donné par l'utilisateur
        echo "Votre réponse : <h1>".$repexactutil."</h1>";
        
        //Requete SQL pour recupéré la bonne réponse à la question dans la table questionnaire
        $reqrep="Select rep from questionnaire where numquest=".$i;
        $resbase=mysql_query($reqrep,$cnx) or die ("Echec de $reqrep");
        $quizz=mysql_fetch_array($resbase);
        //$repexact correspond à la bonne reponse
        $repexact=$quizz[0];
        
        //affichage de la reponse exact
        echo "La reponse exact : <h4>".$repexact."</h4>";
        echo'</br>';
        echo'</br>';
        
        //Si l'utilisateur trouve la bonne reponse, alors un point en plus
        if ($repexactutil==$repexact){
        $score=$score+1;}
    }
    else{
        $score=$score;
        Echo "<h4>pas de réponse pour la question ".$i."</h4>";
        echo'</br>';
        echo'</br>';}    
    }
    echo'</br>';
    //affichage du score
    echo"<h1>".$_POST['nom']." votre score est ".$score." sur 20</h1>";
    
    //Affichage d'un commentaire selon la note obtenu
    if($score<=20 && $score>15){
                    echo"<br><h1>Félicitation, vous êtes tres fort</h1>";}
    if($score<=15 && $score>10){
                    echo"<br><h1>C'est pas mal du tout ça</h1>";}
    if($score<=10 && $score>7){
                    echo"<br><h1>Vous pouvez faire mieux</h1>";}
    if($score<=7 && $score>5){
                    echo"<br><h1>Il va falloir réviser</h1>";}             
    if($score<=5 && $score>=0){
                    echo"<br><h1>Retournez à l'école</h1>";}

    //on recupere la valeur max de l'index de la table classement
    $reqclt="Select MAX(numclass) From classement";
    $resclt=mysql_query($reqclt,$cnx) or die ("Echec de $reqclt");
    $indexclt=mysql_fetch_array($resclt);
    //$num correspond à l'index le plus grand de la table classement
    $num=$indexclt[0];
    
    //si auccun enregistrement dans la table classement, alors l'index prend 1 sinon l'index augmente de 1   
    if ($num==''){
       $num=1;}
      else{
       $num=$num+1;}  
    
    //enregitrement du score avec le nom et l'index dans la table classement
    $insertscore="Insert Into classement Values (".$num.",'".$_POST['nom']."',".$score.");";
    $resclt=mysql_query($insertscore,$cnx) or die ("Echec de $insertscore");
    
    //Bouton pour voir le classement   
    echo "  <form method=get action =\"classement.php\">" ;
    echo "</br>";
    echo "</br>";
    echo "</br>";
    echo "  <input type=\"submit\" value=\"Classement\"><br />";
    //ferme la connection     
    mysql_close();
?>
  </div>
    
    </div>
  </body>
</html>
