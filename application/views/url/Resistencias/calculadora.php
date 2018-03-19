<?php 
	$options = "";
	foreach ($colores as $key => $value) {
		$options .= "<option value='".$key."'> ".$value."</option>";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Calculadora de resistencias</title>
	<?php
		$this->load->view("parts/head.php");
	?>
	<link rel="stylesheet" type="text/css" href=<?php echo base_url("content/css/paginas/resistencias/calculadora/style.css") ?> >
	<link rel="stylesheet" type="text/css" href=<?php echo base_url("content/css/paginas/resistencias/calculadora/media.css") ?> >
</head>
<body>
	<div class="container">
		<h2>Calculadora de resistencias</h2>
		<div class="row divCalculadora">
			<div class="col-lg-4">
				<div class="row">
					<label>Banda 1</label>
					<select class="form-control cbBanda cbBanda1" name="cbBanda1">
					<?php
						echo $options;
					?>
					</select>
				</div>		
				<div class="row">
					<label>Banda 2</label>
					<select class="form-control cbBanda cbBanda2" name="cbBanda2">	
						<?php
							echo $options;
						?>	
					</select>
					
				</div>		
				<div class="row">
					<label>Banda 3</label>
					<select class="form-control cbBanda cbBanda3" name="cbBanda3">	
						<?php
							echo $options;
						?>	
					</select>
				</div>		
				<div class="row">
					<label>Banda 4</label>
					<select class="form-control cbBanda cbBanda4" name="cbBanda4">	
						<?php
							echo $options;
						?>	
					</select>
				</div>		
				<div class="row divResultado">
					<label>Resultado: </label>
					
					<span class="spanNumeroResultado"></span> ohmios
				</div>		
			</div>
		</div>
		
		
	</div>
	<?php
		$this->load->view("parts/scripts.php");
	?>
	<script type="text/javascript" src=<?php echo base_url("content/js/paginas/resistencias/functions.js") ?> ></script>
	<script type="text/javascript" src=<?php echo base_url("content/js/paginas/resistencias/scripts.js") ?> ></script>
</body>
</html>