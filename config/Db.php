<?php       //conexión con la base de datos

include_once("config.php");

class Db{
    private $db;

    public function __construct(){
        require_once("config.php");
        $this->db = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
        if($this->db->connect_errno){
            return -1;  //-1 en caso de error
        }
        else{
            return 0;   //0 en caso de que se conecte correctamente
        }
    }

    //función para cerrar la conexión con la base de datos
    function close(){
        if($this->db) $this->db->close();
    }

    //función para lanzar una consulta del tipo SELECT a la base de datos.
    public function dataQuery($sql){
        $result = $this->db->query($sql);

        //para convertir $result en un array de php y después devolverlo:
        $resultArray = array(); 
        while($row = $result->fetch_array()){
            $resultArray[] = $row;
        }

        return $resultArray;
    }

    //función para manipular la base de datos (INSERT, UPDATE, DELETE...)
    function dataManipulation($sql){
        $this->db->query($sql);
        return $this->db->affected_rows;    //devuelve el número de filas modificadas. 
    }

}