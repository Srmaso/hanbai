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
$entrada_activa = "borrarproductos";
include 'templates/head.php';
        ?>

    <body>

        <?php  include 'templates/panel.php'; ?>
        <div class="container-fluid">
            <div class="col-md-9 card">


                <div class="header">
                    <h4 class="title">Listado de productos</h4>
                    <p class="category">Puede eliminar los que desee</p>
                </div>
                <div class="content">
                    <?php                             
$peticion = "SELECT * FROM hanbai.productos";

$resultado = mysqli_query($con, $peticion);
                                
echo "<div><table class='table'> \n"; 
echo "<thead><th>Nombre</th><th>Precio</th></tr></thead> \n"; 
while ($row = mysqli_fetch_row($resultado)){ 
echo "<tbody><tr><td>$row[1]</td><td>$row[2] €</td><td><form method='post' action=''> \n
      <input type='hidden' name='id_producto' value='".$row[0]."'>
      <button class='btn btn-danger btn-xs' type='submit'>X</button>
      </form></td></tr></tbody> \n"; 
} 
echo "</table></div> \n"; 
               
if (isset($_POST["id_producto"]))
{
//Se almacena en una variable el id del registro a eliminar
$id_producto = $_POST["id_producto"];

//Preparar la consulta
$consulta = "DELETE FROM productos WHERE id=$id_producto";

//Ejecutar la consulta
$resultado = mysqli_query($con,$consulta) or die(mysqli_error());
?>
//redirigir nuevamente a la página para ver el resultado
<meta http-equiv="refresh" content="0;URL=<?php echo $root?>borrarproductos.php"><?php
}
?>                    
                    

                                
                            
                </div>

            </div>
            <div class="col-md-3">

                <div class="header">
                    <h4 class="title">Productos</h4>
                    <p class="category">Listado de productos disponibles</p>
                    <h3>Nº de productos:
                        <?php    
$peticion = "SELECT COUNT(nombre) as total FROM hanbai.productos";

$resultado = mysqli_query($con, $peticion);
     
$data=mysqli_fetch_assoc($resultado);
     
echo $data['total'];
  
     ?></h3>
                </div>
            </div>
        </div>

    </body>
    <!-- Footer -->

    <?php include 'templates/footer.php';?>

      
        
        
    </html>


