<?php
$action=$_GET['action'];
switch($action){
    case 'list' :
            $lesContinents=Continent::findAll();
            include('vues/listeContinents.php');
        break;
        case 'add' :
            include('formContinent.php')
        break;
        case 'update' :
        break;
        case 'delete' :
        break;
        case 'valideForm' :
        break;
}