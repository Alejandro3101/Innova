<div class="content-wrapper">

    <section class="content-header">

        <h1>

            Administrar Actividades

        </h1>

        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

            <li class="active">Administrar Actividades</li>

        </ol>

    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">


                <button class="btn btn-warning" data-toggle="modal" data-target="#modalAgregarrol">

                    Agregar Actividades



                </button>



            </div>
            <div class="box-body">

                <table class="table table-bordered table-striped tablas ">

                    <thead>

                    <tr>

                        <th>#</th>
                        <th>Nombre_Actividad</th>
                        <th>Descripcion</th>
                        <th>Fecha Inicio</th>
                        <th>Fecha Limite</th>
                        <th>Estado</th>
                        <th>Proyecto</th>
                        <th>Acciones</th>



                    </tr>

                    </thead>
                     <tbody>
                    <?php

                    $item = null;
                    $valor = null;

                    $Actividades = actividadescontroller::ctrMostrarActividades($item, $valor);


                   foreach ($Actividades as $key => $value){

          echo ' <tr>
                  <td>'.($key+1).'</td>
                  <td>'.$value["nombre_actividad"].'</td>
                  <td>'.$value["descripcion"].'</td>';

                  echo '
                  <td>'.$value["fecha_inicio"].'</td>
                  <td>'.$value["fecha_limite"].'</td>
                  <td>'.$value["estado"].'</td>
                  <td>'.$value["nombre_proyecto"].'</td>
                  <td>

                    <div class="btn-group">
                        
                        <button class="btn btn-primary btnEditarActividades" id_actividad="'.$value["id_actividad"].'" data-toggle="modal" data-target="#modalEditarActividad"><i class="fa fa-pencil"></i></button>

                      <button class="btn btn-danger btnEliminarActividades " id_actividad="'.$value["id_actividad"].'"><i class="fa fa-times"></i></button>
                      
                      <button class="btn btn-info btnTareasActividades " id_actividad="'.$value["id_actividad"].'"><i class="fa fa-arrow-right"></i></button>
                      
                      
         

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
MODAL Editar Actividad
======================================-->

<div id="modalEditarActividad" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" method="post" enctype="multipart/form-data">

                <!--=====================================
                CABEZA DEL MODAL
                ======================================-->

                <div class="modal-header" style="background:#222d32; color:white">

                    <button type="button" class="close"  data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">Editar Actividad</h4>

                </div>

                <!--=====================================
                CUERPO DEL MODAL
                ======================================-->

                <div class="modal-body">

                    <div class="box-body">


                        <!-- ENTRADA PARA EL NOMBRE -->

                        <input type="hidden" class="form-control input-lg" name="editarIdAct" id="editarIdAct" value="" >


                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                                <input type="text" class="form-control input-lg" name="editarNombreAct" id="editarNombreAct" value="" >

                            </div>

                        </div>

                        <!-- ENTRADA PARA LA Descripcion -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                                <input type="textarea" class="form-control input-lg" name="editardescripcion" id="editardescripcion" value="">

                            </div>

                        </div>

                        <!-- ENTRADA PARA LA fecha_inicio -->

                        <div class="form-group">
                            <label>Fecha Inicio</label><br>

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>


                                <input type="date" class="form-control input-lg" name="editarFechainicio" id="editarFechainicio" value="">

                            </div>
                        </div>

                        <!-- ENTRADA PARA LA fecha_limite -->

                        <div class="form-group">
                            <label>Fecha Limite</label><br>

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>


                                <input type="date" class="form-control input-lg" name="editarfechalimite" id="editarfechalimite" value="">

                            </div>
                        </div>


                        <!-- ENTRADA PARA EL estado -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-users"></i></span>

                                <select class="form-control input-lg" name="editarestado" id="editarestado" >

                                    <option value="Planeada">Planeada</option>
                                    <option value="Ejecutada">Ejecutada</option>
                                    <option value="Finalizada">Finalizada</option>
                                    <option value="Cancelada">Cancelada</option>

                                </select>

                            </div>

                        </div>

                        <!-- ENTRADA PARA LA LLAVE FORANEA DE proyecto -->
                        <div class="form-group">
                            <div class="input-group">
                                <?php
                                $OBJ_DATA = conexion::conectar()->prepare("SELECT * FROM proyectos");
                                $OBJ_DATA-> execute();
                                $aVECT_DATA = $OBJ_DATA->fetchALL();
                                ?>
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <select class="form-control" name="editarproyecto" id="editarproyecto">
                                    <option>Seleccione Proyecto</option>
                                    <?php
                                    foreach($aVECT_DATA as $key => $xVVAL_DATA){
                                        echo '<option value='.$xVVAL_DATA["id_proyecto"].'>'.$xVVAL_DATA[""]."".$xVVAL_DATA["nombre_proyecto"].'</option>';
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

                    <button type="submit" class="btn btn-primary">Editar Actividades</button>

                </div>

                <?php

                    $editarActividad = new actividadescontroller();
                    $editarActividad -> ctrEditarActividades();

                ?>


            </form>

        </div>

    </div>

</div>





<!--=====================================
MODAL AGREGAR Actividad
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

                    <h4 class="modal-title">Agregar Actividad</h4>

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

                                <input type="text" class="form-control input-lg" name="nuevoNombreAct" placeholder="Ingresar Nombre Actividad" required>

                            </div>

                        </div>

                        <!-- ENTRADA PARA LA Descripcion -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                                <input type="textarea" class="form-control input-lg" name="nuevadescripcion" placeholder="Ingresar la Descripcion" required>

                            </div>

                        </div>

                        <!-- ENTRADA PARA LA fecha_inicio -->

                        <div class="form-group">
                            <label>Fecha Inicio</label><br>

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>


                                <input type="date" class="form-control input-lg" name="nuevaFechainicio" required>

                            </div>
                        </div>

                        <!-- ENTRADA PARA LA fecha_limite -->

                        <div class="form-group">
                            <label>Fecha Limite</label><br>

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>


                                <input type="date" class="form-control input-lg" name="nuevafechalimite" required>

                            </div>
                        </div>


                            <!-- ENTRADA PARA EL estado -->

                            <div class="form-group">

                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-users"></i></span>

                                    <select class="form-control input-lg" name="nuevoestado" required>

                                        <option value="">Selecionar Estado</option>

                                        <option value="Planeada">Planeada</option>
                                        <option value="Ejecutada">Ejecutada</option>
                                        <option value="Finalizada">Finalizada</option>
                                        <option value="Cancelada">Cancelada</option>

                                    </select>

                                </div>

                            </div>

                        <!-- ENTRADA PARA LA LLAVE FORANEA DE proyecto -->
                        <div class="form-group">
                            <div class="input-group">
                                <?php
                                $OBJ_DATA = conexion::conectar()->prepare("SELECT * FROM proyectos");
                                $OBJ_DATA-> execute();
                                $aVECT_DATA = $OBJ_DATA->fetchALL();
                                ?>
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <select class="form-control" name="nuevoproyecto">
                                    <option>Seleccione Proyecto</option>
                                    <?php
                                    foreach($aVECT_DATA as $key => $xVVAL_DATA){
                                        echo '<option value='.$xVVAL_DATA["id_proyecto"].'>'.$xVVAL_DATA[""]."".$xVVAL_DATA["nombre_proyecto"].'</option>';
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

                            <button type="submit" class="btn btn-primary">Guardar Actividades</button>

                        </div>

                        <?php

                        $crearActividad = new actividadescontroller();
                        $crearActividad -> ctrCrearActividades();

                        ?>

            </form>

        </div>

    </div>

</div>

<?php

$eliminarActividad = new actividadescontroller();
$eliminarActividad -> ctrBorrarActividades();

?>