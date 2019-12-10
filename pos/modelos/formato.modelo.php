<?php

require_once "conexion.php";

class ModeloFormato{
    /*=============================================
    MOSTRAR 
    =============================================*/
    static public function mdlMostrarFormato($idProyecto){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM formato f INNER JOIN codigo_formato cf ON cf.id_codigo_formato = f.id_codigo_formato WHERE f.id_proyecto = :id_proyecto");
        $stmt->bindParam(":id_proyecto" ,$idProyecto, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt = null;
    }
    static public function mdlInsertarFormato($fecha,$archivo,$proyecto,$codigo){
        $stmt = Conexion::conectar()->prepare("INSERT INTO formato VALUES(NULL,:fecha,:archivo,:proyecto,:codigoformato)");
        $stmt->bindParam(":fecha" ,$fecha, PDO::PARAM_STR);
        $stmt->bindParam(":archivo" ,$archivo, PDO::PARAM_STR);
        $stmt->bindParam(":proyecto" ,$proyecto, PDO::PARAM_STR);
        $stmt->bindParam(":codigoformato" ,$codigo, PDO::PARAM_STR);
        return $stmt->execute();
        $stmt->close();
        $stmt = null;
    }
    static public function mdlEditarFormato($idformato,$fecha,$archivo,$proyecto,$codigo){
        $stmt = Conexion::conectar()->prepare("UPDATE formato SET fecha = :fecha,archivo = :archivo,id_proyecto = :proyecto,id_codigo_formato = :codigoformato WHERE id_formato = :id ");
        $stmt->bindParam(":id" ,$idformato, PDO::PARAM_STR);
        $stmt->bindParam(":fecha" ,$fecha, PDO::PARAM_STR);
        $stmt->bindParam(":archivo" ,$archivo, PDO::PARAM_STR);
        $stmt->bindParam(":proyecto" ,$proyecto, PDO::PARAM_STR);
        $stmt->bindParam(":codigoformato" ,$codigo, PDO::PARAM_STR);
        return $stmt->execute();
        $stmt->close();
        $stmt = null;
    }
    static public function mdlEliminarFormato($Id){
        $stmt = Conexion::conectar()->prepare("DELETE FROM formato  WHERE id_formato = :id_formato");
        $stmt->bindParam(":id_formato" ,$Id, PDO::PARAM_STR);
        return $stmt->execute();
        $stmt->close();
        $stmt = null;
    }
    static public function mdlBuscarFormato($Id){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM formato  WHERE id_formato = :id_formato");
        $stmt->bindParam(":id_formato" ,$Id, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();
        $stmt->close();
        $stmt = null;
    }
}
