        <nav class="navbar navbar-expand-lg navbar-dark bg-dark justify-content-between">            
            <img class="navbar-brand" alt="Viajes Yehoshúa" style="height:32px; width:128px" src="resources/img/logo-blanco-viajes.png"/>            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="navbar-item">
                        <a class="nav-link" href="index.php">Inicio</a>
                    </li>
                    <li class="navbar-item">
                        <a class="nav-link" href="#">Tours</a>
                    </li>
                    <?php
                    if( !isset($_SESSION["usuario"]) ){

                    ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Vendedores
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="register.php">Registrate</a>
                            <a class="dropdown-item" href="login.php">Inicia Sesion</a>
                        </div>
                    </li>
                    <?php
                    }
                    else {

                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href='logout.php'>Cerrar Sesion</a>
                    </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
            <form class="form-inline">
                <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
                <button class="btn btn-success" type="submit">Buscar</button>
            </form>
        </nav>