<?php   //controlador de recursos: primer controlador hecho

//listar, insertar, eliminar y modificar recursos

//--------------**PENDIENTE** --> comprobar si ha tenido éxito el borrado/inserción/modificación de datos.

include_once("views/view.php");
include_once("models/resources.php");

/*
//esto se ha movido a index.php, que es quien decide ahora qué método se ejecuta por defecto:
if(isset($_REQUEST['action'])){
    $action = $_REQUEST['action'];
}
else{
    $action = "showResources";
}

$r = new resourcesController();
$r->$action();
*/

class resourcesController{
    private $resource;  //modelo

    public function __construct(){
        $this->resource = new Resources();
    }
    //he quitado lo de $text = null al final porque uso header.
    public function showResources(){
        if(isset($_SESSION['idUser'])){
            if(isset($_REQUEST['message'])){
                $data['message'] = $_REQUEST['message'];
            }
            if(isset($_SESSION['name'])){
                $data['name'] = $_SESSION['name'];
            }
            if(isset($_SESSION['type'])){
                $data['type'] = $_SESSION['type'];
            }
            $data['resourcesList'] = $this->resource->getAll();
            View::render("resource/show", $data);
        }
        else{
            $data['error'] = "Debes iniciar sesión para poder entrar en esta sección.";
            View::render("resource/show", $data);
            //header("Location:index.php?controller=loginController&action=formLogin&message=" . $data['error']);
        }
        
    }

    //esta función sólo llama a la vista con el formulario
    public function addResource(){
        if(isset($_SESSION['name'])){
            $data['name'] = $_SESSION['name'];
        }
        $data['info'] = "Añadir recurso";
        $data['action'] = "insertResource";
        View::render("resource/add", $data);
    }

    public function insertResource(){
        //aquí recojo los datos desde el formulario
        $name = $_REQUEST['resourceName'];
        $description = $_REQUEST['resourceDescription'];
        $location = $_REQUEST['resourceLocation'];
        $image = $_FILES['resourceImage']['name'];

        $data['insertResource'] = $this->resource->addResource($name, $description, $location, $image);
    
        $data['info'] = "Recurso subido con éxito.";
        header("Location:index.php?controller=resourcesController&action=showResources&message=" . $data['info']);
    }

    public function deleteResource(){
        $id = $_REQUEST['id'];
        $data['info'] = "Recurso eliminado con éxito.";
        $data['delete'] = $this->resource->delete($id);
        header("Location:index.php?controller=resourcesController&action=showResources&message=" . $data['info']);
    }

    public function changeResource(){
        if(isset($_SESSION['name'])){
            $data['name'] = $_SESSION['name'];
        }
        $data['action'] = "editResource";
        $data['info'] = "Editar recurso";
        $id = $_REQUEST['id'];
        $data['oldData'] = $this->resource->get($id);
        View::render("resource/add", $data);
    }
    
    public function editResource(){
        $id = $_REQUEST['id'];
        $name = $_REQUEST['resourceName'];
        $description = $_REQUEST['resourceDescription'];
        $location = $_REQUEST['resourceLocation'];
        $image = $_FILES['resourceImage']['name'];
        
        
        $data['edit'] = $this->resource->editResource($id, $name, $description, $location, $image);
        $data['info'] = "Recurso editado con éxito.";
        header("Location:index.php?controller=resourcesController&action=showResources&message=" . $data['info']);
    }

    public function showReservationForm(){
        if(isset($_SESSION['name']) && isset($_SESSION['type'])){
            $data['name'] = $_SESSION['name'];
            $data['type'] = $_SESSION['type'];
            $data['info'] = "Reservar";
            $data['action'] = "bookResource";

            //se carga el modelo de time_slots para que la información sobre días y horarios esté disponible
            include_once("models/time_slots.php");
            //se crea un nuevo objeto de time_slots
            $ts = new TimeSlots();
            
            if(isset($_REQUEST['id'])){
                $id = $_REQUEST['id'];
                $data['resource'] = $this->resource->get($id);
            }

            //obtenemos todos los periodos de tiempo disponibles desde la base de datos
            $data['ts'] = $ts->getAll();
            
            View::render("resource/my_reservations", $data);
        }
        
    }

    //función para reservar un recurso
    public function bookResource(){
        if(isset($_SESSION['name'])){
            $data['name'] = $_SESSION['name'];
        }
        $selectedResource = $_REQUEST['resourceId'];
        $selectedDay = $_REQUEST['selectDay'];
        $selectedTS = $_REQUEST['selectTS'];
        $user = $_SESSION['idUser'];
        $remarks = $_REQUEST['remarks'];

        $data['reservation'] = $this->resource->bookResource($selectedResource, $user, $selectedTS, $selectedDay, $remarks);
        $data['info'] = "Recurso reservado con éxito.";
        header("Location:index.php?controller=resourcesController&action=showResources&message=" . $data['info']);   
    }

    public function changeReservation(){
        include_once("models/time_slots.php");
        $ts = new TimeSlots();

        if(isset($_SESSION['name']) && isset($_SESSION['type'])){
            $data['name'] = $_SESSION['name'];
            $data['type'] = $_SESSION['type'];
        }
        $data['info'] = "Modificar reserva de";
        if(isset($_REQUEST['id']) && isset($_REQUEST['idTS'])){
            $data['action'] = "editReservation";
            $idTS = $_REQUEST['idTS'];
            $oldResource = $_REQUEST['id'];
            $data['resource'] = $this->resource->get($oldResource);
            $data['ts'] = $ts->get($idTS);
        }
        if(isset($_REQUEST['date'])){
            $data['date'] = $_REQUEST['date'];
        }
        View::render("resource/my_reservations", $data);
    }

    public function editReservation(){
        //recibe datos del form
        //UPDATE la query de la reserva almacenada
        if(isset($_SESSION['name']) && isset($_SESSION['type'])){
            $data['name'] = $_SESSION['name'];
            $data['type'] = $_SESSION['type'];
        }

        $resourceId = $_REQUEST['resourceId'];
        $newDay = $_REQUEST['selectDay'];
        $newTS = $_REQUEST['selectTS'];
        $newRemark = $_REQUEST['remarks'];
        $user = $_SESSION['idUser'];    //¿lo necesito? Modificar parámetros de la función si no.

        $data['newReservation'] = $this->resource->editReservation($resourceId, $newDay, $newTS, $newRemark, $user);

        $data['info'] = "La reserva se ha modificado con éxito.";
        header("Location:index.php?controller=resourcesController&action=showResources&message=" . $data['info']);
    }

    public function eraseReservation(){
        if(isset($_REQUEST['id'])){
            $id = $_REQUEST['id'];
            $data['erase'] = $this->resource->deleteReservation($id);
            $data['info'] = "Reserva eliminada correctamente.";
            header("Location:index.php?controller=resourcesController&action=showResources&message=" . $data['info']);
        }
    }
}