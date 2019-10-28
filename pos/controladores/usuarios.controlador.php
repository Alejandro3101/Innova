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

               // $encriptar = crypt($_POST["nuevacontrasena"],'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');


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
	MOSTRAR Usuario
	=============================================*/

    static public function ctrMostrarusuario($item, $valor){

        $tabla = "persona";

        $respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);

        return $respuesta;
    }






}
	


