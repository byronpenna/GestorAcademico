<!DOCTYPE html>
<html>
<head>
	<title>Sacar</title>
	<?php
		$this->load->view("parts/head.php");
	?>
</head>
<body>
	<?php $this->load->view("parts/header.php") ?>
	
	<h2>Ventas</h2>
	<pre>
		<?php //print_r($ventas); ?>
	</pre>
	<input type="hidden" class="txtHdGetPresentaciones" value=<?php echo site_url("AdminProducto/ajax_getPresentaciones"); ?> >
	<input type="hidden" class="txtHdUrlEliminar" value=<?php echo site_url("VentaController/ajax_eliminarVenta"); ?>>
	<input type="hidden" class="txtHdUrlgetVentasByDate" name="" value=<?php echo site_url("VentaController/ajax_getVentasByDates"); ?>>
	<div class="row">
		<div class="col-lg-offset-1 col-lg-4">
			<form method="post" action=<?php echo site_url("AdminProducto/venta") ?> class="">
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
					<input type="text" class="form-control txtCantidad" name="txtCantidad">
				</div>
				<div class="row">
					<label>Cliente</label>
					<select class="form-control cbCliente" name="cbCliente">
						<?php 
							foreach ($clientes as $key => $cliente) {
						?>
							<option value=<?php echo $cliente->_idCliente; ?> > <?php echo $cliente->_nombreComercial ?> </option>
						<?php 
							}
						?>
					</select>
				</div>
				<div class="row">
					<label>Fecha</label>
					<input type="text" class="form-control txtFecha" name="txtFecha" >
				</div>
				<div class="row">
					<label>Tipo factura</label>
					<select class="form-control cbTipoFactura" name="cbTipoFactura">
						<?php
							foreach ($tiposFacturas as $key => $tipoFactura) {
						?>
							<option value=<?php echo $tipoFactura->_idTipoFactura ?> > <?php echo $tipoFactura->_tipoFactura ?> </option>
						<?php 
							}
						?>
					</select>
				</div>
				
				<div class="row">
					<label>Precio unitario</label>
					<input type="text" class="form-control txtPrecioUnitario" name="txtPrecioUnitario">
				</div>
				
				<div class="row">
					<button class="btn btn-primary">Sacar producto</button>
				</div>
			</form>	
		</div>
	</div>
	
	<div class="row marginNull" style="margin-top: 3%">
		<div class="col-lg-offset-1 col-lg-10">
			<div class="panel with-nav-tabs panel-default">
				<div class="panel-heading">
					<ul class="nav nav-tabs">
						<li class="">
							<a href="#tab1default" class="aNav" target="divConsolidado" data-toggle="tab">
								Consolidado
							</a>
						</li>
						<li class="active">
							<a href="#tab2default" class="aNav" target="divDetalle" data-toggle="tab">
								Detalle
							</a>
						</li>
					</ul>				
				</div>
				<div class="panel-body">
					
					<div class="tab-content">
						<div class="tab-pane fade " id="tab1default">
							
							<div class="row marginNull">
								
							</div>
						</div>
						<div class="row marginNull" style="margin-bottom: 4%;">
							<div class="col-lg-3">
								<label>Seleccione Usuario: </label>
								<?php 
									$tienePermiso = false;
									foreach ($rolesUsuario as $key => $rolUsuario) {
										if($rolUsuario->_rol->idRol_fk == 1){
											$tienePermiso = true;
											break;
										}
									}
								?>
								<?php 
									if (true){//$tienePermiso){
										//print_r($usuarios);
								?>
									<select class="form-control cbUsuarioBusqueda">
										<option value="-1">Todos</option>
										<?php 
											foreach ($usuarios as $key => $usuario) {
										?>

											<option value=<?php echo $usuario->_idUsuario ?> >
												<?php echo $usuario->_usuario ?>
											</option>
										<?php
											}
										?>
									</select>
								<?php		
									}
								?>	
							</div>
							
							
						</div>
						<div class="row marginNull" style="margin-bottom: 4%;">
							<form action=<?php echo site_url("") ?> class="frmBuscarDetalle form form-inline">
								<div class="col-lg-4">
									<label>Fecha inicio</label>
									<input type="text" name="txtFechaInicio" class="txtFechaInicio form-control">	
								</div>
								<div class="col-lg-4">
									<label>Fecha fin</label>
									<input type="text" class="txtFechaFin form-control" name="txtFechaFin">
								</div>
								<input type="submit" id="btnBuscar" value="Buscar">
							</form>
						</div>
						<div class="tab-pane fade in active" id="tab2default">
							<table class="tbSacar">
								<thead>
									<tr>
										<th class="hidden">Hidden</th>
										<th>Id Venta</th>
										<th> 
											Cliente
										</th>
										<th>
											Vendedor
										</th>
										<th>
											Producto
										</th>
										<th>
											Cantidad
										</th>
										<th>
											Precio unitario
										</th>
										<th>
											Fecha transaccion
										</th>
										<th>
											Tipo factura
										</th>
										<th>
											Total
										</th>
										<th>
											Acciones
										</th>
									</tr>
								</thead>
								<tbody class="tbVentas">
									<?php 
										foreach ($ventas as $key => $venta) {
									?>
										<tr>
											<td class="hidden">
												<input type="hidden" name="txtHdIdVenta" class="txtHdIdVenta" value=<?php echo $venta->_idVenta ?>>
											</td>
											<td>
												<?php
													echo $venta->_idVenta;
												?>
											</td>
											<td>
												<?php echo $venta->_cliente->_nombreComercial ?>
											</td>
											<td>
												<?php echo $venta->_usuario->_usuario ?>
											</td>
											<td>
												<?php echo $venta->_presentacion->_descripcion." (".$venta->_presentacion->_pesoNeto."g)" ?>
											</td>
											<td><?php echo $venta->_cantidad ?></td>
											<td>
												<?php 
												echo "$".$venta->_precioUnitario;
												?>
											</td>
											<td>
												<?php
												echo $venta->_fecha;
												?>
											</td>
											<td>
												<?php 
													echo $venta->_tipoFactura->_tipoFactura;
												?>
											</td>
											<td>
												<?php 
													echo "$".$venta->_precioUnitario * $venta->_cantidad;
												?>
											</td>
											<td>
												<button class="btn btn-danger btnEliminarVenta">
													Eliminar
												</button>
											</td>
										</tr>
									<?php 
										}
									?>
								</tbody>
							</table>	
							<div class="divTotalesSacar row marginNull" style="display: none">
								<div class="row marginNull" style="margin-top: 2%;">
									<h4 style="font-size: 2em">Consolidado</h4>
								</div>
								<div class="row marginNull" style="font-size: 1.3em">
									<div class="col-lg-2">
										<div class="panel panel-default">
											<div class="panel-heading" style="background: #3498db; color: white;">
												<h3 class="panel-title">
													Acumulado	
												</h3>
												 			
											</div>
											<div class="panel-body">
												$<span class="spAcumulado"></span>
											</div>

										</div>
									</div>
									<div class="col-lg-2">
										<div class="panel panel-default">
											<div class="panel-heading" style="background: #e74c3c; color: white;">
												<h3 class="panel-title">
													Comision:
												</h3>
												 			
											</div>
											<div class="panel-body">
												 $<span class="spComision"></span>
											</div>

										</div>
									</div>
									<div class="col-lg-2">
										<div class="panel panel-default">
											<div class="panel-heading" style="background: #2ecc71; color: white;">
												<h3 class="panel-title">
													Total FAPESA: 
												</h3>
												 			
											</div>
											<div class="panel-body">
												 $<span class="spTotalBusqueda"></span>
											</div>

										</div>
									</div>

								</div>
							</div>				
						</div>
			        </div>
				</div>
			</div>
		</div>
	</div>
	<div class="divTab divConsolidado">
		
	</div>
	<div class="divTab divDetalle">
		
	</div>
	<?php
		$this->load->view("parts/scripts.php");
	?>
	<script type="text/javascript" src=<?php echo base_url("content/js/paginas/AdminProducto/sacarProductoUsuario/functions.js") ?>></script>
	<script type="text/javascript" src=<?php echo base_url("content/js/paginas/AdminProducto/sacarProductoUsuario/script.js") ?>></script>

</body>
</html>