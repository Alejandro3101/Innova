<?php

class Proyectocontroller
{

    /*===========================================
       REGISTRO DE proyecto
    =============================================*/

    static public function ctrCrearProyecto()
    {

        if (isset($_POST["nuevoNombre"])) {

            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoestado"])) {


                $tabla = "proyectos";


                $datos = array("nombre_proyecto" => $_POST["nuevoNombre"],
                    "tipo_proyecto" => $_POST["nuevoTproyecto"],
                    "codigo" => $_POST["nuevocodigo"],
                    "linea_programatica" => $_POST["nuevaLineaP"],
                    "clasificacion" => $_POST["nuevaclasificacion"],
                    "estado_proyecto" => $_POST["nuevoestado"],
                    "fecha_cierre" => $_POST["Fecha"],
                    "formatos" => $_POST["nuevoformato"],
                    "id_empresa" => $_POST["nuevoid_empresa"]);


                $respuesta = ModeloProyecto::mdlIngresarProyecto($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

					swal({

						type: "success",
						title: "¡El proyecto ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "proyecto";

						}

					});
				

					</script>';


                }


            } else {

                echo '<script>

					swal({

						type: "error",
						title: "¡El proyecto no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "proyecto";

						}

					});
				

				</script>';

            }


        }


    }


    /*=============================================
   MOSTRAR proyecto
   =============================================*/

    static public function ctrMostrarproyecto($item, $valor)
    {

        $tabla = "proyectos";

        $respuesta = ModeloProyecto::mdlMostrarProyecto($tabla, $item, $valor);

        return $respuesta;
    }

    /*--------------------------------------------
    Eliminar Prestamo
    ---------------------------------------------*/

    static public function ctrBorrarProyecto()
    {

        if (isset($_GET["id_proyecto"])) {

            $tabla = "proyectos";
            $datos = $_GET["id_proyecto"];


            $respuesta = ModeloProyecto::mdlBorrarProyecto($tabla, $datos);

            if ($respuesta == "ok") {

                echo '<script>

				swal({
					  type: "success",
					  title: "El proyecto ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result) {
								if (result.value) {

								window.location = "proyecto";

								}
							})

				</script>';

            }

        }
    }


        /*=============================================
	DESCARGAR EXCEL
	=============================================*/

    public function ctrDescargarReporte()
    {

        if (isset($_GET["reporte"])) {

            $tabla = "proyecto";

            if (isset($_GET["fechaInicial"]) && isset($_GET["fechaFinal"])) {

                $ventas = ModeloProyecto::mdlRangoFechasVentas($tabla, $_GET["fechaInicial"], $_GET["fechaFinal"]);

            } else {

                $item = null;
                $valor = null;

                $ventas = ModeloProyecto::mdlMostrarProyecto($tabla, $item, $valor);

            }


            /*=============================================
            CREAMOS EL ARCHIVO DE EXCEL
            =============================================*/

            $Name = $_GET["reporte"] . '.xls';

            header('Expires: 0');
            header('Cache-control: private');
            header("Content-type: application/vnd.ms-excel"); // Archivo de Excel
            header("Cache-Control: cache, must-revalidate");
            header('Content-Description: File Transfer');
            header('Last-Modified: ' . date('D, d M Y H:i:s'));
            header("Pragma: public");
            header('Content-Disposition:; filename="' . $Name . '"');
            header("Content-Transfer-Encoding: binary");

            echo utf8_decode("<table border='0'> 

					<tr> 
					<td style='font-weight:bold; border:1px solid #eee;'>CÓDIGO</td> 		
					<td style='font-weight:bold; border:1px solid #eee;'>NOMBRE PROYECTO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>EMPRESA</td>
					<td style='font-weight:bold; border:1px solid #eee;'>AUTOR</td>					
					<td style='font-weight:bold; border:1px solid #eee;'>FECHA</td>	
					<td style='font-weight:bold; border:1px solid #eee;'>ESTADO</td>			
					</tr>");

        }
    }
}





































?>