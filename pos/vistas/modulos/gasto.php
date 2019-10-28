<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Gastos
        </h1>

        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Gastos</li>

        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <button class="btn btn-warning" data-toggle="modal" data-target="#modalAgregarrol">
                    Agregar Gastos
                </button>
            </div>

            <div class="box-body">
                <table class="table table-bordered table-striped tablas ">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Concepto</th>
                        <th>Valor de Gasto</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $item = null;
                    $valor = null;

                    $gasto = gastocontroller::ctrMostrarGastos($item, $valor);

                    foreach ($gasto as $key => $value){

                        echo ' <tr>
                                <td>'.($key+1).'</td>
                                <td>'.$value["concepto"].'</td>
                                <td>'.$value["valor_gasto"].'</td>';

                        echo '               
                                <td>
                                    <div class="btn-group">

                                        <button type="button" class="btn btn-primary btnEditarGastos" Gastosid="'.$value["id_gasto"].'" data-toggle="modal" data-target="#modaleditarcategoria"><i class="fa fa-pencil"></i></button>

                                        <button class="btn btn-danger btnEliminarGastos" idGastos="'.$value["id_gasto"].'"><i class="fa fa-times"></i></button>

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
MODAL AGREGAR GASTOS
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
                    <h4 class="modal-title">Agregar Gastos</h4>
                </div>
                <!--=====================================
                CUERPO DEL MODAL
                ======================================-->
                <div class="modal-body">
                    <div class="box-body">
                        <!-- ENTRADA PARA EL CONCEPTO -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control input-lg" name="nuevoconcepto" placeholder="Ingresar el Concepto" required>
                            </div>
                        </div>
                    </div>
                    <!-- ENTRADA PARA EL VALOR DE GASTO -->
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" class="form-control input-lg" name="nuevovalor_gasto" placeholder="Ingresar el Valor de Gasto" required>
                        </div>
                    </div>
                </div>
                <!--=====================================
                PIE DEL MODAL
                ======================================-->

                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">Guardar Gasto</button>
                </div>
                <?php
                $crearGastos = new gastocontroller();
                $crearGastos -> ctrCrearGastos();
                ?>
            </form>
        </div>
    </div>
</div>
<!--=====================================
MODAL EDITAR GASTOS
======================================-->
<div id="modaleditarcategoria" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="post" enctype="multipart/form-data">
                <!--=====================================
                CABEZA DEL MODAL
                ======================================-->
                <div class="modal-header" style="background:#222d32; color:white">
                    <button type="button" class="close"  data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Editar Gastos</h4>
                </div>
                <!--=====================================
                CUERPO DEL MODAL
                ======================================-->
                <div class="modal-body">
                    <div class="box-body">
                        <!-- ENTRADA PARA EL id -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control input-lg" name="editarid_gasto" id="editarid_gasto" readonly>
                            </div>
                        </div>

                        <!-- ENTRADA PARA EL CONCEPTO -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control input-lg" name="editarconcepto" id="editarconcepto" >
                            </div>
                        </div>
                    </div>
                    <!-- ENTRADA PARA EL VALOR DE GASTO -->
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" class="form-control input-lg" name="editarvalor_gasto" id="editarvalor_gasto">
                        </div>
                    </div>
                </div>
                <!--=====================================
                PIE DEL MODAL
                ======================================-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">Guardar Gasto</button>
                </div>
                <?php
                $editarGastos = new gastocontroller();
                $editarGastos -> ctrEditarGastos();
                ?>
            </form>
        </div>
    </div>
</div>

