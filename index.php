<?php   //index: llama al controlador que corresponda

//Inicio de la sesión:
//session_start()

include_once("models/security.php");

//Es necesario incluir todos los controladores:
foreach(glob("controllers/*.php") as $file){
    include $file;
}

//Comprueba si existe el controlador y decide a qué controlador dirigirse. Si no recibe ninguno, se irá al controlador por defecto (resourcesController):
if(isset($_REQUEST['controller'])){
    $controller = $_REQUEST['controller'];  //+ "Controller"; da error.
}
else{
    $controller = "resourcesController";
}

//Comprueba si hay algún método que hacer y redirige al que corresponda:
if(isset($_REQUEST['action'])){
    $action = $_REQUEST['action'];
}
else{
    $action = "showResources";  //"login"
}

//Crear el objeto y llamar a action para que ejecute el método establecido:
$r = new $controller();
$r->$action();

