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

            $stmt = Conexion::conectar()->prepare("SELECT id_actividad,nombre_actividad,descripcion,estado,proyectos.nombre_proyecto FROM `actividades` INNER JOIN proyectos on proyectos.id_proyecto = actividades.id_proyecto");

            $stmt -> execute();

            return $stmt -> fetchAll();

        }


        $stmt -> close();

        $stmt = null;

    }

     /*=============================================
        MOSTRAR Actividades CON ROL APRENDIZ O INSTRUCTOR
    =============================================*/
    static public function mdlMostrarActividadesLimitado($tabla, $item, $valor){

        if($item != null){

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

            $stmt -> execute();

            return $stmt -> fetch();

        }else{

            $id = $_SESSION["id_persona"];
            $stmt = Conexion::conectar()->prepare("SELECT p.*,a.* FROM proyectos p INNER JOIN integrantes i ON p.id_proyecto = i.id_proyecto INNER JOIN persona ps ON i.id_persona = ps.id_persona INNER JOIN actividades a ON a.id_proyecto = p.id_proyecto WHERE ps.id_persona = $id ");
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

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre_actividad,descripcion,estado,id_proyecto ) VALUES (:nombre_actividad,:descripcion,:estado,:id_proyecto)");

        $stmt->bindParam(":nombre_actividad", $datos["nombre_actividad"], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
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
    EDITAR DE Actividad
    =============================================*/

    static public function mdlEditarActividades($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE  $tabla SET nombre_actividad = :nombre_actividad,descripcion = :descripcion,estado=:estado,id_proyecto=:id_proyecto WHERE id_actividad=:id_actividad");

        $stmt->bindParam(":nombre_actividad", $datos["nombre_actividad"], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
        $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
        $stmt->bindParam(":id_proyecto", $datos["id_proyecto"], PDO::PARAM_STR);
        $stmt->bindParam(":id_actividad", $datos["id_actividad"], PDO::PARAM_STR);



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