<?php
if(isset($_SESSION['name'])){
    if(isset($data['name'])){
        echo '<h3>¡Bienvenido/a, ' . $data['name'] . '!</h3>';
    }

    /*if(!isset($_SESSION['name'])){
        echo '  <li style="display: inline-block;"><a href="index.php"> Iniciar Sesión </a></li>';
    }*/
            if(isset($data['type'])){
                if($data['type'] == "admin"){
                    echo '<ul><li style="display: inline-block;"><a href="index.php?controller=resourcesController&action=showResources"> Recursos </a></li>
                    <li style="display: inline-block;"><a href="index.php?controller=timeSlotsController&action=showTimeSlots">Tramos horarios</a></li>
                        <li style="display: inline-block;"><a href="index.php?controller=usersController&action=showUsers">Usuarios</a></li>
                        <li style="display: inline-block;"><a href="index.php?controller=usersController&action=usersReservations">Reservas de usuarios</a></li>
                        <li style="display: inline-block;"><a href="index.php?controller=usersController&action=myReservations">Mis reservas</a></li>
                        <li style="display: inline-block;"><a href="index.php?controller=loginController&action=logout">Cerrar sesión</a></li></ul>';
                }
                else{
                    echo '<ul><li style="display: inline-block;"><a href="index.php?controller=resourcesController&action=showResources"> Recursos </a></li>
                    <li style="display: inline-block;"><a href="index.php?controller=usersController&action=myReservations">Mis reservas</a></li>
                    <li style="display: inline-block;"><a href="index.php?controller=loginController&action=logout">Cerrar sesión</a></li></ul>';   
                }
            }

}