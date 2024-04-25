<main role="main">

 
  <div class="jumbotron container">
    <div class="container">
      <h1 class="display-3">Bienvenue</h1>
      <p>Bienvenue sur mon site</p>
    </div>
  </div>

  <div class="container mt-5">
    
    <?php
 
 $dataPoints = array(
   array("label"=> "BD", "y"=> 18.37),
   array("label"=> "Essai", "y"=> 6.12),
   array("label"=> "Roman Comtemporain", "y"=> 4.08),
   array("label"=> "Litterature", "y"=> 8.16),
   array("label"=> "Terreur", "y"=> 16.03),
   array("label"=> "Science-fiction", "y"=> 10.33),
   
 );
   
 ?>
 <!DOCTYPE HTML>
 <html>
 <head>  
 <script>
 window.onload = function () {
  
 var chart = new CanvasJS.Chart("chartContainer", {
   animationEnabled: true,
   exportEnabled: true,
   title:{
     text: "Macaron de types de livres"
   },
   subtitles: [{
     text: "pleins de thèmes disponibles"
   }],
   data: [{
     type: "pie",
     showInLegend: "true",
     legendText: "{label}",
     indexLabelFontSize: 16,
     indexLabel: "{label} - #percent%",
     yValueFormatString: "$#,##0",
     dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
   }]
 });
 chart.render();
  
 }
 </script>
 </head>
 <body>
 <div id="chartContainer" style="height: 370px; width: 100%;"></div>
 <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
 </body>
 </html>                                   
    <hr>

  </div> 
   <div class="container">
    <div class="row">
    <div class="col-md-4">
      <div class="card border-primary mb-3" style="max-width: 20rem;">
        <div class="card-header">Header</div>
        <div class="card-body">
           <h4 class="card-title">Primary card title</h4>
           <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
      </div>
    </div>
  </div>
</main>