<?php
class ControladorCodigoFormato{
    static public function ctrListaCodigoFormato(){
       $objLISTA =  ModeloCodigoFormato::mdlMostrarCodigoFormato();
       return $objLISTA;
    }
    static public function ctrBuscarCodigoFormato($id){
        $objLISTA =  ModeloCodigoFormato::mdlBuscarCodigoFormato($id);
        return $objLISTA;
     }
}