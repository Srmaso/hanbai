<?php
session_start();


//Llamada a la base de datos una vez
 
include_once 'dbconnect.php';
 

 
//Recojo valores del post 

    $usuario = $_SESSION['usr_name'];
    $total = $_POST['resultado'];



// Inserto datos


    $sql = "INSERT INTO resultados (usuario, total, fechaCompra) "

        . " VALUES ('$usuario', $total, NOW())";
    
    mysqli_query($con, $sql);

echo ($sql);
    
?>
