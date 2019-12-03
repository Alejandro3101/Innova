<?php

class ControladorUsuarios{

	/*=============================================
	INGRESO DE USUARIO
	=============================================*/

	static public function ctrIngresoUsuario(){

		if(isset($_POST["ingUsuario"])){

			if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUsuario"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])){

				$tabla = "persona";

				$item = "documento";
				$valor = $_POST["ingUsuario"];

				$respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);

				if($respuesta["documento"] == $_POST["ingUsuario"] && $respuesta["contrasena"] == $_POST["ingPassword"]){

					$_SESSION["iniciarSesion"] = "ok";
                    $_SESSION["id_persona"] = $respuesta["id_persona"];
                    $_SESSION["nombres"] = $respuesta["nombres"];
                    $_SESSION["apellidos"] = $respuesta["apellidos"];
                    $_SESSION["id_rol"] = $respuesta["id_rol"];





					echo '<script>

						window.location = "inicio";

					</script>';

				}else{

					echo '<br><div class="alert alert-danger">Error al ingresar, vuelve a intentarlo</div>';

				}

			}	

		}

	}
    /*=============================================
    REGISTRO DE USUARIO
    =============================================*/

    static public function ctrCrearUsuario(){

        if(isset($_POST["nuevoNombre"])){

            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoApellido"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoid_rol"]) ) {


                $tabla = "persona";


                $datos = array("nombres" => $_POST["nuevoNombre"],
                    "apellidos" => $_POST["nuevoApellido"],
                    "tipo_documento" => $_POST["nuevoTdocumento"],
                    "documento" => $_POST["nuevoDocumento"],
                    "celular" => $_POST["nuevocelular"],
                    "email" => $_POST["nuevoemail"],
                    "profesion" => $_POST["nuevaprofesion"],
                    "tipo_vinculacion" => $_POST["nuevoTvinculacion"],
                    "cvlac" => $_POST["nuevoCvlac"],
                    "cargo" => $_POST["nuevoCargo"],
                    "ficha" => $_POST["nuevaFicha"],
                    "fecha_vinculacion" => $_POST["nuevaFechaVinculacion"],
                    "fecha_desvinculacion" => $_POST["nuevafechaDesvinculacion"],
                    "estado_vinculacion" => $_POST["nuevoestado"],
                    "contrasena" => $_POST["nuevacontrasena"],
                    "id_programa" => $_POST["nuevoid_programa"],
                    "id_rol" => $_POST["nuevoid_rol"]);


                $respuesta = ModeloUsuarios::mdlIngresarUsuario($tabla, $datos);

                if($respuesta == "ok"){

                    echo '<script>

					swal({

						type: "success",
						title: "¡El usuario ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "usuarios";

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
						
							window.location = "usuarios";

						}

					});
				

				</script>';

            }


        }


    }

    /*=============================================
	MOSTRAR USUARIO
	=============================================*/

    static public function ctrMostrarUsuario($item, $valor){

        $tabla = "persona";

        $respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);

        return $respuesta;
    }
    /*=============================================
        EDITAR USUARIO
    =============================================*/

    static public function ctrEditarUsuario(){
        if (isset($_POST["editarid_persona"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarid_persona"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarnombres"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarapellidos"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editartipo_documento"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editardocumento"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarcelular"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editaremail"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarprofesion"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editartipo_vinculacion"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editartipo_rol"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarcvlac"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarcargo"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarficha"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarfecha_vinculacion"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarfecha_desvinculacion"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarestado_vinculacion"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarcontrasena"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarid_programa"])) {
            }
            $tabla = "persona";

            $datos = array("id_persona" => $_POST["editarid_persona"],
              "nombres" => $_POST["editarnombres"],
              "apellidos" => $_POST["editarapellidos"],
              "tipo_documento" => $_POST["editartipo_documento"],
              "documento" => $_POST["editardocumento"],
              "celular" => $_POST["editarcelular"],
              "email" => $_POST["editaremail"],
              "profesion" => $_POST["editarprofesion"],
              "tipo_vinculacion" => $_POST["editartipo_vinculacion"],
              "id_rol" => $_POST["editartipo_rol"],
              "cvlac" => $_POST["editarcvlac"],
              "cargo" => $_POST["editarcargo"],
              "ficha" => $_POST["editarficha"],
              "fecha_vinculacion" => $_POST["editarfecha_vinculacion"],
              "fecha_desvinculacion" => $_POST["editarfecha_desvinculacion"],
              "estado_vinculacion" => $_POST["editarestado_vinculacion"],
              "contrasena" => $_POST["editarcontrasena"],
              "id_programa" => $_POST["editarid_programa"]);
            $respuesta = ModeloUsuarios::mdlEditarUsuario($tabla, $datos);
            if ($respuesta == "ok") {
                echo '<script>
                    swal({
                    type: "success",
                    title: "¡El Usuario ha sido Actualizado correctamente!",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"

                    }).then(function(result){
                    if(result.value){
                        window.location = "usuarios";
                    }
                });
                </script>';

            }else{
                echo '<script>
					swal({
						type: "error",
						title: "¡El Usuario no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
							window.location = "usuarios";
						}

					});
				</script>';
            }
        }
    }
    /*=============================================
    Eliminar Usuarios
    =============================================*/

    static public function ctrBorrarUsuario()
    {

        if (isset($_GET["id_persona"])) {

            $tabla = "persona";
            $datos = $_GET["id_persona"];


            $respuesta = ModeloUsuarios::mdlBorrarUsuarios($tabla, $datos);

            if ($respuesta == "ok") {

                echo '<script>

				swal({
					  type: "success",
					  title: "El Usuario ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result) {
								if (result.value) {

								window.location = "usuarios";

								}
							})

				</script>';

            }

        }
    }
}
?>
	


