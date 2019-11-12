/*=============================================
EDITAR PROGRAMA
=============================================*/
$(".btnEditarPrograma").click(function () {
    
    var Programaid = $(this).attr("Programaid");

    var  datos = new FormData();
    datos.append("Programaid",Programaid);

    $.ajax({
        url:"ajax/programa.ajax.php",
        method:"POST",
        data: datos,
        cache: false,
        contentType:false,
        processData:false,
        dataType:"json",
        success:function (respuesta) {

            $("#editarid_programa").val(respuesta["id_programa"]);
            $("#editarnombre_programa").val(respuesta["nombre_programa"]);
            // $("#editarEstado").val(respuesta["Estado"]);
        }
    })  
})

/*=============================================
ELIMINAR Programas
=============================================*/
$(".btnEliminarPrograma").click(function () {

    var id_programa = $(this).attr("id_programa");

    swal({
        title: '¿Está seguro de borrar el Programa?',
        text: "¡Si no lo está puede cancelar la accíón!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar Programa!'
    }).then((result)=>{

        if(result.value){

            window.location = "index.php?ruta=programa&id_programa="+id_programa;

        }

    })

})