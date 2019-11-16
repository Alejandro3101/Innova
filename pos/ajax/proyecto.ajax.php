<?php
require_once "../controladores/proyectos.controlador.php";
require_once "../modelos/proyectos.modelo.php";

class AjaxProyecto{

    /*=============================================
        EDITAR PROYECTO
    =============================================*/

    public $Proyectoid;

    public function ajaxEditarProyecto(){

        $item = "id_proyecto";
        $valor = $this->Proyectoid;

        $respuesta = Proyectocontroller::ctrMostrarproyecto($item, $valor);
        echo json_encode($respuesta);
    }

    /*=============================================
    ELIMINAR GASTOS
    =============================================*/
    public function EliminarDatos($idE){
        $oBJECT_ELIM = Proyectocontroller::ctrBorrarProyecto($idE);
    }
}

/*=============================================
EDITAR GASTOS
=============================================*/
if(isset($_POST["Proyectoid"])){

    $editar = new AjaxProyecto();
    $editar ->Proyectoid = $_POST["Proyectoid"];
    $editar -> ajaxEditarProyecto();
}

/*=============================================
ELIMINAR GASTOS
=============================================*/
if(isset($_GET["d"])){
    $oBJECT_ELIM = new AjaxProyecto();
    $oBJECT_ELIM ->EliminarDatos($_GET["d"]);
}
