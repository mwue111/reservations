<?php       //vista para añadis/editar usuarias

if(isset($data['info'])){
    echo '<h2>' . $data['info'] . '</h2>';
}


if(isset($data['action'])){
    echo '<form action="index.php?controller=usersController&action=' . $data['action'] . '" method="POST" enctype="multipart/form-data">';

    if(isset($data['oldUser'])){
        foreach($data['oldUser'] as $oldUser){
            $oldName = $oldUser['username'];
            $oldPass = $oldUser['password'];
            $oldRealName = $oldUser['realname'];
            $oldType = $oldUser['type'];
            echo '<input type="hidden" name="id" value="' . $oldUser['id'] . '">';

        }
    }else{
        $oldName = null;
        $oldPass = null;
        $oldRealName = null;
        $oldType = null;
    }
    echo '<label for="userName">Nombre de usuario/a:</label>
        <br>
        <input type="text" name="userName" value="' . $oldName . '" required>
        <br>
        <br>
        <label for="passwd">Contraseña:</label>
        <br>
        <input type="password" name="passwd" value="' . $oldPass . '" required>
        <br>
        <br>
        <label for="realName">Nombre real del usuario/a:</label>
        <br>
        <input type="text" name="realName" value="' . $oldRealName . '" required>
        <br>
        <br>
        <label for="userType">Tipo:</label>
        <br>
        <select name="userType">';
            if(isset($data['oldUser'])){
                if($oldType == "admin"){
                    echo '<option value = "admin" selected>Administrador/a</option>
                        <option value = "user">Usuario/a</option>';
                }
                else{
                    echo '<option value = "user" selected>Usuario/a</option>
                        <option value = "admin">Administrador/a</option>';
                }
            }
            else{
                echo '
                    <option value="admin">Administrador/a</option>
                    <option value="user">Usuario/a</option>';
            }
        echo '
        </select>
        <br>
        <br>
        <input type="submit" value="Enviar">
        </form>
        <br>
        <a href="index.php?controller=usersController&action=showUsers">Volver</a>';

 //tipo:    <input type="text" name="userType" value="' . $oldType . '" required>
 /*
 
 
 
 */
}