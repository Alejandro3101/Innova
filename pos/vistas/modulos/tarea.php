    <!-- select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
    
    <div class="content-wrapper">
    <section class="content-header">
        <h1>
            Tareas de la Actividad <b><?php echo($_SESSION["NombreActividad"]);?></b> del Proyecto <b><?php echo($_SESSION["NombreProyecto"]);?></b>.
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


            <div class="box-body tarea">
                <div class="container">
                    <div class="row">
                        <!--  -->
                        <div class="col-md-3 col-lg-3">
                            <div class="container-fluid well well-sm">
                                <h3>Por Hacer</h3>
                                <hr>
                                <div class="container-fluid PorHacer">
                                    
                                </div>
                                <hr>
                            </div>
                        </div>
                        <!--  -->
                        <div class="col-md-3 col-lg-3">
                            <div class="container-fluid well well-sm">
                                <h3>En Proceso</h3>
                                <hr>
                                <div class="container-fluid EnProceso">
                                    
                                </div>
                                <hr>
                            </div>
                        </div>
                        <!--  -->
                        <div class="col-md-3 col-lg-3">
                            <div class="container-fluid well well-sm">
                                <h3>En Revisión</h3>
                                <hr>
                                <div class="container-fluid EnRevision">
                                    
                                </div>
                                <hr>
                            </div>
                        </div>
                        <!--  -->
                        <div class="col-md-3 col-lg-3">
                            <div class="container-fluid well well-sm">
                                <h3>Hecho</h3>
                                <hr>
                                <div class="container-fluid Hecho">
                                    
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!--=====================================
MODAL EDITAR TAREA
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
                        
                        <input type="hidden" class="form-control" name="editarid_tarea" id="editarid_tarea">
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
                        <!-- ENTRADA PARA LA FECHA DE INICIO -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="date" class="form-control" name="editarfecha_inicio" id="editarfecha_inicio" required>
                            </div>
                        </div>
                        <!-- ENTRADA PARA LA FECHA LIMITE -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="date" class="form-control" name="editarfecha_limite" id="editarfecha_limite" required>
                            </div>
                        </div>
                        <!-- ENTRADA PARA ESTADO -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <select class="form-control" name="editarestado">
                                    <option value="" id="editarestado"></option>
                                    <option value="Por Hacer">Por Hacer</option>
                                    <option value="En Proceso">En Proceso</option>
                                    <option value="En Revision">En Revision</option>
                                    <option value="Hecho">Hecho</option>
                                </select>
                            </div>
                        </div>
                        <!-- ENTRADA PARA LA LLAVE FORANEA DE ACTIVIDADES -->
                        <!--div class="form-group">
                            <div class="input-group">
                                <php
                                $OBJ_DATA = conexion::conectar()->prepare("SELECT * FROM actividades");
                                $OBJ_DATA-> execute();
                                $aVECT_DATA = $OBJ_DATA->fetchALL();
                                ?>
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <select class="form-control" name="editarid_actividad">
                                    <php
                                    foreach($aVECT_DATA as $key => $xVVAL_DATA){
                                        echo '<option value='.$xVVAL_DATA["id_actividad"].'>'.$xVVAL_DATA["id_actividad"]." ".$xVVAL_DATA["nombre_actividad"].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div-->
                        <input type="hidden" name="editarid_actividad" value = "<?php echo($_SESSION["IdActividad"]);?>">
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
                        <!-- ENTRADA PARA LA FECHA DE INICIO -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="date" class="form-control input-lg" name="nuevofecha_inicio" placeholder="Ingresar la fecha de inicio" required>
                            </div>
                        </div>
                        <!-- ENTRADA PARA LA FECHA LIMITE -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="date" class="form-control input-lg" name="nuevofecha_limite" placeholder="Ingresar la fecha de limite" required>
                            </div>
                        </div>
                        <!-- ENTRADA PARA ESTADO -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <select class="form-control" name="nuevoestado">
                                    <option>Seleccione</option>
                                    <option value="Por Hacer">Por Hacer</option>
                                    <option value="En Proceso">En Proceso</option>
                                    <option value="En Revision">En Revision</option>
                                    <option value="Hecho">Hecho</option>
                                </select>
                            </div>
                        </div>
                        <!-- ENTRADA PARA LA LLAVE FORANEA DE ACTIVIDADES >
                        <div class="form-group">
                            <div class="input-group">
                                <php
                                $OBJ_DATA = conexion::conectar()->prepare("SELECT * FROM actividades");
                                $OBJ_DATA-> execute();
                                $aVECT_DATA = $OBJ_DATA->fetchALL();
                                ?>
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <select class="form-control" name="nuevoid_actividad">
                                    <option>Seleccione</option>
                                    <php
                                    foreach($aVECT_DATA as $key => $xVVAL_DATA){
                                        echo '<option value='.$xVVAL_DATA["id_actividad"].'>'.$xVVAL_DATA["id_actividad"]." ".$xVVAL_DATA["nombre_actividad"].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div-->
                        <input type="hidden" name="nuevoid_actividad" value = "<?php echo($_SESSION["IdActividad"]);?>">

                        
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

<!-- Modal -->
<div class="modal fade" id="TareaIntegrante" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Integrantes de la Tarea <b><p id = "NameTarea"></p></b></h5>.
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="idTarea" id="idTarea" value="">
        <!-- ENTRADA PARA LA LLAVE FORANEA DE ACTIVIDADES -->
        <div class="form-group">
            <input type="hidden" name="TareaIdCreate" id ="TareaIdCreate">
            <button  type='button' class='btn btn-success btnInsertarTareaIntegrante' Tareaid ='"+respuesta.data[i][0]+"' style = 'border-radius : 19px; float:right;'>
                <span class='glyphicon glyphicon-save' aria-hidden='true'></span> Agregar
            </button>
            <div class="input-group"  style = 'border-radius : 19px; float:left; width : 84%;'>
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <select class="form-control" style = "width : 80%;" name="selectintegrantes" id = "selectintegrantes">
                    <option value=''>Seleccione el Integrante.</option>
                </select>
            </div>            
            <br style = 'clear: left;'>
            <hr>
            <div class="container-integrante" style="margin:20px;">
                
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>