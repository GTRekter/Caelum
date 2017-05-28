<?php 
	defined('BASEPATH') OR exit('No direct script access allowed'); 
	$resources_path = $this->config->item('resources_url');
	$resources_css = $resources_path . "/css";
	$resources_js = $resources_path . "/js";
	$resources_img = $resources_path . "/img";
?>

<!DOCTYPE html>
<html lang="it">
	<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="description" content="">
	    <meta name="author" content="">
	
	    <title>SB Admin - Bootstrap Admin Template</title>
	
	    <!-- Bootstrap Core CSS -->
	    <link href="<?php echo $resources_css; ?>/bootstrap.min.css" rel="stylesheet">
	
	    <!-- Custom CSS -->
	    <link href="<?php echo $resources_css; ?>/sb-admin.css" rel="stylesheet">
	
	    <!-- Morris Charts CSS -->
	    <link href="<?php echo $resources_css; ?>/plugins/morris.css" rel="stylesheet">
		
	    <!-- Custom Fonts -->
	    <link href="<?php echo $resources_path; ?>/icons/flaticon.css" rel="stylesheet" type="text/css">
	    <link href='https://fonts.googleapis.com/css?family=Raleway:100,300,500,700' rel='stylesheet' type='text/css'>
	
	    <!--[if lt IE 9]>
	        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	    <![endif]-->
	    
	    <!-- jQuery -->
	    <script src="<?php echo $resources_js; ?>/jquery.js"></script>
	</head>
