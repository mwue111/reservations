<?php   //vista de las reservas de cada usuario: calendario

echo '<div class="container">
        <div class="row">';

$route = "index.php?controller=resourcesController&action=eraseReservation&id=";


if(isset($data['info'])){
    echo '<p>' . $data['info'] . '</p>';
    if($data['type'] == "user"){
        echo '<a href="index.php?controller=usersController&action=myReservations">Cerrar</a>';    
    }
    else{
        echo '<a href="index.php?controller=usersController&action=usersReservations">Cerrar</a>';    
    }
}

if(isset($data['title'])){
    echo '<h2 class="m-3">' . $data['title'] . '.</h2>';
}
//Para usuarios tipo user:
if(isset($data['userReservations'])){
    $userReservations = $data['userReservations'];
    if(count($userReservations) == 0){
        echo '<h3>¡Aún no tienes reservas!</h3>';
    }
    else{
        echo '
        <h4>Estas son tus reservas:</h4>
        <table class="table align-middle mb-0 bg-white">
        <thead class="bg-light">
        <tr>
            <th>Recurso</th>
            <th>Franja horaria</th>
            <th>Fecha</th>
            <th>Comentarios</th>
            <th colspan="2">Opciones</th>
        </tr>
        </thead>';

    }
    
    foreach($userReservations as $reservations){
        $idResource = $reservations['id_resource'];
        $idTS = $reservations['id_time_slot'];
        
        $day = $reservations['day_of_week'];
        switch($day){
            case 1: $day = "Lunes"; break;
            case 2: $day = "Martes"; break;
            case 3: $day = "Miércoles"; break;
            case 4: $day = "Jueves"; break;
            case 5: $day = "Viernes"; break;
        }
    echo '<input type = "hidden" name="date" value="' . $reservations['date'] . '">
        <tr>
            <td>' . $reservations['name'] . ' </td>
            <td>' . $reservations['start_time'] . ' - ' . $reservations['end_time'] . ' </td>
            <td>' . $day . ', ' . $reservations['date'] . ' </td>
            <td>' . $reservations['remarks'] . '</td>
            <td><a href="index.php?controller=resourcesController&action=changeReservation&id=' . $idResource . '&idTS=' . $idTS . '&date=' . $reservations['date'] . '">Editar reserva</a></td>
            <td><a href="#" onclick="confirmReservationErase(\'' . $route . '\', ' .  $idResource . ',' . $idTS . ', \'' . $reservations['date'] . '\')">Eliminar reserva</a></td>
        </tr>';
        
    }
    
    echo '</table>
    <br>
    <div class="m-3">
    <a href="index.php?controller=resourcesController&action=showResources">Volver a listado de recursos</a>
    </div>
    </div>
    </div>';
}
//Para usuarios tipo admin:
if(isset($data['allReservations'])){
    echo '<h4>Estas son todas las reservas hechas: </h4>
        <table class="table align-middle mb-0 bg-white">
        <thead class="bg-light">
        <tr>
            <th>Usuario/a</th>
            <th>Nombre usuario/a</th>
            <th>Recurso</th>
            <th>Fecha reserva</th>
            <th>Franja horaria reservada</th>
            <th>Tipo de usuario/a</th>
            <th colspan="2">Opciones</th>
        </tr></thead><tbody>';

    foreach ($data['allReservations'] as $allReservations){
        echo '<tr>
                <td>' . $allReservations['id_user'] . '</td>
                <td>' . $allReservations['username'] . '</td>
                <td>' . $allReservations['resource'] . '</td>
                <td>' . $allReservations['date'] . '</td>
                <td>' . $allReservations['time_slot'] . '</td>
                <td>' . $allReservations['user_type'] . '</td>
                <td><a href="index.php?controller=resourcesController&action=changeReservation&id=' . $allReservations['id_resource'] . '&idTS=' . $allReservations['idTS'] . '&date=' . $allReservations['date'] . '">Editar reserva</a></td> 
                <td><a href="#" onclick="confirmReservationErase(\'' . $route . '\', ' .  $allReservations['id_resource'] . ',' . $allReservations['idTS'] . ', \'' . $allReservations['date'] . '\')">Eliminar reserva</a></td>
            </tr>';
    }

    echo '</tbody></table>
    <div class="card">
      <a class="m-3" href="index.php?controller=resourcesController&action=showResources">Volver a listado de recursos</a>
    </div>
    </div>
    </div>
      ';
}