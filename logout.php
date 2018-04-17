<?php
session_start();
 
if(isset($_SESSION['usr_id'])) {
    //Mato la sesicón y limpio
    session_destroy();
    unset($_SESSION['usr_id']);
    unset($_SESSION['usr_name']);
    header("Location: index.php");
} else {
    header("Location: index.php");
}
?>
