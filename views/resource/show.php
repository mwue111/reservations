<?php   
$route = "index.php?controller=resourcesController&action=deleteResource&id=";
echo '<div class="container">
        <div class="row">';
if(isset($data['error'])){
    echo $data['error'] . '<br><br><a href="index.php">Iniciar sesión</a>'; 
}
else{
    $resourcesList = $data['resourcesList'];

    /*if(isset($data['info'])){
        echo $data['info'];
    }*/
    if(isset($data['message'])){
        echo '<h3>' . $data['message'] . '</h3><a href="index.php?controller=resourcesController&action=showResources">Cerrar</a>';
    }
    if(isset($data['reserved'])){
        echo '<h3>' . $data['reserved'] . '</h3><a href="index.php?controller=resourcesController&action=showResources">Cerrar</a><a href="index.php?controller=usersController&action=myReservations">Ver tus reservas</a>';
        if($data['type'] == "admin"){
            echo '<a href="index.php?controller=usersController&action=usersReservations">Ver todas las reservas</a>';
        }
    }
    if(isset($data['type'])){
        $type = $data['type'];
    }
    
    echo '<h2 class="m-3">Recursos disponibles para reservar </h2>
        <table class="table align-middle mb-0 bg-white">
        <thead class="bg-light">
            <tr>
                <th> ID </th>
                <th> Nombre y descripción </th>
                <th> Ubicación </th>';
            if($type == "admin"){
                echo '<th colspan="3">Opciones</th>';
            }
            else{
                echo '<th>Opciones</th>';
            }
    echo '</tr></thead><tbody>';
    
    foreach($resourcesList as $resource){
        echo '<tr>
                <td>' .  $resource['id'] . '</td>
                <td>
                    <div class="d-flex align-items-center">
                        <img src="' . $resource['image'] . '" style="width: 45px; height: 45px;" class="rounded-circle">
                        
                        <div class="ms-3">
                        <p class="fw-bold mb-1">' . $resource['name'] . '</p>
                        <p class="text-muted mb-0">' . $resource['description'] . '</p>
                        </div>
                    </div>
                    <td>' . $resource['location'] . '</td>';
                if($type == "admin"){
                    echo '<td><a href="#" onclick="confirmErase(' . $resource['id'] . ', \'' . $route . '\')">Eliminar</a></td>
                        <td><a href="index.php?controller=resourcesController&action=changeResource&id=' . $resource['id'] . '">Editar</a></td>
                        <td><a href="index.php?controller=resourcesController&action=showReservationForm&id=' . $resource['id'] . '">Reservar</a></td>';
                }
                else{
                    echo '<td><a href="index.php?controller=resourcesController&action=showReservationForm&id=' . $resource['id'] . '">Reservar</a></td>';
                }
        echo '</tr>';
    }
    
    //para comprobar si hay sesión abierta:
    //var_dump($_SESSION['idUser']);
    //var_dump($_SESSION['name']);
    
    echo '</table><br>
        <a class="m-3"  href="index.php?controller=resourcesController&action=addResource" class="addResource" id="add">Añadir recurso</a>
        </div>
        </div>';

    //Hecho con JS para que no me cambie de sitio el pie de página al esconder el link de añadir recurso para usuarios.
    if($type == 'user'){
        echo '<script>
                document.getElementById("add").style.display = "none";
            </script>';
    }
}


