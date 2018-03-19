<!DOCTYPE html>
<html>
<head>
	<title>	Ingreso producto</title>
	<?php
		$this->load->view("parts/head.php");
	?>
</head>
<body>
	<?php $this->load->view("parts/header.php") ?>
	
	<input type="hidden" class="txtHdGetPresentaciones" value=<?php echo site_url("AdminProducto/ajax_getPresentaciones"); ?> >
	<div class="row marginNull">
		<div class="col-lg-offset-1 col-lg-4">
			<form method="post" id="formularioIngreso" action=<?php echo site_url("AdminProducto/ingresarStockProducto") ?> >
				<div class="row">
					<label>Producto</label>
					<select class="form-control cbProducto" name="cbProducto">
						<option>Seleccione un producto</option>
						<?php 
							foreach ($productos as $key => $producto) {
						?>
							<option value=<?php echo $producto->getId() ?>> <?php echo $producto->getProducto() ?>
					 		</option>
						<?php
							}
						?>
					</select>
				</div>
				<div class="row">
					<label>Presentacion</label>
					<select class="form-control cbPresentacion" name="cbPresentacion">
						
					</select>
				</div>
				<div class="row">
					<label>Cantidad</label>
					<input type="text" name="txtCantidad" class="form-control">
				</div>
				<div class="row">
					<label>Fecha de ingreso</label>
					<input type="text" name="txtFecha" class="txtFecha form-control">
				</div>
				<button type="submit" class="btn btn-success">
					Ingresar
				</button>
			</form>	
		</div>
	</div>

	<!-- -->
		<div class="row marginNull" style="margin-top: 3%">
			<div class="col-lg-offset-1 col-lg-10">
				<div class="panel with-nav-tabs panel-default">
			        <div class="panel-heading">
			                <ul class="nav nav-tabs">
			                    <li class="active"><a href="#tab1default" data-toggle="tab">Consolidado</a></li>
			                    <li><a href="#tab2default" data-toggle="tab">Detalle de venta</a></li>
			                    <!-- <li><a href="#tab3default" data-toggle="tab">Default 3</a></li>
			                    <li class="dropdown">
			                        <a href="#" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
			                        <ul class="dropdown-menu" role="menu">
			                            <li><a href="#tab4default" data-toggle="tab">Default 4</a></li>
			                            <li><a href="#tab5default" data-toggle="tab">Default 5</a></li>
			                        </ul>
			                    </li> -->
			                </ul>
			        </div>
			        <div class="panel-body">
			            <div class="tab-content">
			                <div class="tab-pane fade in active" id="tab1default">
								<?php 
									foreach ($consolidado as $key => $IngresoStockUser) {
								?>
									<div class="col-lg-4">
										<div class="panel">
											<div class="panel-heading">
												<h4 class="text-center"><?php echo $IngresoStockUser->_presentacion->_descripcion." (".$IngresoStockUser->_presentacion->_pesoNeto."g)" ?></h4>		
											</div>
											<div class="panel-body">
												
												<div class="row marginNull text-center">
													<?php echo $IngresoStockUser->_cantidad ?>
												</div>		
											</div>
										</div>
										
									</div>
								<?php 
									}
								?>
			                </div>
			                <div class="tab-pane fade" id="tab2default">
			                	<div class=" table-responsive">
								<?php
									//print_r($ingresosStocks);
								?>
								<input type="hidden" class="txtHdUrlEliminar" value=<?php echo site_url("/adminProducto/eliminarStockProducto"); ?> >
								<div class="row" style="margin-bottom: 3%;">
									<div class="col-lg-3">
										<label>Mes:(Funcion no disponible) </label>
										<select class="cbMesDetalle form-control">
											<option value="1">Enero</option>
											<option value="2">Febrero</option>
											<option value="3">Enero</option>
										</select>	
										
									</div>
									<div class="col-lg-offset-6 col-lg-3">
										<label>.</label>
										<button class="btn btn-default btn-block btn-primary">
											Buscar
										</button>
									</div>
								</div>
															
								<table class="tbIngresoProducto" >
									<thead>
										<tr>
											<th class="hidden">
												Hidden
											</th>
											<th>
												Producto
											</th>
											<th>
												Presentacion
											</th>
											<th>
												Cantidad
											</th>
											<th>
												Fecha ingreso
											</th>
											<th>
												Acciones
											</th>
										</tr>
									</thead>
									<tbody>
										<?php 
											foreach ($ingresosStocks as $key => $ingreso) {
										?>
											<tr>
												<td class="hidden">
													<input type="hidden" class="txtHdIdProducto" value=<?php echo $ingreso->_idStock ?>>
												</td>
												<td>
													<div class="divEdit hidden">
														<select class="form-control cbProductoDetalle" >
															
														</select>
													</div>
													<div class="divNormal">
														<?php echo $ingreso->_presentacion->_producto->_producto ?>		
													</div>
												</td>
												<td>
													<div class="divEdit hidden">
														<select class="form-control cbPresentacionProductoDetalle" >
															
														</select>
													</div>
													<div class="divNormal">
														<?php echo $ingreso->_presentacion->_pesoNeto ?>g	
													</div>
													
												</td>
												<td>
													<div class="divEdit hidden">
														<input type="text" class="form-control txtCantidadDetalle" >
													</div>
													<div class="divNormal">
														<?php echo $ingreso->_cantidad ?>	
													</div>
												</td>
												<td>
													<div class="divEdit hidden">
														<input type="text" class="form-control txtFechaIngresoDetalle" >
													</div>
													<div class="divNormal">
														<?php echo $ingreso->_fechaIngreso ?>
													</div>
												</td>
												<td>
													<div class="btn-group">
														<div class="divEdit hidden">
															<button class="btn hidden btn-default btn-warning btn-sm btnGuardarCambios">
																Guardar cambios
															</button>
															<button class="btn btn-default btn-danger btn-sm btnCancelar">
																Cancelar
															</button>
														</div>
														<div class="divNormal">
															<button class="btn btn-default btn-warning btn-sm btnEditar">
																Editar
															</button>
															<button class="btn btn-default btn-danger btn-sm btnEliminar">
																Eliminar
															</button>		
														</div>
														
													</div>
												</td>
											</tr>
										<?php
											}
										?>
										</tbody>
									</table>
								</div>	
			                </div>
			                <div class="tab-pane fade" id="tab3default">Default 3</div>
			                <div class="tab-pane fade" id="tab4default">Default 4</div>
			                <div class="tab-pane fade" id="tab5default">Default 5</div>
			            </div>
			        </div>
			    </div>
		    </div>

	    </div>
		
	<!-- -->
	<!-- <div class="row marginNull">
		<ul>
			<li>
				<a href="#" class="aNav" target="divConsolidado">
					Consolidado
				</a>
				<a href="#" class="aNav" target="divDetalle">
					Detalle
				</a>
			</li>
		</ul>
	</div> -->
	<div class="divTab divConsolidado">
		
	</div>
	<div class="divTab divDetalle" style="display: none;">
		
	</div>
	
	<?php
		$this->load->view("parts/scripts.php");
	?>
	<script type="text/javascript" src=<?php echo base_url("content/js/paginas/AdminProducto/ingresoProductoUsuario/functions.js") ?>></script>
	<script type="text/javascript" src=<?php echo base_url("content/js/paginas/AdminProducto/ingresoProductoUsuario/script.js") ?>></script>

</body>
</html>