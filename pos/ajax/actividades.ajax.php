<?php
require_once "../controladores/actividades.controlador.php";
require_once "../modelos/actividades.modelo.php";


class AjaxActividades
{
    /*=============================================
        EDITAR Actividad
    =============================================*/

    public $actividadesId;

    public function ajaxEditarActividades()
    {

        $item = "id_actividad";
        $valor = $this->actividadesId;

        $respuesta = actividadescontroller::ctrMostrarActividades($item, $valor);

        echo json_encode($respuesta);


        /*=============================================
    EDITAR actividades
    =============================================*/
        if (isset($_POST["actividadesId"])) {

            $editar = new AjaxActividades();
            $editar->actividadesId = $_POST["actividadesId"];
            $editar->ajaxEditarActividades();
        }

    }

}
