$(document).ready(function(){/*=============================================
EDITAR TAREAS
=============================================*/

$(".container").on('click','.btnEditarTareas', function(){
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
            $("#editarid_integrante").val(respuesta["id_integrante"]);
        }
    })
});

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
            $(".PorHacer").empty();
            $(".EnProceso").empty();
            $(".EnRevision").empty();
            $(".Hecho").empty();
            for(var i = 0;i<respuesta.data.length;i++){
                if (respuesta.data[i][0].length > 0 && respuesta.data[i][1].length > 0 && respuesta.data[i][2].length > 0 && respuesta.data[i][3].length > 0){
                    var code = "";
                    code = "<div class='row'>"+
                                "<div class='col-md-12 col-lg-12 bg-info' style = 'padding-bottom : 7px; padding-top : 7px;'>"+
                                    "<h4 style = 'border-radius : 50px; float:left;'>"+respuesta.data[i][1]+"</h4>"+
                                    "<button  type='button' class='btn btn-success btnEditarTareas' Tareaid ='"+respuesta.data[i][0]+"' style = 'border-radius : 19px; float:right;' data-toggle='modal' data-target='#modaleditartarea'>"+
                                        "<span class='glyphicon glyphicon-pencil' aria-hidden='true'></span> Editar"+
                                    "</button>"+
                                    "<br style = 'clear: left;'>"+
                                    "<p>"+respuesta.data[i][2]+"</p>"+
                                    "<div class='btn-groupx'>"+
                                        "<button style = 'border-radius : 50px; float:left; type='button' class='btn btn-danger'>"+
                                            "<span class='glyphicon glyphicon-time' aria-hidden='true'></span> Date"+
                                        "</button>"+
                                        "<button style = 'border-radius : 50px; float:right; type=button' class='btn btn-primary' data-toggle='modal' data-target='#TareaIntegrante'>"+
                                            "<span class='glyphicon glyphicon-plus' aria-hidden='true'></span> Integrantes"+
                                        "</button>"+
                                    "</div>"+
                                "</div>"+
                            "</div>"+
                            "<br>";                    
                    if(respuesta.data[i][3]=='Por Hacer'){
                        $(".PorHacer").append(code);                        
                    }else if(respuesta.data[i][3]=='En Proceso'){
                        $(".EnProceso").append(code);
                    }else if(respuesta.data[i][3]=='En Revision'){
                        $(".EnRevision").append(code);
                    }else if(respuesta.data[i][3]=='Hecho'){
                        $(".Hecho").append(code);                        
                    }
                    
                }                
            }
        }
    });
}
listaTarea();
$("#selectintegrantes").select2();
});