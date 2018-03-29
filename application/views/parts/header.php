<div id="navbar">    
  <nav class="navbar navbar-default navbar-static-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
              <a class="navbar-brand" href="#">Abuela chepa admin</a>
            </div>
            
            <div class="collapse navbar-collapse" id="navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="liInicio"><a href="#">Inicio</a></li>
                    <li class="liIngresarStock">
                    	<a href=<?php echo site_url("AlumnoController/agregar/") ?> >
                        Gestion alumno
                        </a>
                    </li>
    				<li class="liSacarStock">
    					<a href=<?php echo site_url("AdminProducto/sacarProductoUsuario/") ?>>
							Sacar stock	
						</a>
    				</li>     
    				<li class="liCerrarSession">
    					<a href=<?php echo site_url("/Welcome/logout") ?> >Cerrar sesion</a>
    				</li>              
                    <!-- <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a> 
                      
                        <ul class="dropdown-menu">
                          <li class="kopie"><a href="#">Dropdown</a></li>
                            <li><a href="#">Dropdown Link 1</a></li>
                            <li class="active"><a href="#">Dropdown Link 2</a></li>
                            <li><a href="#">Dropdown Link 3</a></li>
                          
                            <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown Link 4</a>
        						<ul class="dropdown-menu">
                                    <li class="kopie"><a href="#">Dropdown Link 4</a></li>
									<li><a href="#">Dropdown Submenu Link 4.1</a></li>
									<li><a href="#">Dropdown Submenu Link 4.2</a></li>
									<li><a href="#">Dropdown Submenu Link 4.3</a></li>
									<li><a href="#">Dropdown Submenu Link 4.4</a></li>
                                                                      
								</ul>
							</li>
                          
                            <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown Link 5</a>
								<ul class="dropdown-menu">
                                    <li class="kopie"><a href="#">Dropdown Link 5</a></li>
									<li><a href="#">Dropdown Submenu Link 5.1</a></li>
									<li><a href="#">Dropdown Submenu Link 5.2</a></li>
									<li><a href="#">Dropdown Submenu Link 5.3</a></li>
									
									<li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown Submenu Link 5.4</a>
										<ul class="dropdown-menu">
                                            <li class="kopie"><a href="#">Dropdown Submenu Link 5.4</a></li>
											<li><a href="#">Dropdown Submenu Link 5.4.1</a></li>
											<li><a href="#">Dropdown Submenu Link 5.4.2</a></li>
											
											
										</ul>
									</li>                           
								</ul>
							</li>                                   
                        </ul>
                    </li>
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown2 <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li class="kopie"><a href="#">Dropdown2</a></li>
                            <li><a href="#">Dropdown2 Link 1</a></li>
                            <li><a href="#">Dropdown2 Link 2</a></li>
                            <li><a href="#">Dropdown2 Link 3</a></li>
                            
                            <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown2 Link 4</a>
								<ul class="dropdown-menu">
                                    <li class="kopie"><a href="#">Dropdown2 Link 4</a></li>
									<li><a href="#">Dropdown2 Submenu Link 4.1</a></li>
									<li><a href="#">Dropdown2 Submenu Link 4.2</a></li>
									<li><a href="#">Dropdown2 Submenu Link 4.3</a></li>
									<li><a href="#">Dropdown2 Submenu Link 4.4</a></li>
                                   
								</ul>
							</li>
                            <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown2 Link 5</a>
								<ul class="dropdown-menu">
                                    <li class="kopie"><a href="#">Dropdown Link 5</a></li>
									<li><a href="#">Dropdown2 Submenu Link 5.1</a></li>
									<li><a href="#">Dropdown2 Submenu Link 5.2</a></li>
									<li><a href="#">Dropdown2 Submenu Link 5.3</a></li>
									<li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown Submenu Link 5.4</a>
										<ul class="dropdown-menu">
                                            <li class="kopie"><a href="#">Dropdown2 Submenu Link 5.4</a></li>
											<li><a href="#">Dropdown2 Submenu Link 5.4.1</a></li>
											<li><a href="#">Dropdown2 Submenu Link 5.4.2</a></li>
											
										</ul>
									</li>                                  
								</ul>
							</li>                                  
                        </ul>
                    </li> -->
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
</div>
<!-- <div class="row marginNull">
	<a href=<?php echo site_url("/Welcome/logout") ?> >Cerrar sesion</a>
	<h1>Bienvenido al portal administrativo</h1>
	<h2><?php //echo $usuario->getUsuario(); ?></h2>
	<a href=<?php echo site_url("AdminProducto/ingresoProductoUsuario/") ?> class="btn btn-default" >Ingresar stock</a>
	<a href=<?php echo site_url("AdminProducto/sacarProductoUsuario/") ?> class="btn btn-default">
		Sacar stock	
	</a>
</div> -->