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
                        <a class="nav-link" href="/yehoshua/Ventas/evento.php"><?php echo idioma::MENU_EVENTOS; ?></a>
                    </li>                    
                    <?php
                if (isset($_SESSION["usuario"]) && isset($_SESSION["rol"])) {
                    /**
                     * Solo los vendedores tienen que registrar sus datos para que sean aprobados
                     * por ello se tienen que llenar los datos si o si.
                     */
                    if (!isset($_SESSION["nombreUsuario"]) && $_SESSION["rol"] != "Admin") {
                        ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarNoData" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo idioma::MENU_VENDEDORES_REVISION; ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarNoData">
                            <a class="dropdown-item" href='/yehoshua/Vendedores/datos.php'><?php echo idioma::MENU_REGISTRAR_VENDEDOR; ?></a>
                            <a class="dropdown-item" href='/yehoshua/logout.php'><?php echo idioma::MENU_LOGOUT; ?></a>
                        </div>
                    </li>
                        <?php

                    } elseif (!isset($_SESSION["nombreUsuario"]) && $_SESSION["rol"] == "Admin") {
                        /**
                         * Solo para Administradores
                         */
                        ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarAdministrador" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo idioma::MENU_ADMINISTRADORES; ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarAdministrador">
                            <a class="dropdown-item" href='/yehoshua/Administracion/Aprobaciones.php'><?php echo idioma::MENU_APROBAR_VENDEDOR; ?></a>
                            <a class="dropdown-item" href='/yehoshua/logout.php'><?php echo idioma::MENU_LOGOUT; ?></a>
                        </div>
                    </li>                    
                    <?php
                    }
                     else {
                        ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarVendedor" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo $_SESSION["nombreUsuario"]; ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarVendedor">
                            <a class="dropdown-item" href='/yehoshua/Vendedores/evento.php'><?php echo idioma::MENU_PUBLICAR_EVENTO; ?></a>
                            <a class="dropdown-item" href='/yehoshua/logout.php'><?php echo idioma::MENU_LOGOUT; ?></a>
                        </div>
                    </li>                    
                    <?php

                }

            }
            ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarIdiomas" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo idioma::MENU_IDIOMA; ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarIdiomas">
                            <a class="dropdown-item" href="?lang=es-MX"><?php echo idioma::MENU_IDIOMA_ES_MX; ?></a>
                            <a class="dropdown-item" href="?lang=en-US"><?php echo idioma::MENU_IDIOMA_EN; ?></a>
                        </div>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="<?php echo idioma::MENU_BUSCAR_PLACE; ?>" aria-label="Search">
                    <button class="btn btn-success" type="submit"><?php echo idioma::MENU_BUSCAR; ?></button>
                </form>
            </div>
            
        </nav>