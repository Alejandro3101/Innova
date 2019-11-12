/*=============================================
ELIMINAR prestamo
=============================================*/
$(".btnEliminarIntegrantes").click(function () {

    var id_integrante = $(this).attr("id_integrante");

    swal({
        title: '¿Está seguro de borrar Integrante?',
        text: "¡Si no lo está puede cancelar la accíón!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar Integrante!'
    }).then((result)=>{

        if(result.value){

            window.location = "index.php?ruta=integrante&id_integrante="+id_integrante;

        }

    })

})
