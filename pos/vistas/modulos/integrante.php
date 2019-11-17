<div class="content-wrapper">

    <section class="content-header">

        <h1>

            Administrar Integrantes

        </h1>

        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

            <li class="active">Administrar Integrantes</li>

        </ol>

    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">


                <button class="btn btn-warning" data-toggle="modal" data-target="#modalAgregarIntegrantes">

                    Agregar Integrantes


                </button>



            </div>
            <div class="box-body">

                <table class="table table-bordered table-striped tablas ">

                    <thead>

                    <tr>

                        <th>#</th>

                        <th>Nombre_Integrante</th>
                        <th>Proyecto_Vinculado</th>
                        <th>Rol</th>
                        <th>Estado</th>

                        <th>Acciones</th>



                    </tr>

                    </thead>
                    <tbody>

                    <?php

                    $item = null;
                    $valor = null;

                    $integrante = integrantecontroller::ctrMostrarIntegrantes($item, $valor);


                    foreach ($integrante as $key => $value){

                        echo ' <tr>
                  <td>'.($key+1).'</td>
                  <td>'.$value["nombres"].'</td>
                  <td>'.$value["nombre_proyecto"].'</td>';

                        echo '
                    <td>'.$value["rol"].'</td>   
                                    
                      
                          
                                
               <td><button class="btn btn-success btn-xs">Activo</button></td>
              
               <td>
                   <i class="btn-group">

                       <button class="btn btn-primary btnEditarIntegrante" id_integrante ="'.$value["id_integrante"].'" data-toggle="modal" data-target="#modalEditarIntegrante"><i class="fa fa-pencil"></i></button>
                       
                       <button class="btn btn-danger btnEliminarIntegrantes " id_integrante ="'.$value["id_integrante"].'"><i class="fa fa-times"></i></button>
                       
                       <a href="actividades" class="btn btn-info"><i class="fa fa-arrow-right"></i></a>
                       



                   </div>



               </td>
           </tr>';

                    }?>


                    </tbody>


                </table>

            </div>

        </div>


    </section>

</div>





<!--=====================================
MODAL editar integrante
======================================-->
<div id="modalEditarIntegrante" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="post" enctype="multipart/form-data">

                <!--=====================================
                CABEZA DEL MODAL
                ======================================-->
                <div class="modal-header" style="background:#222d32; color:white">
                    <button type="button" class="close"  data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Agregar Autores</h4>
                </div>

                <!--=====================================
                CUERPO DEL MODAL
                ======================================-->
                <div class="modal-body">
                    <div class="box-body">

                        <!-- ENTRADA PARA EL Rol -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-users"></i></span>

                                <select class="form-control input-lg" name="editarRol">

                                    <option value="" id="EditarRol" ></option>

                                    <option value="Instructor Lider">Instructor Lider</option>

                                    <option value="Aprendiz Lider">Aprendiz Lider</option>

                                    <option value="Instructor">Instructor </option>

                                    <option value="Aprendiz">Aprendiz</option>



                                </select>

                            </div>

                        </div>

                        <!-- ENTRADA PARA EL Estado -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-users"></i></span>

                                <select class="form-control input-lg" name="nuevoestado">

                                    <option value="" id="editarEstado"></option>

                                    <option value="">Selecionar Estado</option>

                                    <option value="Activo">Activo </option>

                                    <option value="Inactivo">Inactivo</option>

                                </select>

                            </div>

                        </div>

                        <!-- ENTRADA PARA LA LLAVE FORANEA DE persona -->
                        <div class="form-group">
                            <div class="input-group">
                                <?php
                                $OBJ_DATA = conexion::conectar()->prepare("SELECT * FROM persona");
                                $OBJ_DATA-> execute();
                                $aVECT_DATA = $OBJ_DATA->fetchALL();
                                ?>
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <select class="form-control" name="editarid_persona">
                                    <option></option>
                                    <?php
                                    foreach($aVECT_DATA as $key => $xVVAL_DATA){
                                        echo '<option value='.$xVVAL_DATA["id_persona"].'>'.$xVVAL_DATA["nombres"]." ".$xVVAL_DATA["apellidos"].'</option>';
                                    }
                                    ?>
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
                                <select class="form-control" name="editarid_proyecto">
                                    <option></option>
                                    <?php
                                    foreach($aVECT_DATA as $key => $xVVAL_DATA){
                                        echo '<option value='.$xVVAL_DATA["id_proyecto"].'>'.$xVVAL_DATA[""]." ".$xVVAL_DATA["nombre_proyecto"].'</option>';
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
                    <button type="submit" class="btn btn-primary">Editar tareas</button>
                </div>

            </form>
        </div>
    </div>
</div>

<!--=====================================
MODAL AGREGAR USUARIO
======================================-->

<div id="modalAgregarIntegrantes" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" method="post" enctype="multipart/form-data">

                <!--=====================================
                CABEZA DEL MODAL
                ======================================-->

                <div class="modal-header" style="background:#222d32; color:white">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">Agregar usuario</h4>

                </div>

                <!--=====================================
                CUERPO DEL MODAL
                ======================================-->

                <div class="modal-body">

                    <div class="box-body">

                        <!-- ENTRADA PARA EL Rol -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-users"></i></span>

                                <select class="form-control input-lg" name="nuevorol">

                                    <option value="">Selecionar Rol</option>

                                    <option value="Instructor Lider">Instructor Lider</option>

                                    <option value="Aprendiz Lider">Aprendiz Lider</option>

                                    <option value="Instructor">Instructor </option>

                                    <option value="Aprendiz">Aprendiz</option>



                                </select>

                            </div>

                        </div>

                     <!-- ENTRADA PARA EL Estado -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-users"></i></span>

                                <select class="form-control input-lg" name="nuevoestado">

                                    <option value="">Selecionar Estado</option>

                                    <option value="Activo">Activo </option>

                                    <option value="Inactivo">Inactivo</option>

                                </select>

                            </div>

                        </div>

                    <!-- ENTRADA PARA LA LLAVE FORANEA DE persona -->
                    <div class="form-group">
                        <div class="input-group">
                            <?php
                            $OBJ_DATA = conexion::conectar()->prepare("SELECT * FROM persona");
                            $OBJ_DATA-> execute();
                            $aVECT_DATA = $OBJ_DATA->fetchALL();
                            ?>
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <select class="form-control" name="nuevoid_persona">
                                <option>Seleccione</option>
                                <?php
                                foreach($aVECT_DATA as $key => $xVVAL_DATA){
                                    echo '<option value='.$xVVAL_DATA["id_persona"].'>'.$xVVAL_DATA["nombres"]." ".$xVVAL_DATA["apellidos"].'</option>';
                                }
                                ?>
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



                    <!--=====================================
                    PIE DEL MODAL
                    ======================================-->

                    <div class="modal-footer">

                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                        <button type="submit" class="btn btn-primary">Guardar Integrante</button>

                    </div>

                    <?php

                    $crearIntegrantes = new integrantecontroller();
                    $crearIntegrantes -> ctrCrearIntegrantes();

                    ?>

            </form>

        </div>

    </div>

</div>

<?php

$eliminarIntegrante = new integrantecontroller();
$eliminarIntegrante -> ctrBorrarIntegrantes();

?>