<?php
class recursocontroller{

    /*=============================================
    REGISTRO DE RECURSOS
    =============================================*/
    static public function ctrCrearRecursos(){
        if (isset($_POST["nuevorubro"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevorubro"]) &&
            preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoconcepto"]) &&
            preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevovalor_rubro"]) &&
            preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevovalor_proyecto"]) &&
            preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoid_proyecto"])){

                $recursos = "recursos"; 
                
                $datos = array("rubro" => $_POST["nuevorubro"],
                "concepto" => $_POST["nuevoconcepto"],
                "valor_rubro" => $_POST["nuevovalor_rubro"],
                "valor_proyecto" => $_POST["nuevovalor_proyecto"],
                "id_proyecto" => $_POST["nuevoid_proyecto"]);
                $respuesta = ModeloRecurso::mdlIngresarRecursos($recursos, $datos);

                if ($respuesta == "ok") {
                    echo '<script>
					swal({

						type: "success",
						title: "¡El recurso ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "recurso";

						}

                    });
                    
					</script>';
                }
            }else{
                echo '<script>

					swal({

						type: "error",
						title: "¡El recurso no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "recurso";

						}

					});

				</script>';
            }
        }
    }
    /*=============================================
        MOSTRAR RECURSOS
    =============================================*/
    static public function ctrMostrarRecursos($item, $valor){

        $recursos = "recursos";
  
        $respuesta = ModeloRecurso::mdlMostrarRecursos($recursos, $item, $valor);
  
        return $respuesta;
    }
    /*=============================================
	EDITAR RECURSOS
	=============================================*/
    static public function ctrEditarRecursos(){
        if (isset($_POST["editarid_recurso"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarid_recurso"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarrubro"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarconcepto"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarvalor_rubro"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarvalor_proyecto"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarid_proyecto"])) {

            }

            $recursos = "recursos";

            $datos = array("id_recurso" => $_POST["editarid_recurso"],
                "rubro" => $_POST["editarrubro"],
                "concepto" => $_POST["editarconcepto"],
                "valor_rubro" => $_POST["editarvalor_rubro"],
                "valor_proyecto" => $_POST["editarvalor_proyecto"],
                "id_proyecto" => $_POST["editarid_proyecto"]);

            $respuesta = ModeloRecurso::mdlEditarRecursos($recursos, $datos);

            if ($respuesta == "ok") {

                echo '<script>
                swal({
                type: "success",
                title: "¡El recurso ha sido Actualizada correctamente!",
                showConfirmButton: true,
                confirmButtonText: "Cerrar"

                }).then(function(result){
                if(result.value){
                    window.location = "recurso";
                }
                });
                </script>';
            }else{
                echo '<script>
					swal({
						type: "error",
						title: "¡El recurso no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
							window.location = "recurso";
						}

					});
				</script>';
            }
        }
    }
    /*=============================================
        ELIMINAR RECURSOS
    =============================================*/
    public static function CrtEliminarRecursos($idU){
        $oBJECT_RESP = ModeloRecurso::MdlEliminarRecursos($idU);

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

                    window.location = "recurso";

                }
            })

            </script>';
        }
    }
}