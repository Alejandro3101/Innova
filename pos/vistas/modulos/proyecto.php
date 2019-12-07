<div class="content-wrapper">

    <section class="content-header">

        <h1>

             Proyectos

        </h1>

        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

            <li class="active">Proyectos</li>

        </ol>

    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <button class="btn btn-warning" data-toggle="modal" data-target="#modalAgregarProyecto">
                    Agregar Proyecto
                </button>
               <!-- <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#modalSIGUIENTE"'> Recursos → </button>  -->
            </div>
            <div class="box-body">
                <table class="table table-bordered table-striped tablas tablaProyecto ">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Tipo</th>
                        <th>Codigo</th>
                        <th>Clasificacion</th>
                        <th>Estado</th>
                        <th>Fecha_cierre</th>
                        <th>Formatos</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            $item = null;
                            $valor = null;
                            $proyecto = Proyectocontroller::ctrMostrarproyecto($item, $valor);
                            foreach ($proyecto as $key => $value){

                                echo ' <tr>
                                    <td>'.($key+1).'</td>
                                    <td>'.$value["nombre_proyecto"].'</td>
                                    <td>'.$value["tipo_proyecto"].'</td>';
                                echo '
                                    <td>'.$value["codigo"].'</td>   
                                    <td>'.$value["clasificacion"].'</td>
                                    <td>'.$value["estado_proyecto"].'</td>
                                    <td>'.$value["fecha_cierre"].'</td> 
                                    <td><button class="btn btn-success btn-xs btnFormatos" idProyecto = "'.$value["id_proyecto"].'" data-toggle="modal" data-target="#modalFormato">Formatos</button></td>
                                    <td>
                                        <i class="btn-group">

                                        <button type="button" class="btn btn-primary btnEditarProyecto" Proyectoid="'.$value["id_proyecto"].'" data-toggle="modal" data-target="#modaleditarProyecto"><i class="fa fa-pencil"></i></button>
                                        <button class="btn btn-danger btnEliminarProyecto" id_proyecto="'.$value["id_proyecto"].'" ><i class="fa fa-times"></i></button>                       
                                            
                                        <a href="recurso" class="btn btn-info"><i class="fa fa-arrow-right"></i></a>
                                                    
                                    </div>

                                </td>
                            </tr>';
                            }
                        ?>

                    </tbody>

                </table>

            </div>

        </div>


    </section>

</div>
<!--=====================================
MODAL VER FORMATOS
======================================-->
<div id="modalFormato" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            
                <!--=====================================
                CABEZA DEL MODAL
                ======================================-->
                <div class="modal-header" style="background:#222d32; color:white">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Formatos de el Proyecto</h4>
                </div>
                <!--=====================================
                CUERPO DEL MODAL
                ======================================-->
                <div class="modal-body">
                    <!--=====================================
                        AGREGAR  FORMATOS
                    ======================================-->
                    <div class="box-body">
                        <h4>Agregar Formato</h4>
                        <form role="form" id = "formFormatoCreate" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="nuevoFormatoProyecto" id = "nuevoFormatoProyecto">
                            <!-- ENTRADA PARA EL CODIGO -->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <select name="nuevoFormatoCodigo"  id="nuevoFormatoCodigo" style = " width: 100%;" required>
                                        <option value = "">Seleccione el Codigo</option>
                                        <?php
                                            $formato = ControladorCodigoFormato::ctrListaCodigoFormato();
                                            foreach ($formato as $key => $form){
                                                echo ' <option value = "'.$form["id_codigo_formato"].'">'.$form["codigo"]." ".$form["nombre"].'</option>' ;
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <!-- ENTRADA PARA EL FORMATO -->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="file" class="form-control input-lg" name="nuevoFormatoArchivo" id="nuevoFormatoArchivo" placeholder="Ingresar el Archivo" required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Guardar Formato</button>
                        </form>
                        <div class="clearfix">
                        <br>
                    </div>
                    
                    <table class="table table-bordered table-striped tablaFormato">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Fecha de Modificacion</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                    </table>
                    </div>
                </div>
                <!--=====================================
                PIE DEL MODAL
                ======================================-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
                </div>
        </div>
    </div>
</div>
<!--=====================================
MODAL MODIFICAR FORMATO
======================================-->
<div id="ventana2" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="POST" class="ModificarDatosFormato" enctype="multipart/form-data">
                <!--=====================================
                CABEZA DEL MODAL
                ======================================-->
                <div class="modal-header" style="background:#222d32; color:white">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modificar Formato</h4>
                </div>
                <!--=====================================
                CUERPO DEL MODAL
                ======================================-->
                <div class="modal-body">
                    <div class="box-body">
                    <input type="hidden" name="EditarFormatoProyecto" id ="EditarFormatoProyecto">
                        <!-- ENTRADA PARA EL CODIGO -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <select name="EditarFormatoCodigo"  id="EditarFormatoCodigo" style ="width:100%;" required>
                                    <option value = "">Seleccione el Codigo</option>
                                    <?php
                                        $formato = ControladorCodigoFormato::ctrListaCodigoFormato();
                                        foreach ($formato as $key => $form){
                                            echo ' <option value = "'.$form["id_codigo_formato"].'">'.$form["codigo"]." ".$form["nombre"].'</option>' ;
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <!-- ENTRADA PARA EL FORMATO -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="file" class="form-control input-lg" name="EditarFormatoArchivo" id="EditarFormatoArchivo" placeholder="Ingresar el Archivo" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btnModificaDatosFormato" id="btnModificarFormato" >Guardar Cambios</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--=====================================
MODAL EDITAR PROYECTOS
======================================-->

<div id="modaleditarProyecto" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="post" enctype="multipart/form-data">
                <!--=====================================
                CABEZA DEL MODAL
                ======================================-->
                <div class="modal-header" style="background:#222d32; color:white">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Editar Proyecto</h4>
                </div>
                <!--=====================================
                CUERPO DEL MODAL
                ======================================-->
                <div class="modal-body">
                    <div class="box-body">

                        <input type="hidden" class="form-control input-lg" name="editarid_proyecto" id="editarid_proyecto">
                        
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control input-lg" name="editarnombre_proyecto" id="editarnombre_proyecto" >
                            </div>
                        </div>
                        <!-- ENTRADA PARA EL tipo-proyecto -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                                <select class="form-control input-lg tipoProyecto" name="editartipo_proyecto" id="editartipo_proyecto" >
                                    <option value="">Selecionar Tipo Vinculacion</option>
                                    <option value="Con Recursos">Con Recursos</option>
                                    <option value="Sin Recursos">Sin Recursos</option>
                                </select>
                            </div>
                        </div>
                        <!-- ENTRADA PARA Codigo -->
                        <div class="form-group invisible nuevocodigodiv">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control input-lg" name="editarcodigo" id="editarcodigo" >
                            </div>
                        </div>
                        <!-- ENTRADA PARA SELECCIONAR SU linea programatica -->
                        <div class="form-group nuevaLineaPv">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                                <select class="form-control input-lg" name="editarlinea_programatica" id="editarlinea_programatica" >
                                    <option value="">Selecionar Linea Programatica</option>
                                    <option value="Linea de Modernizacion">Linea de Modernizacion</option>
                                    <option value="Linea de fomento a la Innovacion y desarrollo tecnologico">Linea de fomento a la Innovacion y desarrollo tecnologico</option>
                                    <option value="Linea de investigacion aplicada">Linea de investigacion aplicada</option>
                                    <option value="Apropiacion de ciencia tecnologia y cultura de la innovacion">Apropiacion de ciencia tecnologia y cultura de la innovacion</option>
                                </select>
                            </div>
                        </div>
                        <!-- ENTRADA PARA LA clasificacion -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                                <select class="form-control input-lg" name="editarclasificacion" id="editarclasificacion" >
                                    <option value="">Clasificacion</option>
                                    <option value="Formativo">Formativo</option>
                                    <option value="Empresarial">Empresarial</option>
                                </select>
                            </div>
                        </div>
                        <!-- ENTRADA PARA LA estado -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                                <select class="form-control input-lg" name="editarestado_proyecto" id="editarestado_proyecto" >
                                    <option value="">Estado</option>
                                    <option value="Activo">Activo</option>
                                    <option value="Terminado">Terminado</option>
                                    <option value="Cancelado">Cancelado</option>
                                </select>
                            </div>
                        </div>
                        <!-- ENTRADA PARA LA fecha-cierre -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="date" class="form-control input-lg" name="editarfecha_cierre" id="editarfecha_cierre" >
                            </div>
                        </div>
                        <!-- ENTRADA PARA SELECCIONAR foraneo de empresa -->
                        <div class="form-group">
                            <div class="input-group">
                                <?php
                                $OBJ_DATA = conexion::conectar()->prepare("SELECT * FROM empresas");
                                $OBJ_DATA-> execute();
                                $aVECT_DATA = $OBJ_DATA->fetchALL();
                                ?>
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <select class="form-control" name="editarid_empresa" id="editarid_empresa" >
                                    <option>Seleccione Empresa</option>
                                    <?php
                                    foreach($aVECT_DATA as $key => $xVVAL_DATA){
                                        echo '<option value='.$xVVAL_DATA["id_empresa"].'>'.$xVVAL_DATA["nombre_empresa"].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <!--=====================================
                        PIE DEL MODAL
                        ======================================-->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                            <button type="submit" class="btn btn-primary">Editar Proyecto</button>
                        </div>

                        <?php
                            $editarProyecto = new Proyectocontroller();
                            $editarProyecto -> ctrEditarProyecto();
                        ?>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!--=====================================
MODAL AGREGAR Proyectos
======================================-->

<div id="modalAgregarProyecto" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="post" enctype="multipart/form-data">
                <!--=====================================
                CABEZA DEL MODAL
                ======================================-->
                <div class="modal-header" style="background:#222d32; color:white">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Agregar Proyecto</h4>
                </div>
                <!--=====================================
                CUERPO DEL MODAL
                ======================================-->
                <div class="modal-body">
                    <div class="box-body">
                        <!-- ENTRADA PARA EL NOMBRE -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar Nombre" required>
                            </div>
                        </div>
                        <!-- ENTRADA PARA EL tipo-proyecto -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                                <select class="form-control input-lg tipoProyecto" name="nuevoTproyecto">
                                    <option value="">Selecionar Tipo Vinculacion</option>
                                    <option value="Con Recursos">Con Recursos</option>
                                    <option value="Sin Recursos">Sin Recursos</option>
                                </select>
                            </div>
                        </div>
                        <!-- ENTRADA PARA Codigo -->
                        <div class="form-group invisible nuevocodigodiv">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control input-lg" name="nuevocodigo" placeholder="Ingresar Codigo " >
                            </div>
                        </div>
                        <!-- ENTRADA PARA SELECCIONAR SU linea programatica -->
                        <div class="form-group nuevaLineaPv">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                                <select class="form-control input-lg" name="nuevaLineaP">
                                    <option value="">Selecionar Linea Programatica</option>
                                    <option value="Linea de Modernizacion">Linea de Modernizacion</option>
                                    <option value="Linea de fomento a la Innovacion y desarrollo tecnologico">Linea de fomento a la Innovacion y desarrollo tecnologico</option>
                                    <option value="Linea de investigacion aplicada">Linea de investigacion aplicada</option>
                                    <option value="Apropiacion de ciencia tecnologia y cultura de la innovacion">Apropiacion de ciencia tecnologia y cultura de la innovacion</option>
                                </select>
                            </div>
                        </div>
                        <!-- ENTRADA PARA LA clasificacion -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                                <select class="form-control input-lg" name="nuevaclasificacion">
                                    <option value="">Clasificacion</option>
                                    <option value="Formativo">Formativo</option>
                                    <option value="Empresarial">Empresarial</option>
                                </select>
                            </div>
                        </div>
                        <!-- ENTRADA PARA LA estado -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                                <select class="form-control input-lg" name="nuevoestado">
                                    <option value="">Estado</option>
                                    <option value="Activo">Activo</option>
                                    <option value="Terminado">Terminado</option>
                                    <option value="Cancelado">Cancelado</option>
                                </select>
                            </div>
                        </div>
                        <!-- ENTRADA PARA LA fecha-cierre -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="date" class="form-control input-lg" name="Fecha" placeholder="fecha cierre" required>
                            </div>
                        </div>
                        <!-- ENTRADA PARA SELECCIONAR foraneo de empresa -->
                        <div class="form-group">
                            <div class="input-group">
                                <?php
                                $OBJ_DATA = conexion::conectar()->prepare("SELECT * FROM empresas");
                                $OBJ_DATA-> execute();
                                $aVECT_DATA = $OBJ_DATA->fetchALL();
                                ?>
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <select class="form-control" name="nuevoid_empresa">
                                    <option>Seleccione Empresa</option>
                                    <?php
                                    foreach($aVECT_DATA as $key => $xVVAL_DATA){
                                        echo '<option value='.$xVVAL_DATA["id_empresa"].'>'.$xVVAL_DATA["nombre_empresa"].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <!--=====================================
                        PIE DEL MODAL
                        ======================================-->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                            <button type="submit" class="btn btn-primary">Guardar Proyecto</button>
                        </div>
                        <?php
                        $crearProyecto = new Proyectocontroller;
                        $crearProyecto -> ctrCrearProyecto();
                        ?>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
$eliminarProyecto = new Proyectocontroller();
$eliminarProyecto -> ctrBorrarProyecto();
?>










