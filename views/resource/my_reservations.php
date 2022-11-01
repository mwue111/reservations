
<?php       //vista de la sección mis reservas
if(isset($data['info'])){
    echo '<h2>' . $data['info'] .  '</h2>';
}

if(isset($data['resource']) && isset($data['type']) && isset($data['ts'])){

    $resource = $data['resource'];
    $userType = $data['type'];
    $timeSlot = $data['ts'];
    echo "<script>var timeSlot = " . json_encode($timeSlot) . "</script>";
    
    foreach($resource as $resourceDetails){
        echo '<h2>Reservar ' . $resourceDetails['name'] . '</h2>
        <p>' . $resourceDetails['description'] . '</p>
        <img src="' . $resourceDetails['image'] . '" style="width:10%">';
    }

    //formulario que envía los datos de la reserva a la función bookResource, que será la que haga los inserts en la tabla reservations
    //El select llama a la funcio´n JS showTImeSlots que pintará en el segundo select las horas disponibles
    echo '<h3>Días y horarios de reserva disponibles</h3>
        <form name="resourceReservation" action="index.php?controller=resourcesController&action=bookResource" method="POST">
            <input type = "hidden" name = "id" value = "' . $resourceDetails['id'] . '">
            <select name="selectDay" id="selectDay" onchange="showTimeSlots()">
                <option value = "0"> Seleccione un día</option>
                <option value = "1">Lunes</option>
                <option value = "2">Martes</option>
                <option value = "3">Miércoles</option>
                <option value = "4">Jueves</option>
                <option value = "5">Viernes</option>
            </select>
            <select name="selectTS" id="selectTS">
                <option value = "0">Seleccione una hora</option>
            </select>
        </form>
        <br>
        <input type="submit" value="Reservar">
    ';

    /* //Esto no va (mucha redirección, me parece)
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
        else{
            echo '<select>
            <option value="0">No hay día seleccionado</option>
        </select>';
        }
       
    echo '<br>
        <br>
        <input type="submit" value="Reservar">
    </form>';
    */
}
else{
    echo 'Ha ocurrido un error: no hay datos sobre el recurso o sobre el tipo de usuario.';
}

echo '<br><br><a href="index.php?controller=resourcesController&action=showResources">Volver</a>';
