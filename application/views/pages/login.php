<?php
	defined('BASEPATH') OR exit('No direct script access allowed'); 
	$resources_path = $this->config->item('resources_url');
	$resources_css = $resources_path . "/css";
	$resources_js = $resources_path . "/js";
	$resources_img = $resources_path . "/img";
?>

<!DOCTYPE html>
<html>
	<head>
    	<meta charset="UTF-8">
    	<title>WE ADMIN | Log in</title>
    	<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    	
        <!-- Bootstrap Core CSS -->
        <link href="<?php echo $resources_css; ?>/bootstrap.min.css" rel="stylesheet">
    
        <!-- Custom CSS -->
        <link href="<?php echo $resources_css; ?>/sb-admin.css" rel="stylesheet">
        
    	<!-- Font Awesome Icons -->
    	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

	    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	    <!--[if lt IE 9]>
	        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	    <![endif]-->
 	</head>
 	
  	<style>
  	body {
  		background-color: #ecf0f5;
  	}
  	.panel-heading {
  	    padding: 5px 15px;
  	}
  	
  	.panel-footer {
  		padding: 1px 15px;
  		color: #A0A0A0;
  	}
  	
  	.profile-img {
  		width: 96px;
  		height: 96px;
  		margin: 0 auto 10px;
  		display: block;
  	}
  	</style>
  	
  	<body>
		<div class="container" style="margin-top:100px">
			<div class="row">
				<div class="col-sm-6 col-md-4 col-lg-offset-4 col-md-offset-4 col-sm-offset-3">
					<div class="panel panel-default">
						<div class="panel-body">
							<form role="form" action="<?php echo site_url('front/autenticate') ?>" method="POST">
								<div class="row">
									<div class="center-block">
										<img class="profile-img" src="<?php echo $resources_img; ?>/logo.png" alt="">
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12 col-md-10  col-md-offset-1 ">
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="fa fa-user"></i>
												</span> 
												<input type="email" id="email" name="email" class="form-control" placeholder="Email" autofocus="true"/>
											</div>
										</div>
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="fa fa-lock"></i>
												</span>
												<input type="password" id="password" name="password" class="form-control" placeholder="Password"/>
											</div>
										</div>
										<div class="form-group">
											<input type="submit" class="btn btn-lg btn-primary btn-block" value="Log in">
										</div>
									</div>
								</div>
							</form>
						</div>
		            </div>
				</div>
			</div>
		</div>

    <!-- jQuery 2.1.4 -->
    <script src="<?php echo $resources_path ?>/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php echo $resources_path ?>/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="<?php echo $resources_path ?>/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    
    <?php 
    $flashdata = $this->session->flashdata('message');
    if (!empty($flashdata)) : ?>
    	<script>
    		alert('<?php echo trim(json_encode($flashdata),'"'); ?>');
    	</script>
    <?php endif; ?>
    
  </body>
</html>