<?php

class rolcontroller
{

    /*=============================================
        REGISTRO DE USUARIO
        =============================================*/

    static public function ctrCrearRol(){

        if(isset($_POST["nuevoNombre"])){

            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevocodigo"])) {


                $tabla = "Rol";

                $datos = array("Nombre" => $_POST["nuevoNombre"],
                    "Codigo" => $_POST["nuevocodigo"]);


                $respuesta = ModeloRol::mdlIngresarRol($tabla, $datos);

                if($respuesta == "ok"){

                    echo '<script>

					swal({

						type: "success",
						title: "¡El usuario ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "rol";

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
						
							window.location = "rol";

						}

					});
				

				</script>';

            }


        }


    }


    /*=============================================
	MOSTRAR Rol
	=============================================*/

    static public function ctrMostrarRol($item, $valor){

        $tabla = "rol";

        $respuesta = ModeloRol::MdlMostrarRol($tabla, $item, $valor);

        return $respuesta;
    }
}




?>