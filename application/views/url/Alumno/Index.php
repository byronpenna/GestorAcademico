<!DOCTYPE html>
<html>
<head>
	<title>Ingreso de alumno</title>
	<?php
		$this->load->view("parts/head.php");
	?>
</head>
<body>
	<pre>
		<?php 
			print_r($alumnos);
		?>
	</pre>
	<?php $this->load->view("parts/header.php") ?>
	<form method="post" action=<?php echo site_url("Alumno") ?> >
		
	</form>
	<div class="row marginNull">
		<div class="row marginNull">
			<div class="col-lg-4">
				<label>Seleccione persona</label>
				<select class="form-control">
					
					<?php 
						foreach ($personas as $key => $persona) {
					?>
						<option value=<?php echo $persona->_idPersona ?> >
							<?php 
								echo $persona->_nombres." ".$persona->_apellidos; 
							?>
						</option>

					<?php 
						}
					?>
				</select>
				
			</div>
		</div>
			
		<div  class="row marginNull">
			<div class="col-lg-4">
				<label>NIE</label>
				<input type="text" name="txtNIE" class="form-control txtNIE">
			</div>
		</div>
		<div  class="row marginNull">
			<div class="col-lg-4">
				<label>Carnet: </label>
				<input type="text" name="txtCarnet" class="form-control txtCarnet">
			</div>
				
		</div>
		<div  class="row marginNull">
			<div class="col-lg-4">
				
			</div>
		</div>	
	</div>
	
</body>
</html>