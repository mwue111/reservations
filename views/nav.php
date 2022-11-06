<?php
if(isset($_SESSION['name'])){
    if(isset($data['name'])){
        echo '
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">¡Bienvenido/a, ' . $data['name'] . '!</h5>
            </div>
        </div>';
    }

    /*if(!isset($_SESSION['name'])){
        echo '  <li style="display: inline-block;"><a href="index.php"> Iniciar Sesión </a></li>';
    }*/
            if(isset($data['type'])){
                if($data['type'] == "admin"){
                    echo '
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <div class="container-fluid">
                            <button
                            class="navbar-toggler"
                            type="button"
                            data-mdb-toggle="collapse"
                            data-mdb-target="#navbarSupportedContent"
                            aria-controls="navbarSupportedContent"
                            aria-expanded="false"
                            aria-label="Toggle navigation">
                            <i class="fas fa-bars"></i>
                        </button>
                        
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <a class="navbar-brand mt-2 mt-lg-0" href="#">
                            <img
                            src="images/escudo.png"
                            height="45"
                            alt="MDB Logo"
                            loading="lazy"/>
                            </a>

                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item"><a class="nav-link" href="index.php?controller=resourcesController&action=showResources"> Recursos </a></li>
                                <li class="nav-item"><a class="nav-link" href="index.php?controller=timeSlotsController&action=showTimeSlots">Tramos horarios</a></li>
                                <li class="nav-item"><a class="nav-link" href="index.php?controller=usersController&action=showUsers">Usuarios</a></li>
                                <li class="nav-item"><a class="nav-link" href="index.php?controller=usersController&action=usersReservations">Reservas de usuarios</a></li>
                                <li class="nav-item"><a class="nav-link" href="index.php?controller=usersController&action=myReservations">Mis reservas</a></li>
                            </ul>
                            <div class="d-flex align-items-center">
                                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                    <li class="nav-item"><a class="nav-link" href="index.php?controller=loginController&action=logout">Cerrar sesión</a></li>
                                </ul>
                            </div>
                        </div>
                        </div>
                    </nav>';
                }
                else{
                    echo '
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <div class="container-fluid">
                            <button
                            class="navbar-toggler"
                            type="button"
                            data-mdb-toggle="collapse"
                            data-mdb-target="#navbarSupportedContent"
                            aria-controls="navbarSupportedContent"
                            aria-expanded="false"
                            aria-label="Toggle navigation">
                            <i class="fas fa-bars"></i>
                            </button>

                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <a class="navbar-brand mt-2 mt-lg-0" href="#">
                                    <img
                                    src="images/escudo.png"
                                    height="45"
                                    alt="MDB Logo"
                                    loading="lazy"/>
                                </a>

                                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                    <li class="nav-item"><a class="nav-link" href="index.php?controller=resourcesController&action=showResources"> Recursos </a></li>
                                    <li class="nav-item"><a class="nav-link" href="index.php?controller=usersController&action=myReservations">Mis reservas</a></li>
                                </ul>
                            </div>

                            <div class="d-flex align-items-center">
                                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                    <li class="nav-item"><a class="nav-link" href="index.php?controller=loginController&action=logout">Cerrar sesión</a></li>
                                </ul>
                            </div>
                    </nav>';   
                }
            }
}