/**
 * Created by USUARIO on 09/12/2014.
 */

//Función para recoger los datos del formulario y enviarlos por post


$(function(){

    $("#btnactperfil").click(function(){
        $('#myModal').modal('show')
    });
    $("#btnaddcentro").click(function(){
        $('#myModal2').modal('show')
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

})