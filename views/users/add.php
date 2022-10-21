<?php       //vista para añadis/editar usuarias

if(isset($data['info'])){
    echo '<h2>' . $data['info'] . '</h2>';
}


if(isset($data['action'])){
    echo '<form action="index.php?controller=usersController&action=' . $data['action'] . '" method="POST" enctype="multipart/form-data">';

    if(isset($data['oldUser'])){
        foreach($data['oldUser'] as $oldUser){
            $oldName = $oldUSer['username'];
            echo '<input type="hidden" name="id" value="' . $oldUser['id'] . '">';

        }
    }

    echo '<label for="userName">Nombre de usuario/a:</label>
        <br>
        <input type="text" name="userName" value="' . $oldName . '" required>
        <br>
        <br>
        <label for="passwd">Contraseña:</label>
        <br>
        <input type="password" name="passwd" value="' . $oldUser['password'] . '" required>
        <br>
        <br>
        <label for="realName">Nombre real del usuario/a:</label>
        <br>
        <input type="text" name="realName" value="' . $oldUser['realname'] . '" required>
        <br>
        <br>
        <label for="userType">Tipo:</label>
        <br>
        <input type="number" name="userType" value="' . $oldUser['type'] . '" required>
        <br>
        <br>
        <input type="submit" value="Enviar">
        </form>
        <br>
        <a href="index.php?controller=usersController&action=showUsers">Volver</a>';
}