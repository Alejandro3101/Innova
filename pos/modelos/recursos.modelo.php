<?php
require_once "conexion.php";

class ModeloRecurso{

    /*=============================================
        MOSTRAR RECURSOS
    =============================================*/

    static public function mdlMostrarRecursos($recursos, $item, $valor){
        if($item != null){

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $recursos WHERE $item = :$item");

            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

            $stmt -> execute();

            return $stmt -> fetch();
        }else{
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $recursos");

            $stmt -> execute();

            return $stmt -> fetchAll();

        }
        $stmt -> close();
        $stmt = null;
    }
    /*=============================================
        REGISTRO DE RECURSOS
    =============================================*/

    static public function mdlIngresarRecursos($recursos, $datos){
        $stmt = Conexion::conectar()->prepare("INSERT INTO $recursos(rubro,concepto,valor_rubro,valor_proyecto,id_proyecto) 
        VALUES (:rubro,:concepto,:valor_rubro,:valor_proyecto,:id_proyecto)");

        $stmt->bindParam(":rubro", $datos["rubro"], PDO::PARAM_STR);
        $stmt->bindParam(":concepto", $datos["concepto"], PDO::PARAM_STR);
        $stmt->bindParam(":valor_rubro", $datos["valor_rubro"], PDO::PARAM_STR);
        $stmt->bindParam(":valor_proyecto", $datos["valor_proyecto"], PDO::PARAM_STR);
        $stmt->bindParam(":id_proyecto", $datos["id_proyecto"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }

        $stmt->close();

        $stmt = null;
    }
    /*=============================================
        EDITAR RECURSOS
    =============================================*/

    static public function mdlEditarRecursos($recursos, $datos){
        $stmt = Conexion::conectar()->prepare("UPDATE $recursos SET rubro =:rubro,concepto =:concepto,valor_rubro =:valor_rubro,valor_proyecto =:valor_proyecto,id_proyecto =:id_proyecto WHERE id_recurso =:id_recurso");

        $stmt->bindParam(":id_recurso", $datos["id_recurso"], PDO::PARAM_INT);
        $stmt->bindParam(":rubro", $datos["rubro"], PDO::PARAM_STR);
        $stmt->bindParam(":concepto", $datos["concepto"], PDO::PARAM_STR);
        $stmt->bindParam(":valor_rubro", $datos["valor_rubro"], PDO::PARAM_STR);
        $stmt->bindParam(":valor_proyecto", $datos["valor_proyecto"], PDO::PARAM_STR);
        $stmt->bindParam(":id_proyecto", $datos["id_proyecto"], PDO::PARAM_STR);

        if($stmt -> execute()){
            return "ok";
        }else{
            return "error";
        }
        $stmt -> close();
        $stmt = null;
    }
    /*=============================================
	    BORRAR RECURSOS
	=============================================*/

    public static function MdlEliminarRecursos($id){

        $oBJECT_INSE = Conexion::conectar()->prepare("DELETE FROM recursos WHERE id_recurso=:id");
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