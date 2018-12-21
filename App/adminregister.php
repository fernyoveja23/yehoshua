<html>
<?php
    include $_SERVER["DOCUMENT_ROOT"].'/yehoshua/lang.php';
    include $_SERVER["DOCUMENT_ROOT"].'/yehoshua/head.php';
    include $_SERVER["DOCUMENT_ROOT"].'/yehoshua/App/BD/Conexion.php';
    include $_SERVER["DOCUMENT_ROOT"].'/yehoshua/App/Controllers/UsuariosController.php';
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
                    $result = $usuarioController->saveAdmin($_POST["username"], $_POST["password"]);
                    if($result != 0){
                        echo idioma::REGISTRO_ADMIN_EXITO.$result;
                    }else{
                        echo idioma::REGISTRO_ADMIN_FALLO;
                    }
                    $conn->close();
                }
                else{
                ?>
                    <h2><?php echo idioma::REGISTRO_ADMIN_TITLE; ?></h2>                    
                    <form action="#" method="POST">
                        <div class="form-group">
                            <label for="inputusername">
                                <?php echo idioma::REGISTRO_ADMIN_INUSER; ?>
                            </label>
                            <input id="inputusername" class="form-control is-valid" type="text" name="username" required="required" />
                        </div>
                        <div class="form-group">
                            <label for="inputpassword">
                                <?php echo idioma::REGISTRO_ADMIN_INPASS; ?>
                            </label>
                            <input id ="inputpassword" class="form-control  is-valid" type="password" name="password" required="required" />
                        </div>
                        <input class="btn btn-primary" type="submit" value="<?php echo idioma::REGISTRO_BTN_ADMIN; ?>"/>                      
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