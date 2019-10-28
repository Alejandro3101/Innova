 <header class="main-header">
 	
	<!--=====================================
	LOGOTIPO
	======================================-->
	<a href="inicio" class="logo">
		
		<!-- logo mini -->
		<span class="logo-mini">
			
			<img src="vistas/img/plantilla/f.png" class="img-responsive" style="padding:10px">

		</span>

		<!-- logo normal -->

		<span class="logo-lg">
			
			<img src="vistas/img/plantilla/logo.png" class="img-responsive" style="padding:0px 0px">

		</span>

	</a>

	<!--=====================================
	BARRA DE NAVEGACIÓN
	======================================-->
	<nav class="navbar navbar-static-top" role="navigation">
		
		<!-- Botón de navegación -->

	 	<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        	
        	<span class="sr-only">Toggle navigation</span>
      	
      	</a>


		<!-- perfil de usuario -->

		<div class="navbar-custom-menu">
				
			<ul class="nav navbar-nav">
				
				<li class="dropdown user user-menu">


					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						


						<span class="hidden-xs"><?php echo $_SESSION["nombres"]  ; ?></span>
                        <span class="hidden-xs"><?php echo $_SESSION["apellidos"] ; ?></span>
                        <b class="caret"></b>


					</a>



					<!-- Dropdown-toggle -->

					<ul class="dropdown-menu">
						
						<li class="widget-user-username">
							
							<div class="fa-pull-right">
								
								<a href="salir" class="btn btn-danger "> Salir </a>

							</div>

						</li>

					</ul>

				</li>

			</ul>

		</div>

	</nav>

 </header>