 <?php

require_once "../../controladores/usuarios.controlador.php";
require_once "../../modelos/usuarios.modelo.php";

require_once "../../controladores/integrantes.controlador.php";
require_once "../../modelos/integrantes.modelo.php";

require_once "../../controladores/proyectos.controlador.php";
require_once "../../modelos/proyectos.modelo.php";


$reporte= new integrantecontroller();
$reporte -> ctrDescargarReporte2();



