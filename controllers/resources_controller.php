<?php   //controlador de recursos

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
}