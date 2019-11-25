/*=============================================
EDITAR GASTO
=============================================*/
$(".btnEditarGastos").click(function () {
    
    var Gastosid = $(this).attr("Gastosid");

    var  datos = new FormData();
    datos.append("Gastosid",Gastosid);

    $.ajax({
        url:"ajax/gastos.ajax.php",
        method:"POST",
        data: datos,
        cache: false,
        contentType:false,
        processData:false,
        dataType:"json",
        success:function (respuesta) {

            $("#editarid_gasto").val(respuesta["id_gasto"]);
            $("#editarconcepto").val(respuesta["concepto"]);
            $("#editarvalor_gasto").val(respuesta["valor_gasto"]);
            // $("#editarEstado").val(respuesta["Estado"]);
        }
    })  
})

/*=============================================
ELIMINAR GASTOS
=============================================*/
$(".btnEliminarGastos").click(function () {

    var id_gasto = $(this).attr("idGastos");

    swal({
        title: '¿Está seguro de borrar el Gasto?',
        text: "¡Si no lo está puede cancelar la accíón!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar Gasto!'
    }).then((result)=>{
        if (result.value) {
            
            $.ajax({
                url:"ajax/gastos.ajax.php?d="+id_gasto,
                method:"GET",
                dataType: "json",
                success : function(respuesta){
                    window.location = "gasto";      
                }
            });
        }
    })
})