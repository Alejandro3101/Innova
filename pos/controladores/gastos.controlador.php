<?php
class gastocontroller{

    /*=============================================
    REGISTRO DE GASTOS
    =============================================*/

    static public function ctrCrearGastos(){

        if(isset($_POST["nuevoconcepto"])){
            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoconcepto"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevovalor_gasto"])) {

                $gastos = "gastos";

                $datos = array("concepto" => $_POST["nuevoconcepto"],
                    "valor_gasto" => $_POST["nuevovalor_gasto"]);

                $respuesta = ModeloGastos::mdlIngresarGastos($gastos, $datos);

                if($respuesta == "ok"){
                    echo '<script>

					swal({
						type: "success",
						title: "¡El Gasto ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "gasto";

						}
					});
					</script>';
                }
            }else{

                echo '<script>

					swal({

						type: "error",
						title: "¡El gasto no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "gasto";
						}

					});

				</script>';
            }
        }
    }

    /*=============================================
    MOSTRAR GASTOS
    =============================================*/

    static public function ctrMostrarGastos($item, $valor){

        $gastos = "gastos";

        $respuesta = ModeloGastos::mdlMostrarGastos($gastos, $item, $valor);

        return $respuesta;
    }

    /*=============================================
    EDITAR GASTOS
    =============================================*/

    static public function ctrEditarGastos(){

        if (isset($_POST["editarid_gasto"])) {

            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarid_gasto"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarconcepto"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarvalor_gasto"])) {
            }

            $gastos = "gastos";

            $datos = array("id_gasto" => $_POST["editarid_gasto"],
                "concepto" => $_POST["editarconcepto"],
                "valor_gasto" => $_POST["editarvalor_gasto"]);
            $respuesta = ModeloGastos::mdlEditarGastos($gastos, $datos);


            if ($respuesta == "ok") {

                echo '<script>

					swal({

						type: "success",
						title: "¡El Gasto ha sido Actualizado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "gasto";

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
						
							window.location = "gasto";

						}

					});
				
				</script>';
            }
        }
    }

    /*=============================================
    ELIMINAR GASTOS
    =============================================*/
    public static function CrtEliminarGastos($idU){
        $oBJECT_RESP = ModeloGastos::MdlEliminarGasto($idU);

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