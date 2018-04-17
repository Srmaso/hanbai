<?php 
require_once 'dbconnect.php';
        
        if ($_REQUEST['delete']) {
                
                $pid = $_REQUEST['delete'];
                $query = "DELETE FROM tbl_productos WHERE product_id=:pid";
                $stmt = $DBcon->prepare( $query );
                $stmt->execute(array(':pid'=>$pid));
                
                if ($stmt) {
                        echo "Producto borrado con éxito ...";
                }
                
        }

?>