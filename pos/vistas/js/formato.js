var idProyecto = 0;
$(".tablaFormato").DataTable({
    "ajax":"ajax/formato.ajax.php?a=listaFormatos&IdProyecto="+idProyecto,
    "deferRender":true,
    "retrieve":true,
    "processing":true,
    "language":{
        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ registros",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst":    "Primero",
            "sLast":     "Último",
            "sNext":     "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
    }
});
$(".tablaProyecto").on("click",".btnFormatos",function () {
    idProyecto = $(this).attr("idProyecto");
    $(".tablaFormato").DataTable().ajax.url("ajax/formato.ajax.php?a=listaFormatos&IdProyecto="+idProyecto).load();
    $('#nuevoFormatoProyecto').val(idProyecto);
});
$("#formFormatoCreate").on('submit', function(){
    var fechaActual = new Date();
    var Fecha = fechaActual.getFullYear()+'/'+parseInt(fechaActual.getMonth()+1) +'/'+fechaActual.getDate();
    var Proyecto = $('#nuevoFormatoProyecto').val();
    var Codigo = $('#nuevoFormatoCodigo').val();
    var Archivo = document.getElementById("nuevoFormatoArchivo").files[0];
    var oBJEC_ACUDI = new FormData();
    oBJEC_ACUDI.append("IdProyecto", Proyecto); 
    oBJEC_ACUDI.append("Fecha", Fecha); 
    oBJEC_ACUDI.append("IdCodigo", Codigo); 
    oBJEC_ACUDI.append("Archivo", Archivo); 
    $.ajax({
        url:"ajax/formato.ajax.php?a=crear",
        method:"POST",
        data:oBJEC_ACUDI,
        cache:false,
        contentType:false,
        processData:false,
        dataType:"json",
        success:function(respuesta){
            if(respuesta==true){
                window.location = "proyecto";
            }
        }
    });
    return false;
});