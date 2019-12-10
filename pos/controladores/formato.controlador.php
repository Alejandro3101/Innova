<?php
class ControladorFormato{
    static public function ctrListaFormato($idProyecto){
       $objLISTA =  ModeloFormato::mdlMostrarFormato($idProyecto);
       return $objLISTA;
    }
    static public function ctrListaFormatos($idTarea){
        $objLISTA =  ModeloFormato::mdlMostrarFormatos($idTarea);
        return $objLISTA;
     }
    static public function ctrInsertarFormato($fecha,$archivo,$proyecto,$codigo){
        $objINSERT =  ModeloFormato::mdlInsertarFormato($fecha,$archivo,$proyecto,$codigo);
        return $objINSERT;
    }
    static public function ctrEditarFormato($idformato,$fecha,$archivo,$proyecto,$codigo){
        $objBUSCAR =  ModeloFormato::mdlBuscarFormato($idformato);
        if($archivo==null||$archivo=="null"||$archivo==""){
            $archivo= $objBUSCAR["archivo"];
        }
        $objINSERT =  ModeloFormato::mdlEditarFormato($idformato,$fecha,$archivo,$proyecto,$codigo);
        return $objINSERT;
    }
    static public function ctrEliminarFormato($idFormato){
        $objDELETE =  ModeloFormato::mdlEliminarFormato($idFormato);
        return $objDELETE;
    }
    static public function ctrBuscarFormato($idFormato){
        $objBUSCAR =  ModeloFormato::mdlBuscarFormato($idFormato);
        return $objBUSCAR;
    }
}