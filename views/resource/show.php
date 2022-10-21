<?php   //vista para mostrar los recursos

$resourcesList = $data['resourcesList'];

if(isset($data['info'])){
    echo $data['info'];
}

echo '<h2>Lista de recursos disponibles para reservar </h2>
    <table border = "1">
    <tr>
        <th> ID </th>
        <th> Nombre </th>
        <th> Descripción </th>
        <th> Ubicación </th>
        <th> Foto </th>
        <th colspan="2"> Opciones </th>
    </tr>';

foreach($resourcesList as $resource){
    echo '<tr>
            <td>' . $resource['id'] . '</td>
            <td>' . $resource['name'] . '</td>
            <td>' . $resource['description'] . '</td>
            <td>' . $resource['location'] . '</td>
            <td><img src="' . $resource['image'] . '" style="width:10%;"></td>
            <td><a href="index.php?controller=resourcesController&action=deleteResource&id=' . $resource['id'] . '">Eliminar</a></td>
            <td><a href="index.php?controller=resourcesController&action=changeResource&id=' . $resource['id'] . '">Editar</a></td>
        </tr>';
}

echo '</table><br>
    <a href="index.php?controller=resourcesController&action=addResource">Añadir recurso</a>';

