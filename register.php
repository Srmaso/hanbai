<!-- Inicio sesión -->

<?php
session_start();

//Llamada a la base de datos una vez
 
include_once 'dbconnect.php';


//Si está logueado directamente a la pantalla de ventas
 
if(isset($_SESSION['usr_id'])) {
    header("Location: index.php");
}


//Establece el error de validación

$error = false;
 
//Recojo valores del post 

if (isset($_POST['signup'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
     
    
    if (!$error) {
        if(mysqli_query($con, "INSERT INTO users(name,email,password,estado) VALUES('" . $name . "', '" . $email . "', '" . md5($password) . "','1')")) {
            echo '<script type="text/javascript">';
  echo 'setTimeout(function () { swal("Registrado!","Registro realizado con éxito","success");';
  echo '}, 100);</script>';
        } else {
            
            echo '<script type="text/javascript">';
  echo 'setTimeout(function () { swal("Error!","Ha ocurrido un error, inténtelo de nuevo y pruebe con otras credenciales","error");';
  echo '}, 100);</script>';
        }
    }
    
    
   
}
?>

    <!DOCTYPE html>
    <html>

    <!-- Llamada a head -->

    <?php 
        include("startApp.php");
        $titulo = "Hanbai - Registro";
        include 'templates/head.php';
?>

    <body>

        <!-- Formulario de registro -->

        <div class="container">
            <div class="row">
                <div class="login-wrap fadeInDown animated">
                    <a href="index"><img src="<?php echo $root?>images/hanbai-logo.png" class="logo-login" alt="Hanbai - Punto de Venta"></a>
                    <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform">
                        <fieldset>
                            <legend>Registro</legend>

                            <div class="form-group">
                                <label for="name">Nombre y Apellidos</label>
                                <input type="text" name="name" placeholder="Nombres y apellidos" required value="<?php if($error) echo $name; ?>" class="form-control" />
                                <span class="text-danger"><?php if (isset($name_error)) echo $name_error; ?></span>
                            </div>

                            <div class="form-group">
                                <label for="name">Email</label>
                                <input type="email" name="email" placeholder="Correo Electrónico" required value="<?php if($error) echo $email; ?>" class="form-control" />
                                <span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span>
                            </div>

                            <div class="form-group">
                                <label for="name">Contraseña</label>
                                <input type="password" name="password" placeholder="Contraseña" required class="form-control" />
                                <span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>
                            </div>

                            <div class="form-group">
                                <input type="submit" name="signup" value="Registrar" class="btn btn-primary" />
                            </div>
                        </fieldset>
                    </form>

                    <div>
                        ¿Ya te registraste? <a href="index.php">Logeate Aqui</a>
                    </div>
                </div>
            </div>

        </div>
        
        <!-- Footer -->

        <?php include 'templates/footer.php';?>

    </body>

    </html>
