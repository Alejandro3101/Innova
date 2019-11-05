<?php
require_once "../controladores/recursos.controlador.php";
require_once "../modelos/recursos.modelo.php";

class AjaxRecursos{
    /*=============================================
        EDITAR RECURSOS
    =============================================*/

    public $Recursosid;

    public function ajaxEditarRecursos(){

        $item = "id_recurso";
        $valor = $this->Recursosid;

        $respuesta = recursocontroller::ctrMostrarRecursos($item, $valor);

        echo json_encode($respuesta);

    }

    /*=============================================
        ELIMINAR RECURSOS
    =============================================*/
    public function EliminarDatosRecursos($idE){
        $oBJECT_ELIM = recursocontroller::CrtEliminarRecursos($idE);
    }
}
/*=============================================
    EDITAR RECURSOS
=============================================*/
if(isset($_POST["Recursosid"])){

    $editar = new AjaxRecursos();
    $editar ->Recursosid=$_POST["Recursosid"];
    $editar -> ajaxEditarRecursos();
}
/*=============================================
    ELIMINAR RECURSOS   
=============================================*/
if(isset($_GET["d"])){
	$oBJECT_ELIM = new AjaxRecursos();
    $oBJECT_ELIM ->EliminarDatosRecursos($_GET["d"]);
}
