<?php
require_once "conexion.php";

class ModeloTareas{
    /*=============================================
    MOSTRAR TAREAS
    =============================================*/

    static public function mdlMostrarTareas($tareas, $item, $valor){
        if($item != null){
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tareas WHERE $item = :$item");
            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt -> execute();
            return $stmt -> fetch();
        }else{
            $stmt = Conexion::conectar()->prepare("SELECT id_tarea,nombre_tarea,tareas.descripcion,tareas.estado, actividades.nombre_actividad ,integrantes.rol, proyectos.nombre_proyecto FROM `tareas` INNER JOIN actividades on actividades.id_actividad = tareas.id_actividad INNER join integrantes ON integrantes.id_integrante = tareas.id_integrante inner join proyectos on proyectos.id_proyecto = tareas.id_proyecto");
            $stmt -> execute();
            return $stmt -> fetchAll();
        }
        $stmt -> close();
        $stmt = null;
    }

    /*=============================================
    REGISTRO DE TAREAS
    =============================================*/
    static public function mdlIngresarTareas($tareas, $datos){
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tareas(nombre_tarea,descripcion,estado,id_actividad,id_integrante,id_proyecto) 
        VALUES (:nombre_tarea,:descripcion,:estado,:id_actividad,:id_integrante,:id_proyecto)");

        $stmt->bindParam(":nombre_tarea", $datos["nombre_tarea"], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
        $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
        $stmt->bindParam(":id_actividad", $datos["id_actividad"], PDO::PARAM_INT);
        $stmt->bindParam(":id_integrante", $datos["id_integrante"], PDO::PARAM_INT);
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
    Editar TAREAS
    =============================================*/
    static public function mdlEditarTarea($tareas, $datos){
        $stmt = Conexion::conectar()->prepare("UPDATE $tareas SET nombre_tarea =:nombre_tarea,descripcion =:descripcion,estado =:estado,id_actividad =:id_actividad,id_integrante =:id_integrante WHERE id_tarea =:id_tarea");

        $stmt->bindParam(":id_tarea", $datos["id_tarea"], PDO::PARAM_INT);
        $stmt->bindParam(":nombre_tarea", $datos["nombre_tarea"], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
        $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
        $stmt->bindParam(":id_actividad", $datos["id_actividad"], PDO::PARAM_STR);
        $stmt->bindParam(":id_integrante", $datos["id_integrante"], PDO::PARAM_STR);

        if($stmt -> execute()){
            return "ok";
        }else{
            return "error";
        }
        $stmt -> close();
        $stmt = null;
    }

    /*=============================================
	BORRAR TAREAS
    =============================================*/
    public static function MdlEliminarTarea($id){

        $oBJECT_INSE = Conexion::conectar()->prepare("DELETE FROM tareas WHERE id_tarea=:id");
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

