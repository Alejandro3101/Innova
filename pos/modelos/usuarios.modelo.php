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


        if($stmt->execute()){

            return "ok";

        }else{

            return "error";

        }

        $stmt->close();

        $stmt = null;

    }




}