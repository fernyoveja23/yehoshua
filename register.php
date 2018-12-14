<html>
<?php
    include 'head.php';
    include 'App/BD/Conexion.php';

    $conection = new MySQLConexion;

    $conection->getConexion();
    ?>
    <body>
        <?php
            include 'menu.php';
        ?> 
        <h2>Registration Page</h2>
        <a href="index.php">Click here to go back<br/><br/>
        <form action="register.php" method="POST">
           Enter Username: <input type="text" name="username" required="required" /> <br/>
           Enter password: <input type="password" name="password" required="required" /> <br/>
           <input type="submit" value="Register"/>
        </form>
    </body>
</html>