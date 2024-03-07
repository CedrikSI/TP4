<?php session_start();
include "vues/header.php";
include "modeles/Continent.php";
include "modeles/MonPdo.php";

$uc =empty($_GET['uc']) ? "accueil" : $_GET['uc'];

switch($uc){
    case 'accueil' :
        include('vues/accueil.php');
        break;
    case 'continents' :
        include('Controllers/continentController.php');
        break;
    case 'genre' :
        include('Cont')    
}
include "vues/footer.php";?>