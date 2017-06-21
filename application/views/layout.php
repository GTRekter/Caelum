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
	
		<link href="<?php echo $this->config->item('libraries_url'); ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet" />  
		<link href="<?php echo $this->config->item('contents_font'); ?>/ionicons/css/ionicons.min.css" rel="stylesheet" />	
		<link href="<?php echo $this->config->item('contents_css'); ?>/general.css" rel="stylesheet" />  
	    <!--[if lt IE 9]>
	        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	    <![endif]-->
		<script src="<?php echo $this->config->item('libraries_url'); ?>/jquery/js/jquery-3.2.1.min.js"></script>
	</head>

	<body class="nav-md">
		<div class="container body">
			<div class="main_container">
				<?php echo $sideNav; ?>
				<?php echo $topNav; ?>
				<?php echo $home; ?>
			</div>
		</div>
		<script src="<?php echo $this->config->item('libraries_url'); ?>/angularjs/js/angular.js"></script>
		<script src="<?php echo $this->config->item('libraries_url'); ?>/angularjs/js/angular-animate.js"></script>
        <script src="<?php echo $this->config->item('libraries_url'); ?>/bootstrap/js/bootstrap.min.js" type="text/jaascript"></script>
    </body>
</html>
