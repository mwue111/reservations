<?php   //controlador de usuarios

include_once("views/view.php");
include_once("models/users.php");

class usersController{
    private $user;

    public function __construct(){
        $this->user = new Users();
    }

    public function showUsers(){
        if(isset($_SESSION['idUser'])){
            if(isset($_SESSION['name'])){
                $data['name'] = $_SESSION['name'];
            }
            if(isset($_REQUEST['message'])){
                $data['message'] = $_REQUEST['message'];
            }
            if(isset($_SESSION['type'])){
                $data['type'] = $_SESSION['type'];
            }
            $data['usersList'] = $this->user->getAll();
            View::render('users/show', $data);
        }
        else{
            $data['error'] = "Debes iniciar sesión para poder entrar en esta sección.";
            View::render("users/show", $data);
        }
        
    }

    public function addUser(){
        if(isset($_SESSION['name'])){
            $data['name'] = $_SESSION['name'];
        }
        $data['info'] = 'Añadir usuario/a';
        $data['action'] = 'insertUser';
        View::render("users/add", $data);
    }

    public function insertUser(){
        if($_SESSION['type'] == "admin"){
            $username = $_REQUEST['userName'];
            $pass = md5($_REQUEST['passwd']);   //md5() es para cifrar la contraseña en la BD
            $realname = $_REQUEST['realName'];
            $type = $_REQUEST['userType'];
    
            $data['insertUser'] = $this->user->addUser($username, $pass, $realname, $type);
    
            $data['info'] = "Usuario/a añadido/a con éxito.";
            header("Location:index.php?controller=usersController&action=showUsers&message=" . $data['info']);
        }
        else{
            $data['info'] = "Qué tocas, qué intentas. >:)";
            header("Location:index.php?controller=resourcesController&action=showResources&message=" . $data['info']);
        }
    }

    public function deleteUser(){
        if($_SESSION['type'] == "admin"){
            $id = $_REQUEST['id'];
    
            $data['info'] = "Usuario/a eliminado/a con éxito.";
            $data['delete'] = $this->user->delete($id);
            header("Location:index.php?controller=usersController&action=showUsers&message=" . $data['info']);
        }
        else{
            $data['info'] = "Qué tocas, qué intentas. >:)";
            header("Location:index.php?controller=resourcesController&action=showResources&message=" . $data['info']);
        }
    }

    public function changeUser(){
        if($_SESSION['type'] == "admin"){
            if(isset($_SESSION['name'])){
                $data['name'] = $_SESSION['name'];
            }
            $data['info'] = 'Modificar usuario/a';
            $data['action'] = 'editUser';
            $id = $_REQUEST['id'];
            $data['oldUser'] = $this->user->get($id);
            View::render("users/add", $data);
        }
        else{
            $data['info'] = "Qué tocas, qué intentas. >:)";
            header("Location:index.php?controller=resourcesController&action=showResources&message=" . $data['info']);
        }
    }

    public function editUser(){
        $id = $_REQUEST['id'];
        $username = $_REQUEST['userName'];
        $pass = $_REQUEST['passwd'];
        $realname = $_REQUEST['realName'];
        $type = $_REQUEST['userType'];

        $data['edit'] = $this->user->editUser($id, $username, $pass, $realname, $type);
        $data['info'] = "Usuario/a modificado/a con éxito.";
        header("Location:index.php?controller=usersController&action=showUsers&message=" . $data['info']);
    }

    //función para ver las reservas hechas por un usuario
    public function myReservations(){
        if(isset($_SESSION['idUser']) && isset($_SESSION['name']) && isset($_SESSION['type'])){
            $id = $_SESSION['idUser'];
            $data['name'] = $_SESSION['name'];
            $data['type'] = $_SESSION['type'];
            $data['title'] = "Hola, " . $data['name'];
            if(isset($_REQUEST['message'])){
                $data['info'] = $_REQUEST['message'];
            }
            
            $data['userReservations'] = $this->user->getReservations($id);
            View::render("users/user_reservations", $data);
        }
    }

    //función que muestra las reservas de todos los usuarios (para tipo admin)
    public function usersReservations(){
        if($_SESSION['type'] == "admin"){
            if(isset($_SESSION['name']) && isset($_SESSION['type'])){
                $data['name'] = $_SESSION['name'];
                $data['type'] = $_SESSION['type'];
            }
            if(isset($_REQUEST['message'])){
                $data['info'] = $_REQUEST['message'];
            }
    
            $data['allReservations'] = $this->user->getAllReservations();
            $data['title'] = 'Hola, ' . $data['name'];
            View::render("users/user_reservations", $data);
        }
        else{
            $data['info'] = "Qué tocas, qué intentas. >:)";
            header("Location:index.php?controller=resourcesController&action=showResources&message=" . $data['info']);
        }
        
    }
}