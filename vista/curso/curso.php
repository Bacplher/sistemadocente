<link href="vista/curso/css/estilos_curso.css" rel="stylesheet" type="text/css" />
<SCRIPT TYPE="text/javascript">
$(document).ready(function(){
    /*
    var grado = function(){
        $.post('/sistemadocente/curso/getgrado','IdCentroEducativo=' + $("#centroeducativo").val(),function(datos){
            $("#grado").html('');
            
            for(var i = 0; i < datos.length; i++){
                $("#grado").append('<option value="' + datos[i].codgrado + '">' + datos[i].dgrado + '</option>');
            }
            
        }, 'json');
    }*/
    
    var grado = function(){
        $.post('/sistemadocente/curso/getgrado','IdCentroEducativo=' + $("#centroeducativo").val(),function(datos){
            $("#grado").html('');
            var h = "";
                h = h + "<option selected='selected' disabled='disabled'>Seleccionar</option>";
            for(var i = 0; i < datos.length; i++){
                h = h +'<option value="' + datos[i].codgrado + '">' + datos[i].dgrado + '</option>';
            }
            $("#grado").append(h);
        }, 'json');
    }
    
    
    $("#centroeducativo").change(function(){

        //alert($(this).val());
       if(!$("#centroeducativo").val()){
            $("#grado").html('');
        }
        else{
           grado(); 
        }
    });
    var seccion = function(){
        $.post('/sistemadocente/curso/getseccion','codgrado=' + $("#grado").val(),function(datoss){
            $('#seccion').html('');
                var html = "";
                html = html+"<option selected='selected' disabled='disabled'>Seleccionar</option>";
            for(var i = 0; i < datoss.length; i++){
                html = html+'<option value="' + datoss[i].codseccion + '">' + datoss[i].dseccion + '</option>';
                
            }

            $("#seccion").append(html);
        },'json');
    }

    $("#grado").change(function(){
        if(!$("#grado").val()){
            $("#seccion").html('');
        }
        else{
            seccion();
        }
    });
    
/*
    var grado = function(){
        $.post('/sistemadocente/curso/getgrado','IdCentroEducativo=' + $("#centroeducativo").val(),function(datos){
            $("#grado").html('');
            
            for(var i = 0; i < datos.length; i++){
                $("#grado").append('<option value="' + datos[i].codgrado + '">' + datos[i].dgrado + '</option>');
            }
            
        }, 'json');
    }
    
    $("#centroeducativo").change(function(){

        //alert($(this).val());
       if(!$("#centroeducativo").val()){
            $("#grado").html('');
        }
        else{
           grado(); 
        }
    });
  */    
});
</SCRIPT>
<div id="contenedorcurso">
    <br/>
    <div class="col-md-4">
        <form>
            Centro educativo: 
        <select id="centroeducativo">

            <?php
            echo '<option selected="selected" disabled="disabled">Seleccionar</option>';
            for ($i = 0; $i < count($this->ct); $i++){
                echo "<option value='".$this->ct[$i]['IdCentroEducativo']."'>".$this->ct[$i]['centroeducativo']."</option>";
            }
            ?>

        </select><br>
        Grado :<br>
        <select id="grado">
            
        </select>
        <br>
        Seccion :<br>
        <select id="seccion">
            
        </select>
        <br>
        Curso :<br>
        <select id="curso">

        </select>
        </form>
    </div>
</div>