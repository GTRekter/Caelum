<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- METATITLES -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="">
		<meta name="author" content="Andrea Giada Bassani - Deginer | Ivan Porta - Developer">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Log in - Ibisco Blu </title>

		<!-- FAVICONS -->
		
		<!-- CSS -->
		<link href="<?php echo $this->config->item('libraries_url'); ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet" />  
		<link href="<?php echo $this->config->item('contents_font'); ?>/ionicons/css/ionicons.min.css" rel="stylesheet" />
		<link href="<?php echo $this->config->item('contents_css'); ?>/login.css" rel="stylesheet" />
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="container hide" data-element-id="signin-box" data-app-base-url="<?php echo site_url(); ?>">
    		<div class="form-signin" role="form">

        		<div class="panel panel-default">
            		<div class="panel-body">
						<div class="col-xs-12">
							<img src="#" class="img-responsive img-center" />
                    		<hr />
							<form action="<?php echo site_url('account/autenticate') ?>" class="form-horizontal" method="post">
								<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />                      
								<div class="form-group">
                            		<label class="control-label hidden-xs hidden-sm"></label>
                            		<div data-element-id="cookie-error">
                                	<br />
										<div class="alert alert-danger alert-dismissible" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
											<span><b>Attenzione:</b> Cookies non abilitati</span>
										</div>
									</div>
                        		</div>
								<div class="form-group">
									<div class="input-group">
										<input class="form-control" name="Username" type="text"
											maxlength="50" placeholder="Username" required="required" autofocus/>
										<span class="input-group-addon">
											<i class="ion-person" aria-hidden="true"></i>
										</span>
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<input class="form-control" name="Password" type="password" 
											maxlength="50" placeholder="Password" required="required" />
										<span class="input-group-addon">
											<i class="ion-locked" aria-hidden="true"></i>
										</span>
									</div>
								</div>
								<div class="form-group">
									<button class="btn btn-lg btn-primary btn-block" type="submit" data-element-id="login-button">
										<i></i>&nbsp; Log in
									</button>
								</div>        
							</form>
                		</div>
            		</div>
        		</div>

				<div id="login-footer">
					<p class="text-center text-muted">
						<a href="http://www.ibiscoblu.com/" target="_blank">© 2017 Ibisco Blu S.p.A - All rights reserved
						</a>
					</p>
					<p class="text-center">
						<a class="link-social link-youtube" href="#" target="_blank" title="Youtube">
							<i class="ion-social-youtube"></i>
						</a>
						<a class="link-social link-linkedin" href="#" target="_blank" title="Linkedin">
							<i class="ion-social-facebook"></i>
						</a>
					</p>
				</div>

    		</div>
		</div>

		<!-- SCIRPT -->
		<script src="<?php echo $this->config->item('libraries_url'); ?>/jquery/jquery-3.2.1.min.js"></script>   
		<script src="<?php echo $this->config->item('contents_js');  ?>/login.js"></script> 
  	</body>
</html>