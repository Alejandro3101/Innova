<?php
require_once "../controladores/proyectos.controlador.php";
require_once "../modelos/proyectos.modelo.php";
require_once "../controladores/actividades.controlador.php";
require_once "../modelos/actividades.modelo.php";
session_start();

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
    }
    public function ajaxSessionActividades()
    {
        $item = "id_actividad";
        $valor = $this->id_actividad;
        $session = actividadescontroller::ctrMostrarActividades($item, $valor);
        $proyecto = Proyectocontroller::ctrMostrarproyecto("id_proyecto", $session["id_proyecto"]);     
        $_SESSION["IdActividad"] = $session["id_actividad"];
        $_SESSION["NombreActividad"] = $session["nombre_actividad"];
        $_SESSION["NombreProyecto"] = $proyecto["nombre_proyecto"];
        $_SESSION["IdProyecto"] = $proyecto["id_proyecto"];
        $respuesta = true;
        echo $respuesta;
    }

}
/*=============================================
EDITAR actividades
=============================================*/
if (isset($_POST["id_actividad"])) {

    $editar = new AjaxActividades();
    $editar->id_actividad = $_POST["id_actividad"];
    $editar->ajaxEditarActividades();
}
if (isset($_GET["a"]) && $_GET["a"] == "session") {
    $session = new AjaxActividades();
    $session->id_actividad = $_POST["id_actividad_session"];
    $session->ajaxSessionActividades();
}