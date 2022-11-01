<script>
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
    var timeslots = <?php echo json_encode($data['ts'])?>
    var daySelected = document.resourceReservation.selectDay[document.resourceReservation.selectDay.selectedIndex].value;
    alert(daySelected);
    console.log(timeslots);
}

//https://www.vedoque.com/blog/2021/12/select-de-categorias-y-subcategorias-en-phpjavascript-sin-ajax.html

</script>
