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
        $query = "INSERT INTO users(username, password, realname, type) VALUES('$username', '$pass', '$realname', '$type')";

        return $this->db->dataManipulation($query);
    }

    public function editUser($id, $username, $pass, $realname, $type){
        $query = "UPDATE users SET username = '$username', password = '$pass', realname = '$realname', type = '$type' WHERE id = $id";

        return $this->db->dataManipulation($query);
    }

    public function login($name, $pass){
        $query = "SELECT * FROM users WHERE username = '$name' AND password = '$pass';";
        $result = $this->db->dataQuery($query);
        
        
        if(count($result) == 1){
            //se manda a la capa de seguridad el primer elemento de $result, que es el id
            foreach($result as $userSession){
                $id = $userSession['id'];
                $name = $userSession['username'];
                $type = $userSession['type'];
            }
            Safety::login($id, $name, $type);
            return true;
        }
        else{
            return false;
        }
        
    }

    public function getReservations($id){
        $query = "SELECT reservations.id_resource, reservations.id_time_slot, reservations.date, resources.name, time_slots.start_time, time_slots.end_time, time_slots.day_of_week, reservations.remarks FROM reservations LEFT JOIN time_slots ON time_slots.id = reservations.id_time_slot INNER JOIN users ON reservations.id_user = users.id INNER JOIN resources ON reservations.id_resource = resources.id WHERE users.id = $id ORDER BY reservations.date;";
        
        return $this->db->dataQuery($query);
    }

    public function getAllReservations(){
        $query = "SELECT users.id AS id_user, users.username AS username, resources.id AS id_resource, resources.name AS resource, time_slots.day_of_week AS day_of_week, reservations.date as date, time_slots.id as idTS, CONCAT_WS('-', time_slots.start_time, time_slots.end_time) as time_slot, users.type AS user_type FROM reservations INNER JOIN users ON reservations.id_user = users.id INNER JOIN resources ON reservations.id_resource = resources.id INNER JOIN time_slots ON reservations.id_time_slot = time_slots.id ORDER BY reservations.date;";

        $result = $this->db->dataQuery($query);

        return $result;
    }

    public function logout(){
        Safety::logout();
    }

}