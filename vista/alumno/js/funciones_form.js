$(document).ready(function(){
    $( "#razon_social" ).focus(); 
    
    $("#regiones").change(function(){
        if(!$("#regiones").val()){
            $("#provincias").html('<option></option>');
            $("#ciudades_proveedores").html('<option></option>');
        }else{
            $("#provincias").html('<option></option>');
            $("#ciudades_proveedores").html('<option></option>');
            $.post('/jungla/proveedores/get_provincias','idregion='+$("#regiones").val(),function(datos){
                for(var i=0;i<datos.length;i++){
                    $("#provincias").append('<option value="'+ datos[i].IDUBIGEO + '">' + datos[i].DESCRIPCION+ '</option>');
                }
            },'json');
        }
    });
    
    $("#provincias").change(function(){
        if(!$("#provincias").val()){
            $("#ciudades_proveedores").html('<option>.</option>');
        }else{
            $("#ciudades_proveedores").html('<option></option>');
            $.post('/jungla/proveedores/get_ciudades','idprovincia='+$("#provincias").val(),function(datos){
                for(var i=0;i<datos.length;i++){
                    $("#ciudades_proveedores").append('<option value="'+ datos[i].IDUBIGEO + '">' + datos[i].DESCRIPCION+ '</option>');
                }       
            },'json');
        }
    });
    
    $("#ruc").blur(function(){
        if($("#ruc").val()!=''){
            $.ajax({
                type:"POST",
                url:'/jungla/proveedores/valida_ruc',
                data:"ruc="+$("#ruc").val(),
                beforeSend:function(){
                    $("#valida_ruc").html("cargando...");    
                },
                success:function(respuesta){
                    $("#valida_ruc").html(respuesta);
                }
            });
        }
    });
    
}); 

function validarAlumno(){
    des = $( "#val_ruc" ).val();
    if(des == 0){
        alert("Debes cambiar numero de RUC porque ya esta en uso");
        return false;
    }
    else return true;
}