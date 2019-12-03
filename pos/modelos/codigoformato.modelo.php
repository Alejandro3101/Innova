<?php

require_once "conexion.php";

class ModeloCodigoFormato{
    /*=============================================
    MOSTRAR 
    =============================================*/
    static public function mdlMostrarCodigoFormato(){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM codigo_formato");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt = null;
    }
    static public function mdlBuscarCodigoFormato($id){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM codigo_formato WHERE id_codigo_formato  = :id");
        $stmt->bindParam(":id" ,$id, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();
        $stmt->close();
        $stmt = null;
    }
}