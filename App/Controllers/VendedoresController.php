<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/yehoshua/App/Facades/VendedoresFacade.php';
require_once $_SERVER["DOCUMENT_ROOT"].'/yehoshua/App/Modelos/DAO/Vendedor.php';
class VendedoresController{
    public $conn;
    public $vendedoresFacade;

    //constructor
    public function __construct($conne){
        $this->conn = $conne;
        $this->vendedoresFacade = new VendedoresFacade();
    }

    /**
     * Funcion para verificar si el usuario a registrado
     * sus datos en la pagina antes.
     */
    public function getVendedorByIdUsuario($idUsuario){
        $result = $this->vendedoresFacade->getVendedorById($this->conn, $idUsuario);
        if($result->num_rows==1){
            $vendedor = new Vendedor();
            $row = $result->fetch_assoc();
            $vendedor->setIdVendedor($row["idVendedor"]);
            $vendedor->setNombreVendedor($row["NombreVendedor"]);
            $vendedor->setDireccionVendedor($row["DireccionVendedor"]);
            $vendedor->setEmailVendedor($row["EmailVendedor"]);
            $vendedor->setTelefonoVendedor($row["TelefonoVendedor"]);
            $vendedor->setIdUsuario($row["idUsuario"]);
            return $vendedor;
        }else{
            $vendedor = new Vendedor();
            $vendedor->setIdVendedor(0);
            $vendedor->setNombreVendedor("");
            $vendedor->setDireccionVendedor("");
            $vendedor->setEmailVendedor("");
            $vendedor->setTelefonoVendedor("");
            $vendedor->setIdUsuario("");
            return $vendedor;
        }
    }
}
?>