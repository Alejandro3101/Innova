<div class="content-wrapper">

    <section class="content-header">
        <h1>
            Recursos
        </h1>

        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Recursos</li>

        </ol>
    </section>
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">

            <div class="box-header with-border">
                <button class="btn btn-warning" data-toggle="modal" data-target="#modalAgregarRecurso">
                    Agregar recurso
                </button>
            </div>

            <div class="box-body">

                <table class="table table-bordered table-striped tablas ">

                    <thead>
                    <tr>

                        <th>#</th>
                        <th>Rubro</th>
                        <th>Concepto</th>
                        <th>Volor del Rubro</th>
                        <th>Valor del Proyecto</th>
                        <th>Proyecto</th>
                        <th>Acciones</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $item = null;
                    $valor = null;
                    $recurso = recursocontroller::ctrMostrarRecursos($item, $valor);

                    foreach ($recurso as $key => $value){
                        echo ' <tr>
                            <td>'.($key+1).'</td>
                            <td>'.$value["rubro"].'</td>
                            <td>'.$value["concepto"].'</td>
                            <td>'.$value["valor_rubro"].'</td>
                            <td>'.$value["valor_proyecto"].'</td>';
                        echo '               
                            <td>'.$value["id_proyecto"].'</td>
                            <td>
                                <div class="btn-group">
                                <button type="button" class="btn btn-primary btnEditarRecursos" Recursosid="'.$value["id_recurso"].'" data-toggle="modal" data-target="#modaleditarrecurso"><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-danger btnEliminarRecursos" idRecurso="'.$value["id_recurso"].'"><i class="fa fa-times"></i></button>
                                 <a href="autor" class="btn btn-info"><i class="fa fa-arrow-right"></i></a>
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
<div id="modaleditarrecurso" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="post" enctype="multipart/form-data">

                <!--=====================================
                CABEZA DEL MODAL
                ======================================-->
                <div class="modal-header" style="background:#222d32; color:white">
                    <button type="button" class="close"  data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Editar recurso</h4>
                </div>

                <!--=====================================
                CUERPO DEL MODAL
                ======================================-->
                <div class="modal-body">
                    <div class="box-body">
                        <!-- ENTRADA PARA LA ID DE RECURSO -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control" name="editarid_recurso" id="editarid_recurso" readonly>
                            </div>
                        </div>
                        <!-- ENTRADA PARA EL RUBRO -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control input-lg" name="editarrubro" id="editarrubro" required>
                            </div>
                        </div>
                        <!-- ENTRADA PARA EL CONCEPTO -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control input-lg" name="editarconcepto" id="editarconcepto" required>
                            </div>
                        </div>
                        <!-- ENTRADA PARA EL VALOR DEL RUBRO -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control input-lg" name="editarvalor_rubro"  id="editarvalor_rubro" required>
                            </div>
                        </div>
                        <!-- ENTRADA PARA EL VALOR DEL PROYECTO -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control input-lg" name="editarvalor_proyecto" id="editarvalor_proyecto" required>
                            </div>
                        </div>
                        <!-- ENTRADA PARA LA LLAVE FORANEA DE PROYECTO -->
                        <div class="form-group">
                            <div class="input-group">
                                <?php
                                $OBJ_DATA = conexion::conectar()->prepare("SELECT * FROM proyectos");
                                $OBJ_DATA-> execute();
                                $aVECT_DATA = $OBJ_DATA->fetchALL();
                                ?>
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <select class="form-control" name="editarid_proyecto">
                                    <?php
                                    foreach($aVECT_DATA as $key => $xVVAL_DATA){
                                        echo '<option value='.$xVVAL_DATA["id_proyecto"].'>'.$xVVAL_DATA["id_proyecto"]." ".$xVVAL_DATA["nombre_proyecto"].'</option>';
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
                    <button type="submit" class="btn btn-primary">Guardar recursos</button>
                </div>
                <?php
                $editarRecurso = new recursocontroller();
                $editarRecurso -> ctrEditarRecursos();
                ?>
            </form>
        </div>
    </div>
</div>

<!--=====================================
MODAL AGREGAR RECURSO
======================================-->
<div id="modalAgregarRecurso" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="post" enctype="multipart/form-data">

                <!--=====================================
                CABEZA DEL MODAL
                ======================================-->
                <div class="modal-header" style="background:#222d32; color:white">
                    <button type="button" class="close"  data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Agregar recurso</h4>
                </div>

                <!--=====================================
                CUERPO DEL MODAL
                ======================================-->
                <div class="modal-body">
                    <div class="box-body">
                        <!-- ENTRADA PARA EL RUBRO -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control input-lg" name="nuevorubro" placeholder="Ingresar rubro" required>
                            </div>
                        </div>
                        <!-- ENTRADA PARA EL CONCEPTO -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control input-lg" name="nuevoconcepto" placeholder="Ingresar el concepto" required>
                            </div>
                        </div>
                        <!-- ENTRADA PARA EL VALOR DEL RUBRO -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control input-lg" name="nuevovalor_rubro" placeholder="Ingresar el valor del rubro" required>
                            </div>
                        </div>
                        <!-- ENTRADA PARA EL VALOR DEL PROYECTO -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control input-lg" name="nuevovalor_proyecto" placeholder="Ingresar el valor del proyecto" required>
                            </div>
                        </div>
                        <!-- ENTRADA PARA LA LLAVE FORANEA DE PROYECTO -->
                        <div class="form-group">
                            <div class="input-group">
                                <?php
                                $OBJ_DATA = conexion::conectar()->prepare("SELECT * FROM proyectos");
                                $OBJ_DATA-> execute();
                                $aVECT_DATA = $OBJ_DATA->fetchALL();
                                ?>
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <select class="form-control" name="nuevoid_proyecto">
                                    <option>Seleccione</option>
                                    <?php
                                    foreach($aVECT_DATA as $key => $xVVAL_DATA){
                                        echo '<option value='.$xVVAL_DATA["id_proyecto"].'>'.$xVVAL_DATA["id_proyecto"]." ".$xVVAL_DATA["nombre_proyecto"].'</option>';
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
                    <button type="submit" class="btn btn-primary">Guardar recursos</button>
                </div>
                <?php
                $crearRecurso = new recursocontroller();
                $crearRecurso -> ctrCrearRecursos();
                ?>
            </form>
        </div>
    </div>
</div>