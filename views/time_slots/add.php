<?php       //Vista para añadir tramos horarios

echo '<div class="container">
        <div class="row">
            <div class="card">';

if(isset($data['info'])){
    echo '<h2>' . $data['info'] . '</h2>';
}

if(isset($data['action'])){
    echo '<form action="index.php?controller=timeSlotsController&action=' . $data['action'] . '" method = "POST" enctype="multipart/form-data">';

    //if(isset($_REQUEST['id'])){ //request no puede estar aquí
    if(isset($data['oldTime'])){
        
        foreach($data['oldTime'] as $oldTime){
            $oldDay = $oldTime['day_of_week'];
            $oldStart = $oldTime['start_time'];
            $oldEnd = $oldTime['end_time'];

            echo '<input type="hidden" name="id" value="' . $oldTime['id'] . '">';
        }
    }
    else{
        $oldDay = null;
        $oldStart = null;
        $oldEnd = null;
    }

    echo '<label for="newDay">Añade el día:</label>
        <input type="number" name="newDay" required value="' . $oldDay . '">
        <br>
        <br>
        <label for="newStart">Hora de inicio:</label>
        <input type="time" name="newStart" required value="' . $oldStart . '">
        <br>
        <br>
        <label for="newEnd">Hora de fin:</label>
        <input type="time" name="newEnd" required value="' . $oldEnd . '">
        <br>
        <br>
        <input type="submit" value="Enviar">
    </form>
    <br>
    <a href="index.php?controller=timeSlotsController&action=showTimeSlots">Volver</a>
    </div>
    </div>
    </div>';
}