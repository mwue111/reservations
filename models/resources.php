<?php       //modelo para resources

include_once("model.php");

class Resources extends Model{
    //private $db;

    public function __construct(){
        $this->table = "resources";     //especificar el nombre de la tabla en esta clase   
        $this->idColumn = "id";         //especificar el nombre de la columna donde está el id
        parent::__construct();          //referenciar al constructor del padre, que permite entrar a la base de datos
    }
    
    /*
    //Esta función se hereda directamente de Model.
    public function getAll(){
        $result = $this->db->dataQuery("SELECT * FROM resources");
        return $result;
        
        $result = $this->db->query("SELECT * FROM resources");
            
        $resourcesList = array();
        
        while($row = $result->fetch_array()){
            $resourcesList[] = $row;
        }

        return $resourcesList;
    }
    */

    public function addResource($name, $description, $location, $image){
        $dir = 'images/';
        $file = $dir.basename($_FILES['resourceImage']['name']);

        if(move_uploaded_file($_FILES['resourceImage']['tmp_name'], $file)){
            echo 'El archivo se ha subido correctamente.';
        }
        else{
            echo 'Ha habido un error en la subida del archivo.';
        }

        $query = "INSERT INTO resources(name, description, location, image) VALUES('$name', '$description', '$location', '$file')";
        
        return $this->db->dataManipulation($query);
        /*
        //Esto lo hace Db.php mediante la clase Model.
        $upload = $this->db->query($query);
        if(!$upload){
            $data['info'] = 'Ha habido un error subiendo el recurso.';
            header('Location:resources_controller.php?action=showResources&message=' . $data['info']);
        }
        */
    }

    /*
    //Esta función se hereda de Model directamente.
    public function deleteResource($id){
        $query = "DELETE FROM resources WHERE id=$id";

        $execute = $this->db->query($query);
        if(!$execute){
            $data['info'] = "Ha ocurrido un error eliminando el recurso.";
            header("Location:resources_controller.php?action=showResources&message=" . $data['info']);
        }
    }
    */

    public function editResource($id, $name, $description, $location, $image){
        $dir = 'images/';
        $file = $dir.basename($_FILES['resourceImage']['name']);

        if(move_uploaded_file($_FILES['resourceImage']['tmp_name'], $file)){
            echo 'El archivo se ha subido correctamente.';
        }
        else{
            echo 'Ha habido un error en la subida del archivo.';
        }

        $query = "UPDATE resources SET name = '$name', description = '$description', location = '$location', image = '$file' WHERE id = $id";

        return $this->db->dataManipulation($query);
        /*
        $editResource = $this->db->query($query);

        if(!$editResource){
            $data['info'] = "No se han podido modificar los datos.";
            header("Location:resources_controller.php?message=" . $data['info']);
        }
        */
    }

    //función para reservar un recurso
    public function bookResource($selectedResource, $user, $selectedTS, $selectedDay, $remarks){
        $query = "INSERT INTO reservations(id_resource, id_user, id_time_slot, date, remarks) VALUES($selectedResource, $user, $selectedTS, '$selectedDay', '$remarks');";
        echo $query;
        $result = $this->db->dataManipulation($query);
    
        return $result;
    }

    public function editReservation($resourceId, $newDay, $newTS, $newRemark, $oldTimeSlot, $oldDate){
        $query = "UPDATE reservations SET id_time_slot = $newTS, date = '$newDay', remarks = '$newRemark' WHERE id_resource = $resourceId AND id_time_slot = $oldTimeSlot AND date = '$oldDate';";
        echo $query;
        $result = $this->db->dataManipulation($query);
        return $result;
    }

    public function deleteReservation($id, $timeSlot, $date){
        //¿puedo hacer uso del delete($id) del padre cambiando la tabla desde aquí?
        $query = "DELETE FROM reservations WHERE id_resource = $id AND id_time_slot = $timeSlot AND date = '$date'";
        echo $query;
        $result = $this->db->dataManipulation($query);
        return $result;
    }
}