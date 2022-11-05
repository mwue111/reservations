<?php      //controlador para el login

include_once("views/view.php");
include_once("models/users.php");   //acceso a los datos de los usuarios

class LoginController{
    private $user;

    public function __construct(){
        $this->user = new Users();
    }

    //función para mostrar el formulario de login:
    public function formLogin(){
        if(isset($_REQUEST['message'])){
            $data['message'] = $_REQUEST['message'];
        }
        if(isset($_REQUEST['error'])){
            $data['error'] = $_REQUEST['error'];
        }
        $data['info'] = "Iniciar sesión";
        View::render("users/login", $data);
    }

    //función que comprueba si los datos del login son correctos: si son correctos, redirige a otra vista.
    public function checkLogin(){
        $name = Safety::clean($_REQUEST['userName']);
        $pass = Safety::clean($_REQUEST['userPass']);
    
        $result = $this->user->login($name, $pass);

        if($result){
            header("Location:index.php?controller=resourcesController&action=showResources");
        }
        else{
            $data['error'] = "unavailable";
           // View::render("users/login", $data);
           header("Location:index.php?error=" . $data['error']);
        }
    }

    //función para cerrar sesión y redirigir al login
    public function logout(){
        $this->user->logout();
        $data['info'] = "Sesión cerrada.";
        header("Location:index.php?message=" . $data['info']);
    }
}