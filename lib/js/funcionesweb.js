// JavaScript Document

$(document).ready(function(){
	$("#menu").kendoMenu();
	$("#panelbar").kendoPanelBar({
		expandMode: "single"
	});
});
function validarLogin(){
    u = $("#usuario").val();
    c = $("#clave").val();
    if(u == ""){
        alert("Debe ingresar usuario");
        $("#usuario").focus();
        return false;
    }
    else{
        if(c == ""){
            alert("Debe ingresar clave");
            $("#clave").focus();
            return false;
        }
        else return true;
    }
}
