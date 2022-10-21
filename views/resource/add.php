<?php   //vistas para añadir o editar recursos

if(isset($data['info'])){
    echo '<h2>' . $data['info'] . '</h2>';
}

if(isset($data['action'])){
    echo '<form action="index.php?controller=resourcesController&action=' . $data['action'] . '" method="POST" enctype="multipart/form-data">';
    
    if(isset($data['oldData'])){
        var_dump($data['oldData']);
        foreach($data['oldData'] as $oldData){
            echo '<input type="hidden" name="id" value="' . $oldData['id'] . '">';

        }
    }

    echo '<label for="resourceName">Nombre del recurso:</label>
        <input type="text" name="resourceName" required value="' . $oldData['name'] . '">
        <br>
        <br>
        <label for="resourceDescription">Descripción del recurso: </label>
        <textarea name="resourceDescription" required></textarea>
        <br>
        <br>
        <label for="resourceLocation">Ubicación del recurso: </label>
        <input type="text" name="resourceLocation" required value="' . $data['location'] . '">
        <br>
        <br>
        <label for="resourceImage">Subir foto del recurso: </label>
        <input type="file" name="resourceImage">
        <br>
        <br>
        <input type="submit" value="Enviar">
    </form>
    <br>
    <a href="index.php">Volver</a>
    ';
}
else{
    echo 'faltan parámetros.';
}