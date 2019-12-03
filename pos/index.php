<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/rol.controlador.php";
require_once "controladores/actividades.controlador.php";
require_once "controladores/recursos.controlador.php";
require_once "controladores/tareas.controlador.php";
require_once "controladores/evidencias.controlador.php";
require_once "controladores/gastos.controlador.php";
require_once "controladores/empresas.controlador.php";
require_once "controladores/autores.controlador.php";
require_once "controladores/proyectos.controlador.php";
require_once "controladores/integrantes.controlador.php";
require_once "controladores/programa.controlador.php";
require_once "controladores/codigoformato.controlador.php";



require_once "modelos/programa.modelo.php";
require_once "modelos/codigoformato.modelo.php";
require_once "modelos/integrantes.modelo.php";
require_once "modelos/proyectos.modelo.php";
require_once "modelos/usuarios.modelo.php";
require_once "modelos/autores.modelo.php";
require_once "modelos/rol.modelo.php";
require_once "modelos/actividades.modelo.php";
require_once "modelos/recursos.modelo.php";
require_once "modelos/tareas.modelo.php";
require_once "modelos/evidencias.modelo.php";
require_once "modelos/gastos.modelo.php";
require_once "modelos/empresas.modelo.php";


$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();