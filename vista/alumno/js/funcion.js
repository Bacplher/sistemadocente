    $(function(){
        $(".tabgrilla").kendoGrid({
            dataSource: {
                pageSize: 7
            },
            pageable: true,
            columns: [{field:"IdAlumno", width:6},
                {field:"Nombre", width:15},
                {field:"ApellidoPaterno", width:15},
                {field:"ApellidoMaterno", width:15},
                {field:"Email", width:15}]
                //{field:"Direccion", width:15},
                //{field:"Acciones", width:8,attributes:{class:"acciones"}}]
        });
        $( "#buscar" ).focus();
        
        function buscar(){
            $.post('/sistemadocente/alumno/buscador','cadena='+$("#buscar").val()+'&filtro='+$("#filtro").val(),function(datos){
                HTML = '<table border="1" class="tabgrilla">'+
                        '<tr>'+
                            '<th>IdAlumno</th>'+
                            '<th>Nombre</th>'+
                            '<th>ApellidoPaterno</th>'+
                            '<th>ApellidoMaterno</th>'+
                            '<th>Email</th>'+
                        '</tr>';

                for(var i=0;i<datos.length;i++){
                    HTML = HTML + '<tr>';
                    HTML = HTML + '<td>'+datos[i].IdAlumno+'</td>';
                    HTML = HTML + '<td>'+datos[i].Nombre+'</td>';
                    HTML = HTML + '<td>'+datos[i].ApellidoPaterno+'</td>';
                    HTML = HTML + '<td>'+datos[i].ApellidoMaterno+'</td>';
                    HTML = HTML + '<td>'+datos[i].Email+'</td>';
                    var editar='/sistemadocente/alumno/editar/'+datos[i].IdAlumno;
                    var eliminar='/sistemadocente/alumno/eliminar/'+datos[i].IdAlumno;
                    HTML = HTML + '<td> <a href="javascript:void(0)" onclick="editar(\''+editar+'\')" class="imgedit"></a>';
                    HTML = HTML + '<a href="javascript:void(0)" onclick="eliminar(\''+eliminar+'\')" class="imgdelete"></a>';
                    HTML = HTML + '<a href="javascript:void(0)" class="imgview" onclick="ver(\''+datos[i].IdAlumno+'\')"></a>';
                    HTML = HTML + '</td>';
                    HTML = HTML + '</tr>';
                }
                HTML = HTML + '</table>'
                $("#grilla").html(HTML);
                $(".tabgrilla").kendoGrid({
                    dataSource: {
                        pageSize: 7
                    },
                    pageable: true,
                    columns: [{field:"IdAlumno", width:6},
                        {field:"Nombre", width:15},
                        {field:"ApellidoPaterno", width:15},
                        {field:"ApellidoMaterno", width:15},
                        {field:"Email", width:15}
                      ]
                });
            },'json');
        }
        $("#buscar").keypress(function(event){
           if(event.which == 13){
               buscar();
           } 
        });
        
        $("#btn_buscar").click(function(){
            buscar();
            $("#buscar").focus();
        });
       
       //ver alumno
       function salir(){
            $("#vtna_ver_alumno").fadeOut(300);
            $("#fondooscuro").fadeOut(300);
       }
       $("#aceptar").live('click',function(){
           salir();
            $("#buscar").focus();
       });
        document.onkeydown = function(evt) {
            evt = evt || window.event;
            if (evt.keyCode == 27) {
                salir();
                $("#buscar").focus();
            }
        };
    });
       function ver(id){
           $.post('/sistemadocente/alumno/ver','IdAlumno='+id,function(datos){
               html= '<h3>Datos del Alumno "'+datos[0]['IdALumno']+'"</h3>';
               html+='<table>';
               html+= '<tr>';
               html+= '<td>Nombre:</td>';
               html+= '<td>'+datos[0]['Nombre']+'</td>';
               html+= '</tr>';
               html+= '<tr>';
               html+= '<td>Apellido Paterno:</td>';
               html+= '<td>'+datos[0]['ApellidoPaterno']+'</td>';
               html+= '</tr>';
               html+= '<tr>';
               html+= '<td>Apellido Materno:</td>';
               html+= '<td>'+datos[0]['ApellidoMaterno']+'</td>';
               html+= '</tr>';

               html+= '<td>Email:</td>';
               html+= '<td>'+datos[0]['Email']+'</td>';
               html+= '</tr>';

               html+= '</table>';
               html+= '<p align="center"><input type="button" class="k-button" value="Aceptar" id="aceptar"/></p>';
               $("#vtna_ver_alumno").html(html);
            $("#vtna_ver_alumno").fadeIn(300);
            $("#fondooscuro").fadeIn(300);
           },'json');
       }