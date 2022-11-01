function confirmErase(id, route){
    if(confirm("¿Seguro/a que desea eliminar este dato?")){
        window.location.href = route + id;
    }
}

function showTimeSlots(){
    /* Esto redirige con Location, pero no sé si es correcto (además, me faltaría enviar un parámetro: el id del recurso)
    var daySelected = document.resourceReservation.selectDay[document.resourceReservation.selectDay.selectedIndex].value;

    window.location.href = "index.php?controller=timeSlotsController&action=selectTimeSlots&selected=" + daySelected;
    */
   //var timeSlot = "<?php echo json_encode($data['ts'])?>"; // = <?php echo json_encode($data['ts]);?>
   var selectD = document.getElementById('selectDay');
   var selectTS = document.getElementById('selectTS');
   selectTS.innerHTML = "";
   var daySelected = selectD.value;
   
   console.log(daySelected, timeSlot);
   var arrayTS = [];

    //para convertir el JSON en un array y tener acceso a los índices:
    for(var i in timeSlot){
        arrayTS.push([i, timeSlot[i]]);
    }

    console.log(arrayTS);

    for(var i = 0; i < arrayTS.length; i++){
        //si el día seleccionado es igual al día en la base de datos:
        if(daySelected == arrayTS[i][1]['day_of_week']){
            console.log('iguales');
            var option = document.createElement('option');
            option.value = arrayTS[i][0];
            option.innerHTML = arrayTS[i][1]['start_time'] + ' - ' + arrayTS[i][1]['end_time'];
            selectTS.appendChild(option);
        }

    }


}

//https://www.vedoque.com/blog/2021/12/select-de-categorias-y-subcategorias-en-phpjavascript-sin-ajax.html
