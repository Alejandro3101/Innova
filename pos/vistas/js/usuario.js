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
    $("#nuevoid_programa").val("NULL");
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
function ocultarEdit() {
    $(".nuevaprofesionvEdit").addClass('invisible');
    $(".nuevoTvinculacionvEdit").addClass('invisible');
    $(".nuevoCvlacvEdit").addClass('invisible');
    $(".nuevoCargovEdit").addClass('invisible');
    $(".nuevaFichavEdit").addClass('invisible');
    $(".nuevaFechaVinculacionvEdit").addClass('invisible');
    $(".nuevafechaDesvinculacionvEdit").addClass('invisible');
    $(".nuevoestadovEdit").addClass('invisible');
    $(".nuevoid_programavEdit").addClass('invisible');
    $(".nuevaprofesionvEdit").height(0);
    $(".nuevoTvinculacionvEdit").height(0);
    $(".nuevoCvlacvEdit").height(0);
    $(".nuevoCargovEdit").height(0);
    $(".nuevaFichavEdit").height(0);
    $(".nuevaFechaVinculacionvEdit").height(0);
    $(".nuevafechaDesvinculacionvEdit").height(0);
    $(".nuevoestadovEdit").height(0);
    $(".nuevoid_programavEdit").height(0);
}
ocultarEdit();
$("#editartipo_rol").change(function(){
    $("#editarid_programa").val("NULL");
    ocultarEdit();
    if($('#editartipo_rol option:selected').attr("nom")=='Administrador'||$('#editartipo_rol option:selected').attr("nom")=='Instructor'){
        $(".nuevaprofesionvEdit").removeClass('invisible');
        $(".nuevoTvinculacionvEdit").removeClass('invisible');
        $(".nuevoCvlacvEdit").removeClass('invisible');
        $(".nuevaFechaVinculacionvEdit").removeClass('invisible');
        $(".nuevafechaDesvinculacionvEdit").removeClass('invisible');
        $(".nuevoestadovEdit").removeClass('invisible');
        $(".nuevaprofesionvEdit").height(45.5);
        $(".nuevoTvinculacionvEdit").height(45.5);
        $(".nuevoCvlacvEdit").height(45.5);
        $(".nuevaFechaVinculacionvEdit").height(69.4);
        $(".nuevafechaDesvinculacionvEdit").height(69.4);
        $(".nuevoestadovEdit").height(45.5);
    }else if ($('#editartipo_rol option:selected').attr("nom")=='Aprendiz'){
        $(".nuevoCargovEdit").removeClass('invisible');
        $(".nuevaFichavEdit").removeClass('invisible');
        $(".nuevaFechaVinculacionvEdit").removeClass('invisible');
        $(".nuevafechaDesvinculacionvEdit").removeClass('invisible');
        $(".nuevoestadovEdit").removeClass('invisible');
        $(".nuevoid_programavEdit").removeClass('invisible');
        $(".nuevoCargovEdit").height(45.5);
        $(".nuevaFichavEdit").height(45.5);
        $(".nuevoCvlacvEdit").height(45.5);
        $(".nuevaFechaVinculacionvEdit").height(69.4);
        $(".nuevafechaDesvinculacionvEdit").height(69.4);
        $(".nuevoestadovEdit").height(45.5);
        $(".nuevoid_programavEdit").height(58.3);
    }else{
        ocultarEdit();
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
            $("#editartipo_rol option[value='"+respuesta["id_rol"]+"']").attr("selected",true);
            $("#editartipo_documento option[value='"+respuesta["tipo_documento"]+"']").attr("selected",true);
            $("#editardocumento").val(respuesta["documento"]);
            $("#editarcelular").val(respuesta["celular"]);
            $("#editaremail").val(respuesta["email"]);
            $("#editarprofesion").val(respuesta["profesion"]);
            $("#editartipo_vinculacion").val(respuesta["tipo_vinculacion"]);
            $("#editarcvlac").val(respuesta["cvlac"]);
            $("#editarcargo").val(respuesta["cargo"]);
            $("#editarficha").val(respuesta["ficha"]);
            $("#editarfecha_vinculacion").val(respuesta["fecha_vinculacion"]);
            $("#editarfecha_desvinculacion").val(respuesta["fecha_desvinculacion"]);
            $("#editarestado_vinculacion").val(respuesta["estado_vinculacion"]);
            $("#editarcontrasena").val(respuesta["contrasena"]);
            $("#editarid_programa").val(respuesta["id_programa"]);
            ocultarEdit();
            if($('#editartipo_rol option:selected').attr("nom")=='Administrador'||$('.nuevoid_rol option:selected').attr("nom")=='Instructor'){
                $(".nuevaprofesionvEdit").removeClass('invisible');
                $(".nuevoTvinculacionvEdit").removeClass('invisible');
                $(".nuevoCvlacvEdit").removeClass('invisible');
                $(".nuevaFechaVinculacionvEdit").removeClass('invisible');
                $(".nuevafechaDesvinculacionvEdit").removeClass('invisible');
                $(".nuevoestadovEdit").removeClass('invisible');
                $(".nuevaprofesionvEdit").height(45.5);
                $(".nuevoTvinculacionvEdit").height(45.5);
                $(".nuevoCvlacvEdit").height(45.5);
                $(".nuevaFechaVinculacionvEdit").height(69.4);
                $(".nuevafechaDesvinculacionvEdit").height(69.4);
                $(".nuevoestadovEdit").height(45.5);
            }else if ($('#editartipo_rol option:selected').attr("nom")=='Aprendiz'){
                $(".nuevoCargovEdit").removeClass('invisible');
                $(".nuevaFichavEdit").removeClass('invisible');
                $(".nuevaFechaVinculacionvEdit").removeClass('invisible');
                $(".nuevafechaDesvinculacionvEdit").removeClass('invisible');
                $(".nuevoestadovEdit").removeClass('invisible');
                $(".nuevoid_programavEdit").removeClass('invisible');
                $(".nuevoCargovEdit").height(45.5);
                $(".nuevaFichavEdit").height(45.5);
                $(".nuevoCvlacvEdit").height(45.5);
                $(".nuevaFechaVinculacionvEdit").height(69.4);
                $(".nuevafechaDesvinculacionvEdit").height(69.4);
                $(".nuevoestadovEdit").height(45.5);
                $(".nuevoid_programavEdit").height(58.3);
            }else{
                ocultarEdit();
            }
        }
    })
})
/*=============================================
    ELIMINAR USUARIOS
=============================================*/

$(".btnEliminarUsuario").click(function () {

    var id_persona = $(this).attr("id_persona");

    swal({
        title: '¿Está seguro de borrar este Usuario?',
        text: "¡Si no lo está puede cancelar la accíón!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar Usuario!'
    }).then((result)=>{

        if(result.value){

            window.location = "index.php?ruta=usuarios&id_persona="+id_persona;

        }

    })

})