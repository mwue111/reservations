<?php       //vista de la sección mis reservas
if(isset($data['info'])){
    echo '<h2>' . $data['info'] .  '</h2>';
}

if(isset($data['resource']) && isset($data['type'])){

    $resource = $data['resource'];
    $userType = $data['type'];
    
    foreach($resource as $resourceDetails){
        echo '<h2>Reservar ' . $resourceDetails['name'] . '</h2>
        <p>' . $resourceDetails['description'] . '</p>
        <img src="' . $resourceDetails['image'] . '" style="width:10%">';
    }

    echo '<h3>Horarios de reserva disponibles </h3>
    <form name="resourceReservation" action="index.php?controller=resourcesController&action=bookResource" method="POST">
        <select name="selectDay" id="selectDay" onchange="showTimeSlots()">
            <option value="0">Seleccione un día</option>
            <option value="1">Lunes</option>
            <option value="2">Martes</option>
            <option value="3">Miércoles</option>
            <option value="4">Jueves</option>
            <option value="5">Viernes</option>
        </select>';
        if(isset($data['selected'])){
            var_dump($data['selected']);
            echo '<select name="selectTS" id="selectTS">
            <option value="0">Seleccione una hora</option>
        </select>';
        }        
       
    echo '<br>
        <br>
        <input type="submit" value="Reservar">
    </form>';


}
else{
    echo 'Ha ocurrido un error.';
}

echo '<br><a href="index.php?controller=resourcesController&action=showResources">Volver</a>';
