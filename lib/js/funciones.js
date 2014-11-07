// JavaScript Document

$(document).ready(function(){
    $("#menu").kendoMenu();
    var validator = $("#frm").kendoValidator();
    $(".datepicker").kendoDatePicker({
        format: "dd-MM-yyyy"
    });
    $(".horayfecha").kendoDateTimePicker({
        format: "dd-MM-yyyy HH:mm"
    });
    $(".combo").kendoComboBox();
    $("#panelbar").kendoPanelBar({
        expandMode: "single"
    });
    $(".imgedit").attr("title","Editar");
    $(".imgdelete").attr("title","Eliminar");
    $(".imgselect").attr("title","Seleccionar");
    $(".imgview").attr("title","Ver");
    $(".imgconfirm").attr("title","Confirmar");
    $(".search").attr("title","Buscar");
    $(".plus").attr("title","Nuevo");
    $(".print").attr("title","Imprimir");
    $(".imgcronog").attr("title","Cronograma");
    $(".imgamort").attr("title","Amortizar");
    $(".list").kendoDropDownList();
    $(".cantidad").kendoNumericTextBox({
        decimals:0,
        min: 1
    });
    $(".precio").kendoNumericTextBox({
        min: 0.01,
        format: "c" 
    });
    $(".descuento").kendoNumericTextBox({
        format: "p0",
        min: 0,
        max: 1,
        step: 0.01
    });
    $("#btn_asignar_tipo_habitacion").click(function(){
        var pwd = $(this).next().html();
        $("#ventana_tipo_habitacion").fadeIn(300);
        $("#fondoclaro").fadeIn(300);
    });
    $("#cancela_tmphabitacion").click(function(){
        $("#ventana_tipo_habitacion").fadeOut(300);
        $("#fondoclaro").fadeOut(300);
    });
});

function estilos_vistas(){
    estilos_vistas.prototype.kendo_grilla = function (){
         $(document).ready(function(){
            $(".tabgrilla").kendoGrid({
                dataSource: {
                pageSize: 7
            },
            pageable: true,
            columns: [{field:"Codigo", width:8},
                {field:"Descripcion", width:80},
                {field:"Acciones", width:10,attributes:{class:"acciones"}}]
            });
        })
    }
}