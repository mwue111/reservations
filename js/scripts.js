
function confirmErase(id, route){
    if(confirm("¿Seguro/a que desea eliminar este dato?")){
        window.location.href = route + id;
    }
}

function showTimeSlots(){
    var daySelected = document.resourceReservation.selectDay[document.resourceReservation.selectDay.selectedIndex].value;
    
    //alert(resourceSelected);
    
    //window.location.href = window.location.href + "&selected=" + resourceSelected;
    window.location.href = "index.php?controller=timeSlotsController&action=selectTimeSlots&selected=" + daySelected;
}