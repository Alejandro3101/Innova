<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Autores
        </h1>

        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Autores</li>

        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <button class="btn btn-warning" data-toggle="modal" data-target="#modalAgregarrol">
                    Agregar Autores
                </button>
            </div>


            <div class="box-body">
                <table class="table table-bordered table-striped tablas ">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Tipo de Documento</th>
                        <th>Documento</th>
                        <th>Email</th>
                        <th>Celular</th>
                        <th>Proyecto</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $item = null;
                    $valor = null;
                    $autor = autorescontroller::ctrMostrarAutores($item, $valor);

                    foreach ($autor as $key => $value){
                        echo ' <tr>
                                <td>'.($key+1).'</td>
                                <td>'.$value["nombres"].'</td>
                                <td>'.$value["apellidos"].'</td>
                                <td>'.$value["tipo_documento"].'</td>
                                <td>'.$value["documento"].'</td>
                                <td>'.$value["email"].'</td>
                                <td>'.$value["celular"].'</td>
                                <td>'.$value["nombre_proyecto"].'</td>';
                        echo '               

                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary btnEditarAutores" Autorid="'.$value["id_autor"].'" data-toggle="modal" data-target="#modaleditarautor"><i class="fa fa-pencil"></i></button>
                                        <button class="btn btn-danger btnEliminarAutores" idAutor="'.$value["id_autor"].'"><i class="fa fa-times"></i></button>
                                      <a href="integrante" class="btn btn-info"><i class="fa fa-arrow-right"></i></a>
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
MODAL editar autor
======================================-->
<div id="modaleditarautor" class="modal fade" role="dialog">
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
                        
                        <input type="hidden" class="form-control input-lg" name="editarid_autor" id="editarid_autor">
                        
                        
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control input-lg" name="editarnombres" id="editarnombres"  required>
                            </div>
                        </div>
                        <!-- ENTRADA PARA EL APELLIDO -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control input-lg" name="editarapellidos" id="editarapellidos" required>
                            </div>
                        </div>
                        <!-- ENTRADA PARA EL TIPO DE DOCUMENTO  -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <select class="form-control" name="editartipo_documento" id="editartipo_documento">
                                    <option>Seleccione el Tipo de Documento</option>
                                    <option value="Cédula de ciudadanía">Cédula de ciudadanía</option>
                                    <option value="Tarjeta de identidad">Tarjeta de identidad</option>
                                    <option value="Tarjeta Pasajero">Tarjeta Pasajero</option>
                                    <option value="Cédula de extranjería">Cédula de extranjería</option>
                                </select>
                            </div>
                        </div>
                        <!-- ENTRADA PARA EL DOCUMENTO -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control input-lg" name="editardocumento" id="editardocumento" required>
                            </div>
                        </div>
                        <!-- ENTRADA PARA EL GMAIL -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control input-lg" name="editaremail" id="editaremail" required>
                            </div>
                        </div>
                        <!-- ENTRADA PARA EL NUMERO DE CELULAR -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control input-lg" name="editarcelular" id="editarcelular" required>
                            </div>
                        </div>
                    </div>
                </div>
                <!--=====================================
                PIE DEL MODAL
                ======================================-->

                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">Editar tareas</button>
                </div>
                <?php
                $editarAutores = new autorescontroller();
                $editarAutores -> ctrEditarAutores();
                ?>
            </form>
        </div>
    </div>
</div>


<!--=====================================
MODAL AGREGAR autor
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
                    <h4 class="modal-title">Agregar Autores</h4>
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
                                $idRol = $_SESSION["id_rol"];
                                $OBJ_DATA = "";
                                if($idRol==4){
                                    $OBJ_DATA =  Conexion::conectar()->prepare("SELECT * FROM proyectos");
                                }else{
                                    $id = $_SESSION["id_persona"];
                                    $OBJ_DATA = Conexion::conectar()->prepare("SELECT p.* FROM proyectos p INNER JOIN integrantes i ON p.id_proyecto = i.id_proyecto INNER JOIN persona ps ON i.id_persona = ps.id_persona WHERE ps.id_persona = $id" );
                                }
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

                        <!-- ENTRADA PARA EL NOMBRE DE AUTORES -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control input-lg" name="nuevonombres" placeholder="Ingresar el Nombre del Autor" required>
                            </div>
                        </div>
                        <!-- ENTRADA PARA EL APELLIDO -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control input-lg" name="nuevoapellidos" placeholder="Ingresar el Apellido del Autor" required>
                            </div>
                        </div>
                        <!-- ENTRADA PARA EL TIPO DE DOCUMENTO  -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <select class="form-control" name="nuevotipo_documento">
                                    <option>Seleccione el Tipo de Documento</option>
                                    <option value="Cédula de ciudadanía">Cédula de ciudadanía</option>
                                    <option value="Tarjeta de identidad">Tarjeta de identidad</option>
                                    <option value="Tarjeta Pasajero">Tarjeta Pasajero</option>
                                    <option value="Cédula de extranjería">Cédula de extranjería</option>
                                </select>
                            </div>
                        </div>
                        <!-- ENTRADA PARA EL DOCUMENTO -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control input-lg" name="nuevodocumento" placeholder="Ingresar el Documento" required>
                            </div>
                        </div>
                        <!-- ENTRADA PARA EL GMAIL -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control input-lg" name="nuevoemail" placeholder="Ingresar el Correo Electronico" required>
                            </div>
                        </div>
                        <!-- ENTRADA PARA EL NUMERO DE CELULAR -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control input-lg" name="nuevocelular" placeholder="Ingresar el Número Telefonico" required>
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
                $crearAutores = new autorescontroller();
                $crearAutores -> ctrCrearAutores();
                ?>
            </form>
        </div>
    </div>
</div>