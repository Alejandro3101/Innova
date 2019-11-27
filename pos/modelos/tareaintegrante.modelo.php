<?php

require_once "conexion.php";

class ModeloTareaIntegrante{
    /*=============================================
    MOSTRAR 
    =============================================*/
    static public function mdlMostrarIntegrantes($idProyecto){
        $stmt = Conexion::conectar()->prepare("SELECT i.id_integrante,i.id_proyecto,p.* FROM integrantes i INNER JOIN persona p ON  p.id_persona = i.id_persona WHERE i.id_proyecto = :id_proyecto");
        $stmt->bindParam(":id_proyecto" ,$idProyecto, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt = null;
    }
    static public function mdlMostrarTareaIntegrantes($idTarea){
        $stmt = Conexion::conectar()->prepare("SELECT ti.id_tarea_integrante,i.id_integrante,i.id_proyecto,p.* FROM integrantes i INNER JOIN persona p ON  p.id_persona = i.id_persona INNER JOIN tarea_integrante ti ON i.id_integrante = ti.id_integrante WHERE ti.id_tarea = :id_tarea");
        $stmt->bindParam(":id_tarea" ,$idTarea, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt = null;
    }
    static public function mdlInsertarIntegrantes($idTarea,$idIntegrante){
        $stmt = Conexion::conectar()->prepare("INSERT INTO tarea_integrante VALUES(NULL,:id_tarea,:id_integrante)");
        $stmt->bindParam(":id_tarea" ,$idTarea, PDO::PARAM_STR);
        $stmt->bindParam(":id_integrante" ,$idIntegrante, PDO::PARAM_STR);
        return $stmt->execute();
        $stmt->close();
        $stmt = null;
    }
    static public function mdlEliminarIntegrantes($idTareaIntegrante){
        $stmt = Conexion::conectar()->prepare("DELETE FROM tarea_integrante  WHERE id_tarea_integrante = :id_tarea_integrante");
        $stmt->bindParam(":id_tarea_integrante" ,$idTareaIntegrante, PDO::PARAM_STR);
        return $stmt->execute();
        $stmt->close();
        $stmt = null;
    }

}
