<?php   //vista para mostrar los tramos horarios

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
    
    echo '<h2>Tramos horarios</h2>
        <table border="1">
        <tr>
            <th>ID</th>
            <th>Día de la semana</th>
            <th>Hora de inicio</th>
            <th>Hora de fin</th>
            <th colspan="2">Opciones</th>
        </tr>';
    
    foreach($ts as $timeSlot){
        echo '<tr>
                <td>' . $timeSlot['id'] . '</td>
                <td>' . $timeSlot['day_of_week'] . '</td>
                <td>' . $timeSlot['start_time'] . '</td>
                <td>' . $timeSlot['end_time'] . '</td>
                <td><a href="index.php?controller=timeSlotsController&action=deleteTime&id=' . $timeSlot['id'] . '">Eliminar</a></td>
                <td><a href="index.php?controller=timeSlotsController&action=changeTime&id=' . $timeSlot['id'] . '">Editar</a></td>
            </tr>';
    }
    
    echo '</table><br>
        <a href="index.php?controller=timeSlotsController&action=addTimeSlot">Añadir nuevo tramo</a>';
}
