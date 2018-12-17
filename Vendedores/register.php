<html>
<?php
    include $_SERVER["DOCUMENT_ROOT"].'/yehoshua/lang.php';
    include $_SERVER["DOCUMENT_ROOT"].'/yehoshua/head.php';
    include $_SERVER["DOCUMENT_ROOT"].'/yehoshua/App/BD/Conexion.php';
    include $_SERVER["DOCUMENT_ROOT"].'/yehoshua/App/Controllers/UsuariosController.php';
    include $_SERVER["DOCUMENT_ROOT"].'/yehoshua/App/Controllers/RolesController.php';
    ?>
    <body>
        <?php
            include $_SERVER["DOCUMENT_ROOT"].'/yehoshua/menu.php';
        ?> 
        <div class="hero-image mt-5">
            <div class="hero-text background-info">
            <?php
                if(isset($_POST["username"]) && isset($_POST["password"])){
                    $conection = new MySQLConexion;

                    $conn = $conection->getConexion();
                    $usuarioController = new UsuarioController($conn);
                    $rol = new RolesController($conn);
                    $idRol = $rol->getIdRol("Vendedor");
                    $result = $usuarioController->saveUser($_POST["username"], $_POST["password"], $idRol);
                    if($result != 0){
                        echo idioma::REGISTRO_EXITO;
                    }else{
                        echo idioma::REGISTRO_FALLO;
                    }
                    $conn->close();
                }
                else{
                ?>
                    <h2><?php echo idioma::REGISTRO_TITLE; ?></h2>                    
                    <form action="#" method="POST">
                        <div class="container">
                            <div class="row">
                                <div class="col col-sm-4">
                                <label for="inputusername">
                                    <?php echo idioma::REGISTRO_ADMIN_INUSER; ?>
                                </label>
                                </div>
                                <div class="col col-sm-7">
                                    <input id="inputusername" class="form-control" type="text" name="username" required="required" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col col-sm-4">
                                <label for="inputpassword">
                                    <?php echo idioma::REGISTRO_ADMIN_INPASS; ?>
                                </label>
                                </div>
                                <div class="col col-sm-7">
                                    <input id ="inputpassword" class="form-control" type="password" name="password" required="required" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col col-sm-10">
                                
                                    <input class="btn btn-primary" type="submit" value="<?php echo idioma::REGISTRO_BTN_ADMIN; ?>"/>
                                </div>
                            </div>
                        </div>                        
                    </form>       
                <?php
                }
                ?>       
            </div>
        </div>
        <?php
            include $_SERVER["DOCUMENT_ROOT"].'/yehoshua/foot.php';
        ?>
    </body>
</html>