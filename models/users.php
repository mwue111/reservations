<?php   //modelo para usuarios

include_once("model.php");

class Users extends Model{

    public function __construct(){
        $this->table = "users";
        $this->idColumn = "id";
        parent::__construct();
    }

    public function addUser($username, $pass, $realname, $type){
        $query = "INSERT INTO users(username, password, realname, type) VALUES('$username', '$pass', '$realname', $type)";

        return $this->db->dataManipulation($query);
    }

    public function editUser($id, $username, $pass, $realname, $type){
        $query = "UPDATE users SET username = '$username', password = '$pass', realname = '$realname', type = $type WHERE id = $id";

        return $this->db->dataManipulation($query);
    }

}