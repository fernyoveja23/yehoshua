<html>
<?php
    include 'head.php';
    include 'App/BD/Conexion.php';
    include 'App/Controllers/UsuariosController.php';
    ?>
    <body>
        <?php
            include 'menu.php';
        ?> 
        <div class="hero-image mt-5">
            <div class="hero-text background-info">
                <?php
                $conection = new MySQLConexion;

                $conn = $conection->getConexion();
                $usuarioController = new UsuarioController($conn);
                $result = $usuarioController->getAdmin();
                if($result == 0){
                   ?>
                     <h2 style="color: black">Falta un administrador</h2>
                     <br/>
                     <br/>
                     <a href="App/adminregister.php" class="btn btn-primary btn-lg" role="button" aria-pressed="true">Registrar</a>
                   <?php
                }else{
                ?>
                    <h2>Registration Page</h2>
                    <a href="index.php">Click here to go back<br/><br/></a>
                    <form action="register.php" method="POST">
                    Enter Username: <input type="text" name="username" required="required" /> <br/>
                    Enter password: <input type="password" name="password" required="required" /> <br/>
                    <input type="submit" value="Register"/>
                    </form>
                <?php
                }
                ?>
            </div>
        </div>
        <?php
            include 'foot.php';
        ?>
    </body>
</html>