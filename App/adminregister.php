<html>
<?php
    include '../head.php';
    include '../App/BD/Conexion.php';
    include '../App/Controllers/UsuariosController.php';
    ?>
    <body>
        <?php
            include '../menu.php';
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
                        echo "Se guardo con exito, tienes el id ".$result;
                    }else{
                        echo "Hubo un error al guardar el usuario";
                    }
                    $conn->close();
                }
                ?>
                    <h2>Registration Admin Page</h2>
                    <a href="index.php">Click here to go back<br/><br/></a>
                    <form action="#" method="POST">
                    Enter Username: <input type="text" name="username" required="required" /> <br/>
                    Enter password: <input type="password" name="password" required="required" /> <br/>
                    <input type="submit" value="Register"/>
                    </form>                
            </div>
        </div>
        <?php
            include '../foot.php';
        ?>
    </body>
</html>