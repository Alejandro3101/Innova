<?php
session_start();
require_once "../controladores/formato.controlador.php";
require_once "../modelos/formato.modelo.php";
require_once "../controladores/proyectos.controlador.php";
require_once "../modelos/proyectos.modelo.php";
require_once "../controladores/codigoformato.controlador.php";
require_once "../modelos/codigoformato.modelo.php";

class AjaxFormato{
    public $idProyecto;
    public $fecha;
    public $idCodigo;
    public $archivo;
    function ajxListaFormato(){
       $objLISTA =  ControladorFormato::ctrListaFormato($this->idProyecto);
       $oBJEC_JSON = '{ "data": [';
            if (count($objLISTA) >= 1){
                $enum = 1;
                for ($i=0; $i < count($objLISTA); $i++) {
                    $btnEditar = "<button type='button' class='btn btn-primary btnEditarFormato' id_formato='".$objLISTA[$i]["id_formato"]."'active data-toggle='modal' data-target='#modaleditarProyecto'><i class='fa fa-pencil'></i></button>";
                    $btnEliminar = "<button class='btn btn-danger btnEliminarFormato' id_formato='".$objLISTA[$i]["id_formato"]."' ><i class='fa fa-times'></i></button>";
                    $item = "id_proyecto";
                    $valor = $objLISTA[$i]["id_proyecto"];
                    $respuesta = Proyectocontroller::ctrMostrarproyecto($item, $valor);
                    $oBJEC_JSON .= '[
                        "'.$enum++.'",
                        "'.$objLISTA[$i]["codigo"]." ".$objLISTA[$i]["nombre"]." ".$respuesta["codigo"].'",
                        "'.$objLISTA[$i]["fecha"].'",
                        "'.$btnEditar.$btnEliminar.'"
                    ],';
                }
            }else{
                $oBJEC_JSON .= '[
                    "",
                    "",
                    "",
                    ""
                ],';
            }
            $oBJEC_JSON = substr($oBJEC_JSON,0,-1);
            $oBJEC_JSON .=']}';
            echo $oBJEC_JSON;
    }
    function ajxInsertarFormato(){
        $codigoformato = ControladorCodigoFormato::ctrBuscarCodigoFormato($this->idCodigo);
        $item = "id_proyecto";
        $valor = $this->idProyecto;
        $respuesta = Proyectocontroller::ctrMostrarproyecto($item, $valor);
        $file=null;
        if(isset($this->archivo) && !empty($this->archivo["tmp_name"])){
            if(!is_dir("../vistas/documents/".$respuesta["nombre_proyecto"])){
                $dir = mkdir("../vistas/documents/".$respuesta["nombre_proyecto"], 0777, true);
            }else{
                $dir=true;
            }
            if($dir){
                $filename = $codigoformato["codigo"]." ".$codigoformato["nombre"]." ".$respuesta["codigo"].".". pathinfo($this->archivo['name'], PATHINFO_EXTENSION); //concatenar función tiempo con el nombre de imagen
                $muf=move_uploaded_file($this->archivo["tmp_name"], "../vistas/documents/".$respuesta["nombre_proyecto"]."/".$filename); //mover el fichero utilizando esta función
                $file='/vistas/documents/'.$respuesta["nombre_proyecto"].'/'.$filename;
                if($muf){
                    $image_upload=true;
                }else{
                    $image_upload=false;
                    $error["image"]= "El archivo no se ha subido";
                }
            }
        }
        $objInser =  ControladorFormato::ctrInsertarFormato($this->fecha,$file,$this->idProyecto,$this->idCodigo);
        echo $objInser;
    }
    function ajxEliminarFormato(){
        $objElim=  ControladorFormato::ctrEliminarFormato($this->idFormato);
        echo $objElim;
    }
}
if(isset($_GET["a"])&&$_GET["a"]=="listaFormatos"){
    $objFormato = new AjaxFormato();
    $objFormato->idProyecto = $_GET["IdProyecto"];
    $objFormato->ajxListaFormato();
}
if(isset($_GET["a"])&&$_GET["a"]=="crear"){
    $objFormato = new AjaxFormato();
    $objFormato->idProyecto = $_POST["IdProyecto"];
    $objFormato->fecha = $_POST["Fecha"];
    $objFormato->idCodigo = $_POST["IdCodigo"];
    $objFormato->archivo = $_FILES["Archivo"];
    $objFormato->ajxInsertarFormato();
}
/*
if(isset($_GET["a"])&&$_GET["a"]=="listaFormatos"){
    $objFormato = new AjaxFormato();
    $objFormato->idTarea = $_POST["IdTarea"];
    $objFormato->ajxListaFormatos();
}

if(isset($_GET["a"])&&$_GET["a"]=="eliminar"){
    $objFormato = new AjaxFormato();
    $objFormato->idFormato = $_POST["IdFormato"];
    $objFormato->ajxEliminarFormato();
}*/