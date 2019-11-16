<?php
require_once "../controladores/integrantes.controlador.php";
require_once "../modelos/integrantes.modelo.php";

class AjaxIntegrantes{
    /*=============================================
        EDITAR Integrantes
    =============================================*/

    public  $id_integrante;

    public function ajaxEditarIntegrantes(){

        $item = "id_integrante";
        $valor = $this->id_integrante;

        $respuesta = integrantecontroller::ctrMostrarIntegrantes($item, $valor);

        echo json_encode($respuesta);

    }

}

/*=============================================
EDITAR TAREAS
=============================================*/
if(isset($_POST["id_integrante"])){

    $editar = new AjaxIntegrantes();
    $editar ->id_integrante=$_POST["id_integrante"];
    $editar -> ajaxEditarIntegrantes();
}

