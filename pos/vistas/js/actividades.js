/*=============================================
ELIMINAR TAREAS
=============================================*/
$(".btnEliminarActividades").click(function () {

    var id_empresa = $(this).attr("id_empresa");

    swal({
        title: '¿Está seguro de borrar el Integrante?',
        text: "¡Si no lo está puede cancelar la accíón!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar Integrante!'
    }).then((result)=>{
        if (result.value) {

            $.ajax({
                url:"ajax/empresas.ajax.php?d="+id_empresa,
                method:"GET",
                dataType: "json",
                success : function(respuesta){
                    window.location = "integrante";
                }
            });
        }
    })
})

