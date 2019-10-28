<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Tareas
        </h1>

        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Tareas</li>

        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <button class="btn btn-warning" data-toggle="modal" data-target="#modalAgregarTarea">
                    Agregar tarea
                </button>
            </div>


            <div class="box-body">
                <table class="table table-bordered table-striped tablas ">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre de la Tarea</th>
                        <th>Descripción</th>
                        <th>Estado</th>
                        <th>Actividad</th>
                        <th>Integrantes</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $item = null;
                    $valor = null;
                    $tarea = ControladorTareas::ctrMostrarTareas($item, $valor);

                    foreach ($tarea as $key => $value){
                        echo ' <tr>
                                <td>'.($key+1).'</td>
                                <td>'.$value["nombre_tarea"].'</td>
                                <td>'.$value["descripcion"].'</td>';
                        echo '               
                    
                                <td>'.$value["estado"].'</td>
                                <td>'.$value["id_actividad"].'</td>
                                <td>'.$value["id_integrante"].'</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary btnEditarTareas" Tareaid="'.$value["id_tarea"].'" data-toggle="modal" data-target="#modaleditartarea"><i class="fa fa-pencil"></i></button>
                                       
                                        <button class="btn btn-danger btnEliminarTarea" idTarea="'.$value["id_tarea"].'"><i class="fa fa-times"></i></button>
                                    
                                    <a href="evidencia" class="btn btn-info"><i class="fa fa-arrow-right"></i></a>
                                    
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
MODAL EDITAR RECURSO
======================================-->
<div id="modaleditartarea" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="POST" enctype="multipart/form-data">

                <!--=====================================
                CABEZA DEL MODAL
                ======================================-->
                <div class="modal-header" style="background:#222d32; color:white">
                    <button type="button" class="close"  data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Editar Tarea</h4>
                </div>

                <!--=====================================
                CUERPO DEL MODAL
                ======================================-->
                <div class="modal-body">
                    <div class="box-body">
                        <!-- ENTRADA PARA LA ID DE TAREA -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control" name="editarid_tarea" id="editarid_tarea" readonly>
                            </div>
                        </div>
                        <!-- ENTRADA PARA EL NOMBRE DE LA TAREA -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control " name="editarnombre_tarea" id="editarnombre_tarea" required>
                            </div>
                        </div>
                        <!-- ENTRADA PARA LA DESCRIPCIÓN -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control" name="editardescripcion" id="editardescripcion" required>
                            </div>
                        </div>
                        <!-- ENTRADA PARA ESTADO -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <select class="form-control" name="editarestado">
                                    <option value="" id="editarestado"></option>
                                    <option value="En espera">En espera</option>
                                    <option value="En proceso">En proceso</option>
                                    <option value="Finalizada">Finalizada</option>
                                </select>
                            </div>
                        </div>
                        <!-- ENTRADA PARA LA LLAVE FORANEA DE ACTIVIDADES -->
                        <div class="form-group">
                            <div class="input-group">
                                <?php
                                $OBJ_DATA = conexion::conectar()->prepare("SELECT * FROM actividades");
                                $OBJ_DATA-> execute();
                                $aVECT_DATA = $OBJ_DATA->fetchALL();
                                ?>
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <select class="form-control" name="editarid_actividad">
                                    <?php
                                    foreach($aVECT_DATA as $key => $xVVAL_DATA){
                                        echo '<option value='.$xVVAL_DATA["id_actividad"].'>'.$xVVAL_DATA["id_actividad"]." ".$xVVAL_DATA["nombre_actividad"].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <!-- ENTRADA PARA LA LLAVE FORANEA DE INTEGRANTES -->
                        <div class="form-group">
                            <div class="input-group">
                                <?php
                                $OBJ_DATA = conexion::conectar()->prepare("SELECT * FROM integrantes");
                                $OBJ_DATA-> execute();
                                $aVECT_DATA = $OBJ_DATA->fetchALL();
                                ?>
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <select class="form-control" name="editarid_integrante">
                                    <?php
                                    foreach($aVECT_DATA as $key => $xVVAL_DATA){
                                        echo '<option value='.$xVVAL_DATA["id_integrante"].'>'.$xVVAL_DATA["id_integrante"]." ".$xVVAL_DATA["rol"].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <!--=====================================
                PIE DEL MODAL
                ======================================-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">Guardar tareas</button>
                </div>
                <?php
                $editarTareas = new ControladorTareas();
                $editarTareas -> ctrEditarTarea();
                ?>
            </form>
        </div>
    </div>
</div>

<!--=====================================
MODAL AGREGAR RECURSO
======================================-->
<div id="modalAgregarTarea" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="post" enctype="multipart/form-data">

                <!--=====================================
                CABEZA DEL MODAL
                ======================================-->
                <div class="modal-header" style="background:#222d32; color:white">
                    <button type="button" class="close"  data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Agregar Tarea</h4>
                </div>

                <!--=====================================
                CUERPO DEL MODAL
                ======================================-->
                <div class="modal-body">
                    <div class="box-body">
                        <!-- ENTRADA PARA EL NOMBRE DE LA TAREA -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control input-lg" name="nuevonombre_tarea" placeholder="Ingresar el nombre de la tarea" required>
                            </div>
                        </div>
                        <!-- ENTRADA PARA LA DESCRIPCIÓN -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control input-lg" name="nuevodescripcion" placeholder="Ingresar la descripción" required>
                            </div>
                        </div>
                        <!-- ENTRADA PARA ESTADO -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <select class="form-control" name="nuevoestado">
                                    <option>Seleccione</option>
                                    <option value="En espera">En espera</option>
                                    <option value="En proceso">En proceso</option>
                                    <option value="Finalizada">Finalizada</option>
                                </select>
                            </div>
                        </div>
                        <!-- ENTRADA PARA LA LLAVE FORANEA DE ACTIVIDADES -->
                        <div class="form-group">
                            <div class="input-group">
                                <?php
                                $OBJ_DATA = conexion::conectar()->prepare("SELECT * FROM actividades");
                                $OBJ_DATA-> execute();
                                $aVECT_DATA = $OBJ_DATA->fetchALL();
                                ?>
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <select class="form-control" name="nuevoid_actividad">
                                    <option>Seleccione</option>
                                    <?php
                                    foreach($aVECT_DATA as $key => $xVVAL_DATA){
                                        echo '<option value='.$xVVAL_DATA["id_actividad"].'>'.$xVVAL_DATA["id_actividad"]." ".$xVVAL_DATA["nombre_actividad"].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <!-- ENTRADA PARA LA LLAVE FORANEA DE INTEGRANTES -->
                        <div class="form-group">
                            <div class="input-group">
                                <?php
                                $OBJ_DATA = conexion::conectar()->prepare("SELECT * FROM integrantes");
                                $OBJ_DATA-> execute();
                                $aVECT_DATA = $OBJ_DATA->fetchALL();
                                ?>
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <select class="form-control" name="nuevoid_integrante">
                                    <option>Seleccione</option>
                                    <?php
                                    foreach($aVECT_DATA as $key => $xVVAL_DATA){
                                        echo '<option value='.$xVVAL_DATA["id_integrante"].'>'.$xVVAL_DATA["id_integrante"]." ".$xVVAL_DATA["rol"].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <!--=====================================
                PIE DEL MODAL
                ======================================-->

                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">Guardar tareas</button>


                </div>
                <?php
                $crearTareas = new ControladorTareas();
                $crearTareas -> ctrCrearTarea();
                ?>
            </form>
        </div>
    </div>
</div>
