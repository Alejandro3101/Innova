<?php
require_once "../controladores/tareas.controlador.php";
require_once "../modelos/tareas.modelo.php";

class AjaxTareas{
    /*=============================================
    EDITAR TAREAS
    =============================================*/

    public $Tareaid;

    public function ajaxEditarTareas(){

        $item = "id_tarea";
        $valor = $this->Tareaid;

        $respuesta = ControladorTareas::ctrMostrarTareas($item, $valor);

        echo json_encode($respuesta);

    }

    /*=============================================
    ELIMINAR GASTOS
    =============================================*/
    public function EliminarDatosTarea($idE){
        $oBJECT_ELIM = ControladorTareas::CrtEliminarTarea($idE);
    }
}

/*=============================================
EDITAR TAREAS
=============================================*/
if(isset($_POST["Tareaid"])){

    $editar = new AjaxTareas();
    $editar ->Tareaid=$_POST["Tareaid"];
    $editar -> ajaxEditarTareas();
}

/*=============================================
ELIMINAR GASTOS   
=============================================*/
if(isset($_GET["d"])){
	$oBJECT_ELIM = new AjaxTareas();
    $oBJECT_ELIM ->EliminarDatosTarea($_GET["d"]);
}
