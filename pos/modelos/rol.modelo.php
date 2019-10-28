<?php

require_once "conexion.php";

class ModeloRol{

        /*=============================================
            MOSTRAR USUARIOS
          =============================================*/

    static public function mdlMostrarRol($tabla, $item, $valor){

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
    REGISTRO DE ROL
    =============================================*/

    static public function mdlIngresarRol($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(Nombre,Codigo ) VALUES (:Nombre,:Codigo)");

        $stmt->bindParam(":Nombre", $datos["Nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":Codigo", $datos["Codigo"], PDO::PARAM_STR);



        if ($stmt->execute()) {

            return "ok";

        } else {

            return "error";

        }

        $stmt->close();

        $stmt = null;

    }
}