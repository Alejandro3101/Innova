/*=============================================
EDITAR EVIDENCIAS
=============================================*/
$(".btnEditar").click(function () {
    var Gastosid = $(this).attr("Gastosid");

    var  datos = new FormData();
    datos.append("Gastosid",Gastosid);

    $.ajax({
        url:"ajax/evidencias.ajax.php",
        method:"POST",
        data: datos,
        cache: false,
        contentType:false,
        processData:false,
        dataType:"json",
        success:function (respuesta) {  
            $("#editarid_evidencia").val(respuesta["id_evidencia"]);
            $("#editartipo").html(respuesta["tipo"]);
            $("#editartipo").val(respuesta["tipo"]);
            $("#editarevidencias").val(respuesta["evidencias"]);
            $("#editarid_tarea").val(respuesta["id_tarea"]);
        }
    })
})
/*=============================================
ELIMINAR EVIDENCIA
=============================================*/
$(".btnEliminarEvidencia").click(function () {
    var id_evidencia = $(this).attr("idGastos");

    swal({
        title: '¿Está seguro de borrar el usuario?',
        text: "¡Si no lo está puede cancelar la accíón!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar Evidencias!'
    }).then((result)=>{
        if (result.value) {
            
            $.ajax({
                url:"ajax/evidencias.ajax.php?d="+id_evidencia,
                method:"GET",
                dataType: "json",
                success : function(respuesta){
                    window.location = "evidencia";      
                }
            });
        }
    })
})