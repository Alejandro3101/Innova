<div class="content-wrapper">

    <section class="content-header">

        <h1>

            Administrar rol

        </h1>

        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

            <li class="active">Administrar rol</li>
        </ol>

    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">


                <button class="btn btn-warning" data-toggle="modal" data-target="#modalAgregarrol">

                    Agregar Rol

                </button>



            </div>
            <div class="box-body">

                <table class="table table-bordered table-striped tablas ">

                    <thead>

                    <tr>

                        <th>#</th>
                            <th>Nombre</th>
                        <th>Codigo</th>
                        <th>Acciones</th>



                    </tr>

                    </thead>
                    <tbody>
                    <?php

                    $item = null;
                    $valor = null;

                    $rol = rolcontroller::ctrMostrarRol($item, $valor);


                   foreach ($rol as $key => $value){

          echo ' <tr>
                  <td>'.($key+1).'</td>
                  <td>'.$value["nombre"].'</td>
                  <td>'.$value["codigo"].'</td>';



                  echo '
                  <td>

                    <div class="btn-group">
                        
                        <button class="btn btn-primary" data-toggle="modal" data-target="#modalexample"><i class="fa fa-pencil"></i></button>

                      <button class="btn btn-danger "><i class="fa fa-times"></i></button>
                      
                      
         

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




<!-- Modal -->
<div class="modal fade" id="prueba" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <!-- ENTRADA PARA EL NOMBRE -->

                <div class="form-group">

                    <div class="input-group">

                        <span class="input-group-addon"><i class="fa fa-user"></i></span>

                        <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar nombre del Aula" required>

                    </div>

                </div>

                <!-- ENTRADA PARA EL Apellido -->

                <div class="form-group">

                    <div class="input-group">

                        <span class="input-group-addon"><i class="fa fa-user"></i></span>

                        <input type="text" class="form-control input-lg" name="nuevoCodigo" placeholder="Ingresar el Codigo del Aula" required>

                    </div>

                </div>

                <!-- ENTRADA PARA SELECCIONAR  estado -->

                <div class="form-group">

                    <div class="input-group">

                        <span class="input-group-addon"><i class="fa fa-users"></i></span>

                        <select class="form-control input-lg" name="nuevoestado">

                            <option value="">Selecionar Estado</option>

                            <option value="Disponible">Disponible </option>

                            <option value="Nodisponible">No disponible</option>



                        </select>

                    </div>

                </div>




            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>




<!--=====================================
MODAL AGREGAR USUARIO
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

                    <h4 class="modal-title">Agregar rol</h4>

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

                    <!-- ENTRADA PARA LA contraseña -->

                    <div class="form-group">

                        <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                            <input type="text" class="form-control input-lg" name="nuevocodigo" placeholder="Ingresar codigo" required>

                        </div>

                    </div>



                    <!--=====================================
                    PIE DEL MODAL
                    ======================================-->

                    <div class="modal-footer">

                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                        <button type="submit" class="btn btn-primary">Guardar rol</button>

                    </div>

                    <?php

                    $crearRol = new rolcontroller();
                    $crearRol -> ctrCrearRol();

                    ?>

            </form>

        </div>

    </div>

</div>









