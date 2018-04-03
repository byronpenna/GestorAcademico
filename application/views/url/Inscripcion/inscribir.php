<!DOCTYPE html>
<html>
<head>
	<title>Inscripcion</title>
	<?php
		$this->load->view("parts/head.php");
	?>
</head>
<body>
	<?php $this->load->view("parts/header.php") ?>
	<pre>
		<?php 
		print_r($anios);
		?> 
	</pre>
	<input type="hidden" name="txtHdObtenerSeccion" class="txtHdObtenerSeccion" value=<?php echo site_url("InscripcionController/obtenerSeccionesDeAnio") ?>>
	<input type="hidden" name="txtHdInscripcionSeccion" class="txtHdInscripcionSeccion" value=<?php echo site_url("InscripcionController/ajaxCargarInscritosSeccion") ?>>
	

	<div class="row marginNull">
		<div class="col-lg-4">
			<label>Seleccione anio</label>
			<select class="col-lg-4 form-control cbAnio" >
				<?php 
					foreach ($anios as $key => $anio) {
				?>
				<option value=<?php echo $anio->_idAnioEscolar ?> >
					<?php echo $anio->_anio ?>
				</option>
				<?php
					}
				?>		
			</select>
		</div>
	</div>
	<div class="row marginNull">
		<div class="col-lg-4">
			<label>Seleccione seccion</label>
			<select class="col-lg-4 form-control cbSeccion" >
				
			</select>
		</div>
	</div>
	<div class="row marginNull">
		<div class="col-lg-4">
			<button class="btn btn-default btnCargar">
				Cargar
			</button>
		</div>
	</div>

	<div class="row marginNull">
		<table class="table">
			<thead>
				<tr>
					<th>
						Alumno inscrito
					</th>
					<th>
						Acciones
					</th>
				</tr>
			</thead>
			<tbody>
				
			</tbody>
		</table>
	</div>

	<?php
		$this->load->view("parts/scripts.php");
	?>
	<script type="text/javascript" src=<?php echo base_url("content/js/paginas/Inscripcion/inscribir/functions.js") ?>></script>
	<script type="text/javascript" src=<?php echo base_url("content/js/paginas/Inscripcion/inscribir/script.js") ?>></script>
</body>
</html>