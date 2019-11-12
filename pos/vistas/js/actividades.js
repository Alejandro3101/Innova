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
