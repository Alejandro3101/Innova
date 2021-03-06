<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
        Usuarios
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Usuarios</li>
    
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

    <th>Documento</th>


    <th>Profeción</th>
    <th>Tipo Vinculación</th>

    <th>Cargo</th>
    <th>Ficha</th>

    <th>Estado</th>
    <th>Programa</th>
    <th>Roles</th>
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
                                
                                <td>'.$value["documento"].'</td>
                             
                          
                                <td>'.$value["profesion"].'</td>';
                        echo '               
                                <td>'.$value["tipo_vinculacion"].'</td>
                                
                                <td>'.$value["cargo"].'</td>
                                <td>'.$value["ficha"].'</td>
                              
                                <td>'.$value["estado_vinculacion"].'</td>
                                <td>'.$value["nombre_programa"].'</td>
                                <td>'.$value["nombre"].'</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary btnEditarUsuario" Usuarioid="'.$value["id_persona"].'" data-toggle="modal" data-target="#modaleditarUsuario"><i class="fa fa-pencil"></i></button>
                                        <button class="btn btn-danger btnEliminarUsuario" id_persona="'.$value["id_persona"].'"><i class="fa fa-times"></i></button>
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
                                <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar nombre" >
                            </div>
                        </div>
                        <!-- ENTRADA PARA EL Apellido -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control input-lg" name="nuevoApellido" placeholder="Ingresar Apellido" >
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
                                    <option value="Cedula de ciudadania">Cedula Ciudadania</option>
                                    <option value="Tarjeta de identidad">Tarjeta Identidad</option>
                                </select>
                            </div>
                        </div>
                        <!-- ENTRADA PARA EL Documento -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                <input type="text" class="form-control input-lg" name="nuevoDocumento" placeholder="Ingresar Documento" id="nuevodocumento" >
                            </div>
                        </div>
                        <!-- ENTRADA PARA LA Celular -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="text" class="form-control input-lg" name="nuevocelular" placeholder="Ingresar Telefono" >
                            </div>
                        </div>
                        <!-- ENTRADA PARA LA Email -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="text" class="form-control input-lg" name="nuevoemail" placeholder="Ingresar Email" >
                            </div>
                        </div>
                        <!-- ENTRADA PARA LA contraseña -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="text" class="form-control input-lg" name="nuevacontrasena" placeholder="Ingresar contraseña" >
                            </div>
                        </div>
                        <!-- ENTRADA PARA LA fecha_vinculacion -->
                        <div class="form-group nuevaFechaVinculacionv invisible">
                            <label>Fecha vinculación</label><br>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="date" class="form-control input-lg" name="nuevaFechaVinculacion" id="nuevaFechaVinculacion"  >
                            </div>
                        </div>
                        <!-- ENTRADA PARA LA fecha_desvinculacion -->
                        <div class="form-group nuevafechaDesvinculacionv invisible">
                            <label>Fecha desvinculacion</label><br>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="date" class="form-control input-lg" name="nuevafechaDesvinculacion" id="nuevafechaDesvinculacion" >
                            </div>
                        </div>
                        <!-- ENTRADA PARA SELECCIONAR SU estado -->
                        <div class="form-group nuevoestadov invisible">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                                <select class="form-control input-lg" name="nuevoestado" id="nuevoestado">
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
                                <input type="text" class="form-control input-lg" name="nuevaprofesion" id="nuevaprofesion" placeholder="Ingresar Profesion" >
                            </div>
                        </div>
                        <!-- ENTRADA PARA SELECCIONAR SU tipo_vinculacion -->
                        <div class="form-group nuevoTvinculacionv invisible">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                                <select class="form-control input-lg" name="nuevoTvinculacion" id="nuevoTvinculacion">
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
                                <input type="text" class="form-control input-lg" name="nuevoCvlac" id="nuevoCvlac" placeholder="Ingresar cvlac" >
                            </div>
                        </div>
                        <!-- ENTRADA PARA SELECCIONAR SU cargo -->
                        <div class="form-group nuevoCargov invisible">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                                <select class="form-control input-lg" name="nuevoCargo" id="nuevoCargo">
                                    <option value="">Selecionar Cargo</option>
                                    <option value="Voluntario">Voluntario</option>
                                    <option value="Monitor">Monitor</option>
                                    <option value="Apoyo de sostenimiento">Apoyo Sostenimiento</option>
                                    <option value="Practicante">Practicante</option>
                                    <option value="Pasantia">Pasantia</option>
                                </select>
                            </div>
                        </div>
                        <!-- ENTRADA PARA LA Ficha -->
                        <div class="form-group nuevaFichav invisible">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="text" class="form-control input-lg" name="nuevaFicha" id="nuevaFicha" placeholder="Ingresar Ficha" >
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
                                <select class="form-control nuevoid_programa" name="nuevoid_programa" id="nuevoid_programa">
                                    <option value='NULL'>Selecionar Programa</option>
                                    <?php
                                    foreach($aVECT_DATA as $key => $xVVAL_DATA){
                                        echo '<option value='.$xVVAL_DATA["id_programa"].'>'.$xVVAL_DATA["nombre_programa"].'</option>';
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

<?php
$EliminarUsuario = new ControladorUsuarios();
$EliminarUsuario -> ctrBorrarUsuario();
?>

<!--=====================================
MODAL EDITAR USUARIO
======================================-->

<div id="modaleditarUsuario" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="post" id="formEdit" enctype="multipart/form-data">

                <!--=====================================
                CABEZA DEL MODAL
                ======================================-->
                <div class="modal-header" style="background:#222d32; color:white">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Editar usuario</h4>
                </div>

                <!--=====================================
                CUERPO DEL MODAL
                ======================================-->
                <div class="modal-body">
                    <div class="box-body">
                                    
                        <input type="hidden" name="editarid_persona" id="editarid_persona">

                        <!-- ENTRADA PARA EL NOMBRE -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control input-lg" name="editarnombres" id="editarnombres">
                            </div>
                        </div>
                        <!-- ENTRADA PARA EL Apellido -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control input-lg" name="editarapellidos" id="editarapellidos">
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
                                <select class="form-control nuevoid_rol" name="editartipo_rol" id="editartipo_rol">
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
                                <select class="form-control input-lg" name="editartipo_documento" id ="editartipo_documento">
                                    <option value="">Tipo Documento</option>
                                    <option value="Cedula de ciudadania">Cedula Ciudadania</option>
                                    <option value="Tarjeta de identidad">Tarjeta Identidad</option>
                                </select>
                            </div>
                        </div>
                        <!-- ENTRADA PARA EL Documento -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                <input type="text" class="form-control input-lg" name="editardocumento" id="editardocumento">
                            </div>
                        </div>
                        <!-- ENTRADA PARA LA Celular -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="text" class="form-control input-lg" name="editarcelular" id="editarcelular">
                            </div>
                        </div>
                        <!-- ENTRADA PARA LA Email -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="text" class="form-control input-lg" name="editaremail" id="editaremail">
                            </div>
                        </div>
                        <!-- ENTRADA PARA LA contraseña -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="text" class="form-control input-lg" name="editarcontrasena" id="editarcontrasena">
                            </div>
                        </div>
                        <!-- ENTRADA PARA LA fecha_vinculacion -->
                        <div class="form-group nuevaFechaVinculacionvEdit invisible">
                            <label>Fecha vinculación</label><br>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="date" class="form-control input-lg" name="editarfecha_vinculacion" id="editarfecha_vinculacion">
                            </div>
                        </div>
                        <!-- ENTRADA PARA LA fecha_desvinculacion -->
                        <div class="form-group nuevafechaDesvinculacionvEdit invisible">
                            <label>Fecha desvinculacion</label><br>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="date" class="form-control input-lg" name="editarfecha_desvinculacion" id="editarfecha_desvinculacion">
                            </div>
                        </div>
                        <!-- ENTRADA PARA SELECCIONAR SU estado -->
                        <div class="form-group nuevoestadovEdit invisible">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                                <select class="form-control input-lg" name="editarestado_vinculacion" id="editarestado_vinculacion">
                                    <option value="">Selecionar Estado</option>
                                    <option value="Activo">Activo</option>
                                    <option value="Inactivo">Inactivo</option>
                                </select>
                            </div>
                        </div>
                        <!-- ENTRADA PARA LA Profesion -->
                        <div class="form-group nuevaprofesionvEdit invisible">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="text" class="form-control input-lg" name="editarprofesion" id="editarprofesion">
                            </div>
                        </div>
                        <!-- ENTRADA PARA SELECCIONAR SU tipo_vinculacion -->
                        <div class="form-group nuevoTvinculacionvEdit invisible">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                                <select class="form-control input-lg" name="editartipo_vinculacion" id="editartipo_vinculacion">
                                    <option value="">Selecionar Tipo Vinculacion</option>
                                    <option value="Contratista">Contratista</option>
                                    <option value="Planta">Planta</option>
                                    <option value="Planta provisional">Planta provisional</option>
                                    <option value="Planta temporal">Planta temporal</option>
                                </select>
                            </div>
                        </div>
                        <!-- ENTRADA PARA LA cvlac -->
                        <div class="form-group nuevoCvlacvEdit invisible">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="text" class="form-control input-lg" name="editarcvlac" id="editarcvlac">
                            </div>
                        </div>
                        <!-- ENTRADA PARA SELECCIONAR SU cargo -->
                        <div class="form-group nuevoCargovEdit invisible">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                                <select class="form-control input-lg" name="editarcargo" id ="editarcargo">
                                    <option value="">Selecionar Cargo</option>
                                    <option value="Voluntario">Voluntario</option>
                                    <option value="Monitor">Monitor</option>
                                    <option value="Apoyo de sostenimiento">Apoyo Sostenimiento</option>
                                    <option value="Practicante">Practicante</option>
                                    <option value="Pasantia">Pasantia</option>
                                </select>
                            </div>
                        </div>
                        <!-- ENTRADA PARA LA Ficha -->
                        <div class="form-group nuevaFichavEdit invisible">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="text" class="form-control input-lg" name="editarficha" id="editarficha">
                            </div>
                        </div>
                        <!-- ENTRADA PARA LA LLAVE FORANEA DE PROGRAMA -->
                        <div class="form-group nuevoid_programavEdit invisible">
                            <label>Programa</label><br>
                            <div class="input-group">
                                <?php
                                $OBJ_DATA = conexion::conectar()->prepare("SELECT * FROM programa");
                                $OBJ_DATA-> execute();
                                $aVECT_DATA = $OBJ_DATA->fetchALL();
                                ?>
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <select class="form-control nuevoid_programa" name="editarid_programa" id="editarid_programa">
                                    <option value="NULL">Selecionar Programa</option>
                                    <?php
                                    foreach($aVECT_DATA as $key => $xVVAL_DATA){
                                        echo '<option value='.$xVVAL_DATA["id_programa"].'>'.$xVVAL_DATA["nombre_programa"].'</option>';
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
                    <button type="submit" class="btn btn-primary">Editar Usuario</button>
                </div>
                <?php
                $editarUsuario = new ControladorUsuarios();
                $editarUsuario -> ctrEditarUsuario();
                ?>
            </form>
        </div>
    </div>
</div>

