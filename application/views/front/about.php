<?php 
	defined('BASEPATH') OR exit('No direct script access allowed'); 
	$resources_path = $this->config->item('resources_url');
	$resources_css = $resources_path . "/css";
	$resources_js = $resources_path . "/js";
	$resources_img = $resources_path . "/img";
?>

<body>
	<section class="header about">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center margin-b-45">
					<h1>About Me</h1>
				</div>
				<div class="col-md-6" data-sr='wait 2s, then enter left and hustle 40px over 1.5s'>
					<p><?php echo $text->textEN; ?></p>
				</div>
				<div class="col-md-6" data-sr='wait 2s, then enter right and hustle 40px over 1.5s'>
					<p><?php echo $text->textIT; ?></p>
				</div>
			</div>
		</div>
	</section>
