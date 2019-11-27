<?php
session_start();
require_once "../controladores/tareaintegrante.controlador.php";
require_once "../modelos/tareaintegrante.modelo.php";
class AjaxTareaIntegrante{
    public $idProyecto;
    public $idTareaIntegrante;
    public $idTarea;
    public $idIntegrante;
    function ajxListaTareaIntegrante(){
       $objLISTA =  ControladorTareaIntegrante::ctrListaTareaIntegrante($this->idProyecto);
       $oBJEC_JSON = '{ "data": [';
            if (count($objLISTA) >= 1){
                for ($i=0; $i < count($objLISTA); $i++) {
                    $oBJEC_JSON .= '[
                        "'.$objLISTA[$i]["id_integrante"].'",
                        "'.$objLISTA[$i]["nombres"].'",
                        "'.$objLISTA[$i]["apellidos"].'"
                    ],';
                }
            }else{
                $oBJEC_JSON .= '[
                    "",
                    "",
                    ""
                ],';
            }
            $oBJEC_JSON = substr($oBJEC_JSON,0,-1);
            $oBJEC_JSON .=']}';
            echo $oBJEC_JSON;
    }
    function ajxListaTareaIntegrantes(){
        $objLISTA =  ControladorTareaIntegrante::ctrListaTareaIntegrantes($this->idTarea);
        $oBJEC_JSON = '{ "data": [';
             if (count($objLISTA) >= 1){
                 for ($i=0; $i < count($objLISTA); $i++) {
                     $oBJEC_JSON .= '[
                         "'.$objLISTA[$i]["id_tarea_integrante"].'",
                         "'.$objLISTA[$i]["nombres"].'",
                         "'.$objLISTA[$i]["apellidos"].'"
                     ],';
                 }
             }else{
                 $oBJEC_JSON .= '[
                     "",
                     "",
                     ""
                 ],';
             }
             $oBJEC_JSON = substr($oBJEC_JSON,0,-1);
             $oBJEC_JSON .=']}';
             echo $oBJEC_JSON;
     }
    function ajxInsertarTareaIntegrante(){
        $objInser =  ControladorTareaIntegrante::ctrInsertarTareaIntegrante($this->idTarea,$this->idIntegrante);
        echo $objInser;
    }
    function ajxEliminarTareaIntegrante(){
        $objElim=  ControladorTareaIntegrante::ctrEliminarTareaIntegrante($this->idTareaIntegrante);
        echo $objElim;
    }
}
if(isset($_GET["a"])&&$_GET["a"]=="listaIntegrantes"){
    $objTareaIntegrante = new AjaxTareaIntegrante();
    $objTareaIntegrante->idProyecto = $_SESSION["IdProyecto"];
    $objTareaIntegrante->ajxListaTareaIntegrante();
}
if(isset($_GET["a"])&&$_GET["a"]=="listaTareaIntegrantes"){
    $objTareaIntegrante = new AjaxTareaIntegrante();
    $objTareaIntegrante->idTarea = $_POST["IdTarea"];
    $objTareaIntegrante->ajxListaTareaIntegrantes();
}
if(isset($_GET["a"])&&$_GET["a"]=="crear"){
    $objTareaIntegrante = new AjaxTareaIntegrante();
    $objTareaIntegrante->idTarea = $_POST["IdTarea"];
    $objTareaIntegrante->idIntegrante = $_POST["IdIntegrante"];
    $objTareaIntegrante->ajxInsertarTareaIntegrante();
}
if(isset($_GET["a"])&&$_GET["a"]=="eliminar"){
    $objTareaIntegrante = new AjaxTareaIntegrante();
    $objTareaIntegrante->idTareaIntegrante = $_POST["IdTareaIntegrante"];
    $objTareaIntegrante->ajxEliminarTareaIntegrante();
}