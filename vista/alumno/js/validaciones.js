function eliminar(url){
    if(confirm("Esta seguro que desea eliminar este registro")){
        href = url;
        window.location = href;
    }
}
function editar(url){
    window.location = url;
}
