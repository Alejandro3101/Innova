<?php
require_once "../controladores/usuarios.controlador.php";
require_once "../modelos/usuarios.modelo.php";

class AjaxUsuario{

    /*=============================================
    EDITAR USURIOS
    =============================================*/

    public $Usuarioid;

    public function ajaxEditarUsuario(){

        $item = "id_persona";
        $valor = $this->Usuarioid;

        $respuesta = ControladorUsuarios::ctrMostrarUsuario($item, $valor);
        echo json_encode($respuesta);
    }

    /*=============================================
    ELIMINAR USURIOS
    =============================================*/
    public function EliminarDatosUsuario($idE){
        $oBJECT_ELIM = ControladorUsuarios::CrtEliminarUsuario($idE);
    }
}

/*=============================================
EDITAR USURIOS
=============================================*/
if(isset($_POST["Usuarioid"])){

    $editar = new AjaxUsuario();
    $editar ->Usuarioid = $_POST["Usuarioid"];
    $editar -> ajaxEditarUsuario();
}

/*=============================================
ELIMINAR USURIOS
=============================================*/
if(isset($_GET["d"])){
    $oBJECT_ELIM = new AjaxUsuario();
    $oBJECT_ELIM ->EliminarDatosUsuario($_GET["d"]);
}
