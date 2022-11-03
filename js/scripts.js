function confirmErase(id, route){
    if(confirm("¿Seguro/a que desea eliminar este dato?")){
        window.location.href = route + id;
    }
}

function showTimeSlots(oldDay = null){
   var selectD = document.getElementById('selectDay');
   var selectTS = document.getElementById('selectTS');
   selectTS.innerHTML = "";
   //Duda: que cargue directamente las franjas horarias preseleccionando una
    if(oldDay == null){
        var daySelected = selectD.value;
    }
    else if(oldDay != null){
        daySelected = selectD.value;
    }

    var day = new Date(daySelected).getDay();

   console.log(day, timeSlot);
   var arrayTS = [];

    //para convertir el JSON en un array y tener acceso a los índices:
    for(var i in timeSlot){
        arrayTS.push([i, timeSlot[i]]);
    }

    console.log(arrayTS);

    for(var i = 0; i < arrayTS.length; i++){
        //si el día seleccionado es igual al día en la base de datos:
        if(day == arrayTS[i][1]['day_of_week']){
            console.log('iguales');
            var option = document.createElement('option');
            option.value = arrayTS[i][1]['id'];
            option.innerHTML = arrayTS[i][1]['start_time'] + ' - ' + arrayTS[i][1]['end_time'];
            selectTS.appendChild(option);
        }
    }
}



//phttps://www.vedoque.com/blog/2021/12/select-de-categorias-y-subcategorias-en-phpjavascript-sin-ajax.html
