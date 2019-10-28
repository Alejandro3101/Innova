/*=============================================
EDITAR RECURSOS
=============================================*/
$(".btnEditarRecursos").click(function () {
    var Recursoid = $(this).attr("Recursoid");

    var  datos = new FormData();
    datos.append("Recursoid",Recursoid);

    $.ajax({
        url:"ajax/recursos.ajax.php",
        method:"POST",
        data: datos,
        cache: false,
        contentType:false,
        processData:false,
        dataType:"json",
        success:function (respuesta) {

            $("#editarid_recurso").val(respuesta["id_recurso"]);
            $("#editarrubro").val(respuesta["rubro"]);
            $("#editarconcepto").val(respuesta["concepto"]);
            $("#editarvalor_rubro").val(respuesta["valor_rubro"]);
            $("#editarvalor_proyecto").val(respuesta["valor_proyecto"]);
            $("#editarid_proyecto").html(respuesta["id_proyecto"]);
            $("#editarid_proyecto").val(respuesta["id_proyecto"]);
        }
    })
})

