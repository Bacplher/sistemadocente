/**
 * Created by USUARIO on 09/12/2014.
 */
function objetoAjax(){
    var xmlhttp=false;
    try {
        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {

        try {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (E) {
            xmlhttp = false;
        }
    }

    if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
        xmlhttp = new XMLHttpRequest();
    }
    return xmlhttp;
}

//Función para recoger los datos del formulario y enviarlos por post
function actualizarperfil(){

    //div donde se mostrará lo resultados
    //divResultado = document.getElementById('resultado');
    //recogemos los valores de los inputs
    Nombre=document.actualizar_perfil.Nombre.value;
    ApellidoPaterno=document.actualizar_perfil.ApellidoPaterno.value;
    ApellidoMaterno=document.actualizar_perfil.ApellidoMaterno.value;
    Edad=document.actualizar_perfil.Edad.value;
    Celular=document.actualizar_perfil.Celular.value;
    Email=document.actualizar_perfil.Email.value;
    Sexo=document.actualizar_perfil.Sexo.value;
    Dni=document.actualizar_perfil.Dni.value;
    Clave=document.actualizar_perfil.Clave.value;
    Especialidad=document.actualizar_perfil.Especialidad.value;
    //instanciamos el objetoAjax
    ajax=objetoAjax();

    //uso del medotod POST
    //archivo que realizará la operacion

    ajax.open("POST", "perfilControlador.php",true);
    //cuando el objeto XMLHttpRequest cambia de estado, la función se inicia
    ajax.onreadystatechange=function() {
        //la función responseText tiene todos los datos pedidos al servidor
        if (ajax.readyState==10) {
            //mostrar resultados en esta capa
            divResultado.innerHTML = ajax.responseText
            alert(ajax.responseText);
            //llamar a funcion para limpiar los inputs

        }
    }
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    //enviando los valores a registro.php para que inserte los datos
    ajax.send("Nombre="+Nombre+"&ApellidoPaterno="+ApellidoPaterno+"&ApellidoMaterno="+ApellidoMaterno+"&Edad="+Edad+"&Celular="+Celular+"&Email="+Email+"&Sexo="+Sexo+"&Dni="+Dni+"&Clave="+Clave+"&Especialidad="+Especialidad)
}