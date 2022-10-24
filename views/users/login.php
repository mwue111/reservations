<?php       //formulario de login

if(isset($data['error'])){
    echo '<h2 style="border: 2px solid red">' . $data['error'] . '</h2>';
}
else{
    if(isset($data['info'])){
        echo '<h2> Login - ' . $data['info'] . '</h2>';
    }   
    
    echo '
    <form action="index.php?controller=loginController&action=checkLogin" method="POST" style="border: 1px dotted black;">
        <label for="userName">Nombre de usuario:</label>
        <br>
        <input type="text" name="userName">
        <br>
        <label for="userPass">Contraseña: </label>
        <br>
        <input type="text" name="userPass">
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
}
