$(".nuevocodigodiv").height(0);
$(".tipoProyecto").change(function(){
    if($(this).val()=='Sin Recursos'){
        $(".nuevocodigodiv").addClass('invisible');
        $(".nuevocodigodiv").height(0);
    }else if($(this).val()=='Con Recursos'){
        $(".nuevocodigodiv").height(45.5);
        $(".nuevocodigodiv").removeClass('invisible');
    }
});

/*=============================================
ELIMINAR prestamo
=============================================*/
$(".btnEliminarProyecto").click(function () {

    var id_proyecto = $(this).attr("id_proyecto");

    swal({
        title: '¿Está seguro de borrar el proyecto?',
        text: "¡Si no lo está puede cancelar la accíón!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar Proyecto!'
    }).then((result)=>{

        if(result.value){

            window.location = "index.php?ruta=proyecto&id_proyecto="+id_proyecto;

        }

    })

})