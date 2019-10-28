<?php
require_once "../controladores/evidencias.controlador.php";
require_once "../modelos/evidencias.modelo.php";

class AjaxGastos{

    /*=============================================
    EDITAR GASTOS
    =============================================*/

    public $Gastosid;

    public function ajaxEditarGastos(){

        $item = "id_evidencia";
        $valor = $this->Gastosid;

        $respuesta = evidenciacontroller::ctrMostrarEvidencia($item, $valor);
        echo json_encode($respuesta);
    }

    /*=============================================
    ELIMINAR GASTOS
    =============================================*/
    public function EliminarDatos($idE){
        $oBJECT_ELIM = evidenciacontroller::CrtEliminarEvidencia($idE);
    }
}

/*=============================================
EDITAR GASTOS   
=============================================*/
if(isset($_POST["Gastosid"])){

    $editar = new AjaxGastos();
    $editar ->Gastosid = $_POST["Gastosid"];
    $editar -> ajaxEditarGastos();
}

/*=============================================
ELIMINAR GASTOS   
=============================================*/
if(isset($_GET["d"])){
	$oBJECT_ELIM = new AjaxGastos();
    $oBJECT_ELIM ->EliminarDatos($_GET["d"]);
}
