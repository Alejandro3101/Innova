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
        $objINSERT =  ModeloFormato::mdlEditarFormato($idformato,$fecha,$archivo,$proyecto,$codigo);
        return $objINSERT;
    }
    static public function ctrEliminarFormato($idFormato){
        $objDELETE =  ModeloFormato::mdlEliminarFormato($idFormato);
        return $objDELETE;
    }
}