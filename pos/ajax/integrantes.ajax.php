<?php
require_once "../controladores/integrantes.controlador.php";
require_once "../modelos/integrantes.modelo.php";

class AjaxGastos{

    /*=============================================
    EDITAR GASTOS
    =============================================*/

    public $Gastosid;

    public function ajaxEditarGastos(){

        $item = "id_gasto";
        $valor = $this->Gastosid;

        $respuesta = gastocontroller::ctrMostrarGastos($item, $valor);
        echo json_encode($respuesta);
    }

    /*=============================================
    ELIMINAR GASTOS
    =============================================*/
    public function EliminarDatos($idE){
        $oBJECT_ELIM = gastocontroller::CrtEliminarGastos($idE);
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
