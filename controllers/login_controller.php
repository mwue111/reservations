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
        $data['info'] = "Iniciar sesión";
        View::render("users/login");
    }

    //función que comprueba si los datos del login son correctos: si son correctos, redirige a otra vista.
    public function checkLogin(){
        $name = $_REQUEST['userName'];
        $pass = $_REQUEST['userPass'];
    
        $result = $this->user->login($name, $pass);

        if($result){
            header("Location:index.php?controller=resourcesController&action=showResources");
        }
        else{
            $data['error'] = "Usuario o contraseña incorrectos.";
        }
    }

    //función para cerrar sesión y redirigir al login
    public function logout(){
        $this->user->logout();
        $data['info'] = "Sesión cerrada.";
        View::render("users/login", $data);
    }
}