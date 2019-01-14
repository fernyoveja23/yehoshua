SELECT `eventoturistico`.`idEvento`, `eventoturistico`.`NombreEvento`, `eventoturistico`.`FechaInicioEvento`, 
        `eventoturistico`.`FechaFinEvento`, `eventoturistico`.`CapacidadEvento`, `eventoturistico`.`DescripcionEvento`,
        `eventoturistico`.`CostoEvento`, `vendedor`.`NombreVendedor`, `vendedor`.`EmailVendedor`, `vendedor`.`TelefonoVendedor`,
        `lugar`.`DetalleLugar`,
        `imagen`.`NombreArchivo`, `imagen`.`Tipo`, `imagen`.`Imagen`
        FROM `eventoturistico` 
        INNER JOIN `vendedor` ON `vendedor`.`idVendedor` = `eventoturistico`.`Vendedor_idVendedor`
        INNER JOIN `lugar` ON `lugar`.`idLugar` = (SELECT `eventolugar`.`lugar_idLugar` FROM `eventolugar` 
        WHERE `eventolugar`.`eventoturistico_idEvento` = `eventoturistico`.`idEvento`)
        INNER JOIN `imagen` ON `imagen`.`idImagen` = (SELECT `eventoimagen`.`Imagen_idEventoImagen` FROM `eventoimagen`
        WHERE `eventoimagen`.`eventoturistico_idEvento` = `eventoturistico`.`idEvento`)
        WHERE `FechaInicioEvento` >= CURDATE()
        LIMIT 30