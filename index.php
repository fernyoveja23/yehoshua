<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <link rel="stylesheet" href="resources/bootstrap-4.1.3/css/bootstrap.min.css">
    <script src="resources/bootstrap-4.1.3/js/jquery-3.3.1.slim.min.js"></script>
    <script src="resources/bootstrap-4.1.3/js/popper.min.js"></script>
    <script src="resources/bootstrap-4.1.3/js/bootstrap.min.js"></script>
    <script src="main.js"></script>
</head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark justify-content-between">
            <ul class="navbar-nav">
                <li class="navbar-item">
                    <a class="nav-link" href="#">Inicio</a>
                </li>
                <li class="navbar-item">
                    <a class="nav-link" href="#">Tours</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Usuario
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="register.php"> Click here to register</a>
                        <a class="dropdown-item" href="login.php"> Click here to login </a>
                    </div>
                </li>
            </ul>
            <form class="form-inline">
                <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
                <button class="btn btn-dark my-2 my-sm-0" type="submit">Buscar</button>
            </form>
        </nav>
            <?php
            include 'App/BD/Conexion.php';
            echo "<p>Hello World!</p>";
            $conection = new MySQLConexion;

            $conection->getConexion();

                //https://www.codeproject.com/Articles/759094/Step-by-Step-PHP-Tutorials-for-Beginners-Creating
            ?>    
            
    </body>
</html>