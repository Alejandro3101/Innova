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

/*
            $("#editarNombreAct").val(respuesta["nombre_actividad"]);

            $("#editardescripcion").val(respuesta["nombre_tarea"]);

            $("#editarFechainicio").val(respuesta["descripcion"]);

            $("#editarfechalimite").val(respuesta["estado"]);

            $("#editarestado").val(respuesta["estado"]);

            $("#editarestado").html(respuesta["estado"]);

            $("#editarproyecto").val(respuesta["id_actividad"]);

*/



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
