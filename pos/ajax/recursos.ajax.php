<?php
require_once "../controladores/recursos.controlador.php";
require_once "../modelos/recursos.modelo.php";

class AjaxRecurso{

    /*=============================================
    EDITAR RECURSO
    =============================================*/

    public $Recursoid;

    public function ajaxEditarRecurso(){

        $item = "id_recurso";
        $valor = $this->Recursoid;

        $respuesta = recursocontroller::ctrMostrarRecursos($item, $valor);
        echo json_encode($respuesta);
    }

}

/*=============================================
EDITAR GASTOS   
=============================================*/
if(isset($_POST["Recursoid"])){

    $editar = new AjaxRecurso();
    $editar ->Recursoid = $_POST["Recursoid"];
    $editar -> ajaxEditarRecurso();
}

