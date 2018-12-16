        <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark justify-content-between">            
            <img class="navbar-brand" alt="Viajes Yehoshúa" style="height:32px; width:128px" src="/yehoshua/resources/img/logo-blanco-viajes.png"/>            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="navbar-item">
                        <a class="nav-link" href="/yehoshua/index.php">Inicio</a>
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
                            <a class="dropdown-item" href="/yehoshua/register.php">Registrate</a>
                            <a class="dropdown-item" href="/yehoshua/login.php">Inicia Sesion</a>
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
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
                    <button class="btn btn-success" type="submit">Buscar</button>
                </form>
            </div>
            
        </nav>