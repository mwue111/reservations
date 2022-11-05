<?php   //vista de las reservas de cada usuario: calendario

//*deben verse los detalles de la reserva: qué se ha reservado, qué día y a qué hora.
//deben poder modificarse y *eliminarse las reservas

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
    echo '<h2>' . $data['title'] . '</h2>';
}
//Para usuarios tipo user:
if(isset($data['userReservations'])){
    $userReservations = $data['userReservations'];
    
    echo '<p>Estas son tus reservas:</p>
    <table border = "1">
    <tr>
        <th>Recurso</th>
        <th>Franja horaria</th>
        <th>Fecha</th>
        <th>Comentarios</th>
        <th colspan="2">Opciones</th>';
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

   echo '</table>';
}
//Para usuarios tipo admin:
if(isset($data['allReservations'])){
    echo '<p>Estas son todas las reservas hechas: </p>
        <table border="1">
        <tr>
            <th>Usuario/a</th>
            <th>Nombre usuario/a</th>
            <th>Recurso</th>
            <th>Fecha reserva</th>
            <th>Franja horaria reservada</th>
            <th>Tipo de usuario/a</th>
            <th colspan="2">Opciones</th>
        </tr>';

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

    echo '</table>';

    /*
    index.php?controller=resourcesController&action=eraseReservation&id=' . $allReservations['id_resource'] . '&idTS=' . $allReservations['idTS'] . '&date=' . $allReservations['date'] . '


    onclick="confirmReservationErase(' . $allReservations['id_resource'] . ', ' . $allReservations['idTS'] . ', \'' . $allReservations['date'] . '\', \'' . $route  . '\')"
    */
}