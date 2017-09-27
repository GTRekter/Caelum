<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="it">
	<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="author" content="Ivan Porta">
	    <meta name="description" content="Administration console">
	
	    <title>Ibisco Blu - Administration Console</title>
	
		<link href="<?php echo $this->config->item('libraries_url'); ?>/bootstrap/css/bootstrap.css" rel="stylesheet" />  
		<link href="<?php echo $this->config->item('libraries_url'); ?>/datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />
		<link href="<?php echo $this->config->item('contents_font'); ?>/ionicons/css/ionicons.css" rel="stylesheet" />	
		<link href="<?php echo $this->config->item('contents_css'); ?>/general.css" rel="stylesheet" />  

	    <!--[if lt IE 9]>
	        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	    <![endif]-->
		
		<script src="<?php echo $this->config->item('libraries_url'); ?>/jquery/js/jquery-3.2.1.min.js"></script>
		<script src="<?php echo $this->config->item('libraries_url'); ?>/knockoutjs/js/knockout-3.4.2.js"></script>
	</head>

	<body 
		data-content-img-url="<?php echo $this->config->item('contents_img'); ?>"
		data-base-url="<?php echo base_url('index.php/'); ?>">
		<div id="wrapper">
			<?php echo $sideNav; ?>

			<div id="page-wrapper">
				<div class="container-fluid">

					<?php echo $topTitle; ?>

					<div class="row">	
						<?php echo $charts; ?>	

						<?php echo $chat; ?>

						<?php echo $calendar; ?>		

						<?php echo $list; ?>

						<?php echo $details; ?>	
					</div>	

				</div>
			</div>
		</div>

		<?php echo $modals; ?>	

		<script src="<?php echo $this->config->item('contents_js'); ?>/general.js" type="text/javascript"></script>
		<script src="<?php echo $this->config->item('libraries_url'); ?>/bootstrap/js/bootstrap.js" type="text/javascript"></script>
		<script src="<?php echo $this->config->item('libraries_url'); ?>/datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
	</body>
</html>