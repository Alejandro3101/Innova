<?php

class actividadescontroller{

    /*=============================================
        REGISTRO DE Actividades
    =============================================*/

    static public function ctrCrearActividades(){

        if(isset($_POST["nuevoNombreAct"])){

            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombreAct"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevadescripcion"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoestado"])) {


                $tabla = "actividades";


                $datos = array("nombre_actividad" => $_POST["nuevoNombreAct"],
                    "descripcion" => $_POST["nuevadescripcion"],
                    "estado" => $_POST["nuevoestado"],
                    "id_proyecto" => $_POST["nuevoproyecto"]);


                $respuesta = ModeloActividades::mdlIngresarActividades($tabla, $datos);

                if($respuesta == "ok"){

                    echo '<script>

					swal({

						type: "success",
						title: "¡La Actividad ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "actividades";

						}

					});
				

					</script>';


                }


            }else{

                echo '<script>

					swal({

						type: "error",
						title: "¡La Actividad no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "actividades";

						}
					});
				</script>';
            }
        }
    }
    
    /*=============================================
        EDITAR DE Actividades
     =============================================*/
    static public function ctrEditarActividades(){

        if(isset($_POST["editarNombreAct"])){

            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombreAct"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editardescripcion"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarestado"])) {


                $tabla = "actividades";


                $datos = array("id_actividad" => $_POST["editarIdAct"],
                    "nombre_actividad" => $_POST["editarNombreAct"],
                    "descripcion" => $_POST["editardescripcion"],
                    "estado" => $_POST["editarestado"],
                    "id_proyecto" => $_POST["editarproyecto"]);


                $respuesta = ModeloActividades::mdlEditarActividades($tabla, $datos);

                if ($respuesta == "ok") {
                    echo '<script>
                        swal({
                        type: "success",
                        title: "¡La Actividad ha sido Actualizada correctamente!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
    
                        }).then(function(result){
                        if(result.value){
                            window.location = "actividades";
                        }
                    });
                    </script>';
    
                }else{
                    echo '<script>
                        swal({
                            type: "error",
                            title: "¡La Actividad no puede ir vacío o llevar caracteres especiales!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
    
                        }).then(function(result){
    
                            if(result.value){
                                window.location = "actividades";
                            }
    
                        });
                    </script>';
                }


            }else{

                echo '<script>

					swal({

						type: "error",
						title: "¡La Actividad no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "actividades";

						}

					});
				

				</script>';

            }


        }


    }


    /*=============================================
    MOSTRAR Actividades
    =============================================*/

    static public function ctrMostrarActividades($item, $valor){

        $tabla = "actividades";

        $respuesta = ModeloActividades::mdlMostrarActividades($tabla, $item, $valor);

        return $respuesta;
    }



    /*============================================
    Eliminar Actividades
    ==============================================*/

    static public function ctrBorrarActividades()
    {

        if (isset($_GET["id_actividad"])) {

            $tabla = "actividades";
            $datos = $_GET["id_actividad"];


            $respuesta = ModeloActividades::mdlBorrarActividades($tabla, $datos);

            if ($respuesta == "ok") {

                echo '<script>

				swal({
					  type: "success",
					  title: "La Actividad ha sido borrada correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result) {
								if (result.value) {

								window.location = "actividades";

								}
							})

				</script>';

            }

        }
    }
}
?>

