<?php

require_once "../controladores/actividades.controlador.php";
require_once "../modelos/actividades.modelo.php";


class AjaxActividades
{
    /*=============================================
        EDITAR Actividad
    =============================================*/
    public $id_actividad;

    public function ajaxEditarActividades()
    {
        $item = "id_actividad";

        $valor = $this->id_actividad;

        $respuesta = actividadescontroller::ctrMostrarActividades($item, $valor);

        echo json_encode($respuesta);



        /*=============================================
    EDITAR actividades
    =============================================*/
        if (isset($_POST["id_actividad"])) {

            $editar = new AjaxActividades();
            $editar->id_actividad = $_POST["id_actividad"];
            $editar->ajaxEditarActividades();
        }
    }

}
