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

            
            ?>
        <div class="hero-image-admin mt-5">
            <div class="hero-text background-info">
            <?php
            if(isset($_GET["aprobado"])){
                $update = $vendedoresController->updateVendedorEstadoAprobado($_GET["aprobado"]);

                if($update==1){
                    echo idioma::APROBACIONES_EXITO;
                }else{
                    echo idioma::APROBACIONES_FALLO;
                }
            }
            if(isset($_GET["denegado"])){
                $update = $vendedoresController->updateVendedorEstadoDenegado($_GET["denegado"]);

                if($update==1){
                    echo idioma::DENEGACIONES_EXITO;
                }else{
                    echo idioma::DENEGACIONES_FALLO;
                }
            }
            $result = $vendedoresController->getVendedoresRevision();
            if($result!=NULL){
            ?>
            <div class="table-responsive-lg">
                <table class="table table-hover table-striped table-dark">
                    <thead>
                        <tr>
                        <th scope="col"><?php echo idioma::APROBACIONES_COLUMNA_NOMBRE; ?></th>
                        <th scope="col"><?php echo idioma::APROBACIONES_COLUMNA_DIR; ?></th>
                        <th scope="col"><?php echo idioma::APROBACIONES_COLUMNA_EMAIL; ?></th>
                        <th scope="col"><?php echo idioma::APROBACIONES_COLUMNA_TEL; ?></th>
                        <th scope="col"><?php echo idioma::APROBACIONES_COLUMNA_APR; ?></th>
                        <th scope="col"><?php echo idioma::APROBACIONES_COLUMNA_DEN; ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while($row = $result->fetch_assoc()) {
                        ?>
                        <tr>
                            <th scope="row"><?php echo str_replace("-"," ",$row["NombreVendedor"]); ?></th>
                            <td><?php echo str_replace("|"," ",$row["DireccionVendedor"]); ?></td>
                            <td><?php echo $row["EmailVendedor"]; ?></td>
                            <td><?php echo $row["TelefonoVendedor"]; ?></td>
                            <td><a class="btn btn-primary" <?php echo "href='?aprobado=".$row["usuarios_idusuarios"]."'"; ?>><?php echo idioma::APROBACIONES_BOTON_APROB; ?></a></td>
                            <td><a class="btn btn-warning" <?php echo "href='?denegado=".$row["usuarios_idusuarios"]."'"; ?>><?php echo idioma::APROBACIONES_BOTON_DENEG; ?></a></td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                </div>
                <?php
            }
            else{
                echo idioma::APROBACIONES_NO_HAY;
            }
            ?>
            </div>
        </div>
            <?php
    include $_SERVER["DOCUMENT_ROOT"] . '/yehoshua/foot.php';
    ?>
    </body>
    
</html>