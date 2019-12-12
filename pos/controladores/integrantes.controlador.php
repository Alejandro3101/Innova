<?php

class integrantecontroller
{

    /*=============================================
        REGISTRO DE Actividades
     =============================================*/

    static public function ctrCrearIntegrantes()
    {

        if (isset($_POST["nuevorol"])) {

            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevorol"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoestado"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoid_persona"])) {


                $tabla = "integrantes";


                $datos = array("rol" => $_POST["nuevorol"],
                    "estado_integrante" => $_POST["nuevoestado"],
                    "id_persona" => $_POST["nuevoid_persona"],
                    "id_proyecto" => $_POST["nuevoid_proyecto"]);


                $respuesta = ModeloIntegrantes::mdlIngresarIntegrantes($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

					swal({

						type: "success",
						title: "¡El integrante ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "integrante";

						}

					});
				

					</script>';


                }


            } else {

                echo '<script>

					swal({

						type: "error",
						title: "¡El usuario no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "integrante";

						}

					});
				

				</script>';

            }


        }


    }

    /*=============================================
        EDITAR DE Actividades
     =============================================*/

     static public function ctrEditarIntegrantes()
     {

         if (isset($_POST["editarol"])) {

             if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarol"]) &&
                 preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarestado"]) &&
                 preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarid_persona"])) {


                 $tabla = "integrantes";


                 $datos = array("id_integrante" => $_POST["editarid_integrante"],
                     "rol" => $_POST["editarol"],
                     "estado_integrante" => $_POST["editarestado"],
                     "id_persona" => $_POST["editarid_persona"],
                     "id_proyecto" => $_POST["editarid_proyecto"]);


                 $respuesta = ModeloIntegrantes::mdlEditarIntegrantes($tabla, $datos);

                 if ($respuesta == "ok") {

                     echo '<script>
 
                     swal({
 
                         type: "success",
                         title: "¡El integrante ha sido Actualizado correctamente!",
                         showConfirmButton: true,
                         confirmButtonText: "Cerrar"
 
                     }).then(function(result){
 
                         if(result.value){
                         
                             window.location = "integrante";
 
                         }
 
                     });
                 
 
                     </script>';


                 }


             } else {

                 echo '<script>
 
                     swal({
 
                         type: "error",
                         title: "¡El usuario no puede ir vacío o llevar caracteres especiales!",
                         showConfirmButton: true,
                         confirmButtonText: "Cerrar"
 
                     }).then(function(result){
 
                         if(result.value){
                         
                             window.location = "integrante";
 
                         }
 
                     });
                 
 
                 </script>';

             }


         }


     }

    /*=============================================
	MOSTRAR integrante
	=============================================*/

    static public function ctrMostrarIntegrantes($item, $valor)
    {

        $tabla = "integrantes";
        $idRol = $_SESSION["id_rol"];
        if($idRol==4){
            $respuesta = ModeloIntegrantes::mdlMostrarIntegrantes($tabla, $item, $valor);
        }else{
            $respuesta = ModeloIntegrantes::mdlMostrarIntegrantesLimitado($tabla, $item, $valor);
        }

        

        return $respuesta;


    }

    /*--------------------------------------------
        Eliminar Integrantes
    ---------------------------------------------*/

    static public function ctrBorrarIntegrantes()
    {
        if (isset($_GET["id_integrante"])) {

            $tabla = "integrantes";
            $datos = $_GET["id_integrante"];


            $respuesta = ModeloIntegrantes::mdlBorrarIntegrante($tabla, $datos);

            if ($respuesta == "ok") {

                echo '<script>

				swal({
					  type: "success",
					  title: "El integrante ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result) {
								if (result.value) {

								window.location = "integrante";

								}
							})

				</script>';

            }

        }
    }


    /*=============================================
      DESCARGAR EXCEL
      =============================================*/

    public function ctrDescargarReporte2(){

        if(isset($_GET["reporte"])){

            $tabla = "integrantes";

            if(isset($_GET["fechaInicial"]) && isset($_GET["fechaFinal"])){

                $integrante = ModeloIntegrantes::mdlRangoFechasVentas($tabla, $_GET["fechaInicial"], $_GET["fechaFinal"]);

            }else{

                $item = null;
                $valor = null;

                $integrante = ModeloIntegrantes::mdlMostrarIntegrantes($tabla, $item, $valor);


            }


            /*=============================================
            CREAMOS EL ARCHIVO DE EXCEL
            =============================================*/

            $Name = $_GET["reporte"].'.xls';

            header('Expires: 0');
            header('Cache-control: private');
            header("Content-type: application/vnd.ms-excel"); // Archivo de Excel
            header("Cache-Control: cache, must-revalidate");
            header('Content-Description: File Transfer');
            header('Last-Modified: '.date('D, d M Y H:i:s'));
            header("Pragma: public");
            header('Content-Disposition:; filename="'.$Name.'"');
            header("Content-Transfer-Encoding: binary");

            echo utf8_decode("<table border='0'> 

					<tr> 
					<td style='font-weight:bold; border:1px solid #eee;'>Codigo</td> 
					<td style='font-weight:bold; border:1px solid #eee;'>Nombre</td>
					<td style='font-weight:bold; border:1px solid #eee;'>Proyecto</td>
					<td style='font-weight:bold; border:1px solid #eee;'>Rol</td>	
					<td style='font-weight:bold; border:1px solid #eee;'>Estado</td>		
					<td style='font-weight:bold; border:1px solid #eee;'>Programa</td>									
					
					</tr>");

            foreach ($integrante as $row => $item){

                $usuario = ControladorUsuarios::ctrMostrarUsuario("id_persona", $item["id_persona"]);
                $proyecto = Proyectocontroller::ctrMostrarproyecto("id_proyecto", $item["id_proyecto"]);

                echo utf8_decode("<tr>
			 			<td style='border:1px solid #eee;'>".$item["id_integrante"]."</td> 
			 		    <td style='border:1px solid #eee;'>".$usuario["nombres"]."</td>
			 			<td style='border:1px solid #eee;'>".$proyecto["nombre_proyecto"]."</td>			 			
			 			<td style='border:1px solid #eee;'>".$item["rol"]."</td> 
			 			<td style='border:1px solid #eee;'>".$item["estado_integrante"]."</td> 
			 			
			 			
		 			</tr>");


            }


            echo "</table>";

        }

    }

}

?>
