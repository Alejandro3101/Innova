/*=============================================
EDITAR actividades
=============================================*/
$(".btnEditarActividades").click(function () {
    var id_actividad = $(this).attr("id_actividad");

    var datos = new FormData();
    datos.append("id_actividad",id_actividad);

    $.ajax({
        url:"ajax/actividades.ajax.php",
        method:"POST",
        data: datos,
        cache: false,
        contentType:false,
        processData:false,
        dataType:"json",
        success:function (respuesta) {

            console.log("respuesta" ,respuesta);

            $("#editarIdAct").val(respuesta["id_actividad"]);

            $("#editarNombreAct").val(respuesta["nombre_actividad"]);

            $("#editardescripcion").val(respuesta["descripcion"]);

            $("#editarFechainicio").val(respuesta["fecha_inicio"]);

            $("#editarfechalimite").val(respuesta["fecha_limite"]);

            $("#editarestado option[value='"+respuesta["estado"]+"']").attr("selected",true);

            $("#editarproyecto option[value='"+respuesta["id_proyecto"]+"']").attr("selected",true);
        }
    })
})
/*=============================================
ELIMINAR Actividades
=============================================*/
$(".btnEliminarActividades").click(function () {

    var id_actividad = $(this).attr("id_actividad");

    swal({
        title: '¿Está seguro de borrar la Actividad?',
        text: "¡Si no lo está puede cancelar la accíón!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar Actividades!'
    }).then((result)=>{

        if(result.value){

            window.location = "index.php?ruta=actividades&id_actividad="+id_actividad;

        }

    })

})
/*=============================================
SESSION Actividades
=============================================*/
$(".btnTareasActividades").click(function () {
    var id_actividad = $(this).attr("id_actividad");
    var datos = new FormData();
    datos.append("id_actividad_session",id_actividad);

    $.ajax({
        url:"ajax/actividades.ajax.php?a=session",
        method:"POST",
        data: datos,
        cache: false,
        contentType:false,
        processData:false,
        dataType:"json",
        success:function (respuesta) {
            if(respuesta==true){
                window.location = "tarea";
            }
        }
    })
})