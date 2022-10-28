<?php       //formulario de login

if(isset($data['info'])){
    echo '<h2>' . $data['info'] . '</h2>';
}
if(isset($data['message'])){
    echo '<h3>' . $data['message'] . '</h3>';
}
if(isset($data['error'])){
    echo '<h3 style="color:red;">Usuario o contraseña incorrectos.</h3>';
    //echo '<h3 style="color:red;">' . $data['error'] . '</h3>';
}

echo '
    <form action="index.php?controller=loginController&action=checkLogin" method="POST" enctype="multipart/form-data">
        <label for="userName">Nombre de usuario:</label>
        <br>
        <input type="text" name="userName">
        <br>
        <label for="userPass">Contraseña: </label>
        <br>
        <input type="text" name="userPass">
        <br>
        <br>
        <input type="submit" value="Acceder">
    </form>';

    /*
    Trozo de formulario para crear usuario:

        <br>
        <label for="realName">Nombre real:</label>
        <br>
        <input type="text" name="realName">
        <br>
        <label for="type">Tipo de usuario:</label>
        <br>
        <input type="number" name="type">

    */
