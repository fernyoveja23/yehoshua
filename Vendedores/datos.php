<!DOCTYPE html>
<html>
<?php
include $_SERVER["DOCUMENT_ROOT"] . '/yehoshua/lang.php';
include $_SERVER["DOCUMENT_ROOT"] . '/yehoshua/head.php';
?>
    <body>
        <?php
        include $_SERVER["DOCUMENT_ROOT"] . '/yehoshua/menu.php';
        
        ?>    

        <div class="hero-image-vendedor mt-5">
            <div class="hero-text-form background-info">
                <form action="#" method="POST" class="needs-validation" novalidate>
                    <div class="form-row borderline-form justify-content-center">
                        <div class="form-group col-sm-5">
                            <label class="col-smcol-form-label" for="NombresVendedor"><?php echo idioma::FORMULARIO_VENDEDOR_NOMBRE; ?></label>
                            <input type="text" class="form-control" id="NombresVendedor" placeholder="<?php echo idioma::FORMULARIO_VENDEDOR_PLACEHOLDER_NOMBRE; ?>" required>
                            <div class="invalid-feedback">
                                <?php echo idioma::FORMULARIO_VENDEDOR_MSJ_MAL; ?>
                            </div>
                            <div class="valid-feedback">
                                <?php echo idioma::FORMULARIO_VENDEDOR_MSJ_BIEN; ?>
                            </div>
                        </div>
                        <div class="form-group col-sm-5">
                            <label for="ApellidoPVendedor"><?php echo idioma::FORMULARIO_VENDEDOR_APELLIDOP; ?></label>
                            <input type="text" class="form-control" id="ApellidoPVendedor" placeholder="<?php echo idioma::FORMULARIO_VENDEDOR_PLACEHOLDER_APELLIDOP; ?>" required>
                            <div class="invalid-feedback">
                                <?php echo idioma::FORMULARIO_VENDEDOR_MSJ_MAL; ?>
                            </div>
                            <div class="valid-feedback">
                                <?php echo idioma::FORMULARIO_VENDEDOR_MSJ_BIEN; ?>
                            </div>
                        </div>
                        <div class="form-group col-sm-5">
                            <label for="ApellidoMVendedor"><?php echo idioma::FORMULARIO_VENDEDOR_APELLIDOM; ?></label>
                            <input type="text" class="form-control" id="ApellidoMVendedor" placeholder="<?php echo idioma::FORMULARIO_VENDEDOR_PLACEHOLDER_APELLIDOM; ?>" required>
                            <div class="invalid-feedback">
                                <?php echo idioma::FORMULARIO_VENDEDOR_MSJ_MAL; ?>
                            </div>
                            <div class="valid-feedback">
                                <?php echo idioma::FORMULARIO_VENDEDOR_MSJ_BIEN; ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-row borderline-form justify-content-center">
                        <div class="form-group col-sm-3">
                            <label for="CalleVendedor"><?php echo idioma::FORMULARIO_VENDEDOR_CALLE; ?></label>
                            <input type="text" class="form-control" id="CalleVendedor" aria-describedby="" placeholder="<?php echo idioma::FORMULARIO_VENDEDOR_PLACEHOLDER_CALLE; ?>" required>
                            <div class="invalid-feedback">
                                <?php echo idioma::FORMULARIO_VENDEDOR_MSJ_MAL; ?>
                            </div>
                            <div class="valid-feedback">
                                <?php echo idioma::FORMULARIO_VENDEDOR_MSJ_BIEN; ?>
                            </div>
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="NumExtVendedor"><?php echo idioma::FORMULARIO_VENDEDOR_NUMEXT; ?></label>
                            <input type="number" class="form-control" id="NumExtVendedor" aria-describedby="NumExtHelp" placeholder="<?php echo idioma::FORMULARIO_VENDEDOR_PLACEHOLDER_NUMEXT; ?>" required>
                            <small id="NumExtHelp" class="form-text text-muted"><?php echo idioma::FORMULARIO_VENDEDOR_AYUDA_NUMEXT; ?></small>
                            <div class="invalid-feedback">
                                <?php echo idioma::FORMULARIO_VENDEDOR_MSJ_MAL; ?>
                            </div>
                            <div class="valid-feedback">
                                <?php echo idioma::FORMULARIO_VENDEDOR_MSJ_BIEN; ?>
                            </div>
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="NumIntVendedor"><?php echo idioma::FORMULARIO_VENDEDOR_NUMINT; ?></label>
                            <input type="number" class="form-control" id="NumIntVendedor" placeholder="<?php echo idioma::FORMULARIO_VENDEDOR_PLACEHOLDER_NUMINT; ?>">                            
                        </div>
                        <div class="form-group col-sm-5">
                            <label for="ColoniaVendedor"><?php echo idioma::FORMULARIO_VENDEDOR_COLONIA; ?></label>
                            <input type="text" class="form-control" id="ColoniaVendedor" aria-describedby="" placeholder="<?php echo idioma::FORMULARIO_VENDEDOR_PLACEHOLDER_COLONIA; ?>" required>
                            <div class="invalid-feedback">
                                <?php echo idioma::FORMULARIO_VENDEDOR_MSJ_MAL; ?>
                            </div>
                            <div class="valid-feedback">
                                <?php echo idioma::FORMULARIO_VENDEDOR_MSJ_BIEN; ?>
                            </div>
                        </div>
                        <div class="form-group col-sm-5">
                            <label for="AlcaldiaMunicipioVendedor"><?php echo idioma::FORMULARIO_VENDEDOR_ALCMUN; ?></label>
                            <input type="text" class="form-control" id="AlcaldiaMunicipioVendedor" placeholder="<?php echo idioma::FORMULARIO_VENDEDOR_PLACEHOLDER_ALCMUN; ?>" required>
                            <div class="invalid-feedback">
                                <?php echo idioma::FORMULARIO_VENDEDOR_MSJ_MAL; ?>
                            </div>
                            <div class="valid-feedback">
                                <?php echo idioma::FORMULARIO_VENDEDOR_MSJ_BIEN; ?>
                            </div>
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="EstadoVendedor"><?php echo idioma::FORMULARIO_VENDEDOR_ESTADO; ?></label>                        
                            <select id="EstadoVendedor" class="custom-select" required>
                                <option value="" selected><?php echo idioma::FORMULARIO_VENDEDOR_SELECT_ESTADO; ?></option>
                                <option value="1">Aguascalientes</option>
                                <option value="2">Baja California</option>
                                <option value="3">Baja California Sur</option>
                                <option value="4">Campeche</option>
                                <option value="5">Coahuila de Zaragoza</option>
                                <option value="6">Colima</option>
                                <option value="7">Chiapas</option>
                                <option value="8">Chihuahua</option>
                                <option value="9">Ciudad de México</option>
                                <option value="10">Durango</option>
                                <option value="11">Guanajuato</option>
                                <option value="12">Guerrero</option>
                                <option value="13">Hidalgo</option>
                                <option value="14">Jalisco</option>
                                <option value="15">México</option>
                                <option value="16">Michoacán de Ocampo</option>
                                <option value="17">Morelos</option>
                                <option value="18">Nayarit</option>
                                <option value="19">Nuevo León</option>
                                <option value="20">Oaxaca</option>
                                <option value="21">Puebla</option>
                                <option value="22">Querétaro</option>
                                <option value="23">Quintana Roo</option>
                                <option value="24">San Luis Potosí</option>
                                <option value="25">Sinaloa</option>
                                <option value="26">Sonora</option>
                                <option value="27">Tabasco</option>
                                <option value="28">Tamaulipas</option>
                                <option value="29">Tlaxcala</option>
                                <option value="30">Veracruz de Ignacio de la Llave</option>
                                <option value="31">Yucatán</option>
                                <option value="32">Zacatecas</option>
                            </select>
                            <div class="invalid-feedback">
                                <?php echo idioma::FORMULARIO_VENDEDOR_MSJ_MAL; ?>
                            </div>
                            <div class="valid-feedback">
                                <?php echo idioma::FORMULARIO_VENDEDOR_MSJ_BIEN; ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-row borderline-form justify-content-center">
                        <div class="form-group col-sm-5">
                            <label for="EmailVendedor"><?php echo idioma::FORMULARIO_VENDEDOR_EMAIL; ?></label>
                            <input type="email" class="form-control" id="EmailVendedor" placeholder="<?php echo idioma::FORMULARIO_VENDEDOR_PLACEHOLDER_EMAIL; ?>" required>
                            <div class="invalid-feedback">
                                <?php echo idioma::FORMULARIO_VENDEDOR_MSJ_MAL; ?>
                            </div>
                            <div class="valid-feedback">
                                <?php echo idioma::FORMULARIO_VENDEDOR_MSJ_BIEN; ?>
                            </div>
                        </div>
                        <div class="form-group col-sm-5">  
                            <label for="TelefonoVendedor"><?php echo idioma::FORMULARIO_VENDEDOR_TELEFONO; ?></label>
                            <input type="" class="form-control" id="TelefonoVendedor" placeholder="<?php echo idioma::FORMULARIO_VENDEDOR_PLACEHOLDER_TELEFONO; ?>" required>
                            <div class="invalid-feedback">
                                <?php echo idioma::FORMULARIO_VENDEDOR_MSJ_MAL; ?>
                            </div>
                            <div class="valid-feedback">
                                <?php echo idioma::FORMULARIO_VENDEDOR_MSJ_BIEN; ?>
                            </div>
                        </div>
                    </div>
                    <input type="reset" class="btn btn-secondary" value="<?php echo idioma::FORMULARIO_VENDEDOR_BOTON_RESET; ?>">
                    <button type="submit" class="btn btn-primary"><?php echo idioma::FORMULARIO_VENDEDOR_BOTON_ENVIAR; ?></button>
                </form>
            </div>
        </div>
            <?php
            include $_SERVER["DOCUMENT_ROOT"] . '/yehoshua/foot.php';
            ?>
    </body>
    
</html>