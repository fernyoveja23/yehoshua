<?php
include $_SERVER["DOCUMENT_ROOT"] . '/yehoshua/App/BD/Conexion.php';
            include $_SERVER["DOCUMENT_ROOT"] . '/yehoshua/App/Controllers/VendedoresController.php';
            $conection = new MySQLConexion;

            $conn = $conection->getConexion();

            $vendedoresController = new VendedoresController($conn);

            
            ?>
        <div class="hero-div">
            <div class="container mt-3">
            <div class="row justify-content-center">
            <?php
            $result = $vendedoresController->getEventos();
            if($result!=NULL){
                while($row = $result->fetch_assoc()) {
                $tipo = ($row["Tipo"]==="") ? "image/png" : $row["Tipo"];
            ?>
                <div class="background-evento col col-sm-4 col-lg-5 mt-3 ml-4 mb-5">
                    <img class="img-fluid" src="data:<?php echo $tipo;?>;base64,<?php echo base64_encode($row["Imagen"]); ?> " />
                    <div class="row justify-content-between">
                        <label class="col-sm-auto col-lg-auto">Detalle del evento:</label>
                        <label class="col-sm-auto col-lg-auto"><?php echo $row["DescripcionEvento"]; ?></label>
                    </div>
                    <div class="row justify-content-between">
                        <label class="col-sm-auto col-lg-auto">Lugar:</label>
                        <label class="col-sm-auto col-lg-auto"><?php echo $row["DetalleLugar"]; ?></label>
                    </div>
                    <div class="row justify-content-between">
                        <label class="col-sm-auto col-lg-auto">Nombre del vendedor:</label>
                        <label class="col-sm-auto col-lg-auto"><?php echo $row["NombreVendedor"]; ?></label>
                    </div>
                    <div class="row justify-content-between">
                        <label class="col-sm-auto col-lg-auto">Email:</label>
                        <label class="col-sm-auto col-lg-auto"><?php echo $row["EmailVendedor"]; ?></label>
                    </div>
                    <div class="row justify-content-between">
                        <label class="col-sm-auto col-lg-auto"s>Telefono: </label>
                        <label class="col-sm-auto col-lg-auto"s><?php echo $row["TelefonoVendedor"]; ?></label>
                    </div>          
                    <div class="row justify-content-center">
                        <a class="btn btn-success">Ver detalles</a>
                    </div>          
                </div>
                <?php
                }
            }
            else{
                echo "<div class='background-evento col col-sm-4 col-lg-5 mt-3 ml-4 mb-5'>";
                echo "<div class='row justify-content-center'>";
                echo "<p>No existen eventos proximamente<p>";
                echo "</div>";
                echo "</div>";
            }
            ?>
            </div>
            </div>
        </div>