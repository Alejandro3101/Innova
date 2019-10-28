<?php
require_once "conexion.php";

class ModeloGastos{

    /*=============================================
    MOSTRAR GASTOS
    =============================================*/

    static public function mdlMostrarGastos($gastos, $item, $valor){
        if($item != null){

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $gastos WHERE $item = :$item");

            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

            $stmt -> execute();

            return $stmt -> fetch();
        }else{
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $gastos");

            $stmt -> execute();

            return $stmt -> fetchAll();

        }
        $stmt -> close();
        $stmt = null;
    }

    /*=============================================
    REGISTRO DE GASTOS
    =============================================*/

    static public function mdlIngresarGastos($gastos, $datos){
        $stmt = Conexion::conectar()->prepare("INSERT INTO $gastos(concepto,valor_gasto) 
        VALUES (:concepto,:valor_gasto)");

        $stmt->bindParam(":concepto", $datos["concepto"], PDO::PARAM_STR);
        $stmt->bindParam(":valor_gasto", $datos["valor_gasto"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }

        $stmt->close();

        $stmt = null;
    }

    /*=============================================
    EDITAR GASTOS
    =============================================*/

    static public function mdlEditarGastos($gastos, $datos){

        $stmt = Conexion::conectar()->prepare("UPDATE $gastos SET valor_gasto = :valor_gasto,concepto = :concepto WHERE id_gasto = :id_gasto");

        $stmt->bindParam(":id_gasto", $datos["id_gasto"], PDO::PARAM_STR);
        $stmt->bindParam(":concepto", $datos["concepto"], PDO::PARAM_STR);
        $stmt->bindParam(":valor_gasto", $datos["valor_gasto"], PDO::PARAM_STR);

        if($stmt -> execute()){

            return "ok";

        }else{

            return "error";

        }

        $stmt -> close();

        $stmt = null;
    }
    /*=============================================
	BORRAR GASTOS
	=============================================*/

    public static function MdlEliminarGasto($id){

        $oBJECT_INSE = Conexion::conectar()->prepare("DELETE FROM gastos WHERE id_gasto=:id");
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