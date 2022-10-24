<?php   //modelo para usuarios

include_once("model.php");
include_once("models/safety.php");

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

    public function login($name, $pass){
        $query = "SELECT * FROM users WHERE username = '$name' AND password = '$pass';";
        $result = $this->db->dataQuery($query);
        var_dump($result);
        
        if(count($result) == 1){
            //se manda a la capa de seguridad el primer elemento de $result, que es el id
            Safety::login($result[0]->id);
            return true;
        }
        else{
            return false;
        }
        
    }

    public function logout(){
        Safety::logout();
    }

}