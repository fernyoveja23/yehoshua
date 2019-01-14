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
        <div class="hero-div mt-5">
            <div class="container mt-3">
            <div class="row justify-content-center">
            <?php
            
            if(isset($_GET["lugares"])){
                $result = $vendedoresController->getEvento($_GET["lugares"]);
                while($row = $result->fetch_assoc()) {
                $tipo = ($row["Tipo"]==="") ? "image/png" : $row["Tipo"];
                $fechaini = date_create($row["FechaInicioEvento"]);
                $fechafin = date_create($row["FechaFinEvento"]);
            ?>
                <div class="background-evento col col-sm-4 col-lg-5 mt-3 ml-4 mb-5">
                    <img class="img-fluid" src="data:<?php echo $tipo;?>;base64,<?php echo base64_encode($row["Imagen"]); ?> " />
                    <div class="row justify-content-between">
                        <label class="col-sm-auto col-lg-auto">Nombre del evento:</label>
                        <label class="col-sm-auto col-lg-auto"><?php echo $row["NombreEvento"]; ?></label>
                    </div>
                    <div class="row justify-content-between">
                        <label class="col-sm-auto col-lg-auto">Fecha de inicio:</label>
                        <label class="col-sm-auto col-lg-auto"><?php echo date_format($fechaini, 'd-m-Y'); ?></label>
                    </div>
                    <div class="row justify-content-between">
                        <label class="col-sm-auto col-lg-auto">Fecha de fin:</label>
                        <label class="col-sm-auto col-lg-auto"><?php echo date_format($fechafin, 'd-m-Y'); ?></label>
                    </div>
                    <div class="row justify-content-between">
                        <label class="col-sm-auto col-lg-auto">No. de asientos:</label>
                        <label class="col-sm-auto col-lg-auto"><?php echo $row["CapacidadEvento"]; ?></label>
                    </div>

                    <div class="row justify-content-between">
                        <label class="col-sm-auto col-lg-auto">Detalle del evento:</label>
                        <label class="col-sm-auto col-lg-auto"><?php echo $row["DescripcionEvento"]; ?></label>
                    </div>

                    <div class="row justify-content-between">
                        <label class="col-sm-auto col-lg-auto">Costo:</label>
                        <label class="col-sm-auto col-lg-auto">$<?php echo $row["CostoEvento"]; ?></label>
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
                    <div class="row justify-content-between">
                        <label class="col-sm-auto col-lg-auto">Lugar:</label>
                        <label class="col-sm-auto col-lg-auto"><?php echo $row["DetalleLugar"]; ?></label>
                    </div>

                </div>
                <?php
                if(COUNT($_POST)===6)
                {
                    require $_SERVER["DOCUMENT_ROOT"] . '/yehoshua/Paypal-Rest/autoload.php';
                    $apiContext = new \PayPal\Rest\ApiContext(
                        new \PayPal\Auth\OAuthTokenCredential(
                            'AZsatlhjKYX2zaXrbvMWsV63_5NCV5Sp5dXxQNC3FQM-FXYI7ZKNVFyIHFN52XGPGAYANjCOhLqSzpOt',     // ClientID
                            'EOaWaAFJhem9tzqBMaIcsO0DmHWUqaEhyfZL38HVYGww9392WsXgOd0R_MRUVPBEKQhFuk6nKYgnqfWT'      // ClientSecret
                            )
                    );
                    // After Step 2
                    $payer = new \PayPal\Api\Payer();
                    $payer->setPaymentMethod('paypal');

                    $amount = new \PayPal\Api\Amount();
                    $amount->setTotal('1.00');
                    $amount->setCurrency('USD');

                    $transaction = new \PayPal\Api\Transaction();
                    $transaction->setAmount($amount);

                    $redirectUrls = new \PayPal\Api\RedirectUrls();
                    $redirectUrls->setReturnUrl("https://example.com/your_redirect_url.html")
                        ->setCancelUrl("https://example.com/your_cancel_url.html");

                    $payment = new \PayPal\Api\Payment();
                    $payment->setIntent('sale')
                        ->setPayer($payer)
                        ->setTransactions(array($transaction))
                        ->setRedirectUrls($redirectUrls);

                        // After Step 3
                    try {
                        $payment->create($apiContext);
                        echo $payment;

                        echo "\n\nRedirect user to approval_url: " . $payment->getApprovalLink() . "\n";
                    }
                    catch (\PayPal\Exception\PayPalConnectionException $ex) {
                        // This will print the detailed information on the exception.
                        //REALLY HELPFUL FOR DEBUGGING
                        echo $ex->getData();
}
                    ?>

                    <?php
                }else{
                ?>
                <div class="background-evento col col-sm-4 col-lg-5 mt-3 ml-4 mb-5">
                    <form action="#" method="POST" class="needs-validation" novalidate>
                        <div class="form-row borderline-form justify-content-center">
                            <div class="form-group col-sm-5">
                                <label class="col-smcol-form-label" for="Lugares">Lugares</label>
                                <input type="number" class="form-control" id="Lugares" name="lugares" min=1 max=<?php echo round($row["CapacidadEvento"]/8); ?> placeholder="Asigna la cantidad de lugares" required>
                            </div>
                            <div class="form-group col-sm-5">
                                <label class="col-smcol-form-label" for="Nombres">Nombre:</label>
                                <input type="text" class="form-control" id="Nombres" name="nombre" placeholder="<?php echo idioma::FORMULARIO_VENDEDOR_PLACEHOLDER_NOMBRE; ?>" required>
                            </div>
                            <div class="form-group col-sm-5">
                                <label for="ApellidoP">Apellido Paterno:</label>
                                <input type="text" class="form-control" id="ApellidoP" name="apellidop" placeholder="<?php echo idioma::FORMULARIO_VENDEDOR_PLACEHOLDER_APELLIDOP; ?>" required>
                            </div>
                            <div class="form-group col-sm-5">
                                <label for="ApellidoMV">Apellido Materno</label>
                                <input type="text" class="form-control" id="ApellidoM" name="apellidom" placeholder="<?php echo idioma::FORMULARIO_VENDEDOR_PLACEHOLDER_APELLIDOM; ?>" required>
                            </div>
                            <div class="form-group col-sm-5">
                                <label for="Email">Correo electronico:</label>
                                <input type="email" class="form-control" id="Email" name="email" aria-describedby="EmailHelp" placeholder="Email" required>
                            </div>
                            <div class="form-group col-sm-5">  
                                <label for="Telefono">Telefono:</label>
                                <input type="text" class="form-control" id="Telefono" name="telefono" aria-describedby="TelefonoHelp" placeholder="Telefono" required>                         
                            </div>                
                            
                        </div>
                        <input type="reset" class="btn btn-secondary" value="<?php echo idioma::FORMULARIO_VENDEDOR_BOTON_RESET; ?>">
                        <button type="submit" class="btn btn-primary"><?php echo idioma::FORMULARIO_VENDEDOR_BOTON_ENVIAR; ?></button>
                    </form>
                </div>
                <?php
                }
            }
            }
            else{
                echo "<br><br><br><br>";
                echo "<div class='background-evento col col-sm-4 col-lg-5 mt-3 ml-4 mb-5'>";
                echo "<div class='row justify-content-center'>";
                echo "<p>Algo ah salido mal<p><br>";
                echo "<a class='btn btn-success' href='/yehoshua'>Regresar al inicio</a>";
                echo "</div>";
                echo "</div>";
            }
            ?>
            </div>
            </div>
        </div>
        <?php
            
    include $_SERVER["DOCUMENT_ROOT"] . '/yehoshua/foot.php';
    ?>
    </body>
    
</html>