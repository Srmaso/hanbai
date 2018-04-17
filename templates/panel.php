<div class="sidebar" data-background-color="white" data-active-color="danger">

    	<div class="sidebar-wrapper">
            <div class="logo ">
                <h3 class="textologo">Hambai!</h3>
                 <a href="<?php echo $root?>ventas.php"> <img src="<?php echo $root?>images/hanbai-logo.png" class="logo-login-small pulse animated text-center" alt="Hanbai - Punto de Venta"></a>
            
            </div>

            <ul class="nav">
                <li <?php if ($entrada_activa == "ventas" ) echo 'class="active"'; ?>>
                    <a href="<?php echo $root?>ventas.php">
                        <i class="far fa-window-restore"></i>
                        <p>Punto de Venta</p>
                    </a>
                </li>
                <li <?php if ($entrada_activa == "subirproductos" ) echo 'class="active"'; ?>>
                    <a href="<?php echo $root?>subirproductos.php">
                        <i class="fas fa-cloud-upload-alt"></i>
                        <p>Subir productos</p>
                    </a>
                </li>
                <li <?php if ($entrada_activa == "borrarproductos" ) echo 'class="active"'; ?>>
                    <a href="<?php echo $root?>borrarproductos.php">
                        <i class="far fa-trash-alt"></i>
                        <p>Borrar productos</p>
                    </a>
                </li>
                <li <?php if ($entrada_activa == "recaudacion" ) echo 'class="active"'; ?>>
                    <a href="<?php echo $root?>recaudacion.php">
                        <i class="far fa-money-bill-alt"></i>
                        <p>Recaudación</p>
                    </a>
                </li>
                <li <?php if ($entrada_activa == "estadisticas" ) echo 'class="active"'; ?>>
                    <a href="<?php echo $root?>estadisticas.php">
                        <i class="fas fa-table"></i>
                        <p>Ventas</p>
                    </a>
                </li>
                
            </ul>
    	</div>
    </div>

<div class="main-panel">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <span class="navbar-brand"><p><i class="far fa-user-circle"></i> Vendedor: <?php echo $_SESSION['usr_name']; ?></p></span>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="<?php echo $root?>logout.php">Desconectar</a>
                               
                        </li>
                       
                    </ul>

                </div>
            </div>
        </nav>

        
        
        