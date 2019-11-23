<div class="content-wrapper">

    <section class="content-header">

        <h1>

                Administrar Empresas

        </h1>

        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

            <li class="active">Administrar Empresa</li>

        </ol>

    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">


              <button class="btn btn-warning" data-toggle="modal" data-target="#modalAgregarEmpresa">

                    Agregar Empresa



                </button>



            </div>
            <div class="box-body">

                <table class="table table-bordered table-striped tablas ">

                    <thead>

                        <tr>

                            <th>#</th>
                            <th>Nombre</th>
                            <th>Tipo</th>
                            <th>Nit</th>
                            <th>Direccion</th>
                            <th>Telefono</th>
                            <th>Encargado</th>
                            <th>Celular</th>
                            <th>Sector</th>
                            <th>Estado</th>
                            <th>Acciones</th>




                        </tr>

                    </thead>
                    <?php

                    $item = null;
                    $valor = null;

                    $empresa = empresascontroller::ctrMostrarEmpresa($item, $valor);


                    foreach ($empresa as $key => $value){

                        echo ' <tr>
                        <td>'.($key+1).'</td>
                        <td>'.$value["nombre_empresa"].'</td>
                        <td>'.$value["tipo_empresa"].'</td>';



                        echo '
                        <td>'.$value["nit"].'</td>   
                        <td>'.$value["direccion"].'</td>  
                        <td>'.$value["telefono"].'</td> 
                        <td>'.$value["encargado"].'</td> 
                        <td>'.$value["celular"].'</td> 
                        <td>'.$value["sector"].'</td> 
           
           
           
           
                        <td><button class="btn btn-success btn-xs">Activo</button></td>
                        <td>
                            <i class="btn-group">    

                                <button class="btn btn-primary btnEditarEmpresa" id_empresa="'.$value["id_empresa"].'" data-toggle="modal" data-target="#modalEditarEmpresa" ><i class="fa fa-pencil"></i></button>
                                <button class="btn btn-danger btnEliminarEmpresa" id_empresa="'.$value["id_empresa"].'"><i class="fa fa-times"></i></button>
                                
                                
                                



                            </div>



                        </td>
                        </tr>';

                    }?>
                </table>
            </div>

        </div>


    </section>

</div>



<!--=====================================
MODAL EDITAR EMPRESA
======================================-->
<div id="modalEditarEmpresa" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="post" enctype="multipart/form-data">
                <!--=====================================
                CABEZA DEL MODAL
                ======================================-->
                <div class="modal-header" style="background:#222d32; color:white">
                    <button type="button" class="close"  data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Editar Empresas</h4>
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
                                <input type="text" class="form-control input-lg" id="editarNombreE" name="editarNombreE" value="" readonly>
                            </div>
                        </div>

                        <!-- ENTRADA PARA EL tipo -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                                <select class="form-control input-lg" name="editartipo_empresa" id="editartipo_empresa" readonly>
                                    <option value="Microempresa">Microempresa</option>
                                    <option value="Pequeña">Pequeña</option>
                                    <option value="Mediana">Mediana</option>
                                    <option value="Grande">Grande</option>
                                </select>
                            </div>
                        </div>

                        <!-- ENTRADA PARA  nit -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="text" class="form-control input-lg" id="editarnit" name="editarnit" value="" readonly>
                            </div>
                        </div>

                        <!-- ENTRADA PARA LA direccion   -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="text" class="form-control input-lg" id="editardireccion" name="editardireccion" value="" required>
                            </div>
                        </div>

                        <!-- ENTRADA PARA LA telefono   -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="text" class="form-control input-lg" id="editartelefono" name="editartelefono" value="" required>
                            </div>
                        </div>

                        <!-- ENTRADA PARA LA encargado   -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="text" class="form-control input-lg" id="editarencargado" name="editarencargado" value="" required>
                            </div>
                        </div>

                        <!-- ENTRADA PARA LA celular   -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="text" class="form-control input-lg" id="editarcelular" name="editarcelular" value="" required>
                            </div>
                        </div>

                        <!-- ENTRADA PARA SELECCIONAR SU sector -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                                <select class="form-control input-lg" name="editarsector" id="editarsector" >
                                    <option value="Agricultura">Agricultura</option>
                                    <option value="Ganaderia">Ganaderia</option>
                                    <option value="Pesca">Pesca</option>
                                    <option value="Mineria">Mineria</option>
                                    <option value="Industria">Industria</option>
                                    <option value="Artesania">Artesania</option>
                                    <option value="Construccion">Construccion</option>
                                    <option value="Servicioseducativos">Servicios educativos</option>
                                    <option value="Transporte">Transporte</option>
                                    <option value="Comercio">Comercio</option>
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
                    <button type="submit" class="btn btn-primary">Editar Empresas</button>
                </div>
                <?php
                    $editarEmpresa = new empresascontroller();
                    $editarEmpresa -> ctrEditarEmpresa();
                ?>
            </form>
        </div>
    </div>
</div>

<!--=====================================
MODAL AGREGAR empresa
======================================-->

<div id="modalAgregarEmpresa" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" method="post" enctype="multipart/form-data">

                <!--=====================================
                CABEZA DEL MODAL
                ======================================-->

                <div class="modal-header" style="background:#222d32; color:white">

                    <button type="button" class="close"  data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">Agregar Empresa</h4>

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

                                <input type="text" class="form-control input-lg" name="nuevoNombreE" placeholder="Ingresar Nombre" required>

                            </div>

                        </div>
                        <!-- ENTRADA PARA EL tipo -->


                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-users"></i></span>

                                <select class="form-control input-lg" name="nuevotipo_empresa">

                                    <option value="">Selecionar sector</option>

                                    <option value="Microempresa">Microempresa</option>
                                    <option value="Pequeña">Pequeña</option>
                                    <option value="Mediana">Mediana</option>
                                    <option value="Grande">Grande</option>

                                </select>

                            </div>

                        </div>

                        <!-- ENTRADA PARA  nit -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                                <input type="text" class="form-control input-lg" name="nuevonit" placeholder="Ingresar nit" required>

                            </div>

                        </div>

                        <!-- ENTRADA PARA LA direccion   -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                                <input type="text" class="form-control input-lg" name="nuevadireccion" placeholder="ingresar direccion" required>

                            </div>

                        </div>


                        <!-- ENTRADA PARA LA telefono   -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                                <input type="text" class="form-control input-lg" name="nuevotelefono" placeholder="ingresar telefono" required>

                            </div>

                        </div>

                        <!-- ENTRADA PARA LA encargado   -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                                <input type="text" class="form-control input-lg" name="nuevoencargado" placeholder="ingresar nombre encargado" required>

                            </div>

                        </div>

                        <!-- ENTRADA PARA LA celular   -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                                <input type="text" class="form-control input-lg" name="nuevocelular" placeholder="ingresar celular" required>

                            </div>

                        </div>



                        <!-- ENTRADA PARA SELECCIONAR SU sector -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-users"></i></span>

                                <select class="form-control input-lg" name="nuevosector">

                                    <option value="">Selecionar sector</option>

                                    <option value="Agricultura">Agricultura</option>
                                    <option value="Ganaderia">Ganaderia</option>
                                    <option value="Pesca">Pesca</option>
                                    <option value="Mineria">Mineria</option>
                                    <option value="Industria">Industria</option>
                                    <option value="Artesania">Artesania</option>
                                    <option value="Construccion">Construccion</option>
                                    <option value="Servicioseducativos">Servicios educativos</option>
                                    <option value="Transporte">Transporte</option>
                                    <option value="Comercio">Comercio</option>


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

                    <button type="submit" class="btn btn-primary">Guardar Empresa</button>

                </div>

                <?php

                $crearEmpresa = new empresascontroller();
                $crearEmpresa -> ctrCrearEmpresas();

                ?>
            </form>

        </div>

    </div>

</div>

<?php

$eliminarempresa = new empresascontroller();
$eliminarempresa -> ctrBorrarEmpresa();

?>


