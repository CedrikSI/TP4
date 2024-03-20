<?php   ob_start();
session_start(); 
 include ("vues/header.php");
 include ("modeles/continent.php");
 include ("modeles/monPdo.php");
 include ("vues/messageFlash.php");
 include ("modeles/Nationalite.php");

  $uc = empty($_GET['uc']) ? 'accueil' : $_GET['uc'];
  
  switch($uc){
    case 'accueil' :
      include ("vues/accueil.php");
      break;
    case 'continents'  :
      include ("controller/continentController.php");
      break;
    case 'nationalites' :
      include ("controller/nationaliteController.php") ;
      break;
  }
  


include ("vues/footer.php");
?> 

