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
$entrada_activa = "subirproductos";
include 'templates/head.php';
        ?>

    <body>
        
       <?php  include 'templates/panel.php'; ?>


    

<div class="container-fluid">
            <div class="col-md-9 card">


                <div class="header">
                    <h4 class="title">Subida de productos</h4>
                    <p class="category">Por favor rellene los campos para realizar la subida.</p>
                </div>
                <div class="content">
                                              
  <form role="form" action="accionsubida" method="post" name="upitem">
                        <fieldset>
                    
                            <div class="form-group">
                                <label for="nombre">Nombre de producto</label>
                                <input type="text" name="nombre" placeholder="" required class="form-control" />
                            </div>
                            
                            <div class="form-group">
                                <label for="precio">Precio</label>
                                <input type="number" name="precio" placeholder="" required class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="fotografia">Fotografia</label>
                            <select onchange="Swap(this,'MyImg');" name="fotografia">
                                <option value="1.jpg">Seleccionar</option>
                                <option value="1.jpg">Foto genérica 1</option>
                                <option value="2.jpg">Foto genérica 2</option>
                                <option value="3.jpg">Foto genérica 3</option>
                                <option value="4.jpg">Foto genérica 4</option>
                                <option value="5.jpg">Foto genérica 5</option>
                                <option value="6.jpg">Foto genérica 6</option>
                                <option value="7.jpg">Foto genérica 7</option>
                                <option value="8.jpg">Foto genérica 8</option>
                                <option value="9.jpg">Foto genérica 9</option>
                                <option value="10.jpg">Foto genérica 10</option>
                                </select>
                                <img id="MyImg" src="<?php echo $carpeta_fotos?>1.jpg" width=100 height=100 >
                                </div>
                            
                            <script language="JavaScript" type="text/javascript">
<!--
var Path='<?php echo $carpeta_fotos?>';
var ImgAry=new Array('','1.jpg','2.jpg','3.jpg','4.jpg','5.jpg','6.jpg','7.jpg','8.jpg','9.jpg','10.jpg');

function Swap(obj,id){
 var i=obj.selectedIndex;
 if (i<1){ return; }
 document.getElementById(id).src=Path+ImgAry[i];
}
//-->
</script>


                            <div class="form-group center-block">
                                <input type="submit" name="enviar" value="Subir producto" class="btn btn-primary" />
                            </div>
                        </fieldset>
                    </form>







                </div>

            </div>
           
        </div>

            

        

    </body>
        <!-- Footer -->

        <?php include 'templates/footer.php';?>

    </html>
