
<?php
require_once "conexion.php";

class ModeloProyecto{

    /*=============================================
        MOSTRAR Proyecto
    =============================================*/
    static public function mdlMostrarProyecto($tabla, $item, $valor){

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
        MOSTRAR Proyecto Instructor Aprendiz
    =============================================*/
    static public function mdlMostrarProyectoLimitado($tabla, $item, $valor){

        if ($item != null) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();

        } else {
            $id = $_SESSION["id_persona"];
            $stmt = Conexion::conectar()->prepare("SELECT p.* FROM proyectos p INNER JOIN integrantes i ON p.id_proyecto = i.id_proyecto INNER JOIN persona ps ON i.id_persona = ps.id_persona WHERE ps.id_persona = $id" );

            $stmt->execute();

            return $stmt->fetchAll();

        }


        $stmt->close();

        $stmt = null;

    }


    /*=============================================
    REGISTRO DE PROYECTO
    =============================================*/
    
    static public function mdlIngresarProyecto($tabla, $datos){
     
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre_proyecto,tipo_proyecto,codigo,linea_programatica,clasificacion,estado_proyecto,fecha_cierre,id_empresa) VALUES (:nombre_proyecto,:tipo_proyecto,:codigo,:linea_programatica,:clasificacion,:estado_proyecto,:fecha_cierre,:id_empresa)");

        if($datos["tipo_proyecto"]=="Con Recursos"){
            $codigo = $datos["codigo"];
        }else{
            // ***************PRUEBA*************
            $stm = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id_proyecto DESC LIMIT 1");
            if ($stm->execute()){
                $aVECT_DATA = $stm ->fetch();
                $codigo = $aVECT_DATA["codigo"];
        
                // evaluar estructura de codigo
                if (substr($codigo,0,1) != "G" || empty($codigo)){
                    $codigo = "G001_".date("Y");
                    $prueba = "ejecuta";
                    
                }else{
                    $codigo = intval(substr($codigo,1,3)) + 1;
                    $codigo = strval(1000 + $codigo);
                    $codigo = "G".substr($codigo,1,3)."_".date("Y");
                    $prueba = " no ejecuta";
                }
            }
            // *****************FIN PRUEBA***********
        }
        $stmt->bindParam(":nombre_proyecto", $datos["nombre_proyecto"], PDO::PARAM_STR);
        $stmt->bindParam(":tipo_proyecto", $datos["tipo_proyecto"], PDO::PARAM_STR);
        $stmt->bindParam(":codigo", $codigo, PDO::PARAM_STR);
        $stmt->bindParam(":linea_programatica", $datos["linea_programatica"], PDO::PARAM_STR);
        $stmt->bindParam(":clasificacion", $datos["clasificacion"], PDO::PARAM_STR);
        $stmt->bindParam(":estado_proyecto", $datos["estado_proyecto"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha_cierre", $datos["fecha_cierre"], PDO::PARAM_STR);
        $stmt->bindParam(":id_empresa", $datos["id_empresa"], PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";

        } else {

            return "error";

        }

        $stmt->close();

        $stmt = null;

    }
    /*=============================================
        EDITAR PROYECTO
    =============================================*/
    static public function mdlEditarProyecto($tabla, $datos){
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre_proyecto =:nombre_proyecto,tipo_proyecto =:tipo_proyecto,codigo =:codigo,linea_programatica =:linea_programatica,clasificacion =:clasificacion,estado_proyecto =:estado_proyecto,fecha_cierre =:fecha_cierre,id_empresa =:id_empresa WHERE id_proyecto =:id_proyecto");
        if($datos["tipo_proyecto"]=="Con Recursos"){
            $codigo = $datos["codigo"];
        }else{
            // ***************PRUEBA*************
            $stm = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id_proyecto DESC LIMIT 1");
            if ($stm->execute()){
                $aVECT_DATA = $stm ->fetch();
                $codigo = $aVECT_DATA["codigo"];
        
                // evaluar estructura de codigo
                if (substr($codigo,0,1) != "G" || empty($codigo)){
                    $codigo = "G001_".date("Y");
                    $prueba = "ejecuta";
                    
                }else{
                    $codigo = intval(substr($codigo,1,3)) + 1;
                    $codigo = strval(1000 + $codigo);
                    $codigo = "G".substr($codigo,1,3)."_".date("Y");
                    $prueba = " no ejecuta";
                }
            }
            // *****************FIN PRUEBA***********
        }
        $stmt->bindParam(":id_proyecto", $datos["id_proyecto"], PDO::PARAM_STR);
        $stmt->bindParam(":nombre_proyecto", $datos["nombre_proyecto"], PDO::PARAM_STR);
        $stmt->bindParam(":tipo_proyecto", $datos["tipo_proyecto"], PDO::PARAM_STR);
        $stmt->bindParam(":codigo", $codigo, PDO::PARAM_STR);
        $stmt->bindParam(":linea_programatica", $datos["linea_programatica"], PDO::PARAM_STR);
        $stmt->bindParam(":clasificacion", $datos["clasificacion"], PDO::PARAM_STR);
        $stmt->bindParam(":estado_proyecto", $datos["estado_proyecto"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha_cierre", $datos["fecha_cierre"], PDO::PARAM_STR);
        $stmt->bindParam(":id_empresa", $datos["id_empresa"], PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";

        } else {

            return "error";

        }

        $stmt->close();

        $stmt = null;

    }
    /*=============================================
        BORRAR PROYECTO
    =============================================*/

    static public function mdlBorrarProyecto($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_proyecto = :id_proyecto");

        $stmt->bindParam(":id_proyecto", $datos, PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";

        } else {

            return "error";

        }
        $stmt->close();

        $stmt = null;

    }
}

