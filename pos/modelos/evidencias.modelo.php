<?php
require_once "conexion.php";

class ModeloEvidencia{

    /*=============================================
    MOSTRAR EVIDENCIA
    =============================================*/

    static public function mdlMostrarEvidencia($evidencias, $item, $valor){
        if($item != null){
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $evidencias WHERE $item = :$item");
            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt -> execute();
            return $stmt -> fetch();
        }else{
            $stmt = Conexion::conectar()->prepare("select id_evidencia,tipo,evidencias ,tareas.nombre_tarea,proyectos.nombre_proyecto from evidencias inner join tareas on tareas.id_tarea = evidencias.id_tarea inner join proyectos on proyectos.id_proyecto = evidencias.id_proyecto");
            $stmt -> execute();
            return $stmt -> fetchAll();
        }
        $stmt -> close();
        $stmt = null;
    }

    /*=============================================
    REGISTRO EVIDENCIA
    =============================================*/

    static public function mdlIngresarEvidencia($evidencias, $datos){
        $stmt = Conexion::conectar()->prepare("INSERT INTO $evidencias(tipo,evidencias,id_tarea,id_proyecto)VALUES(:tipo,:evidencias,:id_tarea,:id_proyecto)");


        $stmt->bindParam(":tipo", $datos["tipo"], PDO::PARAM_STR);
        $stmt->bindParam(":evidencias", $datos["evidencias"], PDO::PARAM_STR);
        $stmt->bindParam(":id_tarea", $datos["id_tarea"], PDO::PARAM_INT);
        $stmt->bindParam(":id_proyecto", $datos["id_proyecto"], PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";

        } else {

            return "error";
        }
        $stmt->close();

        $stmt = null;
    }
    /*=============================================
    EDITAR EVIDENCIA
    =============================================*/
    static public function mdlEditarEvidencia($evidencias, $datos){
        $stmt = Conexion::conectar()->prepare("UPDATE $evidencias SET tipo =:tipo,evidencias =:evidencias,id_tarea =:id_tarea WHERE id_evidencia =:id_evidencia");

        $stmt->bindParam(":id_evidencia", $datos["id_evidencia"], PDO::PARAM_INT);
        $stmt->bindParam(":tipo", $datos["tipo"], PDO::PARAM_STR);
        $stmt->bindParam(":evidencias", $datos["evidencias"], PDO::PARAM_STR);
        $stmt->bindParam(":id_tarea", $datos["id_tarea"], PDO::PARAM_STR);

        if($stmt -> execute()){
            return "ok";
        }else{
            return "error";
        }
        $stmt -> close();
        $stmt = null;
    }

    /*=============================================
	BORRAR EVIDENCIA
    =============================================*/
    public static function MdlEliminarEvidencia($id){

        $oBJECT_INSE = Conexion::conectar()->prepare("DELETE FROM evidencias WHERE id_evidencia=:id");
        $oBJECT_INSE -> bindParam(":id", $id, PDO::PARAM_INT);
        $cVMSN_ERRO = null;
        if ($oBJECT_INSE -> execute()) {
            $cVMSN_ERRO = true;
        }else{
            $cVMSN_ERRO = false;
        }

        echo json_encode($cVMSN_ERRO);
    }
}