<?php   
$route = "index.php?controller=resourcesController&action=deleteResource&id=";

if(isset($data['error'])){
    echo $data['error'] . '<br><br><a href="index.php">Iniciar sesión</a>'; 
}
else{
    $resourcesList = $data['resourcesList'];

    if(isset($data['info'])){
        echo $data['info'];
    }
    if(isset($data['message'])){
        echo '<h3>' . $data['message'] . '</h3><a href="index.php?controller=resourcesController&action=showResources">Cerrar</a>';
    }
    if(isset($data['type'])){
        $type = $data['type'];
    }
    
    echo '<h2>Lista de recursos disponibles para reservar </h2>
        <table border = "1">
        <tr>
            <th> ID </th>
            <th> Nombre </th>
            <th> Descripción </th>
            <th> Ubicación </th>
            <th> Foto </th>';
            if($type == "admin"){
                echo '<th colspan="2">Opciones</th>';
            }
            else{
                echo '<th>Opciones</th>';
            }
    echo '</tr>';
    
    foreach($resourcesList as $resource){
        echo '<tr>
                <td>' . $resource['id'] . '</td>
                <td>' . $resource['name'] . '</td>
                <td>' . $resource['description'] . '</td>
                <td>' . $resource['location'] . '</td>
                <td><img src="' . $resource['image'] . '" style="width:10%;"></td>';
                if($type == "admin"){
                    echo '<td><a href="#" onclick="confirmErase(' . $resource['id'] . ', \'' . $route . '\')">Eliminar</a></td>
                        <td><a href="index.php?controller=resourcesController&action=changeResource&id=' . $resource['id'] . '">Editar</a></td>';
                }
                else{
                    echo '<td><a href="index.php?controller=resourcesController&action=bookResource&id=>' . $resource['id'] . '">Reservar</a></td>';
                }
        echo '</tr>';
    }
    
    //para comprobar si hay sesión abierta:
    //var_dump($_SESSION['idUser']);
    //var_dump($_SESSION['name']);
    
    echo '</table><br>
        <a href="index.php?controller=resourcesController&action=addResource">Añadir recurso</a>';
}