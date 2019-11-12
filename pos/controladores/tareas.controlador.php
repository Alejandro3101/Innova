<?php

class ControladorTareas{
    /*=============================================
    REGISTRO DE TAREAS
    =============================================*/
    static public function ctrCrearTarea(){
        if (isset($_POST["nuevonombre_tarea"])) {

            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevonombre_tarea"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevodescripcion"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoestado"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoid_actividad"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoid_integrante"])) {

                $tareas = "tareas";

                $datos = array("nombre_tarea" => $_POST["nuevonombre_tarea"],
                    "descripcion" => $_POST["nuevodescripcion"],
                    "estado" => $_POST["nuevoestado"],
                    "id_actividad" => $_POST["nuevoid_actividad"],
                    "id_integrante" => $_POST["nuevoid_integrante"]);

                $respuesta = ModeloTareas::mdlIngresarTareas($tareas, $datos);

                if ($respuesta == "ok") {
                    echo '<script>
          swal({
            type: "success",
            title: "¡La Tarea ha sido guardado correctamente!",
            showConfirmButton: true,
            confirmButtonText: "Cerrar"
          }).then(function(result){
            if(result.value){
              window.location = "tarea";
            }
          });
          </script>';
                }
            }else{
                echo '<script>
        swal({
          type: "error",
          title: "¡La Tarea no puede ir vacío o llevar caracteres especiales!",
          showConfirmButton: true,
          confirmButtonText: "Cerrar"
        }).then(function(result){
          if(result.value){
            window.location = "tarea";
          }
        });
        </script>';
            }
        }
    }

    /*=============================================
    MOSTRAR TAREA
    =============================================*/
    static public function ctrMostrarTareas($item, $valor){

      $tareas = "tareas";

      $respuesta = ModeloTareas::mdlMostrarTareas($tareas, $item, $valor);

      return $respuesta;
    }

    /*=============================================
    EDITAR TAREA
    =============================================*/

    static public function ctrEditarTarea(){
        if (isset($_POST["editarid_tarea"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarid_tarea"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarnombre_tarea"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editardescripcion"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarestado"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarid_actividad"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarid_integrante"])) {

            }

            $tareas = "tareas";

            $datos = array("id_tarea" => $_POST["editarid_tarea"],
              "nombre_tarea" => $_POST["editarnombre_tarea"],
              "descripcion" => $_POST["editardescripcion"],
              "estado" => $_POST["editarestado"],
              "id_actividad" => $_POST["editarid_actividad"],
              "id_integrante" => $_POST["editarid_integrante"]);

            $respuesta = ModeloTareas::mdlEditarTarea($tareas, $datos);

            if ($respuesta == "ok") {

                echo '<script>
        swal({
          type: "success",
          title: "¡La Tarea ha sido Actualizada correctamente!",
          showConfirmButton: true,
          confirmButtonText: "Cerrar"

        }).then(function(result){
          if(result.value){
            window.location = "tarea";
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
							window.location = "tarea";
						}

					});
				</script>';
            }
        }
    }

    /*=============================================
    Eliminar TAREAS
    =============================================*/
    public static function CrtEliminarTarea($idU){
        $oBJECT_RESP = ModeloTareas::MdlEliminarTarea($idU);

        if ($oBJECT_RESP == "ok") {

            echo '<script>

			swal({
				type: "success",
				title: "la Tarea ha sido borrado correctamente",
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
