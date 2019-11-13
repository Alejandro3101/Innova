/*=============================================
EDITAR TAREAS
=============================================*/
$(".btnEditarTareas").click(function () {
    var Tareaid = $(this).attr("Tareaid");

    var  datos = new FormData();
    datos.append("Tareaid",Tareaid);

    $.ajax({
        url:"ajax/tareas.ajax.php",
        method:"POST",
        data: datos,
        cache: false,
        contentType:false,
        processData:false,
        dataType:"json",
        success:function (respuesta) {


            $("#editarid_tarea").val(respuesta["id_tarea"]);
            $("#editarnombre_tarea").val(respuesta["nombre_tarea"]);
            $("#editardescripcion").val(respuesta["descripcion"]);
            $("#editarestado").html(respuesta["estado"]);
            $("#editarestado").val(respuesta["estado"]);
            $("#editarid_actividad").val(respuesta["id_actividad"]);
            $("#editarid_integrante").val(respuesta["id_integrante"]);

        }
    })
})

/*=============================================
ELIMINAR TAREAS
=============================================*/
$(".btnEliminarTarea").click(function () {

    var id_tarea = $(this).attr("idTarea");

    swal({
        title: '¿Está seguro de borrar el usuario?',
        text: "¡Si no lo está puede cancelar la accíón!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar usuario!'
    }).then((result)=>{
        if (result.value) {
            
            $.ajax({
                url:"ajax/tareas.ajax.php?d="+id_tarea,
                method:"GET",
                dataType: "json",
                success : function(respuesta){
                    window.location = "tarea";      
                }
            });
        }
    })
})