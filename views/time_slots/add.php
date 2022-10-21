<?php       //Vista para añadir tramos horarios

//MEJORA: que escriban el día y se añada como el número que le corresponde
//MEJORA: placeholder con el valor anterior

if(isset($data['info'])){
    echo '<h2>' . $data['info'] . '</h2>';
}

if(isset($data['action'])){
    echo '<form action="index.php?controller=timeSlotsController&action=' . $data['action'] . '" method = "POST" enctype="multipart/form-data">';

    //if(isset($_REQUEST['id'])){ //request no puede estar aquí
    if(isset($data['oldTime'])){
        
        foreach($data['oldTime'] as $oldTime){

            echo '<input type="hidden" name="id" value="' . $oldTime['id'] . '">';
        }
    }

    echo '<label for="newDay">Añade el día:</label>
        <input type="number" name="newDay" required value="' . $oldTime['day_of_week'] . '">
        <br>
        <br>
        <label for="newStart">Hora de inicio:</label>
        <input type="time" name="newStart" required value="' . $oldTime['start_time'] . '">
        <br>
        <br>
        <label for="newEnd">Hora de fin:</label>
        <input type="time" name="newEnd" required value="' . $oldTime['end_time'] . '">
        <br>
        <br>
        <input type="submit" value="Enviar">
    </form>
    <br>
    <a href="index.php">Volver</a>';
}