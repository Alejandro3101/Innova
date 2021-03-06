<?php

class empresascontroller
{

    /*=============================================
        REGISTRO DE Empresas
        =============================================*/

    static public function ctrCrearEmpresas()
    {

        if (isset($_POST["nuevoNombreE"])) {

            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombreE"]) &&
            preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevotipo_empresa"])) {

                $tabla = "empresas";

                $datos = array("nombre_empresa" => $_POST["nuevoNombreE"],
                    "tipo_empresa" => $_POST["nuevotipo_empresa"],
                    "nit" => $_POST["nuevonit"],
                    "direccion" => $_POST["nuevadireccion"],
                    "telefono" => $_POST["nuevotelefono"],
                    "encargado" => $_POST["nuevoencargado"],
                    "celular" => $_POST["nuevocelular"],
                    "sector" => $_POST["nuevosector"]);


                $respuesta = ModeloEmpresa::mdlIngresarEmpresas($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

					swal({

						type: "success",
						title: "¡La Empresa ha sido guardada correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "empresas";

						}

					});
				

					</script>';


                }


            } else {

                echo '<script>

					swal({

						type: "error",
						title: "¡La Empresa no puede ir vacía o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "empresas";

						}

					});
				

				</script>';

            }


        }


    }

    /*=============================================
   MOSTRAR empresa
   =============================================*/

    static public function ctrMostrarEmpresa($item, $valor)
    {

        $tabla = "empresas";

        $respuesta = ModeloEmpresa::mdlMostrarEmpresa($tabla, $item, $valor);

        return $respuesta;
    }


    /*=============================================
   EDITAR Empresa
   =============================================*/

    static public function ctrEditarEmpresa()
    {

        if (isset($_POST["editarNombreE"])) {

            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombreE"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editartipo_empresa"])) {


            }
            $tabla = "empresas";

            $datos = array("nombre_empresa" => $_POST["editarNombreE"],
                "tipo_empresa" => $_POST["editartipo_empresa"],
                "nit" => $_POST["editarnit"],
                "direccion" => $_POST["editardireccion"],
                "telefono" => $_POST["editartelefono"],
                "encargado" => $_POST["editarencargado"],
                "celular" => $_POST["editarcelular"],
                "sector" => $_POST["editarsector"]);


            $respuesta = ModeloEmpresa::mdlEditarEmpresa($tabla, $datos);


            if ($respuesta == "ok") {

                echo '<script>

					swal({

						type: "success",
						title: "¡La Empresa se ha sido Actualizada correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "empresas";

						}

					});
				

					</script>';


            } else {

                echo '<script>

					swal({

						type: "error",
						title: "¡La Empresa no puede ir vacía o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "empresas";

						}

					});
				

				</script>';

            }
        }
    }


    /*--------------------------------------------
    Eliminar Empresa
    ---------------------------------------------*/

    static public function ctrBorrarEmpresa()
    {

        if (isset($_GET["id_empresa"])) {

            $tabla = "empresas";
            $datos = $_GET["id_empresa"];


            $respuesta = ModeloEmpresa::mdlBorrarEmpresa($tabla, $datos);

            if ($respuesta == "ok") {

                echo '<script>

				swal({
					  type: "success",
					  title: "La Empresa ha sido borrada correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result) {
								if (result.value) {

								window.location = "empresas";

								}
							})

				</script>';

            }

        }
    }
}
    ?>