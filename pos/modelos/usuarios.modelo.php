<?php

require_once "conexion.php";

class ModeloUsuarios{

	/*=============================================
	MOSTRAR USUARIOS
	=============================================*/

    static public function mdlMostrarUsuarios($tabla, $item, $valor){

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
    /*============================================
    REGISTRO DE USUARIO
    =============================================*/

    static public function mdlIngresarUsuario($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombres,apellidos,tipo_documento,documento,celular,email,profesion,tipo_vinculacion,cvlac,cargo,ficha,fecha_vinculacion,fecha_desvinculacion,estado_vinculacion,contrasena,id_programa,id_rol ) VALUES (:nombres,:apellidos,:tipo_documento,:documento,:celular,:email,:profesion,:tipo_vinculacion,:cvlac,:cargo,:ficha,:fecha_vinculacion,:fecha_desvinculacion,:estado_vinculacion,:contrasena,:id_programa,:id_rol)");

        $p=null;
        if($datos["id_programa"]=="NULL"){
            $p=null;
        }else{
            $p=$datos["id_programa"];
        }

        $stmt->bindParam(":nombres", $datos["nombres"], PDO::PARAM_STR);
        $stmt->bindParam(":apellidos", $datos["apellidos"], PDO::PARAM_STR);
        $stmt->bindParam(":tipo_documento", $datos["tipo_documento"], PDO::PARAM_STR);
        $stmt->bindParam(":documento", $datos["documento"], PDO::PARAM_STR);
        $stmt->bindParam(":celular", $datos["celular"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
        $stmt->bindParam(":profesion", $datos["profesion"], PDO::PARAM_STR);
        $stmt->bindParam(":tipo_vinculacion", $datos["tipo_vinculacion"], PDO::PARAM_STR);
        $stmt->bindParam(":cvlac", $datos["cvlac"], PDO::PARAM_STR);
        $stmt->bindParam(":cargo", $datos["cargo"], PDO::PARAM_STR);
        $stmt->bindParam(":ficha", $datos["ficha"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha_vinculacion", $datos["fecha_vinculacion"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha_desvinculacion", $datos["fecha_desvinculacion"], PDO::PARAM_STR);
        $stmt->bindParam(":estado_vinculacion", $datos["estado_vinculacion"], PDO::PARAM_STR);
        $stmt->bindParam(":contrasena", $datos["contrasena"], PDO::PARAM_STR);
        $stmt->bindParam(":id_programa", $p, PDO::PARAM_STR);
        $stmt->bindParam(":id_rol", $datos["id_rol"], PDO::PARAM_STR);
        
        if($stmt->execute()){

            return "ok";

        }else{

            return "error";

        }

        $stmt->close();

        $stmt = null;

    }
    /*=============================================
        EDITAR USUARIO
    =============================================*/
    static public function mdlEditarUsuario($tabla, $datos){
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombres =:nombres,apellidos =:apellidos,tipo_documento =:tipo_documento,documento =:documento,celular =:celular,email =:email,profesion =:profesion,tipo_vinculacion =:tipo_vinculacion,id_rol =:id_rol,cvlac =:cvlac,cargo =:cargo,ficha =:ficha,fecha_vinculacion =:fecha_vinculacion,fecha_desvinculacion =:fecha_desvinculacion,estado_vinculacion =:estado_vinculacion,contrasena =:contrasena,id_programa =:id_programa  WHERE id_persona =:id_persona");

        $stmt->bindParam(":id_persona", $datos["id_persona"], PDO::PARAM_STR);
        $stmt->bindParam(":nombres", $datos["nombres"], PDO::PARAM_STR);
        $stmt->bindParam(":apellidos", $datos["apellidos"], PDO::PARAM_STR);
        $stmt->bindParam(":tipo_documento", $datos["tipo_documento"], PDO::PARAM_STR);
        $stmt->bindParam(":documento", $datos["documento"], PDO::PARAM_STR);
        $stmt->bindParam(":celular", $datos["celular"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
        $stmt->bindParam(":profesion", $datos["profesion"], PDO::PARAM_STR);
        $stmt->bindParam(":tipo_vinculacion", $datos["tipo_vinculacion"], PDO::PARAM_STR);
        $stmt->bindParam(":cvlac", $datos["cvlac"], PDO::PARAM_STR);
        $stmt->bindParam(":cargo", $datos["cargo"], PDO::PARAM_STR);
        $stmt->bindParam(":ficha", $datos["ficha"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha_vinculacion", $datos["fecha_vinculacion"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha_desvinculacion", $datos["fecha_desvinculacion"], PDO::PARAM_STR);
        $stmt->bindParam(":estado_vinculacion", $datos["estado_vinculacion"], PDO::PARAM_STR);
        $stmt->bindParam(":contrasena", $datos["contrasena"], PDO::PARAM_STR);
        $stmt->bindParam(":id_programa", $datos["id_programa"], PDO::PARAM_STR);
        $stmt->bindParam(":id_rol", $datos["id_rol"], PDO::PARAM_STR);

        if($stmt -> execute()){
            return "ok";
        }else{
            return "error";
        }
        $stmt -> close();
        $stmt = null;
    }
    /*=============================================
	    BORRAR USUARIOS
    =============================================*/
    static public function mdlBorrarUsuarios($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_persona = :id_persona");

        $stmt->bindParam(":id_persona", $datos, PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";

        } else {

            return "error";

        }

        $stmt->close();

        $stmt = null;


    }

}