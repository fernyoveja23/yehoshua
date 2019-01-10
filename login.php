<html>
<?php
include $_SERVER["DOCUMENT_ROOT"] . '/yehoshua/lang.php';
include $_SERVER["DOCUMENT_ROOT"] . '/yehoshua/head.php';
include $_SERVER["DOCUMENT_ROOT"] . '/yehoshua/App/BD/Conexion.php';
include $_SERVER["DOCUMENT_ROOT"] . '/yehoshua/App/Controllers/UsuariosController.php';
include $_SERVER["DOCUMENT_ROOT"] . '/yehoshua/App/Controllers/RolesController.php';
include $_SERVER["DOCUMENT_ROOT"] . '/yehoshua/App/Controllers/VendedoresController.php';
?>
    <body>
        <?php
        include $_SERVER["DOCUMENT_ROOT"] . '/yehoshua/menu.php';
        if (isset($_POST["username"]) && isset($_POST["password"])) {
            ?>
                <div class="hero-image-users mt-5">
                <div class="hero-text background-info">
                <?php
                $conection = new MySQLConexion;

                $conn = $conection->getConexion();
                $usuarioController = new UsuarioController($conn);
                $rolesController = new RolesController($conn);
                $vendedoresController = new VendedoresController($conn);
                
                //traemos el resultado de conseguir el usuario
                $usuario = $usuarioController->getUserByUsername($_POST["username"]);
                if ($usuario->getidUsuario() != 0) {
                    $password = base64_encode($_POST["password"]);
                    if ($password === $usuario->getPassword()) {
                        
                        //inicio de sesion correcto
                        $rol = $rolesController->getRolByIdUsusario($usuario->getidUsuario());
                        if ($rol != "") {
                            $vendedor = $vendedoresController->getVendedorByIdUsuario($usuario->getidUsuario());
                            /**
                             * Se comprueba que el usuario ya haya ingresado sus datos
                             * si no es asi, lo dejara iniciar sesion pero el programa solo dejara
                             * que vea una pantalla de ingreso de datos
                             */
                            if($vendedor->getIdVendedor() != 0){
                                $_SESSION["usuario"]=$usuario->getUsername();
                                //para guardar objetos en el array de la sesion hay que utilizar serialize, con esto
                                //se conserva su tipo, estructura y valores.
                                $_SESSION['usuarioObj'] = serialize($usuario);
                                $_SESSION["rol"]=$rol;
                                $_SESSION["nombreUsuario"]=$vendedor->getNombreNormal();
                                $_SESSION["vendedorObj"] = serialize($vendedor);
                                echo "Bienvenido";
                                header("Location:index.php");
                            }else{
                                $_SESSION["usuario"]=$usuario->getUsername();
                                $_SESSION['usuarioObj'] = serialize($usuario);
                                $_SESSION["rol"]=$rol;
                                echo "Bienvenido";
                                if($rol==="Admin"){
                                    header("Location:index.php");
                                }else{
                                    header("Location:Vendedores/datos.php");
                                }
                                
                            }                           
                        } else {
                            ?>
                            <p><span class="icon-error fail-icons"></span>
                            <?php
                            echo idioma::INICIO_SESION_FAIL_ROL . "</p>";
                        }
                    }else{
                        ?>
                        <p><span class="icon-error fail-icons"></span>
                        <?php
                        echo idioma::INICIO_SESION_FAIL_PASS . "</p>";
                    }
                } else {
                    //inicio de sesion incorrecto
                    ?>
                    <p><span class="icon-error fail-icons"></span>
                    <?php
                    echo idioma::INICIO_SESION_FAIL . "</p>";
                }
                $conn->close();
                ?>
                </div>
                </div>
                <?php

            } else {
                ?> 
        <div class="hero-image-users mt-5">
            <div class="hero-text background-info">
                <h2><?php echo idioma::INICIO_SESION_TITLE; ?></h2>
                <form action="#" method="POST">
                    <div class="form-group">
                        <label for="inputusername">
                            <?php echo idioma::INICIO_SESION_USER; ?>
                        </label>
                        <input id="inputusername" class="form-control is-valid" type="text" name="username" required="required" />
                    </div>
                    <div class="form-group">
                        <label for="inputpassword">
                            <?php echo idioma::INICIO_SESION_PASS; ?>
                        </label>
                        <input id ="inputpassword" class="form-control  is-valid" type="password" name="password" required="required" />
                    </div>
                    <input class="btn btn-primary" type="submit" value="<?php echo idioma::INICIO_SESION_BTN; ?>"/>                        
                </form>
            </div>
        </div>
        <?php

    }
    include 'foot.php';
    ?>
    </body>
   
</html>