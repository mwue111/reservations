<?php

echo '<h3>Bienvenido/a, "nombre-de-usuario"</h3> 
    <div style="border: 1px dotted black;">
    <ul>
        <li style="display: inline-block;"><a href="index.php"> Home </a></li>
        <li style="display: inline-block;"><a href="index.php?controller=resourcesController&action=showResources"> Recursos </a></li>
        <li style="display: inline-block;"><a href="index.php?controller=timeSlotsController&action=showTimeSlots">Tramos horarios</a></li>
        <li style="display: inline-block;"><a href="index.php?controller=usersController&action=showUsers">Usuarios</a></li>
    </ul>
    </div>';