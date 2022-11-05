<?php   //vista para mostrar usuarios
$route = "index.php?controller=usersController&action=deleteUser&id=";

if(isset($data['error'])){
    echo $data['error'] . '<br><br><a href="index.php">Iniciar sesión</a>';
}
else{
    $usersList = $data['usersList'];

    if(isset($data['info'])){
        echo $data['info'];
    }
    if(isset($data['message'])){
        echo '<h3>' . $data['message'] . '</h3><a href="index.php?controller=usersController&action=showUsers">Cerrar</a>';
    }

    echo '<h2>Lista de usuarios</h2>
        <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre de usuario/a</th>
            <th>Nombre real</th>
            <th>Tipo</th>
            <th colspan="2">Opciones</th>
        </tr>';

    foreach($usersList as $user){
        echo '<tr>
                <td>' . $user['id'] . '</td>
                <td>' . $user['username'] . '</td>
                <td>' . $user['realname'] . '</td>
                <td>' . $user['type'] . '</td>
                <td><a href="#" onclick="confirmErase(' . $user['id'] . ', \'' . $route . '\')">Eliminar</a></td>
                <td><a href="index.php?controller=usersController&action=changeUser&id=' . $user['id'] . '">Modificar</a></td>
            </tr>';
    }

    echo '</table><br>
        <a href="index.php?controller=usersController&action=addUser">Añadir nuevo/a usuario/a</a>
        <br>
        <a href="index.php?controller=resourcesController&action=showResources">Volver a listado de recursos</a>';
}
