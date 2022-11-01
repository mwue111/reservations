<?php   //modelo para time slots

include_once("model.php");

class timeSlots extends Model{

    public function __construct(){
        $this->table = "time_slots";
        $this->idColumn = "id";
        parent::__construct();
    }

    public function addTimeSlot($day, $startTime, $endTime){
        
        $query = "INSERT INTO time_slots(day_of_week, start_time, end_time) VALUES ($day, '$startTime', '$endTime')";

        return $this->db->dataManipulation($query);
    }

    public function editTime($id, $day, $startTime, $endTime){
        $query = "UPDATE time_slots SET day_of_week=$day, start_time='$startTime', end_time='$endTime' WHERE id=$id";

        return $this->db->dataManipulation($query);
    }

    public function selectTimeSlot($day){
        $query = "SELECT start_time, end_time FROM time_slots WHERE day_of_week = $day;";
        echo $query;
        return $this->db->dataQuery($query);
    }

}