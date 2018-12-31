<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/yehoshua/App/Facades/VendedoresFacade.php';
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
        $result = $this->vendedoresFacade->getVendedorByIdUsuario($this->conn, $idUsuario);
        if($resutl==1){
            return 1;
        }else{
            return 0;
        }
    }
}
?>