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
        
        ?>    

        <div class="hero-image-vendedor mt-5">
            <div class="hero-text-form background-info">
               <?php
               $vendedor = unserialize($_SESSION["vendedorObj"]);
               if($vendedor->getAprobacion()!="APR"){
                   ?>
                <p>No tienes permiso para poder publicar eventos</p>
                   <?php
               }else{
                   if(count($_POST)===7){
                    $conection = new MySQLConexion;

                    $conn = $conection->getConexion();
                    $vendedoresController = new VendedoresController($conn);

                    $result = $vendedoresController->saveEvento($_POST["nombre"],$_POST["fechaini"],$_POST["fechafin"],$_POST["capacidad"],$_POST["descripcion"],$_POST["costo"],$vendedor->getIdVendedor(),$_POST["lugar"]);
                    if($result===1){
                        echo "<p>Tu evento ha sido registrado</p>";
                    }else{
                        echo "<p>Algo salio mal al registrar tu evento</p>";
                        
                    }
                    echo "</div></div>";
                }
                else{
                    
               ?>
                <form action="#" method="POST" class="needs-validation" novalidate>
                    <div class="form-row borderline-form justify-content-center">
                        <div class="form-group col-sm-5">
                            <label class="col-smcol-form-label" for="NombreEvento">Nombre del evento</label>
                            <input type="text" class="form-control" id="NombreEvento" name="nombre" placeholder="Nombra tu evento" required>
                        </div>
                        <div class="form-group col-sm-5">
                            <label class="col-smcol-form-label" for="FechaIni">Fecha de inicio</label>
                            <input type="date" class="form-control" id="FechaIni" name="fechaini" required>
                        </div>
                        <div class="form-group col-sm-5">
                            <label class="col-smcol-form-label" for="FechaFin">Fecha Termino</label>
                            <input type="date" class="form-control" id="FechaFin" name="fechafin" required>
                        </div>
                        <div class="form-group col-sm-5">
                            <label class="col-smcol-form-label" for="Capacidad">Capacidad</label>
                            <input type="number" class="form-control" id="Capacidad" name="capacidad" placeholder="Cuantos lugares tiene" min=1 step=1 required>
                        </div>
                        <div class="form-group col-sm-5">
                            <label class="col-smcol-form-label" for="Descripcion">Descripcion</label>
                            <input type="text" class="form-control" id="Descripcion" name="descripcion" placeholder="Breve descripcion de tu evento" required>
                        </div>
                        <div class="form-group col-sm-5">
                            <label class="col-smcol-form-label" for="Costo">Costo</label>
                            <input type="number" class="form-control" id="Costo" name="costo" placeholder="Cuanto cuesta" min="0.01" step="0.01" required>
                        </div>
                        <div class="form-group col-sm-5">
                            <label class="col-smcol-form-label" for="Lugar">Lugar</label>
                            <input type="text" class="form-control" id="Lugar" name="lugar" placeholder="Lugar a visitar" required>
                        </div>
                    </div>
                    <input type="reset" class="btn btn-secondary" value="<?php echo idioma::FORMULARIO_VENDEDOR_BOTON_RESET; ?>">
                    <button type="submit" class="btn btn-primary"><?php echo idioma::FORMULARIO_VENDEDOR_BOTON_ENVIAR; ?></button>
                </form>
            </div>
        </div>
            <?php
                }
            }
            include $_SERVER["DOCUMENT_ROOT"] . '/yehoshua/foot.php';
            
            ?>
    </body>
    
</html>