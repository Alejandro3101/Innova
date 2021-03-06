/*=============================================
EDITAR RECURSOS
=============================================*/
$(".btnEditarRecursos").click(function () {
    var Recursosid = $(this).attr("Recursosid");

    var  datos = new FormData();
    datos.append("Recursosid",Recursosid);

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
            $("#editarid_proyecto option[value='"+respuesta["id_proyecto"]+"']").attr("selected",true);
        }
    })
})
/*=============================================
    ELIMINAR RECURSOS
=============================================*/
$(".btnEliminarRecursos").click(function () {

    var id_recurso = $(this).attr("idRecurso");

    swal({
        title: '¿Está seguro de borrar el Recurso?',
        text: "¡Si no lo está puede cancelar la accíón!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar recurso!'
    }).then((result)=>{
        if (result.value) {
            
            $.ajax({
                url:"ajax/recursos.ajax.php?d="+id_recurso,
                method:"GET",
                dataType: "json",
                success : function(respuesta){
                    window.location = "recurso";      
                }
            });
        }
    })
})

