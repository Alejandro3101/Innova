<aside class="main-sidebar">

	 <section class="sidebar">

		<ul class="sidebar-menu">

            <?php

                if($_SESSION["id_rol"] =="4") {


                    echo '<li class="active">

                    <a href="inicio">

                        <i class="fa fa-home"></i>
                        <span>Inicio</span>

                    </a>

                </li>

                <li>

                    <a href="usuarios">

                        <i class="fa fa-user"></i>
                        <span>Usuarios</span>

                    </a>

                </li>

                <li>

                    <a href="proyecto">

                        <i class="fa fa-th"></i>
                        <span>Proyectos</span>

                    </a>

                </li>

                <li>

                    <a href="empresas">

                        <i class="fa fa-building"></i>
                        <span>Empresas</span>

                    </a>

                </li>

                <li>

                    <a href="autor">

                        <i class="fa fa-at"></i>
                        <span>Autores</span>

                    </a>


                </li>
                <li>

                    <a href="integrante">

                        <i class="fa fa-users"></i>
                        <span>Integrantes</span>

                    </a>


                </li>
                <li>

                    <a href="recurso">

                        <i class="fa fa-cc-diners-club"></i>
                        <span>Recursos</span>

                    </a>


                </li>
                <li>

                    <a href="actividades">

                        <i class="fa fa-asterisk"></i>
                        <span>Actividades</span>

                    </a>


                </li>
        
                <li>

                    <a href="programa">

                        <i class="fa fa-calendar"></i>
                        <span>Programas</span>

                    </a>


                </li>

                <li>

                    <a href="gasto">

                        <i class="fa fa-plus"></i>
                        <span>Gastos</span>

                    </a>


                </li>       
                
                <li>

                    <a href="reportes">

                        <i class="fa fa-dollar"></i>
                        <span>Reportes</span>

                    </a>

                </li>';

                    }

                ?>
            <?php

            if($_SESSION["id_rol"] =="1") {


                echo '<li class="active">

				<a href="inicio">

					<i class="fa fa-home"></i>
					<span>Inicio</span>

				</a>

			    </li>

			    <li>

                    <a href="proyectoAprendiz">

                        <i class="fa fa-th"></i>
                        <span>Proyectos</span>

                    </a>

			    </li>

                <li>

                    <a href="autor">

                        <i class="fa fa-at"></i>
                        <span>Autores</span>

                    </a>


                </li>
                <li>

                    <a href="integranteA">

                        <i class="fa fa-users"></i>
                        <span>Integrantes</span>

                    </a>


                </li>
            
                <li>

                    <a href="actividades">

                        <i class="fa fa-asterisk"></i>
                        <span>Actividades</span>

                    </a>


                </li>';

                }

            ?>
            <?php
                if($_SESSION["id_rol"] =="2") {


                    echo '<li class="active">

                    <a href="inicio">

                        <i class="fa fa-home"></i>
                        <span>Inicio</span>

                    </a>

                    </li>

                    <li>

                        <a href="proyectoAprendiz">

                            <i class="fa fa-th"></i>
                            <span>Proyectos</span>

                        </a>

                    </li>

                    <li>

                        <a href="recurso">

                            <i class="fa fa-cc-diners-club"></i>
                            <span>Recursos</span>

                        </a>


                    </li>

                    <li>

                        <a href="autor">

                            <i class="fa fa-at"></i>
                            <span>Autores</span>

                        </a>


                    </li>
                    <li>

                        <a href="integranteA">

                            <i class="fa fa-users"></i>
                            <span>Integrantes</span>

                        </a>


                    </li>
                   
                    <li>

                        <a href="actividades">

                            <i class="fa fa-asterisk"></i>
                            <span>Actividades</span>

                        </a>


                    </li>';

                }

            ?>

		</ul>

	 </section>

</aside>