<!DOCTYPE html>
<html>
<?php
if (isset($_SESSION["usuario"])) {
    unset($_SESSION["usuario"]);
}
if (isset($_SESSION["rol"])) {
    unset($_SESSION["rol"]);
}
if (isset($_SESSION["nombreUsuario"])) {
    unset($_SESSION["nombreUsuario"]);
}
include 'lang.php';
include 'head.php';
?>
    <body>
        <?php
        include 'menu.php';
        if (!isset($_SESSION["usuario"]) && !isset($_SESSION["rol"]) && !isset($_SESSION["nombreUsuario"])) {
            ?>    

        <div class="hero-image-logout mt-5">
            <div class="hero-text background-info">
                <h1><?php echo idioma::TITLE; ?></h1>
                <h2><?php echo idioma::SUBTITLE; ?></h2>
                <p><?php echo idioma::CIERRE_SESION; ?></p>
            </div>
        </div>
            <?php

        } else {
            ?>
        <div class="hero-image-logout mt-5">
            <div class="hero-text background-info">
                <h1><?php echo idioma::TITLE; ?></h1>
                <h2><?php echo idioma::SUBTITLE; ?></h2>
                <p><?php echo idioma::CIERRE_SESION_FAIL; ?></p>
            </div>
        </div>
                <?php

            }
            include 'foot.php';
            ?>
    </body>
    
</html>