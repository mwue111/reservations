<?php //Clase Model con funciones generales

include_once("config/Db.php");

class Model{
    protected $table;       //nombre de la tabla a la que necesitamos acceder
    protected $idColumn;    //nombre de la columna que contiene el id al que necesitamos acceder
    protected $db;          //abstracción de datos

    public function __construct(){
        $this->db = new Db();
    }

    //función para recoger todos los datos de la base de datos
    public function getAll(){
        $result = $this->db->dataQuery("SELECT * FROM " . $this->table);
        return $result;
    }

    //función para recoger un elemento concreto
    public function get($id){
        $record = $this->db->dataQuery("SELECT * FROM " . $this->table . " WHERE " . $this->idColumn . " = $id");
        return $record;
    }

    //función para eliminar elementos
    public function delete($id){
        $result = $this->db->dataManipulation("DELETE FROM " . $this->table . " WHERE " . $this->idColumn . " = $id");
        return $result;
    }
    

}

