<?php
require_once "../controladores/tareas.controlador.php";
require_once "../modelos/tareas.modelo.php";

class AjaxTareas{
    /*=============================================
        EDITAR TAREAS
    =============================================*/

    public  $Tareaid;

    public function ajaxEditarTareas(){

        $item = "id_tarea";
        $valor = $this->Tareaid;

        $respuesta = ControladorTareas::ctrMostrarTareas($item, $valor);

        echo json_encode($respuesta);

    }

    /*=============================================
    ELIMINAR TAREAS
    =============================================*/
    public function EliminarDatosTarea($idE){
        $oBJECT_ELIM = ControladorTareas::CrtEliminarTarea($idE);
    }
    /*=============================================
    LISTA TABLERO
    =============================================*/
    public function ListaDatosTarea(){
        $item = null;
        $valor = null;
        $objADMIN = ControladorTareas::ctrMostrarTareas($item, $valor);
        $oBJEC_JSON = '{
            "data": [';
                if (count($objADMIN) >= 1){
                    for ($i=0; $i < count($objADMIN); $i++) {
                        $oBJEC_JSON .= '[
                            "'.$objADMIN[$i]["id_tarea"].'",
                            "'.$objADMIN[$i]["nombre_tarea"].'",
                            "'.$objADMIN[$i]["descripcion"].'",
                            "'.$objADMIN[$i]["fecha_inicio"].'",
                            "'.$objADMIN[$i]["fecha_limite"].'",
                            "'.$objADMIN[$i]["estado"].'"
                        ],';
                    }
                }else{
                    $oBJEC_JSON .= '[
                        "",
                        "",
                        "",
                        "",
                        "",
                        ""
                    ],';
                }
                $oBJEC_JSON = substr($oBJEC_JSON,0,-1);
                $oBJEC_JSON .=']
            }';

            echo $oBJEC_JSON;
    }
}

/*=============================================
EDITAR TAREAS
=============================================*/
if(isset($_POST["Tareaid"])){
    $editar = new AjaxTareas();
    $editar->Tareaid = $_POST["Tareaid"];
    $editar -> ajaxEditarTareas();
}

/*=============================================
ELIMINAR TAREAS   
=============================================*/
if(isset($_GET["d"])){
	$oBJECT_ELIM = new AjaxTareas();
    $oBJECT_ELIM ->EliminarDatosTarea($_GET["d"]);
}
/*=============================================
ELIMINAR TAREAS   
=============================================*/
if(isset($_GET["a"])&&$_GET["a"]='lista'){
	$oBJECT_LIST = new AjaxTareas();
    $oBJECT_LIST ->ListaDatosTarea();
}
