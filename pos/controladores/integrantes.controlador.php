<?php

class integrantecontroller
{

    /*=============================================
        REGISTRO DE Actividades
     =============================================*/

    static public function ctrCrearIntegrantes(){

        if(isset($_POST["nuevorol"])){

            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevorol"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoestado"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoid_persona"])) {


                $tabla = "integrantes";


                $datos = array("rol" => $_POST["nuevorol"],
                    "estado_integrante" => $_POST["nuevoestado"],
                    "id_persona" => $_POST["nuevoid_persona"],
                    "id_proyecto" => $_POST["nuevoid_proyecto"]);


                $respuesta = ModeloIntegrantes::mdlIngresarIntegrantes($tabla, $datos);

                if($respuesta == "ok"){

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


            }else{

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

    static public function ctrMostrarIntegrantes($item, $valor){

        $tabla = "integrantes";

        $respuesta = ModeloIntegrantes::mdlMostrarIntegrantes($tabla, $item, $valor);

        return $respuesta;


    }
}
