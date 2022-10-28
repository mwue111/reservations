
function confirmErase(id, route){
    if(confirm("¿Seguro/a que desea eliminar este dato?")){
        window.location.href = route + id;
    }
}