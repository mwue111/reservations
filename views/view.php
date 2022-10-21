<?php

class View{
    public static function render($viewName, $data = null){
        include("views/header.php");
        include("views/nav.php");
        include("views/$viewName.php");
        include("views/footer.php");
    }
}