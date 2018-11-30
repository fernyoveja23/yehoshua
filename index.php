<html>
    <head>
        <title>My first PHP Website</title>
    </head>
    <body>
        <?php
        include 'App/BD/Conexion.php';
            echo "<p>Hello World!</p>";
            $conection = new MySQLConexion;

            $conection->getConexion();

            //https://www.codeproject.com/Articles/759094/Step-by-Step-PHP-Tutorials-for-Beginners-Creating
        ?>
        <a href="login.php"> Click here to login 
        <a href="register.php"> Click here to register 
    </body>
</html> 