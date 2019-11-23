/*=============================================
EDITAR TAREAS
=============================================*/
$(".btnEditarTareas").click(function () {
    var Tareaid = $(this).attr("Tareaid");

    var  datos = new FormData();
    datos.append("Tareaid",Tareaid);

    $.ajax({
        url:"ajax/tareas.ajax.php",
        method:"POST",
        data: datos,
        cache: false,
        contentType:false,
        processData:false,
        dataType:"json",
        success:function (respuesta) {


            $("#editarid_tarea").val(respuesta["id_tarea"]);
            $("#editarnombre_tarea").val(respuesta["nombre_tarea"]);
            $("#editardescripcion").val(respuesta["descripcion"]);
            $("#editarestado").html(respuesta["estado"]);
            $("#editarestado").val(respuesta["estado"]);
            $("#editarid_actividad").val(respuesta["id_actividad"]);
            $("#editarid_integrante").val(respuesta["id_integrante"]);

        }
    })
})

/*=============================================
ELIMINAR TAREAS
=============================================*/
$(".btnEliminarTarea").click(function () {

    var id_tarea = $(this).attr("idTarea");

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
                url:"ajax/tareas.ajax.php?d="+id_tarea,
                method:"GET",
                dataType: "json",
                success : function(respuesta){
                    window.location = "tarea";      
                }
            });
        }
    })
})

/*=============================================
CARGAR TAREAS EN DIV
=============================================*/

function listaTarea(){    
    $.ajax({
        url:"ajax/tareas.ajax.php?a=lista",
        method:"GET",
        dataType:"json",
        success:function(respuesta){
            for(var i = 0;i<respuesta.data.length;i++){
                if (respuesta.data[i][0].length > 0 && respuesta.data[i][1].length > 0 && respuesta.data[i][2].length > 0 && respuesta.data[i][3].length > 0){
                    var code = "";
                    if(respuesta.data[i][3]=='Por Hacer'){
                        alert( 'Por Hacer : '+respuesta.data[i][0]+" "+respuesta.data[i][1]+" "+respuesta.data[i][2]+" "+respuesta.data[i][3]);
                    }else if(respuesta.data[i][3]=='En Proceso'){
                        alert( 'En Proceso : '+respuesta.data[i][0]+" "+respuesta.data[i][1]+" "+respuesta.data[i][2]+" "+respuesta.data[i][3]);
                    }else if(respuesta.data[i][3]=='En Revision'){
                        alert( 'En Revision : '+respuesta.data[i][0]+" "+respuesta.data[i][1]+" "+respuesta.data[i][2]+" "+respuesta.data[i][3]);
                    }else if(respuesta.data[i][3]=='Hecho'){
                        alert( 'Hecho : '+respuesta.data[i][0]+" "+respuesta.data[i][1]+" "+respuesta.data[i][2]+" "+respuesta.data[i][3]);
                    }
                }                
            }
        }
    });
}
listaTarea();