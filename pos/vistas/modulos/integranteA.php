<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Integrantes
        </h1>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Integrantes</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
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
                                    <td>'.$value["estado_integrante"].'</td>   
                                    <td>
                                        <i class="btn-group">
                                            <a href="actividades" class="btn btn-info"><i class="fa fa-arrow-right"></i></a>
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





