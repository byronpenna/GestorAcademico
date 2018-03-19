<!DOCTYPE html>
<html>
<head>
	<title>Inicio</title>
	<?php
		$this->load->view("parts/head.php");
	?>
	<!-- <link rel="stylesheet" type="text/css" href=<?php echo base_url("content/css/paginas/welcome/style.css") ?> >
	<link rel="stylesheet" type="text/css" href=<?php echo base_url("content/css/paginas/welcome/media.css") ?> > -->
</head>
<body>
	<h2>Enlaces</h2>
	
	<div class="row marginNull">
		<?php 
			foreach ($enlaces as $key => $enlace) {
		?>
			<div class='row marginNull'>
				
					<div class='col-lg-4'>
						<?php echo $enlace->nombre ?>
					</div>
					<div class='col-lg-4'>
						<?php echo $enlace->descripcion ?>
					</div>
					<div class='col-lg-4'>
						<a target='blank' href=<?php echo $enlace->enlace ?> >
							descargar
						</a>				
					</div>
			</div>
		<?php 
			}
		?>
		
	</div>
	<?php
		$this->load->view("parts/scripts.php");
	?>

</body>

</html>