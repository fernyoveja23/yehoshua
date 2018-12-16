<?php
class UsuarioFacade{
    //solo hara los selects que se le manden
    public function select($conn, $sql){
        $result = $conn->query($sql);
        return $result;
    }

    public function insert($conn, $sql){
        if ($conn->query($sql) === TRUE) {
            $last_id = $conn->insert_id;
            return $last_id;
        } else {
            return 0;
        }
    }
}
?>