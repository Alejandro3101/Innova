<?php
class autorescontroller{
    /*=============================================
        REGISTRO DE autores
    =============================================*/
    static public function ctrCrearAutores(){

        if(isset($_POST["nuevonombres"])){
            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevonombres"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoapellidos"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevotipo_documento"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevodocumento"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevocelular"])) {

                $autores = "autores";

                $datos = array("nombres" => $_POST["nuevonombres"],
                    "apellidos" => $_POST["nuevoapellidos"],
                    "tipo_documento" => $_POST["nuevotipo_documento"],
                    "documento" => $_POST["nuevodocumento"],
                    "email" => $_POST["nuevoemail"],
                    "celular" => $_POST["nuevocelular"]);

                $respuesta = ModeloAutor::mdlIngresarAutores($autores, $datos);

                if($respuesta == "ok"){
                    echo '<script>
					swal({
						type: "success",
						title: "¡El usuario ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
					}).then(function(result){
						if(result.value){						
							window.location = "autor";
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
							window.location = "autor";
						}
					});
				</script>';
            }
        }
    }
    /*=============================================
    MOSTRAR AUTORES
    =============================================*/
    static public function ctrMostrarAutores($item, $valor){

        $autores = "autores";

        $respuesta = ModeloAutor::mdlMostrarAutores($autores, $item, $valor);

        return $respuesta;
    }
    /*=============================================
	EDITAR AUTORES
	=============================================*/

    static public function ctrEditarAutores(){
        if (isset($_POST["editarid_autor"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarid_autor"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarnombres"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarapellidos"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editartipo_documento"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editardocumento"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editaremail"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarcelular"])) {

            }

            $autores = "autores";

            $datos = array("id_autor" => $_POST["editarid_autor"],
                "nombres" => $_POST["editarnombres"],
                "apellidos" => $_POST["editarapellidos"],
                "tipo_documento" => $_POST["editartipo_documento"],
                "documento" => $_POST["editardocumento"],
                "email" => $_POST["editaremail"],
                "celular" => $_POST["editarcelular"]);

            $respuesta = ModeloAutor::mdlEditarAutores($autores, $datos);

            if ($respuesta == "ok") {

                echo '<script>
                swal({
                type: "success",
                title: "¡La Tarea ha sido Actualizada correctamente!",
                showConfirmButton: true,
                confirmButtonText: "Cerrar"

                }).then(function(result){
                if(result.value){
                    window.location = "autor";
                }
                });
                </script>';
            }else{
                echo '<script>
                    swal({
                        type: "error",
                        title: "¡El Aula no puede ir vacío o llevar caracteres especiales!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"

                        }).then(function(result){

                        if(result.value){
                            window.location = "autor";
                        }

                        });
                </script>';
            }
        }
    }
    /*=============================================
    Eliminar AUTORES
    =============================================*/
    public static function CrtEliminarAutores($idU){
        $oBJECT_RESP = ModeloAutor::MdlEliminarAutores($idU);

        if ($oBJECT_RESP == "ok") {

            echo '<script>

            swal({
                type: "success",
                title: "El Autor ha sido borrado correctamente",
                showConfirmButton: true,
                confirmButtonText: "Cerrar",
                closeOnConfirm: false
                }).then(function(result) {
                    if (result.value) {

                    window.location = "autor";

                }
            })

            </script>';
        }
    }
}