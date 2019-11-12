<?php

require_once "conexion.php";

class ModeloEmpresa
{

    /*=============================================
           MOSTRAR EMPRESA
         =============================================*/

    static public function mdlMostrarEmpresa($tabla, $item, $valor)
    {

        if ($item != null) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();

        } else {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

            $stmt->execute();

            return $stmt->fetchAll();

        }


        $stmt->close();

        $stmt = null;

    }


    /*=============================================
    REGISTRO DE empresa
    =============================================*/

    static public function mdlIngresarEmpresas($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre_empresa,tipo_empresa,nit,direccion,telefono,encargado,celular,sector ) VALUES (:nombre_empresa,:tipo_empresa,:nit,:direccion,:telefono,:encargado,:celular,:sector)");


        $stmt->bindParam(":nombre_empresa", $datos["nombre_empresa"], PDO::PARAM_STR);
        $stmt->bindParam(":tipo_empresa", $datos["tipo_empresa"], PDO::PARAM_STR);
        $stmt->bindParam(":nit", $datos["nit"], PDO::PARAM_STR);
        $stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
        $stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
        $stmt->bindParam(":encargado", $datos["encargado"], PDO::PARAM_STR);
        $stmt->bindParam(":celular", $datos["celular"], PDO::PARAM_STR);
        $stmt->bindParam(":sector", $datos["sector"], PDO::PARAM_STR);


        if ($stmt->execute()) {

            return "ok";

        } else {

            return "error";

        }

        $stmt->close();

        $stmt = null;

    }

    /*=============================================
   Editar DE Aulas
   =============================================*/


    static public function mdlEditarEmpresa($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre_empresa = :nombre_empresa,tipo_empresa = :tipo_empresa ,direccion = :direccion,telefono = :telefono,encargado = :encargado,celular = :celular,sector = :sector WHERE nit = :nit");


        $stmt->bindParam(":nombre_empresa", $datos["nombre_empresa"], PDO::PARAM_STR);
        $stmt->bindParam(":tipo_empresa", $datos["tipo_empresa"], PDO::PARAM_STR);
        $stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
        $stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
        $stmt->bindParam(":encargado", $datos["encargado"], PDO::PARAM_STR);
        $stmt->bindParam(":celular", $datos["celular"], PDO::PARAM_STR);
        $stmt->bindParam(":sector", $datos["sector"], PDO::PARAM_STR);
        $stmt->bindParam(":nit", $datos["nit"], PDO::PARAM_STR);


        if ($stmt->execute()) {

            return "ok";

        } else {

            return "error";

        }

        $stmt->close();

        $stmt = null;

    }

    /*=============================================
   BORRAR empresa
   =============================================*/

    static public function mdlBorrarEmpresa($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_empresa = :id_empresa");

        $stmt->bindParam(":id_empresa", $datos, PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";

        } else {

            return "error";

        }

        $stmt->close();

        $stmt = null;


    }

}
