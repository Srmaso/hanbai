<!-- Inicio sesión -->

<?php
session_start();

//Llamada a la base de datos una vez

include_once 'dbconnect.php';
 
//Si está logueado directamente a la pantalla de ventas

if(isset($_SESSION['usr_id'])!="") {
    header("Location: ventas.php");
}
 
 
//Comprobar de envío el formulario
if (isset($_POST['login'])) {
 
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $result = mysqli_query($con, "SELECT * FROM users WHERE email = '" . $email. "' and password = '" . md5($password) . "'");
 
    if ($row = mysqli_fetch_array($result)) {
        //$_SESSION['usr_estado'] = $row['estado'];
 
        if($row['estado']==1){
            $_SESSION['usr_id'] = $row['id'];
            $_SESSION['usr_name'] = $row['name'];
            header("Location: index.php");
        }else
        $errormsg = "Esta cuenta esta desactivada";
    } else {
        $errormsg = "<b><i class='fas fa-exclamation-triangle'></i>Datos incorrectos</b>";
    }
}
?>

    <!DOCTYPE html>
    <html>

    <!-- Llamada a head -->

    <?php 
        include("startApp.php");
        $titulo = "Hanbai - Login";
        include 'templates/head.php';
?>

    <body>

        <!-- Formulario de login -->

        <div class="container">
            <div class="row">
                <div class="login-wrap fadeInDown animated">
                    <a href="index"><img src="<?php echo $root?>images/hanbai-logo.png" class="logo-login" alt="Hanbai - Punto de Venta"></a>

                    <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform">
                        <fieldset>
                            <legend class="text-center">Login</legend>


                            <div class="form-group">
                                <label for="name">E-mail</label>
                                <input type="text" name="email" placeholder="Ingresar Email" required class="form-control" />
                            </div>

                            <div class="form-group">
                                <label for="name">Contraseña</label>
                                <input type="password" name="password" placeholder="Ingresar Contraseña" required class="form-control" />
                            </div>

                            <div class="form-group center-block">
                                <input type="submit" name="login" value="Iniciar Sesion" class="btn btn-primary" />
                            </div>
                        </fieldset>
                    </form>
                    <span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
                    <div>
                        ¿No tienes cuenta? <a href="register.php">Regístrate aqui</a>
                    </div>

                </div>

            </div>

        </div>
        
        <!-- Formulario de login -->

        <?php include 'templates/footer.php';?>

    </body>


    </html>
