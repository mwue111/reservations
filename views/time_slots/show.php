<?php   //vista para mostrar los tramos horarios
$route = "index.php?controller=timeSlotsController&action=deleteTime&id=";

if(isset($data['error'])){
    echo $data['error'] . '<br><br><a href="index.php">Iniciar sesión</a>';
}
else{
    $ts = $data['timeList'];
    
    if(isset($data['info'])){
        echo $data['info'];
    }
    if(isset($data['message'])){
        echo '<strong>' . $data['message'] . '</strong><br><br><a href="index.php?controller=timeSlotsController&action=showTimeSlots">Cerrar</a>';
    }
    if(isset($data['type'])){
        $type = $data['type'];
    }
    
    echo '
        <div class="container">
        <div class="row">
        <h2 class="m-3">Tramos horarios</h2>
        <table class="table align-middle mb-0 bg-white">
        <thead class="bg-light">
        <tr>
            <th>ID</th>
            <th>Día de la semana</th>
            <th>Hora de inicio</th>
            <th>Hora de fin</th>';
            if($type == "admin"){
                echo '<th colspan="2">Opciones</th>';
            }
    echo '</tr></thead>';
    foreach($ts as $timeSlot){
        switch($timeSlot['day_of_week']){
            case 1: $timeSlot['day_of_week'] = "Lunes"; break;
            case 2: $timeSlot['day_of_week'] = "Martes"; break;
            case 3: $timeSlot['day_of_week'] = "Miércoles"; break;
            case 4: $timeSlot['day_of_week'] = "Jueves"; break;
            case 5: $timeSlot['day_of_week'] = "Viernes"; break;
        }
        echo '<tr>
                <td>' . $timeSlot['id'] . '</td>
                <td>' . $timeSlot['day_of_week'] . '</td>
                <td>' . $timeSlot['start_time'] . '</td>
                <td>' . $timeSlot['end_time'] . '</td>';
                if($type == "admin"){
                    echo '
                        <td><a href="#" onclick="confirmErase(' . $timeSlot['id'] . ', \'' . $route . '\')">Eliminar</a></td>
                        <td><a href="index.php?controller=timeSlotsController&action=changeTime&id=' . $timeSlot['id'] . '">Editar</a></td>';
                }
        echo '</tr>';
    }
    
    echo '</table><br>
        <div class="m-3">
        <a href="index.php?controller=timeSlotsController&action=addTimeSlot">Añadir nuevo tramo</a>
        <br>
        <a href="index.php?controller=resourcesController&action=showResources">Volver a listado de recursos</a>
        </div>
        </div>
        </div>';
}