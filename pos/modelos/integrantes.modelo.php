<?php
require_once "conexion.php";
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

            $stmt = Conexion::conectar()->prepare("SELECT id_integrante,rol,estado_integrante,persona.id_persona, persona.nombres,proyectos.id_proyecto, proyectos.nombre_proyecto FROM `integrantes` INNER JOIN persona ON persona.id_persona = integrantes.id_persona INNER JOIN proyectos on proyectos.id_proyecto = integrantes.id_proyecto");

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

    /*=============================================
    EDITAR DE Actividad
    =============================================*/

    static public function mdlEditarIntegrantes($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE  $tabla SET rol =:rol,estado_integrante =:estado_integrante,id_persona = :id_persona,id_proyecto = :id_proyecto WHERE id_integrante=:id_integrante");

        $stmt->bindParam(":rol", $datos["rol"], PDO::PARAM_STR);
        $stmt->bindParam(":estado_integrante", $datos["estado_integrante"], PDO::PARAM_STR);
        $stmt->bindParam(":id_persona", $datos["id_persona"], PDO::PARAM_STR);
        $stmt->bindParam(":id_proyecto", $datos["id_proyecto"], PDO::PARAM_STR);
        $stmt->bindParam(":id_integrante", $datos["id_integrante"], PDO::PARAM_STR);



        if ($stmt->execute()) {

            return "ok";

        } else {

            return "error";

        }

        $stmt->close();

        $stmt = null;

    }


    /*=============================================
   BORRAR Integrante
   =============================================*/

    static public function mdlBorrarIntegrante($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_integrante = :id_integrante");

        $stmt->bindParam(":id_integrante", $datos, PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";

        } else {

            return "error";

        }

        $stmt->close();

        $stmt = null;


    }



}
