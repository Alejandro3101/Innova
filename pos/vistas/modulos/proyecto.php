<div class="content-wrapper">

    <section class="content-header">

        <h1>

            Administrar Proyectos

        </h1>

        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

            <li class="active">Administrar Proyectos</li>

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

                <table class="table table-bordered table-striped tablas ">

                    <thead>

                    <tr>

                        <th>#</th>
                        <th>Nombre</th>
                        <th>Tipo</th>
                        <th>Codigo</th>
                        <th>Clasificacion</th>
                        <th>Profesion</th>
                        <th>Estado</th>
                        <th>Fecha_cierre</th>
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
                                     
           
                     
           
               <td><button class="btn btn-success btn-xs">Activo</button></td>
               <td>'.$value["fecha_cierre"].'</td> 
               <td>
                   <i class="btn-group">

                       <button class="btn btn-primary"><i class="fa fa-pencil"></i></button>
                       <button class="btn btn-danger btnEliminarProyecto" id_proyecto="'.$value["id_proyecto"].'" ><i class="fa fa-times"></i></button>                       
                           
                       <a href="recurso" class="btn btn-info"><i class="fa fa-arrow-right"></i></a>
                                
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


                        <!-- ENTRADA PARA LA formatos -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                                <input type="file" class="form-control input-lg" name="nuevoformato" placeholder="Ingresar formato" >

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
                                    echo '<option value='.$xVVAL_DATA["id_empresa"].'>'.$xVVAL_DATA["nombre_empresa"]." ".$xVVAL_DATA[""].'</option>';
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

            </form>

        </div>

    </div>

</div>

<?php

$eliminarProyecto = new Proyectocontroller();
$eliminarProyecto -> ctrBorrarProyecto();

?>








