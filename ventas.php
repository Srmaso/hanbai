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
$entrada_activa = "ventas";
include 'templates/head.php';
        ?>

    <body>
        
       <?php  include 'templates/panel.php'; ?>


    


            <div class="container">
                <div class="row row-m-t">
                    <div class="col col-sm-9 col-xs-6 card">
                        
                        <div class="header fadeIn animated">
                        <h4 class="title">Productos</h4>
                        <p class="category">Seleccione productos</p>
                            </div>
                        <div class="row fadeInDown animated">
                            <?php $sql_productos = "SELECT * FROM productos"; ?>
                            <?php $resultado_productos = mysqli_query($con, $sql_productos);   ?>
                            <?php while($producto= mysqli_fetch_assoc($resultado_productos)) {?>
                            <div data-tilt data-tilt-speed="400" class="col col-xs-12 col-md-6 col-lg-4 item">
                                <h2>
                                    <?php echo $producto["nombre"] ?>
                                </h2>
                                <div class="precio">
                                <p></p>
                                <p class="preciotexto">
                                    <?php echo $producto["precio"] ?>
                                </p><p class="preciotexto">€</p>
                                </div>
                                
                                <div class='img-container'>
                                    <img class="productoimg" src="<?php echo $carpeta_fotos . $producto["fotografia"] ?>">
                                    
                                </div>
                                
                                
                                <hr>
                            </div>
                            <?php  }

    ?>


                        </div>
                    </div>
                    <div class="col col-sm-3 col-xs-6">
                        <div id='cart-container' data-spy="affix" data-offset-top="10">
                            <h3>Cantidad <span class="badge" id='cartItems'>0</span></h3>
                            <div class="cart" id='cart'>
                                No hay productos añadidos.
                            </div>
                            <div id='prices'></div>
                        </div>
                        
                    </div>
                    
                </div>
               
            </div>

            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Completar venta</h4>
                        </div>
                        <div class="modal-body" id="imprimir">
                            <div class='row'>
                                <div class='col-xs-12' id='cartContentsModal'> </div>
                            </div>

                        </div>
                        <div class="modal-footer centered">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Regresar</button>
                            <button type="button" class="btn btn-primary" id='submit'>Completar</button>
                            <button type="button" class="btn btn-primary" id='imprime' href='javascript:;' onclick="imprSelec('imprimir')">Imprimir</button>
                        </div>
                    </div>
                </div>
            </div>

        
<script src="<?php echo $root?>js/vanilla-tilt.min.js"></script>
    </body>
        <!-- Footer -->

        <?php include 'templates/footer.php';?>

    </html>
