<link href="vista/curso/css/estilos_curso.css" rel="stylesheet" type="text/css" />
<SCRIPT TYPE="text/javascript">
$(document).ready(function(){
    $("#divmenuopciones").hide();
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
    function alumnos(){
        var idcurso = $("#curso").val();
        $.post('/sistemadocente/curso/getalumnos',{codcurso:idcurso}, function(data){
            var t = "<table><tr>";
            t+="<th>CodAlumno</th>";
            t+="<th>Nombre</th>";
            t+="<th>Apellido Paterno</th>";
            t+="<th>Apellido Materno</th>";
            t+="<th>Email</th></tr>";

            for(var i = 0; i < data.length; i++){
                t+="<tr><td>"+data[i].codalumno+"</td>";
                t+="<td>"+data[i].nombre+"</td>";
                t+="<td>"+data[i].ApPaterno+"</td>";
                t+="<td>"+data[i].ApMaterno+"</td>";
                t+="<td>"+data[i].Email+"</td></tr>";
            }
            t+="</table>";
            $("#alumnomenu").html(t);
        },'json');
    }

</SCRIPT>
<div id="contenedorcurso">
    <br/>
    <div class="col-md-4">
        <!--<form>-->
        <!--<div style="display: inline-block">-->
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

            <br>
        <br>
            <div id="divmenuopciones">
            <a href="javascript:void(0)" id="divalumno" onclick="alumnos()">[Alumnos]</a><br>
            <a href="javascript:void(0)" id="divasistencia" onclick="asistencia()">[Asistencia]</a><br>
            <a href="javascript:void(0)" id="divevalucion" onclick="evaluacion()" >[Evaluacion]</a>
            </div>
        <!--</div>-->
        <!--</form>-->
    </div>
    <div class="col-md-8">
        <div id="alumnomenu"> <!--style="display: inline-block"-->

        </div>
    </div>
</div>
