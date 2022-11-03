<?php   //vista de las reservas de cada usuario: calendario
//*deben verse los detalles de la reserva: qué se ha reservado, qué día y a qué hora.
//deben poder modificarse y eliminarse las reservas
$route = "index.php?controller=resourcesController&action=eraseReservation&id=";

if(isset($data['info'])){
    echo '<h2>' . $data['info'] . '</h2>';
}

if(isset($data['userReservations'])){
   $userReservations = $data['userReservations'];

   foreach($userReservations as $reservations){
    $idResource = $reservations['id_resource'];
    $idTS = $reservations['id_time_slot'];

    echo $idResource;

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
