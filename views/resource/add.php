<?php   //vistas para añadir o editar recursos
echo '<div class="container">
        <div class="row">
            <div class="card m-3">';

if(isset($data['info'])){
    echo '<h2 class="m-3">' . $data['info'] . '</h2>';
}

if(isset($data['action'])){
    echo '<form action="index.php?controller=resourcesController&action=' . $data['action'] . '" method="POST" enctype="multipart/form-data">';
    
    if(isset($data['oldData'])){
        foreach($data['oldData'] as $oldData){
            $oldName = $oldData['name'];
            $oldLocation = $oldData['location'];
            $oldImage = $oldData['image'];
            echo '<input type="hidden" name="id" value="' . $oldData['id'] . '">';
            echo '<br>
            <p>Imagen anterior:</p>
            <img src="' . $oldImage . '" style="width:10%"></img>
            <br>
            <br>';

        }
    }
    else{
        $oldName = null;
        $oldLocation = null;
        $oldImage = null;
    }

    echo '<label for="resourceName">Nombre del recurso:</label>
        <input type="text" name="resourceName" required value="' . $oldName . '">
        <br>
        <br>
        <label for="resourceDescription">Descripción del recurso: </label>
        <textarea name="resourceDescription" required></textarea>
        <br>
        <br>
        <label for="resourceLocation">Ubicación del recurso: </label>
        <input type="text" name="resourceLocation" required value="' . $oldLocation . '">
        <br>
        <br>
        <label for="resourceImage">Subir foto del recurso: </label>
        <input type="file" name="resourceImage">
        <br>
        <input type="submit" value="Enviar">
    </form>
    <br>
    <a href="index.php?controller=resourcesController&action=showResources">Volver</a>
    </div>
    </div>
    </div>
    ';
}
else{
    echo 'faltan parámetros.';
}