<!DOCTYPE html>
<html>
<?php
include $_SERVER["DOCUMENT_ROOT"] . '/yehoshua/lang.php';
include $_SERVER["DOCUMENT_ROOT"] . '/yehoshua/head.php';
?>
    <body>
        <?php
            include $_SERVER["DOCUMENT_ROOT"] . '/yehoshua/menu.php';
            include $_SERVER["DOCUMENT_ROOT"] . '/yehoshua/App/BD/Conexion.php';
            include $_SERVER["DOCUMENT_ROOT"] . '/yehoshua/App/Controllers/VendedoresController.php';
            $conection = new MySQLConexion;

            $conn = $conection->getConexion();

            
            ?>    

        <div class="hero-image-admin mt-5">
            <div class="hero-text">
                
            </div>
        </div>
            <?php
    include $_SERVER["DOCUMENT_ROOT"] . '/yehoshua/foot.php';
    ?>
    </body>
    
</html>