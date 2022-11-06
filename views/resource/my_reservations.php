
<?php       //vista de la sección para hacer reservas
echo '<div class="container">
        <div class="row">';

if(isset($data['info'])){
    echo '<div class="card">
            <div class="card-body">
            <h2 class="card-title">' . $data['info'] . ' ';
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
        <p class="card-text">' . $resourceDetails['description'] . '</p>
        <img src="' . $resourceDetails['image'] . '" class="rounded-circle" style="width: 100px; height: 100px">
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
            echo '<h3 class="card-text">Días y horarios de reserva disponibles</h3>';
        }
        else{
            echo '<h3 class="card-text">Días y horarios reservados</h3>';
        }
        echo'<form action="index.php?controller=resourcesController&action=' . $data['action'] . '" method="POST" enctype="multipart/form-data">';    
    
    echo '<input type = "hidden" name = "resourceId" value = "' . $resourceDetails['id'] . '">
    <input type="hidden" name="idTS" value="' . $old . '">
    <input type="hidden" name="date" value="' . $date . '">';
    
        if($data['action'] == "editReservation"){
        //echo '<p style="border:1px dotted black;">Habías reservado el día ' . $date . ', de ' . $startTime . ' a ' . $endTime . '</p>';
        
        echo '<input class="mt-3" type="date" name="selectDay" id="selectDay" onchange="showTimeSlots(\'' . $date . '\')" value=' . $date . '>
        <br>
        <select class="mt-3" name = "selectTS" id = "selectTS">
            <option value="' . $old . '" selected>' . $startTime . ' - ' . $endTime . '</option>
        </select>';
        }
        else{
            echo '<input class="mt-3" type="date" name="selectDay" id="selectDay" onchange="showTimeSlots()">
            <br>
            <select class="mt-3" name="selectTS" id="selectTS">
                <option></option>
            </select>
            ';
        }
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
            echo '<br><a href="index.php?controller=resourcesController&action=showResources">Volver</a>
                ';
        }
        else{
            if($data['type'] == "admin"){
                echo '<br><a href="index.php?controller=usersController&action=usersReservations">Volver</a>
                ';
            }
            else{
                echo '<br><a href="index.php?controller=usersController&action=myReservations">Volver</a>
                ';
            }
        }
        
echo '</div>
</div><script>
    window.addEventListener("load", showTimeSlots("' . $date . '"));
    </script>
    </div>
    </div>';
    
}