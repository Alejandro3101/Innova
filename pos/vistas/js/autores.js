/*=============================================
EDITAR AUTORES
=============================================*/
$(".btnEditarAutores").click(function () {
    var Autorid = $(this).attr("Autorid");

    var  datos = new FormData();
    datos.append("Autorid",Autorid);

    $.ajax({
        url:"ajax/autores.ajax.php",
        method:"POST",
        data: datos,
        cache: false,
        contentType:false,
        processData:false,
        dataType:"json",
        success:function (respuesta) {  
            $("#editarid_autor").val(respuesta["id_autor"]);
            $("#editarnombres").val(respuesta["nombres"]);
            $("#editarapellidos").val(respuesta["apellidos"]);
            $("#editartipo_documento").html(respuesta["tipo_documento"]);
            $("#editartipo_documento").val(respuesta["tipo_documento"]);
            $("#editardocumento").val(respuesta["documento"]);
            $("#editaremail").val(respuesta["email"]);
            $("#editarcelular").val(respuesta["celular"]);
        }
    })
})

/*=============================================
ELIMINAR TAREAS
=============================================*/
$(".btnEliminarAutores").click(function () {

    var id_autor = $(this).attr("idAutor");

    swal({
        title: '¿Está seguro de borrar el Autor?',
        text: "¡Si no lo está puede cancelar la accíón!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar Autor!'
    }).then((result)=>{
        if (result.value) {
            
            $.ajax({
                url:"ajax/autores.ajax.php?d="+id_autor,
                method:"GET",
                dataType: "json",
                success : function(respuesta){
                    window.location = "autor";      
                }
            });
        }
    })
})