<div class="content-wrapper">

    <section class="content-header">

        <h1>
            Proyectos
        </h1>

        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

            <li class="active">Proyectos</li>

        </ol>

    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                
               <!-- <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#modalSIGUIENTE"'> Recursos → </button>  -->
            </div>
            <div class="box-body">
                <table class="tablas table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Tipo</th>
                        <th>Codigo</th>
                        <th>Clasificacion</th>
                        <th>Estado</th>
                        <th>Fecha_cierre</th>
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
                                    <td>'.$value["fecha_cierre"].'</td> 
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
MODAL EDITAR PROYECTOS
======================================-->

<!--=====================================
MODAL AGREGAR Proyectos
======================================-->











