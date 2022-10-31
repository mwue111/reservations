<?php       //controlador de time slots: tramos temporales en los que se puede hacer reservas

//La tabla tiene que ser algo como esto:
/*
id | dayOfWeek | startTime | endTime
 1 |  1 (lunes)| 08:05     | 09:05
 2 |  1 (lunes)| 09:05     | 10:05
 3 |  1 (lunes)| 10:05     | 11:05
 4 |  1 (lunes)| 11:35     | 12:35
 5 |  1 (lunes)| 12:35     | 13:35
 6 |  1 (lunes)| 13:35     | 14:35
 7 | 2 (martes)| 08:05     | 09:05
 8 | 2 (martes)| 09:05     | 10:05
 9 | 2 (martes)| 10:05     | 11:05
 ...
 */

include_once("views/view.php");
include_once("models/time_slots.php");

class timeSlotsController{
    private $ts;

    public function __construct(){
        $this->ts = new TimeSlots();
    }

    public function showTimeSlots(){
        if(isset($_SESSION['idUser'])){
            if(isset($_SESSION['name'])){
                $data['name'] = $_SESSION['name'];
            }
            if(isset($_REQUEST['message'])){
                $data['message'] = $_REQUEST['message'];
            }
            if(isset($_SESSION['type'])){
                $data['type'] = $_SESSION['type'];
            }
    
            $data['timeList'] = $this->ts->getAll();
            View::render('time_slots/show', $data);
        }
        else{
            $data['error'] = "Debes iniciar sesión para poder entrar en esta sección.";
            View::render("time_slots/show", $data);
        }
    }

    public function addTimeSlot(){
        if(isset($_SESSION['name'])){
            $data['name'] = $_SESSION['name'];
        }
        $data['info'] = 'Añadir tramo';
        $data['action'] = 'insertTime';
        View::render("time_slots/add", $data);
    }

    public function insertTime(){
        $day = $_REQUEST['newDay'];
        $startTime = $_REQUEST['newStart'];
        $endTime = $_REQUEST['newEnd'];
        
        $data['insertTime'] = $this->ts->addTimeSlot($day, $startTime, $endTime);

        $data['info'] = "Tramo añadido con éxito.";
        header("Location:index.php?controller=timeSlotsController&action=showTimeSlots&message=" . $data['info']);
    }

    public function deleteTime(){
        $id = $_REQUEST['id'];

        $data['info'] = "Tramo eliminado con éxito.";
        $data['delete'] = $this->ts->delete($id);
        header("Location:index.php?controller=timeSlotsController&action=showTimeSlots&message=" . $data['info']);
    }

    public function changeTime(){
        if(isset($_SESSION['name'])){
            $data['name'] = $_SESSION['name'];
        }
        $data['info'] = 'Modificar tramo';
        $data['action'] = 'editTime';
        //este método tiene que llamar al método get($id)
        $id = $_REQUEST['id'];
        $data['oldTime'] = $this->ts->get($id);
        View::render("time_slots/add", $data);
    }

    public function editTime(){
        $id = $_REQUEST['id'];
        $day = $_REQUEST['newDay'];
        $startTime = $_REQUEST['newStart'];
        $endTime = $_REQUEST['newEnd'];

        $data['edit'] = $this->ts->editTime($id, $day, $startTime, $endTime);
        $data['info'] = "Tramo modificado con éxito";
        header("Location:index.php?controller=timeSlotsController&action=showTimeSlots&message=" . $data['info']);
    }

    //función que muestra los time slots disponibles para cada día en la vista my-reservations
    public function selectTimeSlots(){
        if(isset($_REQUEST['selected'])){
            $selectedDay = $_REQUEST['selected'];
            $data['selected'] = $this->ts->selectTimeSlot($selectedDay);
            //header("Location:index.php?controller=resourcesController&action=showReservationForm");
            View::render("resource/my-reservations", $data);
        }
    }

    //función que recibe la info desde la vista my-reservations (el formulario)
    public function bookTimeSlot(){
        
    }

}

//inserción de tramos horarios: para esto se podría crear una rutina que permitiera añadir varios datos a la vez 