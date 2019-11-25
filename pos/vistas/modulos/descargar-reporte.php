 <?php

require_once "../../controladores/proyectos.controlador.php";
require_once "../../modelos/proyectos.modelo.php";

require_once "../../controladores/usuarios.controlador.php";
require_once "../../modelos/usuarios.modelo.php";

 require_once "../../controladores/empresas.controlador.php";
 require_once "../../modelos/empresas.modelo.php";

 require_once "../../controladores/autores.controlador.php";
 require_once "../../modelos/autores.modelo.php";


$reporte = new Proyectocontroller();
$reporte -> ctrDescargarReporte();