<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Evidencias
        </h1>

        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Evidencias</li>

        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <button class="btn btn-warning" data-toggle="modal" data-target="#modalAgregarrol">
                    Agregar Evidencias
                </button>
            </div>

            <div class="box-body">
                <table class="table table-bordered table-striped tablas ">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Tipo</th>
                        <th>Evidencias</th>
                        <th>Tarea</th>
                        <th>Proyecto</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $item = null;
                    $valor = null;
                    $recurso = evidenciacontroller::ctrMostrarEvidencia($item, $valor);

                    foreach ($recurso as $key => $value){
                        echo ' <tr>
                                <td>'.($key+1).'</td>
                                <td>'.$value["evidencias"].'</td>';
                        echo '               
                        
                                <td>'.$value["tipo"].'</td>
                                <td>'.$value["nombre_tarea"].'</td>
                                <td>'.$value["nombre_proyecto"].'</td>
                                <td>
                                    <div class="btn-group">
                                    <button type="button" class="btn btn-primary btnEditar" Gastosid="'.$value["id_evidencia"].'" data-toggle="modal" data-target="#modaleditarevidencia"><i class="fa fa-pencil"></i></button>
                                       
                                        <button class="btn btn-danger btnEliminarEvidencia" idGastos="'.$value["id_evidencia"].'"><i class="fa fa-times"></i></button>
                                    <a href="gasto" class="btn btn-info"><i class="fa fa-arrow-right"></i></a>
                                    
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
<div id="modaleditarevidencia" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="post" enctype="multipart/form-data">
                <!--=====================================
                CABEZA DEL MODAL
                ======================================-->
                <div class="modal-header" style="background:#222d32; color:white">
                    <button type="button" class="close"  data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Editar Evidencias</h4>
                </div>

                <!--=====================================
                CUERPO DEL MODAL
                ======================================-->
                <div class="modal-body">
                    <div class="box-body">
                        
                        <input type="hidden" class="form-control input-lg" name="editarid_evidencia" id="editarid_evidencia" >

                        <!-- ENTRADA PARA ESTADO -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <select class="form-control" name="editartipo">
                                    <option value="" id="editartipo" ></option>
                                    <option value="Imagen">Imagen</option>
                                    <option value="Video">Video</option>
                                    <option value="Archivo">Archivo</option>
                                </select>
                            </div>
                        </div>
                        <!-- ENTRADA PARA LA EVIDENCIAS -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control input-lg" name="editarevidencias" id="editarevidencias">
                            </div>
                        </div>
                        <!-- ENTRADA PARA LA LLAVE FORANEA DE TAREAS -->
                        <div class="form-group">
                            <div class="input-group">
                                <?php
                                $OBJ_DATA = conexion::conectar()->prepare("SELECT * FROM tareas");
                                $OBJ_DATA-> execute();
                                $aVECT_DATA = $OBJ_DATA->fetchALL();
                                ?>
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <select class="form-control" name="editarid_tarea" id="editarid_tarea">
                                    <?php
                                    foreach($aVECT_DATA as $key => $xVVAL_DATA){
                                        echo '<option value='.$xVVAL_DATA["id_tarea"].'>'.$xVVAL_DATA["id_tarea"]." ".$xVVAL_DATA["nombre_tarea"].'</option>';
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
                    <button type="submit" class="btn btn-primary">Editar Evidencias</button>
                </div>
                <?php
                $editarEvidencia = new evidenciacontroller();
                $editarEvidencia -> ctrEditarEvidencia();
                ?>
            </form>
        </div>
    </div>
</div>

<!--=====================================
MODAL AGREGAR RECURSO
======================================-->
<div id="modalAgregarrol" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="post" enctype="multipart/form-data">
                <!--=====================================
                CABEZA DEL MODAL
                ======================================-->
                <div class="modal-header" style="background:#222d32; color:white">
                    <button type="button" class="close"  data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Agregar Evidencias</h4>
                </div>

                <!--=====================================
                CUERPO DEL MODAL
                ======================================-->
                <div class="modal-body">
                    <div class="box-body">
                        <!-- ENTRADA PARA LA LLAVE FORANEA DE proyecto -->
                        <div class="form-group">
                            <div class="input-group">
                                <?php
                                $OBJ_DATA = conexion::conectar()->prepare("SELECT * FROM proyectos");
                                $OBJ_DATA-> execute();
                                $aVECT_DATA = $OBJ_DATA->fetchALL();
                                ?>
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <select class="form-control" name="nuevoid_proyecto">
                                    <option>Seleccione el Proyecto</option>
                                    <?php
                                    foreach($aVECT_DATA as $key => $xVVAL_DATA){
                                        echo '<option value='.$xVVAL_DATA["id_proyecto"].'>'.$xVVAL_DATA[""]." ".$xVVAL_DATA["nombre_proyecto"].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <!-- ENTRADA PARA ESTADO -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <select class="form-control" name="nuevotipo">
                                    <option>Seleccione Tipo</option>
                                    <option value="Imagen">Imagen</option>
                                    <option value="Video">Video</option>
                                    <option value="Archivo">Archivo</option>
                                </select>
                            </div>
                        </div>
                        <!-- ENTRADA PARA LA EVIDENCIAS -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control input-lg" name="nuevoevidencias" placeholder="Ingresar la Evidencias" required>
                            </div>
                        </div>
                        <!-- ENTRADA PARA LA LLAVE FORANEA DE TAREAS -->
                        <div class="form-group">
                            <div class="input-group">
                                <?php
                                $OBJ_DATA = conexion::conectar()->prepare("SELECT * FROM tareas");
                                $OBJ_DATA-> execute();
                                $aVECT_DATA = $OBJ_DATA->fetchALL();
                                ?>
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <select class="form-control" name="nuevoid_tarea">
                                    <option>Seleccione Tarea</option>
                                    <?php
                                    foreach($aVECT_DATA as $key => $xVVAL_DATA){
                                        echo '<option value='.$xVVAL_DATA["id_tarea"].'>'.$xVVAL_DATA["id_tarea"]." ".$xVVAL_DATA["nombre_tarea"].'</option>';
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
                    <button type="submit" class="btn btn-primary">Guardar Evidencias</button>
                </div>
                <?php
                $crearEvidencia = new evidenciacontroller();
                $crearEvidencia -> ctrCrearEvidencia();
                ?>
            </form>
        </div>
    </div>
</div>