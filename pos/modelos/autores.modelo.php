<?php
require_once "conexion.php";

class ModeloAutor{
    /*=============================================
    MOSTRAR AUTORES
    =============================================*/

    static public function mdlMostrarAutores($autores, $item, $valor){
        if($item != null){
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $autores WHERE $item = :$item");
            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt -> execute();
            return $stmt -> fetch();
        }else{
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $autores");
            $stmt -> execute();
            return $stmt -> fetchAll();
        }
        $stmt -> close();
        $stmt = null;
    }

    /*=============================================
    REGISTRO DE AUTORES
    =============================================*/
    static public function mdlIngresarAutores($autores, $datos){
        $stmt = Conexion::conectar()->prepare("INSERT INTO $autores (nombres,apellidos,tipo_documento,documento,email,celular)VALUES(:nombres,:apellidos,:tipo_documento,:documento,:email,:celular)");

        $stmt->bindParam(":nombres", $datos["nombres"], PDO::PARAM_STR);
        $stmt->bindParam(":apellidos", $datos["apellidos"], PDO::PARAM_STR);
        $stmt->bindParam(":tipo_documento", $datos["tipo_documento"], PDO::PARAM_STR);
        $stmt->bindParam(":documento", $datos["documento"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
        $stmt->bindParam(":celular", $datos["celular"], PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;
    }
    /*=============================================
    EDITAR AUTORES
    =============================================*/
    static public function mdlEditarAutores($autores, $datos){
        $stmt = Conexion::conectar()->prepare("UPDATE $autores SET nombres =:nombres,apellidos =:apellidos,tipo_documento =:tipo_documento,documento =:documento,email =:email,celular =:celular WHERE id_autor =:id_autor");

        $stmt->bindParam(":id_autor", $datos["id_autor"], PDO::PARAM_INT);
        $stmt->bindParam(":nombres", $datos["nombres"], PDO::PARAM_STR);
        $stmt->bindParam(":apellidos", $datos["apellidos"], PDO::PARAM_STR);
        $stmt->bindParam(":tipo_documento", $datos["tipo_documento"], PDO::PARAM_STR);
        $stmt->bindParam(":documento", $datos["documento"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
        $stmt->bindParam(":celular", $datos["celular"], PDO::PARAM_STR);

        if($stmt -> execute()){
            return "ok";
        }else{
            return "error";
        }
        $stmt -> close();
        $stmt = null;
    }

    /*=============================================
	BORRAR AUTORES
    =============================================*/
    public static function MdlEliminarAutores($id){

        $oBJECT_INSE = Conexion::conectar()->prepare("DELETE FROM autores WHERE id_autor=:id");
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