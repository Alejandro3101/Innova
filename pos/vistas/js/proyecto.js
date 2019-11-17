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
EDITAR PROYECTO
=============================================*/
$(".btnEditarProyecto").click(function () {
    var Proyectoid = $(this).attr("Proyectoid");

    var  datos = new FormData();
    datos.append("Proyectoid",Proyectoid);

    $.ajax({
        url:"ajax/proyecto.ajax.php",
        method:"POST",
        data: datos,
        cache: false,
        contentType:false,
        processData:false,
        dataType:"json",
        success:function (respuesta) {

            $("#editarid_proyecto").val(respuesta["id_proyecto"]);
            $("#editarnombre_proyecto").val(respuesta["nombre_proyecto"]);
            $("#editartipo_proyecto").val(respuesta["tipo_proyecto"]);
            $("#editarcodigo").val(respuesta["codigo"]);
            $("#editarlinea_programatica").val(respuesta["linea_programatica"]);
            $("#editarclasificacion").val(respuesta["clasificacion"]);
            $("#editarformatos").val(respuesta["formatos"]);
            $("#editarestado_proyecto").val(respuesta["estado_proyecto"]);
            $("#editarfecha_cierre").val(respuesta["fecha_cierre"]);
            $("#editarid_empresa").val(respuesta["id_empresa"]);
        }
    })
})

/*=============================================
ELIMINAR PROYECTO
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