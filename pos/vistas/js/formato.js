var idProyecto = 0;
$(document).ready(function (){
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
    /*=============================================
    ELIMINAR FORMULARIO
    =============================================*/
    $(".tablaFormato").on("click",".btnEliminarFormato",function(){
        var id = $(this).attr("idformato");

        swal({
            title: '¿Está seguro de borrar el Formulario?',
            text: "¡Si no lo está puede cancelar la accíón!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Si, borrar Formulario!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url:"ajax/formato.ajax.php?d="+id,
                    method:"GET",
                    dataType: "json",
                    success : function(respuesta){
                        window.location = "proyecto";
                    }
                });
            }
        });         
    });
    $(".tablaFormato").on("click",".btnEditarFormato",function(){
        var id = $(this).attr("id_formato");
        oBJEC_DATA = new FormData();
        oBJEC_DATA.append("idU",id);
        $.ajax({
            url:"ajax/formato.ajax.php",
            method:"POST",
            data:oBJEC_DATA,
            cache:false,
            contentType:false,
            processData:false,
            dataType:"json",
            success:function(respuesta){
                $("#EditarFormatoProyecto").val(respuesta["id_proyecto"]);
                $("#EditarFormatoCodigo").val(respuesta["codigoformato"]);
                $("#EditarFormatoArchivo").val(respuesta["archivo"]);
                $("#btnModificarFormato").attr("id2",id);
            }
        })
    });
    $(".ModificarDatosFormato").on("click",".btnModificaDatosFormato",function(){
        var id= $(this).attr("id2");
        var id_proyecto=$("#EditarFormatoProyecto").val(); 
        var codigoformato=$("#EditarFormatoCodigo").val(); 
        var archivo=$("#EditarFormatoArchivo").val(); 

        var oBJEC_DATA = new FormData();
        oBJEC_DATA.append("id",id);
        oBJEC_DATA.append("id_proyecto",id_proyecto);
        oBJEC_DATA.append("codigoformato",codigoformato);
        oBJEC_DATA.append("archivo",archivo);
        
        $.ajax({
            url:"ajax/formato.ajax.php",
            method:"POST",
            data: oBJEC_DATA,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success : function(respuesta){
                swal({
                    type: "success",
                    title: "¡El Bus ha sido Actualizada correctamente!",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"

                }).then(function(result){
                    if(result.value){
                        window.location = "proyecto";  
                    }
                });   
            }
        });
    });
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
// $(".btnEliminarFormato").click(function(){
//     var id = $(this).attr("idformato");

//     swal({
//         title: '¿Está seguro de borrar el Formulario?',
//         text: "¡Si no lo está puede cancelar la accíón!",
//         type: 'warning',
//         showCancelButton: true,
//         confirmButtonColor: '#3085d6',
//         cancelButtonColor: '#d33',
//         cancelButtonText: 'Cancelar',
//         confirmButtonText: 'Si, borrar Formulario!'
//     }).then((result) => {
//         if (result.value) {
//             $.ajax({
//                 url:"ajax/formato.ajax.php?d="+id,
//                 method:"GET",
//                 dataType: "json",
//                 success : function(respuesta){
//                     window.location = "proyecto";
//                 }
//             });
//             return false;
//         }
//     })
// })




