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
$entrada_activa = "estadisticas";
include 'templates/head.php';
        ?>

    <body>

        <?php  include 'templates/panel.php'; ?>
        <div class="container-fluid">
            <div class="col-md-9 card">


                <div class="header">
                    <h4 class="title">Listado de ventas</h4>
                    <p class="category">Tabla de resultados. (Última venta aparece en primer lugar)</p>
                </div>
                <div class="content">
                    <?php                             
$peticion = "SELECT * FROM hanbai.resultados ORDER BY fechaCompra DESC";

$resultado = mysqli_query($con, $peticion);

                    
echo "<div><table class='table'> \n"; 
echo "<thead><tr><th>Vendedor</th><th>Importe</th><th>Fecha(Año-mes-día)</th></tr></thead> \n"; 
while ($row = mysqli_fetch_row($resultado)){ 
echo "<tbody><tr><td>$row[1]</td><td>$row[2] €</td><td>";echo date ("d m, Y (H:i:s)", strtotime ($row [3]));echo "</td></tr></tbody> \n"; 
} 
echo "</table></div> \n"; 
                                
                                ?>
                </div>

            </div>
            <div class="col-md-3">

                <div class="header">
                    <h4 class="title">Ventas</h4>
                    <p class="category">Nº de ventas realizadas</p>
                    <h3>Total:
                        <?php    
$peticion = "SELECT COUNT(total) as total FROM hanbai.resultados";

$resultado = mysqli_query($con, $peticion);
     
$data=mysqli_fetch_assoc($resultado);
     
echo $data['total'];
  
     ?> ventas</h3>
                </div>
            </div>
        </div>

    </body>
    <!-- Footer -->

    <?php include 'templates/footer.php';?>

    </html>
