<?php
class evidenciacontroller{
    /*=============================================
        REGISTRO DE EVIDENCIAS
    =============================================*/
    static public function ctrCrearEvidencia(){
        if(isset($_POST["nuevotipo"])){
            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevotipo"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoevidencias"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoid_tarea"])) {

                $evidencias = "evidencias";

                $datos = array("tipo" => $_POST["nuevotipo"],
                    "evidencias" => $_POST["nuevoevidencias"],
                    "id_proyecto" => $_POST["nuevoid_proyecto"],
                    "id_tarea" => $_POST["nuevoid_tarea"]);

                   $respuesta = ModeloEvidencia::mdlIngresarEvidencia($evidencias, $datos);

                if($respuesta == "ok"){
                    echo '<script>
					swal({
						type: "success",
						title: "¡La Evidencia ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
					}).then(function(result){
						if(result.value){						
							window.location = "evidencia";
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
							window.location = "evidencia";
						}
					});
				</script>';
            }
        }
    }
    /*=============================================
      MOSTRAR TAREA
      =============================================*/
    static public function ctrMostrarEvidencia($item, $valor){

        $evidencias = "evidencias";

        $respuesta = ModeloEvidencia::mdlMostrarEvidencia($evidencias, $item, $valor);

        return $respuesta;
    }

    /*=============================================
    EDITAR TAREA
    =============================================*/

    static public function ctrEditarEvidencia(){
        if (isset($_POST["editarid_evidencia"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarid_evidencia"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editartipo"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarevidencias"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarid_tarea"])) {

            }

            $evidencias = "evidencias";

            $datos = array("id_evidencia" => $_POST["editarid_evidencia"],
                "tipo" => $_POST["editartipo"],
                "evidencias" => $_POST["editarevidencias"],
                "id_tarea" => $_POST["editarid_tarea"]);

            $respuesta = ModeloEvidencia::mdlEditarEvidencia($evidencias, $datos);

            if ($respuesta == "ok") {

                echo '<script>
				swal({
				type: "success",
				title: "¡La Tarea ha sido Actualizada correctamente!",
				showConfirmButton: true,
				confirmButtonText: "Cerrar"

				}).then(function(result){
				if(result.value){
					window.location = "evidencia";
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
							window.location = "evidencia";
						}

					});
				</script>';
            }
        }
    }

    /*=============================================
      Eliminar TAREAS
      =============================================*/
    public static function CrtEliminarEvidencia($idU){
        $oBJECT_RESP = ModeloEvidencia::MdlEliminarEvidencia($idU);

        if ($oBJECT_RESP == "ok") {

            echo '<script>

			swal({
				type: "success",
				title: "El Gasto ha sido borrado correctamente",
				showConfirmButton: true,
				confirmButtonText: "Cerrar",
				closeOnConfirm: false
				}).then(function(result) {
					if (result.value) {

					window.location = "gastos";

				}
			})

			</script>';
        }
    }
}

