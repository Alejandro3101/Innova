<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Programas
        </h1>

        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Programas</li>

        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <button class="btn btn-warning" data-toggle="modal" data-target="#modalAgregarrol">
                    Agregar Programas
                </button>
            </div>

            <div class="box-body">
                <table class="table table-bordered table-striped tablas">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre del Programa</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $item = null;
                    $valor = null;
                    $recurso =  programacontroller::ctrMostrarPrograma($item, $valor);

                    $contador = 0;
                    foreach ($recurso as $key => $value) {
                        $contador +=1;
                        echo '<tr>
                                
                                <td>'.$value["nombre_programa"].'</td>
                                <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary btnEditarPrograma" Programaid="'.$value["id_programa"].'" data-toggle="modal" data-target="#modaleditarPrograma"><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-danger btnEliminarPrograma" idPrograma="'.$value["id_programa"].'"><i class="fa fa-times"></i></button>
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
MODAL AGREGAR RECURSO
======================================-->
<div id="modaleditarPrograma" class="modal fade" role="dialog">
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
                        <!-- ENTRADA PARA EL NOMBRE DEL PROGRAMA -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control input-lg" name="editarid_programa" id="editarid_programa" readonly>
                            </div>
                        </div>
                        <!-- ENTRADA PARA EL NOMBRE DEL PROGRAMA -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control input-lg" name="editarnombre_programa" id="editarnombre_programa"  required>
                            </div>
                        </div>
                    </div>
                </div>
                <!--=====================================
                PIE DEL MODAL
                ======================================-->

                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">Editar Programas</button>
                </div>
                <?php
                $editarPrograma = new programacontroller();
                $editarPrograma -> ctrEditarPrograma();
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
                    <h4 class="modal-title">Agregar Tarea</h4>
                </div>
                <!--=====================================
                CUERPO DEL MODAL
                ======================================-->
                <div class="modal-body">
                    <div class="box-body">
                        <!-- ENTRADA PARA EL NOMBRE DEL PROGRAMA -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control input-lg" name="nuevonombre_programa" placeholder="Ingresar el nombre de la tarea" required>
                            </div>
                        </div>
                    </div>
                </div>
                <!--=====================================
                PIE DEL MODAL
                ======================================-->

                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">Guardar Programas</button>
                </div>
                <?php
                $crearPrograma = new programacontroller();
                $crearPrograma -> ctrCrearPrograma();
                ?>
            </form>
        </div>
    </div>
</div>

