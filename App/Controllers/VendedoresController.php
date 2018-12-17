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
}
?>