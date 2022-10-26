<?php   //modelo para usuarios

//user: usuario registrado que puede hacer reservas y ver las reservas de otras personas. Sólo puede modificar y alterar sus propias reservas.
//admin: usuario que puede ver y alterar cualquier reserva de cualquier usuario. Puede hacer reservas en bloque (en un mismo tramo horario durante varias semanas)

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
        print_r($result);
        
        if(count($result) == 1){
            //se manda a la capa de seguridad el primer elemento de $result, que es el id
            foreach($result as $userSession){
                $id = $userSession['id'];
                $name = $userSession['username'];
            }
            Safety::login($id, $name);
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