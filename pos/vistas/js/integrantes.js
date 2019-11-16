/*=============================================
EDITAR TAREAS
=============================================*/
$(".btnEditarIntegrante").click(function () {
    var id_integrante = $(this).attr("id_integrante");



    var  datos = new FormData();
    datos.append("id_integrante",id_integrante);

    $.ajax({
        url:"ajax/integrantes.ajax.php",
        method:"POST",
        data: datos,
        cache: false,
        contentType:false,
        processData:false,
        dataType:"json",
        success:function (respuesta) {

            console.log("respuesta",respuesta);


        }
    })
})

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
