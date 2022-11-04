<?php   //vista de las reservas de cada usuario: calendario

//*deben verse los detalles de la reserva: qué se ha reservado, qué día y a qué hora.
//deben poder modificarse y *eliminarse las reservas

$route = "index.php?controller=resourcesController&action=eraseReservation&id=";

if(isset($data['info'])){
    echo '<h2>' . $data['info'] . '</h2>';
}

if(isset($data['userReservations'])){
    $userReservations = $data['userReservations'];
    
    echo '<p>Estas son tus reservas:</p>';
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
        <ul>
            <li>Nombre del recurso:' . $reservations['name'] . ' </li>
            <li>Franja horaria: desde las ' . $reservations['start_time'] . ' hasta las ' . $reservations['end_time'] . ' </li>
            <li>Fecha de reserva:' . $reservations['date'] . ', ' . $day . ' </li>
            <li><a href="index.php?controller=resourcesController&action=changeReservation&id=' . $idResource . '&idTS=' . $idTS . '&date=' . $reservations['date'] . '">Editar reserva</a></li>
            <li><a href="#" onclick="confirmErase(' . $idResource . ', \'' . $route  . '\')">Eliminar reserva</a></li>
        </ul>';
   }

}
if(isset($data['allReservations'])){
    echo '<p>Estas son todas las reservas hechas: </p>';
    foreach ($data['allReservations'] as $allReservations){
        echo '<ul>
                <li>ID usuario/a: ' . $allReservations['id_user'] . '</li>
                <li>Nombre usuario/a: ' . $allReservations['username'] . '</li>
                <li>Recurso: ' . $allReservations['resource'] . '</li>
                <li>Fecha reservada: ' . $allReservations['date'] . '</li>
                <li>Franja horaria reservada: ' . $allReservations['time_slot'] . '</li>
                <li>Tipo de usuario/a: ' . $allReservations['user_type'] . '</li>
                <li><a href="index.php?controller=resourcesController&action=changeReservation&id=' . $allReservations['id_resource'] . '&idTS=' . $allReservations['idTS'] . '&date=' . $allReservations['date'] . '">Editar reserva</a></li>
            <li><a href="#" onclick="confirmErase(' . $allReservations['id_resource'] . ', \'' . $route  . '\')">Eliminar reserva</a></li>
            </ul>';
    }
}