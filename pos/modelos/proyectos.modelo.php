
<?php

require_once "conexion.php";

class ModeloProyecto{

    /*=============================================
        MOSTRAR Proyecto
      =============================================*/


    static public function mdlMostrarProyecto($tabla, $item, $valor)
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
    REGISTRO DE Actividad
    =============================================*/

    static public function mdlIngresarProyecto($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre_proyecto,tipo_proyecto,codigo,linea_programatica,clasificacion,formatos,estado_proyecto,fecha_cierre,id_empresa) VALUES (:nombre_proyecto,:tipo_proyecto,:codigo,:linea_programatica,:clasificacion,:formatos,:estado_proyecto,:fecha_cierre,:id_empresa)");

        $stmt->bindParam(":nombre_proyecto", $datos["nombre_proyecto"], PDO::PARAM_STR);
        $stmt->bindParam(":tipo_proyecto", $datos["tipo_proyecto"], PDO::PARAM_STR);
        $stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
        $stmt->bindParam(":linea_programatica", $datos["linea_programatica"], PDO::PARAM_STR);
        $stmt->bindParam(":clasificacion", $datos["clasificacion"], PDO::PARAM_STR);
        $stmt->bindParam(":formatos", $datos["formatos"], PDO::PARAM_STR);
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
	RANGO FECHAS
	=============================================*/

    static public function mdlRangoFechasVentas($tabla, $fechaInicial, $fechaFinal){

        if($fechaInicial == null){

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id ASC");

            $stmt -> execute();

            return $stmt -> fetchAll();


        }else if($fechaInicial == $fechaFinal){

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha like '%$fechaFinal%'");

            $stmt -> bindParam(":fecha", $fechaFinal, PDO::PARAM_STR);

            $stmt -> execute();

            return $stmt -> fetchAll();

        }else{

            $fechaActual = new DateTime();
            $fechaActual ->add(new DateInterval("P1D"));
            $fechaActualMasUno = $fechaActual->format("Y-m-d");

            $fechaFinal2 = new DateTime($fechaFinal);
            $fechaFinal2 ->add(new DateInterval("P1D"));
            $fechaFinalMasUno = $fechaFinal2->format("Y-m-d");

            if($fechaFinalMasUno == $fechaActualMasUno){

                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha BETWEEN '$fechaInicial' AND '$fechaFinalMasUno'");

            }else{


                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha BETWEEN '$fechaInicial' AND '$fechaFinal'");

            }

            $stmt -> execute();

            return $stmt -> fetchAll();

        }

    }

}
