function ocultar() {
    $(".nuevaprofesionv").addClass('invisible');
    $(".nuevoTvinculacionv").addClass('invisible');
    $(".nuevoCvlacv").addClass('invisible');
    $(".nuevoCargov").addClass('invisible');
    $(".nuevaFichav").addClass('invisible');
    $(".nuevaFechaVinculacionv").addClass('invisible');
    $(".nuevafechaDesvinculacionv").addClass('invisible');
    $(".nuevoestadov").addClass('invisible');
    $(".nuevoid_programav").addClass('invisible');
    $(".nuevaprofesionv").height(0);
    $(".nuevoTvinculacionv").height(0);
    $(".nuevoCvlacv").height(0);
    $(".nuevoCargov").height(0);
    $(".nuevaFichav").height(0);
    $(".nuevaFechaVinculacionv").height(0);
    $(".nuevafechaDesvinculacionv").height(0);
    $(".nuevoestadov").height(0);
    $(".nuevoid_programav").height(0);
}
ocultar();
$(".nuevoid_rol").change(function(){
    ocultar();
    if($('.nuevoid_rol option:selected').attr("nom")=='Administrador'||$('.nuevoid_rol option:selected').attr("nom")=='Instructor'){
        $(".nuevaprofesionv").removeClass('invisible');
        $(".nuevoTvinculacionv").removeClass('invisible');
        $(".nuevoCvlacv").removeClass('invisible');
        $(".nuevaFechaVinculacionv").removeClass('invisible');
        $(".nuevafechaDesvinculacionv").removeClass('invisible');
        $(".nuevoestadov").removeClass('invisible');
        $(".nuevaprofesionv").height(45.5);
        $(".nuevoTvinculacionv").height(45.5);
        $(".nuevoCvlacv").height(45.5);
        $(".nuevaFechaVinculacionv").height(69.4);
        $(".nuevafechaDesvinculacionv").height(69.4);
        $(".nuevoestadov").height(45.5);
    }else if ($('.nuevoid_rol option:selected').attr("nom")=='Aprendiz'){
        $(".nuevoCargov").removeClass('invisible');
        $(".nuevaFichav").removeClass('invisible');
        $(".nuevaFechaVinculacionv").removeClass('invisible');
        $(".nuevafechaDesvinculacionv").removeClass('invisible');
        $(".nuevoestadov").removeClass('invisible');
        $(".nuevoid_programav").removeClass('invisible');
        $(".nuevoCargov").height(45.5);
        $(".nuevaFichav").height(45.5);
        $(".nuevoCvlacv").height(45.5);
        $(".nuevaFechaVinculacionv").height(69.4);
        $(".nuevafechaDesvinculacionv").height(69.4);
        $(".nuevoestadov").height(45.5);
        $(".nuevoid_programav").height(58.3);
    }else{
        ocultar();
    }
});
$(".btnEditarUsuario").click(function () {
    var Usuarioid = $(this).attr("Usuarioid");

    var  datos = new FormData();
    datos.append("Usuarioid",Usuarioid);

    $.ajax({
        url:"ajax/usuario.ajax.php",
        method:"POST",
        data: datos,
        cache: false,
        contentType:false,
        processData:false,
        dataType:"json",
        success:function (respuesta) {  
            $("#editarid_persona").val(respuesta["id_persona"]);
            $("#editarnombres").val(respuesta["nombres"]);
            $("#editarapellidos").val(respuesta["apellidos"]);
            $("#editartipo_documento").val(respuesta["tipo_documento"]);
            $("#editardocumento").val(respuesta["documento"]);
            $("#editarcelular").val(respuesta["celular"]);
            $("#editaremail").val(respuesta["email"]);
            $("#editarprofesion").val(respuesta["profesion"]);
            $("#editartipo_vinculacion").val(respuesta["tipo_vinculacion"]);
            $("#editarid_rol").val(respuesta["id_rol"]);
            $("#editarcvlac").val(respuesta["cvlac"]);
            $("#editarcargo").val(respuesta["cargo"]);
            $("#editarficha").val(respuesta["ficha"]);
            $("#editarfecha_vinculacion").val(respuesta["fecha_vinculacion"]);
            $("#editarfecha_desvinculacion").val(respuesta["fecha_desvinculacion"]);
            $("#editarestado_vinculacion").val(respuesta["estado_vinculacion"]);
            $("#editarcontrasena").val(respuesta["contrasena"]);
            $("#editarid_programa").val(respuesta["id_programa"]);
        }
    })
})
/*=============================================
    ELIMINAR USUARIOS
=============================================*/
$(".btnEliminarUsuario").click(function () {

    var id_persona = $(this).attr("idUsuario");

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
                url:"ajax/usuario.ajax.php?d="+id_persona,
                method:"GET",
                dataType: "json",
                success : function(respuesta){
                    window.location = "usuarios";      
                }
            });
        }
    })
});