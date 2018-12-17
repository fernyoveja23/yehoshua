<?php
class RolesFacade{
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

    public function getRolByName($conn, $rol){
        $sql = "SELECT * FROM roles WHERE Rol = '".$rol."'";
        $result = $conn->query($sql);
        return $result;
    }
}
?>