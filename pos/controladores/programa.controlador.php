<?php
class programacontroller{

    /*=============================================
        REGISTRO DE PROGRAMA
    =============================================*/
    static public function ctrCrearPrograma(){
        if(isset($_POST["nuevonombre_programa"])){
            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevonombre_programa"])){

                $programa = "programa";

                $datos = array("nombre_programa" => $_POST["nuevonombre_programa"]);

                $respuesta = ModelPrograma::mdlIngresarPrograma($programa, $datos);

                if($respuesta == "ok"){

                    echo '<script>

					swal({

						type: "success",
						title: "¡El usuario ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
							window.location = "programa";
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
                    
                        window.location = "programa";

                    }
                });
                </script>';

            }
        }
    }

    /*=============================================
    MOSTRAR PROGRAMA
    =============================================*/

    static public function ctrMostrarPrograma($item, $valor){

        $programa = "programa";

        $respuesta = ModelPrograma::mdlMostrarPrograma($programa, $item, $valor);

        return $respuesta;
    }

    /*=============================================
	EDITAR PROGRAMA
	=============================================*/

    static public function ctrEditarPrograma(){

        if (isset($_POST["editarid_programa"])) {

            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarid_programa"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarnombre_programa"])) {
            }

            $programa = "programa";

            $datos = array("id_programa" => $_POST["editarid_programa"],
                "nombre_programa" => $_POST["editarnombre_programa"]);
            $respuesta = ModelPrograma::mdlEditarPrograma($programa, $datos);

            if ($respuesta == "ok") {

                echo '<script>

					swal({

						type: "success",
						title: "¡El Gasto ha sido Actualizado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "programa";

						}

					});
					</script>';
            }else{

                echo '<script>

					swal({

						type: "error",
						title: "¡El Gasto no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "programa";

						}

					});
				
				</script>';
            }
        }
    }

    /*=============================================
    ELIMINAR PROGRAMA
	=============================================*/
    public static function CrtEliminarPrograma($idU){
        $oBJECT_RESP = ModelPrograma::MdlEliminarPrograma($idU);

        if ($oBJECT_RESP == "ok") {

            echo '<script>

			swal({
				type: "success",
				title: "El programa ha sido borrado correctamente",
				showConfirmButton: true,
				confirmButtonText: "Cerrar",
				closeOnConfirm: false
				}).then(function(result) {
					if (result.value) {

					window.location = "programa";

				}
			})

			</script>';
        }
    }
}