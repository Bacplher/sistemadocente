/**
 * Created by USUARIO on 09/12/2014.
 */

//Función para recoger los datos del formulario y enviarlos por post


$(function(){

    $("#btnactperfil").click(function(){
        $('#myModal').modal('show');

    });
    $("#btnaddcentro").click(function(){
        $('#myModal2').modal('show');
    });

    $("#save").click(function(){
        var param = $("#form_actperfil").serialize();
        $.post("perfil/actualizar",param,function(data){
           /* console.log(data.Nombre);
            $("#nombre").val(data.Nombre);
            $("#apellidopaterno").val(data.ApellidoPaterno); esto sirve para después de enviar los datos
            volverlos a recibir*/
        })
    });
    $("#btn-add").click(function(){
        var param = $("#form_add").serialize();
        $.post("perfil/agregar",param,function(data){

        })
    })


});

function stringCheck(e, field) {

    key = e.keyCode ? e.keyCode : e.which;
    //backspace
    if(key == 32) return false;

    //numeros 0-9
    if((key >= 48 && key <= 57) || key == 42) return false;
    // Caracteres Raros
    if(	key == 94 || key == 59 || key == 58 || key == 61 || key == 43 || key == 45 ||
        key == 95 || key == 47 || key == 96 || key == 40 || key == 41 || key == 91 ||
        key == 123 || key == 92 || key == 124 || key == 125 || key == 93 || key == 39 ||
        key == 34 || key == 44 || key == 46 || key == 47 || key == 231 || key == 42 ||
        key == 168 || key == 33 || key == 161 || key == 183 || key == 8364 || key == 37 ||
        key == 191 || key == 186 || key == 170 || key == 64 || key == 35 || key == 126 ||
        key == 36 || key == 38 || key == 180 || key == 63) return false;


}




