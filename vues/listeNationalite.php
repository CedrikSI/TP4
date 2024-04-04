<div class="container mt-5">

    <div class="row pt-3">
       <div class="col-9"><h2>Liste des nationalite</h2></div>
       <div class="col-3"><a href="index.php?uc=nationalite&action=add" class='btn btn-success'><i 
       class="fas fa-plus-circle"></i> Créer une nationalite</a></div>
    </div> 

    <table class="table table-hover table-striped">
<thead>
  <thead class="thead-dark">
    <tr class="d-flex">
      <th scope="col" class="col-md-2">Numéro</th>
      <th scope="col" class="col-md-8">Libellé</th>
      <th scope="col" class="col-md-8">Continent</th>
      <th scope="col" class="col-md-2">Actions</th>
    </tr>
  </thead>
  <tbody>     
<?php
    foreach($lesnationalites as $nationalite){
        echo "<tr class='d-flex'>";
        echo "<td class='col-md-2'>".$nationalite->getNum()."</td>";
        echo "<td class='col-md-4'>".$nationalite->getLibelle()."</td>";
        echo "<td class='col-md-4'>".$nationalite->getContinent()->getLibelle()."</td>";
        echo "<td class='col-md-2'>
        <a href='index.php?uc=nationalite&action=update&num=".$nationalite->getNum()."' class='btn btn-primary'><i class='fas fa-pen'></i></a>
        <a href='#modalsupr' data-toggle='modal' data-suppression='index.php?uc=nationalite&action=delete&num=".$nationalite->getNum()."' class='btn btn-danger'><i class='fas fa-trash-alt'></i></a>
    </td>";
    echo "</tr>";
    }
?>
  </tbody>
</table>
</div> 