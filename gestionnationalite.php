<?php

    include "header.php";
    include "connexionPdo.php";
    $req=$monPdo->prepare("select n.num, n.libelle as 'libNation', c.libelle as 'libCont' from nationalite n, continent c where n.numContinent=c.num order by n.libelle");
    $req->setFetchMode(PDO::FETCH_OBJ);
    $req->execute();
    $lesnationalites=$req->fetchALL();


    if(!empty($_SESSION['message'])){
        $mesMessages=$_SESSION['message'];
        foreach($mesMessages as $key=>$message){
             echo'<div class="alert alert-'.$key.' alert-dismissible fade show" role="alert">'.$message.'
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
          </div> ' ;
        }
        $_SESSION['message']=[];
    }




?>


    <div class="container mt-5">

    <div class="row pt-3">
        <div class="col-9"><h2>Liste des nationalités</h2></div>
        <div class="col-3"><a href="formNationalite.php?action=Ajouter" class='btn btn-success'><i class="fas fa-plus-circle"></i>Créer une nationalité</a></div>

        
    </div>
        <table class="table  table-striper">
    <thead>
        <tr>
        <th scope="col" class="col-md-2">numero</th>
        <th scope="col" class="col-md-4">Libellé</th>
        <th scope="col" class="col-md-4">Continent</th>
        <th scope="col" class="col-md-2">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach($lesnationalites as $nationalite)
        {
          
            echo "<tr>";
            echo "<td <th class='col-md-2'>$nationalite->num</td>";
            echo "<td <th class='col-md-4'>$nationalite->libNation</td>";
            echo "<td <th class='col-md-4'>$nationalite->libCont</td>";
            echo "<td <th class='col-md-2'> 
                <a href='formNationalite.php?action=Modifier&num=$nationalite->num' class='btn btn-primary'><i class='fas fa-pen'></i></a>
                <a href='#modalsupr' data-toggle='modal' date-meessage='Voulez vous supprimer cette nationalité ?' data-suppression='supprimerNationalite.php?num=$nationalite->num' class='btn btn-danger'><i class='far fa-trash-alt'></i></a>
            </td>";
            echo "</tr>";
            //supprimerNationalite.php?num=$nationalite->num
       
        }
        ?>
    </tbody>
  </table>        
</div>



<?php include "footer.php"; 

?>