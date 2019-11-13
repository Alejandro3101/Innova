<?php


require_once "../Controladores/empresas.controlador.php";
require_once "../Modelos/empresas.modelo.php";

class AjaxEmpresas{

    /*=============================================
    EDITAR EMPRESA
    =============================================*/

    public $id_empresa;

    public function ajaxEditarEmpresa(){

        $item = "id_empresa";
        $valor = $this->id_empresa;

        $respuesta = empresascontroller::ctrMostrarEmpresa($item, $valor);

        echo json_encode($respuesta);

    }
}

/*=============================================
EDITAR empresa
=============================================*/
if(isset($_POST["id_empresa"])){

    $editar = new AjaxEmpresas();
    $editar -> id_empresa = $_POST["id_empresa"];
    $editar -> ajaxEditarEmpresa();
}
