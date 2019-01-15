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

            $vendedoresController = new VendedoresController($conn);
            $idVenta = $vendedoresController->registroVenta($_COOKIE["ventaviajeros"], $_COOKIE["ventatotal"],
            $_COOKIE["ventaidEvento"], $_COOKIE["ventaidCliente"], $_COOKIE["ventaidVendedor"]);
            if($idVenta!=0)
            {
    ?>
        <div class="hero-image mt-5">
            <div class="hero-text background-evento">
                <p>La venta ha sido aprobada, numero de referencia <?php echo $idVenta; ?></p>
            </div>
        </div>
    <?php
            }else{
                ?>
                <div class="hero-image mt-5">
                    <div class="hero-text background-evento">
                        <p>Hubo un problema al registrar la venta</p>
                    </div>
                </div>
            <?php
            }
    
    include $_SERVER["DOCUMENT_ROOT"] . '/yehoshua/foot.php';
    ?>
    </body>
    
</html>