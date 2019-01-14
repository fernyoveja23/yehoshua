<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/yehoshua/App/Facades/VendedoresFacade.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/yehoshua/App/Modelos/DAO/Vendedor.php';
class VendedoresController
{
    public $conn;
    public $vendedoresFacade;

    //constructor
    public function __construct($conne)
    {
        $this->conn = $conne;
        $this->vendedoresFacade = new VendedoresFacade();
    }

    public function saveData($nombre, $direccion, $email, $telefono, $idUsuario)
    {
        $sql = "INSERT INTO `vendedor` (`NombreVendedor`, `DireccionVendedor`, `EmailVendedor`, `TelefonoVendedor`, `cataprobacion_idcataprobacion`, `usuarios_idusuarios`) VALUES ('" . $nombre . "', '" . $direccion . "', '" . $email . "', '" . $telefono . "', 'REV', '" . $idUsuario . "')";

        $result = $this->vendedoresFacade->insert($this->conn, $sql);

        if ($result != 0) {
            $this->conn->commit();
            return $result;
        } else {
            $this->conn->rollback();
            return $result;
        }

    }

    public function saveEvento($nombre, $fechaini, $fechafin, $capacidad, $descripcion, $costo, $idVendedor, $lugar, $imagenContenido, $nombreImagen, $tipo)
    {
        $sql = "INSERT INTO `eventoturistico` (`NombreEvento`, `FechaInicioEvento`, `FechaFinEvento`, `CapacidadEvento`, `DescripcionEvento`, `CostoEvento`, `Vendedor_idVendedor`) 
        VALUES ('" . $nombre . "', '" . $fechaini . "', '" . $fechafin . "', '" . $capacidad . "', '" . $descripcion . "', '" . $costo . "', '" . $idVendedor . "')";
        $idEvento = $this->vendedoresFacade->insert($this->conn, $sql);
        
        if ($idEvento != 0) {
            $sql = "INSERT INTO `lugar` (`DetalleLugar`) VALUES ('" . $lugar . "')";
            $idLugar = $this->vendedoresFacade->insert($this->conn, $sql);
            if ($idLugar != 0) {
                $sql = "INSERT INTO `eventolugar` (`eventoturistico_idEvento`, `lugar_idLugar`) VALUES ('" . $idEvento . "', '" . $idLugar . "')";
                $eventolugar = $this->vendedoresFacade->insert($this->conn, $sql);
                if ($eventolugar != 0) {
                    $sql = "INSERT INTO `imagen` (`NombreArchivo`,`Tipo`, `Imagen`) VALUES ('" . $nombreImagen . "','" . $tipo . "','" . $imagenContenido . "' )";
                    $idImagen = $this->vendedoresFacade->insert($this->conn, $sql);
                    if ($idImagen != 0) {
                        $sql = "INSERT INTO `eventoimagen` (`Imagen_idEventoImagen`, `eventoturistico_idEvento`) VALUES ('" . $idImagen . "', '" . $idEvento . "')";
                        $eventoimagen = $this->vendedoresFacade->insert($this->conn, $sql);
                        if ($eventoimagen != 0) {
                            $this->conn->commit();
                            return 1;
                        } else {
                            $this->conn->rollback();
                            return 0;
                        }
                    } else {
                        $this->conn->rollback();
                        return 0;
                    }
                } else {
                    $this->conn->rollback();
                    return 0;
                }
            } else {
                $this->conn->rollback();
                return 0;
            }
        } else {
            $this->conn->rollback();
            return 0;
        }
    }

    public function getEventos(){
        $sql = "SELECT `eventoturistico`.`idEvento`, `eventoturistico`.`NombreEvento`, `eventoturistico`.`FechaInicioEvento`, 
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
        LIMIT 30";

        $result = $this->vendedoresFacade->select($this->conn, $sql);
        if ($result->num_rows >= 1) {
            return $result;
        } else {
            return null;
        }
    }

    /**
     * Funcion para verificar si el usuario a registrado
     * sus datos en la pagina antes.
     */
    public function getVendedorByIdUsuario($idUsuario)
    {
        $result = $this->vendedoresFacade->getVendedorById($this->conn, $idUsuario);
        if ($result->num_rows == 1) {
            $vendedor = new Vendedor();
            $row = $result->fetch_assoc();
            $vendedor->setIdVendedor($row["idVendedor"]);
            $vendedor->setNombreVendedor($row["NombreVendedor"]);
            $vendedor->setDireccionVendedor($row["DireccionVendedor"]);
            $vendedor->setEmailVendedor($row["EmailVendedor"]);
            $vendedor->setTelefonoVendedor($row["TelefonoVendedor"]);
            $vendedor->setAprobacion($row["cataprobacion_idcataprobacion"]);
            $vendedor->setIdUsuario($row["usuarios_idusuarios"]);
            return $vendedor;
        } else {
            $vendedor = new Vendedor();
            $vendedor->setIdVendedor(0);
            $vendedor->setNombreVendedor("");
            $vendedor->setDireccionVendedor("");
            $vendedor->setEmailVendedor("");
            $vendedor->setTelefonoVendedor("");
            $vendedor->setAprobacion("");
            $vendedor->setIdUsuario("");
            return $vendedor;
        }
    }

    public function getVendedoresRevision()
    {
        $sql = "SELECT * FROM vendedor WHERE cataprobacion_idcataprobacion = 'REV'";
        $result = $this->vendedoresFacade->select($this->conn, $sql);
        if ($result->num_rows >= 1) {
            return $result;

        } else {

            return null;
        }
    }

    public function updateVendedorEstadoAprobado($idUsuario)
    {
        $sql = "UPDATE vendedor SET cataprobacion_idcataprobacion = 'APR' WHERE usuarios_idusuarios = '" . $idUsuario . "'";
        $result = $this->vendedoresFacade->update($this->conn, $sql);
        if ($result == 0) {
            $this->conn->rollback();
            return $result;
        } else {
            $this->conn->commit();
            return $result;
        }
    }

    public function updateVendedorEstadoDenegado($idUsuario)
    {
        $sql = "UPDATE vendedor SET cataprobacion_idcataprobacion = 'DEN' WHERE usuarios_idusuarios = '" . $idUsuario . "'";
        $result = $this->vendedoresFacade->update($this->conn, $sql);
        if ($result == 0) {
            $this->conn->rollback();
            return $result;
        } else {
            $this->conn->commit();
            return $result;
        }
    }
}
?>