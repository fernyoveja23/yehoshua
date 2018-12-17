        <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark justify-content-between">            
            <img class="navbar-brand" alt="<?php echo idioma::MENU_ALT_IMG; ?>" style="height:32px; width:128px" src="/yehoshua/resources/img/logo-blanco-viajes.png"/>            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="navbar-item">
                        <a class="nav-link" href="/yehoshua/index.php"><?php echo idioma::MENU_INICIO; ?></a>
                    </li>
                    <li class="navbar-item">
                        <a class="nav-link" href="#"><?php echo idioma::MENU_EVENTOS; ?></a>
                    </li>
                    <?php
                    if( !isset($_SESSION["usuario"]) ){

                    ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo idioma::MENU_VENDEDORES; ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="/yehoshua/Vendedores/register.php"><?php echo idioma::MENU_VENDEDORES_SIGIN; ?></a>
                            <a class="dropdown-item" href="/yehoshua/login.php"><?php echo idioma::MENU_VENDEDORES_LOGIN; ?></a>
                        </div>
                    </li>
                    <?php
                    }
                    else {

                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href='logout.php'><?php echo idioma::MENU_LOGOUT; ?></a>
                    </li>
                    <?php
                    }
                    ?>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="<?php echo idioma::MENU_BUSCAR_PLACE; ?>" aria-label="Search">
                    <button class="btn btn-success" type="submit"><?php echo idioma::MENU_BUSCAR; ?></button>
                </form>
            </div>
            
        </nav>