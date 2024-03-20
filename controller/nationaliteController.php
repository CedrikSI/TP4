<?php
$action=$_GET['action'];
switch($action){
    case 'list' :
            $lesnationalites=Nationalite::findAll();
            include('vues/listeNationalite.php');
        break;
        case 'add' :
            $mode="Ajouter";
            include('vues/formNationalite.php');
        break;
        case 'update' :
            $mode="Modifier";
            $nationalite=Nationalite::findById($_GET['num']);
            include('vues/formNationalite.php');
        break;
        case 'delete' :
            $nationalite=Nationalite::findById($_GET['num']);
            $nb=Nationalite::delete($nationalite);
            if ($nb==1){
                $_SESSION['message']=["success"=>"la nationalite a bien été supprimé"];
            }else{
                $_SESSION['message']=["danger"=>"la nationalite n'a pas été supprimé "];
            }
        header('location: index.php?uc=nationalite&action=list');
        exit();
        break;

        case 'valideForm' :
            $continent= new Nationalite();
            if(empty($_POST['num'])){ // cas d'un création
                $nationalite->setLibelle($_POST['libelle']);
                $nb=Nationalite::add($nationalite);
                $message = "ajouté";
            }else{ // cas d'une modif
                $nationalite->setNum($_POST['num']);
                $nationalite->setLibelle($_POST['libelle']);
                $nb=Nationalite::update($nationalite);
                $message = "modifié";}
            if ($nb==1){
                $_SESSION['message']=["success"=>"le continent a bien été $message"];
            }else{
                $_SESSION['message']=["danger"=>"le continent a bien été $message"];
            }
            header('location: index.php?uc=nationalite&action=list');
            exit();
            break;
            }
        