<?php   session_start(); ?>
<?php
 include "vues/header.php";

  $uc = empty($GET_['uc']) ? 'accueil' : $_GET['uc'];


  switch($uc){

    case 'accueil' :
      include "vues/accueil.php";
      break;
    case '  continents'  :

      break;
  }












include "vues/header.php";
?> 