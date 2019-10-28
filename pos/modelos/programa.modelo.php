<?php
require_once "conexion.php";

class ModelPrograma{
    /*=============================================
    MOSTRAR PROGRAMA
    =============================================*/

    static public function mdlMostrarPrograma($programa, $item, $valor){
        if($item != null){
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $programa WHERE $item = :$item");
            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt -> execute();
            return $stmt -> fetch();
        }else{
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $programa");
            $stmt -> execute();
            return $stmt -> fetchAll();
        }
        $stmt -> close();
        $stmt = null;
    }

    /*=============================================
    REGISTRO DE PROGRAMA
    =============================================*/

    static public function mdlIngresarPrograma($programa, $datos){
        $stmt = Conexion::conectar()->prepare("INSERT INTO $programa(nombre_programa) 
        VALUES (:nombre_programa)");

        $stmt->bindParam(":nombre_programa", $datos["nombre_programa"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";

        }else{
            return "error";

        }
        $stmt->close();
        $stmt = null;
    }

    /*=============================================
    EDITAR PROGRAMA
    =============================================*/
    static public function mdlEditarPrograma($programa, $datos){
        $stmt = Conexion::conectar()->prepare("UPDATE $programa SET nombre_programa =:nombre_programa WHERE id_programa =:id_programa");

        $stmt->bindParam(":id_programa", $datos["id_programa"], PDO::PARAM_INT);
        $stmt->bindParam(":nombre_programa", $datos["nombre_programa"], PDO::PARAM_STR);

        if($stmt -> execute()){
            return "ok";
        }else{
            return "error";
        }
        $stmt -> close();
        $stmt = null;
    }

    /*=============================================
	BORRAR PROGRAMA
    =============================================*/
    public static function MdlEliminarPrograma($id){

        $oBJECT_INSE = Conexion::conectar()->prepare("DELETE FROM programa WHERE id_programa=:id");
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