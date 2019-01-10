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

    public function saveData($nombre, $direccion, $email, $telefono, $idUsuario){
        $sql = "INSERT INTO `vendedor` (`NombreVendedor`, `DireccionVendedor`, `EmailVendedor`, `TelefonoVendedor`, `cataprobacion_idcataprobacion`, `usuarios_idusuarios`) VALUES ('".$nombre."', '".$direccion."', '".$email."', '".$telefono."', 'REV', '".$idUsuario."')";

        $result = $this->vendedoresFacade->insert($this->conn, $sql);

        if($result!=0){
            $this->conn->commit();
            return $result;
        }else{            
            $this->conn->rollback();
            return $result;
        }
        
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
            $vendedor->setIdUsuario($row["usuarios_idusuarios"]);
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

    public function getVendedoresRevision(){
        $sql = "SELECT * FROM vendedor WHERE cataprobacion_idcataprobacion = 'REV'";
        $result = $this->vendedoresFacade->select($this->conn,$sql);
        if ($result->num_rows >= 1) {
            return $result;
            
        } else {

            return NULL;
        }
    }

    public function updateVendedorEstado($idUsuario){
        $sql = "UPDATE vendedor SET cataprobacion_idcataprobacion = 'APR' WHERE usuarios_idusuarios = '".$idUsuario."'";
        $result = $this->vendedoresFacade->update($this->conn,$sql);
        if($result==0){
            $this->conn->rollback();
            return $result;
        }else{
            $this->conn->commit();
            return $result;
        }
    }
}
?>