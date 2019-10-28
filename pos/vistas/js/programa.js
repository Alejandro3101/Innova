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
ELIMINAR PROGRAMA
=============================================*/
$(".btnEliminarPrograma").click(function () {

    var id_programa = $(this).attr("idPrograma");

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
                url:"ajax/programa.ajax.php?d="+id_programa,
                method:"GET",
                dataType: "json",
                success : function(respuesta){
                    window.location = "programa";      
                }
            });
        }
    })
})