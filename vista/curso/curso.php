<link href="vista/curso/css/estilos_curso.css" rel="stylesheet" type="text/css" />
<SCRIPT TYPE="text/javascript">
$(document).ready(function(){
    $("#divmenuopciones").hide("slow");
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
                html = html + "<option selected='selected' disabled='disabled'>Seleccionar</option>";
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
    var curso = function(){
        $.post('/sistemadocente/curso/getcurso','codseccion=' + $("#seccion").val(),function(da){
            $('#curso').html('');
            var e = "";
            e = e + "<option selected='selected' disabled='disabled'>Seleccionar</option>";
            for(var i = 0; i < da.length; i++){
                e = e + '<option value="' + da[i].codcurso + '">' + da[i].dcurso + '</option>';
            }
            $("#curso").append(e);
        },'json');
    }
    $("#seccion").change(function(){
        if(!$("#seccion").val()){
            $("#curso").html('');
        }
        else{
            curso();
        }

    $("#curso").change(function(){
        if($("#curso").val()){
            $("#divmenuopciones").show("slow");
        }
    })

    });/*
    var curso = function(){
        $.post('/sistemadocente/curso/getcurso','codseccion=' + $("#seccion").val(),function(datosss){
            $('#seccion').html('');
                var a = "";
                a = a +"<option selected='selected' disabled='disabled'>Seleccionar</option>";
            for(var i = 0; i < datosss.length; i++){
                a = a +'<option value="' + datosss[i].codcurso + '">' + datosss[i].dcurso + '</option>';   
            }
            $("#curso").append(a);
        },'json');
    }
    $("#seccion").change(function(){
        if(!$("#seccion")za <d.val()){
            $("#curso").html('');
        }
        else{
            curso();
        }
    });
*/
    
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
            Centro Educativo:
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
          
            <br/>
            <div id="divmenuopciones">
            <a href="#">[Alumnos]</a><br>
            <a href="#">[Asistencia]</a><br>
            <a href="#">[Evaluacion]</a>
            </div>
        </form>
    </div>
</div>