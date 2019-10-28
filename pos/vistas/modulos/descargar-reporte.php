<?php

require_once "../../controladores/proyectos.controlador.php";
require_once "../../modelos/proyectos.modelo.php";

require_once "../../controladores/usuarios.controlador.php";
require_once "../../modelos/usuarios.modelo.php";

$reporte = new Proyectocontroller();
$reporte -> ctrDescargarReporte();