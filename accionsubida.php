<?php
    session_start();

    include_once 'dbconnect.php';

    include("startApp.php");

    $titulo = "Punto de venta";
    $entrada_activa = "ventas";

    include 'templates/head.php';

    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $fotografia = $_POST['fotografia'];
 
    if ($nombre =='' && $precio =='' && $fotografia=='') {
    die();
}


$sql = "INSERT INTO productos (nombre,precio,fotografia) "

        . " VALUES ('$nombre', '$precio', '$fotografia')";


if(mysqli_query($con, $sql)) {
  echo '<script type="text/javascript">';
  echo 'setTimeout(function () { swal("Añadido nuevo producto!","El producto ya se encuentra disponible","success");;';
  echo '}, 100); </script>'; ?>

  <meta http-equiv="refresh" content="2;URL=<?php echo $root?>ventas.php">

    <?php
        } else {
            
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { swal("Error!","Ha ocurrido un error","error");';
            echo '}, 100);</script>';
    
        ?>

        <meta http-equiv="refresh" content="2;URL=<?php echo $root?>subirproductos.php">

        <?php
}


    
   

?>
