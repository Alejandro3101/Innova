<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar usuarios
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar usuarios</li>
    
    </ol>

  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">


<button class="btn btn-warning" data-toggle="modal" data-target="#modalAgregarUsuario">

Agregar Usuario


</button>



      </div>
      <div class="box-body">

          <table class="table table-bordered table-striped tablas ">

           <thead>

<tr>

    <th>#</th>
    <th>Nombres</th>
    <th>Apellidos</th>
    <th>Rol</th>
    <th>Tipo de Documento</th>
    <th>Documento</th>
    <th>Celular</th>
    <th>Gmail</th>
    <th>Profeción</th>
    <th>Tipo Vinculación</th>
    
    <th>Cargo</th>
    <th>Ficha</th>
    <th>Fecha Vinculacion</th>
    <th>Fecha Desvinculacion</th>
    <th>Estado</th>
    <th>Programa</th>
    <th>Acciones</th>



</tr>

           </thead>
           <tbody>

           <?php

                    $item = null;
                    $valor = null;

                    $persona = ControladorUsuarios::ctrMostrarusuario($item, $valor);


                   foreach ($persona as $key => $value){
                       echo ' <tr>
                                <td>'.($key+1).'</td>
                                <td>'.$value["nombres"].'</td>
                                <td>'.$value["apellidos"].'</td>
                                <td>'.$value["id_rol"].'</td>
                                <td>'.$value["tipo_documento"].'</td>
                                <td>'.$value["documento"].'</td>
                                <td>'.$value["celular"].'</td>
                                <td>'.$value["email"].'</td>
                                <td>'.$value["profesion"].'</td>';
                        echo '               
                                <td>'.$value["tipo_vinculacion"].'</td>
                                
                                <td>'.$value["cargo"].'</td>
                                <td>'.$value["ficha"].'</td>
                                <td>'.$value["fecha_vinculacion"].'</td>
                                <td>'.$value["fecha_desvinculacion"].'</td>
                                <td>'.$value["estado_vinculacion"].'</td>
                                <td>'.$value["id_programa"].'</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary btnEditarUsuario" Usuarioid="'.$value["id_persona"].'" data-toggle="modal" data-target="#modaleditartarea"><i class="fa fa-pencil"></i></button>
                                       
                                        <button class="btn btn-danger btnEliminarUsuario" idUsuario="'.$value["id_persona"].'"><i class="fa fa-times"></i></button>
                                    
                                    <a href="evidencia" class="btn btn-info"><i class="fa fa-arrow-right"></i></a>
                                    
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
MODAL AGREGAR USUARIO
======================================-->

<div id="modalAgregarUsuario" class="modal fade" role="dialog">

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

                        <!-- ENTRADA PARA EL NOMBRE -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                                <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar nombre" required>

                            </div>

                        </div>
                        <!-- ENTRADA PARA EL Apellido -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                                <input type="text" class="form-control input-lg" name="nuevoApellido" placeholder="Ingresar Apellido" required>

                            </div>

                        </div>
                        <!-- ENTRADA PARA LA LLAVE FORANEA DE ROL -->
                        <div class="form-group">
                            
                            <div class="input-group">
                                <?php
                                $OBJ_DATA = conexion::conectar()->prepare("SELECT * FROM rol");
                                $OBJ_DATA-> execute();
                                $aVECT_DATA = $OBJ_DATA->fetchALL();
                                ?>
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <select class="form-control nuevoid_rol" name="nuevoid_rol">
                                    <option>Seleccione Rol</option>
                                    <?php
                                    foreach($aVECT_DATA as $key => $xVVAL_DATA){
                                        echo '<option nom='.$xVVAL_DATA["nombre"].' value='.$xVVAL_DATA["id_rol"].'>'.$xVVAL_DATA["nombre"].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <!-- ENTRADA PARA Tipo Documento -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-users"></i></span>

                                <select class="form-control input-lg" name="nuevoTdocumento">

                                    <option value="">Tipo Documento</option>

                                    <option value="Cedula ciudadania">Cedula Ciudadania</option>

                                    <option value="Tarjeta identidad">Tarjeta Identidad</option>

                                </select>

                            </div>

                        </div>


                        <!-- ENTRADA PARA EL Documento -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-key"></i></span>

                                <input type="text" class="form-control input-lg" name="nuevoDocumento" placeholder="Ingresar Documento" id="nuevodocumento" required>

                            </div>

                        </div>

                        <!-- ENTRADA PARA LA Celular -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                                <input type="text" class="form-control input-lg" name="nuevocelular" placeholder="Ingresar Telefono" required>

                            </div>

                        </div>
                        <!-- ENTRADA PARA LA Email -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                                <input type="text" class="form-control input-lg" name="nuevoemail" placeholder="Ingresar Email" required>

                            </div>

                        </div>
                        <!-- ENTRADA PARA LA contraseña -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                                <input type="text" class="form-control input-lg" name="nuevacontrasena" placeholder="Ingresar contraseña" required>

                            </div>

                        </div>
                        <!-- ENTRADA PARA LA fecha_vinculacion -->

                        <div class="form-group nuevaFechaVinculacionv invisible">

                            <label>Fecha vinculación</label><br>

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                                <input type="date" class="form-control input-lg" name="nuevaFechaVinculacion"  required>

                            </div>
                            </div>

                            <!-- ENTRADA PARA LA fecha_desvinculacion -->

                            <div class="form-group nuevafechaDesvinculacionv invisible">
                                <label>Fecha desvinculacion</label><br>

                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>


                                    <input type="date" class="form-control input-lg" name="nuevafechaDesvinculacion" required>

                                </div>
                            </div>

                            <!-- ENTRADA PARA SELECCIONAR SU estado -->

                            <div class="form-group nuevoestadov invisible">

                            <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-users"></i></span>

                            <select class="form-control input-lg" name="nuevoestado">

                                <option value="">Selecionar Estado</option>

                                <option value="Activo">Activo</option>

                                <option value="Inactivo">Inactivo</option>



                            </select>

                            </div>

                            </div>
                        <!-- ENTRADA PARA LA Profesion -->

                        <div class="form-group nuevaprofesionv invisible">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                                <input type="text" class="form-control input-lg" name="nuevaprofesion" placeholder="Ingresar Profesion" required>

                            </div>

                        </div>
                    
                        <!-- ENTRADA PARA SELECCIONAR SU tipo_vinculacion -->

                            <div class="form-group nuevoTvinculacionv invisible">

                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-users"></i></span>

                                    <select class="form-control input-lg" name="nuevoTvinculacion">

                                        <option value="">Selecionar Tipo Vinculacion</option>

                                        <option value="Contratista">Contratista</option>

                                        <option value="Planta">Planta</option>

                                        <option value="Planta provisional">Planta provisional</option>

                                        <option value="Planta temporal">Planta temporal</option>

                                    </select>

                                </div>

                            </div>



                        <!-- ENTRADA PARA LA cvlac -->

                        <div class="form-group nuevoCvlacv invisible">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                                <input type="text" class="form-control input-lg" name="nuevoCvlac" placeholder="Ingresar cvlac" required>

                            </div>

                        </div>

                        <!-- ENTRADA PARA SELECCIONAR SU cargo -->

                        <div class="form-group nuevoCargov">

                            <div class="input-group nuevoCargov invisible">

                                <span class="input-group-addon"><i class="fa fa-users"></i></span>

                                <select class="form-control input-lg" name="nuevoCargo">

                                    <option value="">Selecionar Cargo</option>

                                    <option value="Voluntario">Voluntario</option>

                                    <option value="Monitor">Monitor</option>

                                    <option value="Apoyo de sostenimiento">Apoyo Sostenimiento<option>

                                    <option value="Practicante">Practicante</option>

                                    <option value="Pasantia">Pasantia</option>

                                </select>

                            </div>

                        </div>

                        <!-- ENTRADA PARA LA Ficha -->

                        <div class="form-group nuevaFichav invisible">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                                <input type="text" class="form-control input-lg" name="nuevaFicha" placeholder="Ingresar Ficha" required>

                            </div>

                            </div>

                        <!-- ENTRADA PARA LA LLAVE FORANEA DE PROGRAMA -->
                        <div class="form-group nuevoid_programav invisible">
                            <label>Programa</label><br>
                            <div class="input-group">

                                <?php
                                $OBJ_DATA = conexion::conectar()->prepare("SELECT * FROM programa");
                                $OBJ_DATA-> execute();
                                $aVECT_DATA = $OBJ_DATA->fetchALL();
                                ?>
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <select class="form-control" name="nuevoid_programa">
                                    <option>Seleccione</option>
                                    <?php
                                    foreach($aVECT_DATA as $key => $xVVAL_DATA){
                                        echo '<option value='.$xVVAL_DATA["id_programa"].'>'.$xVVAL_DATA["nombre_programa"]." ".$xVVAL_DATA[""].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                </div>





                    <!--=====================================
                    PIE DEL MODAL
                    ======================================-->

                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                    <button type="submit" class="btn btn-primary">Guardar usuario</button>

                </div>

                <?php

                $crearUsuario = new ControladorUsuarios();
                $crearUsuario -> ctrCrearUsuario();

                ?>

            </form>

        </div>

    </div>

</div>

