<?php

require_once "conexion.php";

class ModeloActividades{


     /*=============================================
            MOSTRAR Actividades
          =============================================*/

    static public function mdlMostrarActividades($tabla, $item, $valor){

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

    static public function mdlIngresarActividades($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre_actividad,descripcion,fecha_inicio,fecha_limite,estado,id_proyecto ) VALUES (:nombre_actividad,:descripcion,:fecha_inicio,:fecha_limite,:estado,:id_proyecto )");

        $stmt->bindParam(":nombre_actividad", $datos["nombre_actividad"], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha_inicio", $datos["fecha_inicio"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha_limite", $datos["fecha_limite"], PDO::PARAM_STR);
        $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
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
  BORRAR actividades
  =============================================*/

    static public function mdlBorrarActividades($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_actividad = :id_actividad");

        $stmt->bindParam(":id_actividad", $datos, PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";

        } else {

            return "error";

        }

        $stmt->close();

        $stmt = null;


    }

}