<?php
require_once "../controladores/programa.controlador.php";
require_once "../modelos/programa.modelo.php";

class AjaxPrograma{

    /*=============================================
    EDITAR PROGRAMA
    =============================================*/

    public $Programaid;

    public function ajaxEditarPrograma(){

        $item = "id_programa";
        $valor = $this->Programaid;

        $respuesta = programacontroller::ctrMostrarPrograma($item, $valor);
        echo json_encode($respuesta);
    }

    /*=============================================
    ELIMINAR PROGRAMA
    =============================================*/
    public function EliminarDatosPrograma($idE){
        $oBJECT_ELIM = programacontroller::CrtEliminarPrograma($idE);
    }
}

/*=============================================
EDITAR PROGRAMA   
=============================================*/
if(isset($_POST["Programaid"])){

    $editar = new AjaxPrograma();
    $editar ->Programaid = $_POST["Programaid"];
    $editar -> ajaxEditarPrograma();
}

/*=============================================
ELIMINAR GASTOS   
=============================================*/
if(isset($_GET["d"])){
	$oBJECT_ELIM = new AjaxPrograma();
    $oBJECT_ELIM ->EliminarDatosPrograma($_GET["d"]);
}