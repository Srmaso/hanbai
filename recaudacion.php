<?php
    session_start();

if(!isset($_SESSION['usr_id'])!="") {
    header("Location: index.php");
}

    include_once 'dbconnect.php';
?>
    <!DOCTYPE html>
    <html>
    <?php 
include("startApp.php");
$titulo = "Punto de venta";
$entrada_activa = "recaudacion";
include 'templates/head.php';
        ?>

    <body>
        
       <?php  include 'templates/panel.php'; ?>

<div class="container-fluid">
<div class="col-md-9 card">
    

                            <div class="header">
                                <h4 class="title">Recaudación</h4>
                                <p class="category">Total de cada venta</p>
                            </div>
                            <div class="content">
                                
                                
    <canvas id="myChart" style="max-width: 900px;"></canvas>

                                
                               
                            </div>
                     
        </div>
    <div class="col-md-3">
        
        <div class="header">
                                <h4 class="title">Ventas</h4>
                                <p class="category">Dinero recaudado</p>
            <h3>Total: <?php
     
$peticion = "SELECT (total) FROM hanbai.resultados";

$resultado = mysqli_query($con, $peticion);
  
$sum=0;
     
while ($row = mysqli_fetch_assoc($resultado)){
    $value = $row['total'];

    $sum += $value;
}

echo $sum;
     
?> €</h3> 
                            </div>
    </div>
    </div>
        
     
         
<script>
    
    
   var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [<?php
     
$peticion = "SELECT (total) FROM hanbai.resultados ORDER BY id ASC";

$resultado = mysqli_query($con, $peticion);
     
while($row= mysqli_fetch_assoc($resultado)){

    echo ('"' . $row['total'] . '€' . '"' . ',');}

?>],
        datasets: [{
            label: 'Ventas',
            data: [<?php
     
$peticion = "SELECT (total) FROM hanbai.resultados ORDER BY id ASC";

$resultado = mysqli_query($con, $peticion);
     
while($row= mysqli_fetch_assoc($resultado)){

    echo ($row['total'] . ',');}

?>]
,            backgroundColor: [ 
              
            ],
            
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
}); 
    
    
    
    
    
    
    
    
    
    
    

</script>

        
    
            

        

    </body>
        <!-- Footer -->

        <?php include 'templates/footer.php';?>

    </html>