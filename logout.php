<!DOCTYPE html>
<html>
<?php
$logro = 0;
include 'lang.php';
session_unset();
if (!isset($_SESSION["usuario"]) and !isset($_SESSION["rol"]) and !isset($_SESSION["nombreUsuario"])) {
    $logro = 3;
}
include 'head.php';
?>
    <body>
        <?php
        include 'menu.php';
        if ($logro===3) {
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
                <?php echo $_SESSION["usuario"]; ?>
            </div>
        </div>
                <?php

            }
            include 'foot.php';
            ?>
    </body>
    
</html>