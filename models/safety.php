<?php   //capa de seguridad

//Aúna métodos relativos a la seguridad: crear y destruir sesiones, filtrar datos de entrada.

class Safety{

    public static function login($id, $name, $type){
        $_SESSION['idUser'] = $id;
        $_SESSION['name'] = $name;
        $_SESSION['type'] = $type;
    }
    
    public static function logout(){
        session_destroy();
    }
    
    //devuelve el id del usuario que ha iniciado sesión
    public static function getUserId(){
        if(isset($_SESSION['idUser'])){
            return $_SESSION['idUser'];
        }
        else{
            return false;
        }
    }

    //función que devuelve true si hay una sesión iniciada
    public static function thereIsSession(){
        if(isset($_SESSION['idUser'])){
            return true;
        }
        else{
            return false;
        }
    }

    public static function clean($text){
        //crear una lista de caracteres prohibidos:
        $forbiddenWords = ["<", ">", "insert", "update", "delete", "select", "*", "from"];

        //reemplaza toda ocurrencia de una palabra prohibida por un espacio en blanco
        foreach($forbiddenWords as $forbidden){
            $text = str_replace($forbidden, "", $text);
        }

        return $text;
    }
} 