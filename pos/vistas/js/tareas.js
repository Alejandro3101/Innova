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
            $("#editarfecha_inicio").val(respuesta["fecha_inicio"]);
            $("#editarfecha_limite").val(respuesta["fecha_limite"]);
            $("#editarestado option[value='"+respuesta["estado"]+"']").attr("selected",true);
            $("#editarid_integrante option[value='"+respuesta["id_integrante"]+"']").attr("selected",true);

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
                                    "<p> Integrantes : "+respuesta.data[i][6]+"</p>"+
                                    "<div class='btn-groupx'>"+
                                        "<button style = 'border-radius : 50px; float:left; type='button' class='btn btn-danger'>"+
                                            "<span class='glyphicon glyphicon-time' aria-hidden='true'></span> "+respuesta.data[i][4]+""+
                                        "</button>"+
                                        "<button style = 'border-radius : 50px; float:right; type=button' class='btn btn-primary btnIntegrantes' Tareaid ='"+respuesta.data[i][0]+"' data-toggle='modal' data-target='#TareaIntegrante'>"+
                                            "<span class='glyphicon glyphicon-plus' aria-hidden='true'></span>"+
                                        "</button>"+
                                    "</div>"+
                                "</div>"+
                            "</div>"+
                            "<br>";                    
                    if(respuesta.data[i][5]=='Por Hacer'){
                        $(".PorHacer").append(code);                        
                    }else if(respuesta.data[i][5]=='En Proceso'){
                        $(".EnProceso").append(code);
                    }else if(respuesta.data[i][5]=='En Revision'){
                        $(".EnRevision").append(code);
                    }else if(respuesta.data[i][5]=='Hecho'){
                        $(".Hecho").append(code);                        
                    }
                    
                }                
            }
        }
    });
}

listaTarea();
$(".container").on("click",".btnIntegrantes",function(){
    var IdTarea = $(this).attr("Tareaid");
    $("#TareaIdCreate").val(IdTarea);
    var  datos = new FormData();
    datos.append("IdTarea",IdTarea);
    $.ajax({
        url:"ajax/tareaintegrante.ajax.php?a=listaIntegrantes",
        method:"GET",
        cache: false,
        dataType:"json",
        success:function(respuesta){
            $("#selectintegrantes").empty();
            $("#selectintegrantes").append("<option value=''>Seleccione el Integrante.</option>");
            for(var i = 0;i<respuesta.data.length;i++){
                if (respuesta.data[i][0].length > 0 && respuesta.data[i][1].length > 0 && respuesta.data[i][2].length > 0){
                    $("#selectintegrantes").append("<option value='"+respuesta.data[i][0]+"'>"+respuesta.data[i][1]+" "+respuesta.data[i][2]+"</option>"); 
                }                              
            }
            $("#selectintegrantes").change();
            $("#selectintegrantes").select2();
        }
    });
    $.ajax({
        url:"ajax/tareaintegrante.ajax.php?a=listaTareaIntegrantes",
        method:"POST",
        data:datos,
        cache:false,
        contentType:false,
        processData:false,
        dataType:"json",
        success:function(respuesta){
            $(".container-integrante").empty();
            for(var i = 0;i<respuesta.data.length;i++){
                if (respuesta.data[i][0].length > 0 && respuesta.data[i][1].length > 0 && respuesta.data[i][2].length > 0){
                    $(".container-integrante").append("<div class='row p-3 mb-2 bg-light text-dark' style='padding:8px;'><h4 class = 'nombreIntegrante' style = 'float:left;'>"+respuesta.data[i][1]+" "+respuesta.data[i][2]+"</h4> <button style = 'border-radius : 50px; float:right;' class='btn btn-danger btnBorrarTareaIntegrante' idTareaIntegrante='"+respuesta.data[i][0]+"'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></button></div>"); 
                }                              
            }
        }
    });
});
$(".btnInsertarTareaIntegrante").click(function(){
    var IdTarea = $("#TareaIdCreate").val();
    var IdIntegrante = $("#selectintegrantes").val();
    var  datos = new FormData();
    datos.append("IdTarea",IdTarea);
    datos.append("IdIntegrante",IdIntegrante);
    $.ajax({
        url:"ajax/tareaintegrante.ajax.php?a=crear",
        method:"POST",
        data:datos,
        cache:false,
        contentType:false,
        processData:false,
        dataType:"json",
        success:function(respuesta){
            if(respuesta==true){
                window.location = "tarea";
            }
        }
    });
});
$('.container-integrante').on('click','.btnBorrarTareaIntegrante',function(){
    var IdTareaIntegrante = $(this).attr("idTareaIntegrante");
    var  datos = new FormData();
    datos.append("IdTareaIntegrante",IdTareaIntegrante);
    $.ajax({
        url:"ajax/tareaintegrante.ajax.php?a=eliminar",
        method:"POST",
        data:datos,
        cache:false,
        contentType:false,
        processData:false,
        dataType:"json",
        success:function(respuesta){
            if(respuesta==true){
                window.location = "tarea";
            }
        }
    });
});
$("#selectintegrantes").select2();
});