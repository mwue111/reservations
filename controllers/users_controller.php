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
            $data['usersList'] = $this->user->getAll();
            View::render('users/show', $data);
        }
        else{
            $data['error'] = "Debes iniciar sesión para poder entrar en esta sección.";
            View::render("users/show", $data);
        }
        
    }

    public function addUser(){
        $data['info'] = 'Añadir usuario/a';
        $data['action'] = 'insertUser';
        View::render("users/add", $data);
    }

    public function insertUser(){
        $username = $_REQUEST['userName'];
        $pass = $_REQUEST['passwd'];
        $realname = $_REQUEST['realName'];
        $type = $_REQUEST['userType'];

        $data['insertUser'] = $this->user->addUser($username, $pass, $realname, $type);

        $data['info'] = "Usuario/a añadido/a con éxito.";
        header("Location:index.php?controller=usersController&action=showUsers&message=" . $data['info']);
    }

    public function deleteUser(){
        $id = $_REQUEST['id'];

        $data['info'] = "Usuario/a eliminado/a con éxito.";
        $data['delete'] = $this->user->delete($id);
        header("Location:index.php?controller=usersController&action=showUsers&message=" . $data['info']);
    }

    public function changeUser(){
        $data['info'] = 'Modificar usuario/a';
        $data['action'] = 'editUser';
        $id = $_REQUEST['id'];
        $data['oldUser'] = $this->user->get($id);
        View::render("users/add", $data);
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
}