/*=============================================
EDITAR AULA
=============================================*/
$(".btnEditarEmpresa").click(function () {

    var id_empresa = $(this).attr("id_empresa");

    var  datos = new FormData();
    datos.append("id_empresa",id_empresa);

    $.ajax({
        url:"ajax/empresa.ajax.php",
        method:"POST",
        data: datos,
        cache: false,
        contentType:false,
        processData:false,
        dataType:"json",
        success:function (respuesta) {

            console.log("respuesta",respuesta);

            $("#editarNombreE").val(respuesta["nombre_empresa"]);
            $("#editarnit").val(respuesta["nit"]);
            $("#editardireccion").val(respuesta["direccion"]);
            $("#editartelefono").val(respuesta["telefono"]);
            $("#editarencargado").val(respuesta["encargado"]);
            $("#editarcelular").val(respuesta["celular"]);
            $("#editartipo_empresa option[value='"+respuesta["tipo_empresa"]+"']").attr("selected",true);
            $("#editarsector option[value='"+respuesta["sector"]+"']").attr("selected",true);


        }

    })

})

/*=============================================
ELIMINAR prestamo
=============================================*/
$(".btnEliminarEmpresa").click(function () {

    var id_empresa = $(this).attr("id_empresa");

    swal({
        title: '¿Está seguro de borrar la empresa?',
        text: "¡Si no lo está puede cancelar la accíón!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar empresa!'
    }).then((result)=>{

        if(result.value){

            window.location = "index.php?ruta=empresas&id_empresa="+id_empresa;

        }

    })

})