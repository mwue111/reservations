
<?php       //vista de la sección para hacer reservas
if(isset($data['info'])){
    echo '<h2>' . $data['info'] . ' ';
}

if(isset($data['resource']) && (isset($data['ts']))){

    $resource = $data['resource'];
    $timeSlot = $data['ts'];

    if(isset($data['date'])){
        $date = $data['date'];
    }
    else{
        $date = null;
    }

    echo "<script>var timeSlot = " . json_encode($timeSlot) . "</script>";
    
    foreach($resource as $resourceDetails){
        echo $resourceDetails['name'] . '</h2>
        <p>' . $resourceDetails['description'] . '</p>
        <img src="' . $resourceDetails['image'] . '" style="width:10%">
        <br>';
    }

    foreach($timeSlot as $detailedTS){
        $startTime = $detailedTS['start_time'];
        $endTime = $detailedTS['end_time'];
        $idTS = $detailedTS['id'];
    }

    if(isset($data['oldTS'])){
        $oldTS = $data['oldTS'];

        foreach($oldTS as $oldTimeDetails){
            $startTime = $oldTimeDetails['start_time'];
            $endTime = $oldTimeDetails['end_time'];
            $old = $oldTimeDetails['id'];
        }

    }
    else{
        $oldTS = null;
        $old = null;
    }

//formulario que envía los datos de la reserva a la función bookResource, que será la que haga los inserts en la tabla reservations
//El select llama a la función JS showTimeSlots que pintará en el segundo select las horas disponibles
    if(isset($data['action'])){
        if($data['action'] == "bookResource"){
            echo '<h3>Días y horarios de reserva disponibles</h3>';
        }
        else{
            echo '<h3>Días y horarios reservados</h3>';
        }
        echo'<form action="index.php?controller=resourcesController&action=' . $data['action'] . '" method="POST" enctype="multipart/form-data">';
    }
    
    echo '<input type = "hidden" name = "resourceId" value = "' . $resourceDetails['id'] . '">
    <input type="hidden" name="idTS" value="' . $old . '">
    <input type="hidden" name="date" value="' . $date . '">';
    
    if($data['action'] == "editReservation"){
        //echo '<p style="border:1px dotted black;">Habías reservado el día ' . $date . ', de ' . $startTime . ' a ' . $endTime . '</p>';
        
        echo '<input type="date" name="selectDay" id="selectDay" onchange="showTimeSlots(\'' . $date . '\')" value=' . $date . '>
        <select name = "selectTS" id = "selectTS">
        <option value="' . $old . '" selected>' . $startTime . ' - ' . $endTime . '</option>
        </select>';
    }
    else{
            echo '<input type = "date" name = "selectDay" id = "selectDay" onchange="showTimeSlots()">
            <select name="selectTS" id="selectTS">
            <option>Seleccione una hora</option>
            </select>
            ';
        }
        
        echo '<br>
        <br>
        <label for = "remarks">Comentarios: </label>
        <br>
        <textarea name = "remarks"></textarea>
        <br>
        <br>
        <input type="submit" value="Reservar">
        </form>
        ';
        
        if($data['action'] == "bookResource"){
            echo '<br><a href="index.php?controller=resourcesController&action=showResources">Volver</a>';
        }
        else{
            if($data['type'] == "admin"){
                echo '<br><a href="index.php?controller=usersController&action=usersReservations">Volver</a>';
            }
            else{
                echo '<br><a href="index.php?controller=usersController&action=myReservations">Volver</a>';
            }
        }
        

        echo '<script>
        window.addEventListener("load", showTimeSlots("' . $date . '"));
        </script>';
    
    }
    
    /*
    //Esto funciona exactamente como con la reserva
    echo '<input type="date" name="selectDay" id="selectDay" onchange="showTimeSlots()">
    <select name="selectTS" id="selectTS">
        <option>Seleccione una hora</option>
    </select>'>
    */