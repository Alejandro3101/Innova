<?php
require_once "../controladores/autores.controlador.php";
require_once "../modelos/autores.modelo.php";

class AjaxAutores{
    /*=============================================
    EDITAR AUTORES
    =============================================*/

    public $Autorid;

    public function ajaxEditarAutores(){

        $item = "id_autor";
        $valor = $this->Autorid;

        $respuesta = autorescontroller::ctrMostrarAutores($item, $valor);

        echo json_encode($respuesta);

    }

    /*=============================================
    ELIMINAR AUTORES
    =============================================*/
    public function EliminarDatosAutor($idE){
        $oBJECT_ELIM = autorescontroller::CrtEliminarAutores($idE);
    }
}

/*=============================================
EDITAR AUTORES
=============================================*/
if(isset($_POST["Autorid"])){

    $editar = new AjaxAutores();
    $editar ->Autorid=$_POST["Autorid"];
    $editar -> ajaxEditarAutores();
}

/*=============================================
ELIMINAR AUTORES   
=============================================*/
if(isset($_GET["d"])){
	$oBJECT_ELIM = new AjaxAutores();
    $oBJECT_ELIM ->EliminarDatosAutor($_GET["d"]);
}
