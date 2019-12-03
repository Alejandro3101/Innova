<?php

require_once "../../controladores/usuarios.controlador.php";
require_once "../../modelos/usuarios.modelo.php";

require_once "../../controladores/programa.controlador.php";
require_once "../../modelos/programa.modelo.php";

require_once "../../controladores/rol.controlador.php";
require_once "../../modelos/rol.modelo.php";



$reporte= new ControladorUsuarios();
$reporte -> ctrDescargarReporte3();



