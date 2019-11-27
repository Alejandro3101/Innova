<?php
class ControladorTareaIntegrante{
    static public function ctrListaTareaIntegrante($idProyecto){
       $objLISTA =  ModeloTareaIntegrante::mdlMostrarIntegrantes($idProyecto);
       return $objLISTA;
    }
    static public function ctrListaTareaIntegrantes($idTarea){
        $objLISTA =  ModeloTareaIntegrante::mdlMostrarTareaIntegrantes($idTarea);
        return $objLISTA;
     }
    static public function ctrInsertarTareaIntegrante($idTarea,$idIntegrante){
        $objINSERT =  ModeloTareaIntegrante::mdlInsertarIntegrantes($idTarea,$idIntegrante);
        return $objINSERT;
    }
    static public function ctrEliminarTareaIntegrante($idTareaIntegrante){
        $objDELETE =  ModeloTareaIntegrante::mdlEliminarIntegrantes($idTareaIntegrante);
        return $objDELETE;
    }
}