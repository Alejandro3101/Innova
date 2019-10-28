<?php

class ModeloIntegrantes
{
    /*=============================================
               MOSTRAR integrantes
    =============================================*/

    static public function mdlMostrarIntegrantes($tabla, $item, $valor){

        if($item != null){

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

            $stmt -> execute();

            return $stmt -> fetch();

        }else{

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

            $stmt -> execute();

            return $stmt -> fetchAll();

        }


        $stmt -> close();

        $stmt = null;

    }

    /*=============================================
    REGISTRO DE Actividad
    =============================================*/

    static public function mdlIngresarIntegrantes($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(rol,estado_integrante,id_persona,id_proyecto) VALUES (:rol,:estado_integrante,:id_persona,:id_proyecto )");

        $stmt->bindParam(":rol", $datos["rol"], PDO::PARAM_STR);
        $stmt->bindParam(":estado_integrante", $datos["estado_integrante"], PDO::PARAM_STR);
        $stmt->bindParam(":id_persona", $datos["id_persona"], PDO::PARAM_STR);
        $stmt->bindParam(":id_proyecto", $datos["id_proyecto"], PDO::PARAM_STR);



        if ($stmt->execute()) {

            return "ok";

        } else {

            return "error";

        }

        $stmt->close();

        $stmt = null;

    }


}
