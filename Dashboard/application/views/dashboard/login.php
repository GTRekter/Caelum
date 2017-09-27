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
		<link href="<?php echo $this->config->item('libraries_url'); ?>/bootstrap/css/bootstrap.css" rel="stylesheet" />  
		<link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" />
		<link href="<?php echo $this->config->item('contents_css'); ?>/login.css" rel="stylesheet" />
		
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

		<script src="<?php echo $this->config->item('libraries_url'); ?>/jquery/js/jquery-3.2.1.min.js"></script>
		<script src="<?php echo $this->config->item('libraries_url'); ?>/knockoutjs/js/knockout-3.4.2.js"></script>
	</head>
	<body 
		data-base-url="<?php echo base_url('index.php/'); ?>">

		<div class="container" data-bind="visible: loginVisible">
    		<div class="form-signin" role="form">

        		<div class="panel panel-default">
            		<div class="panel-body">
						<div class="col-xs-12">
							<img src="<?php echo $this->config->item('contents_img'); ?>/logo.png" class="img-responsive img-center" />
							<hr />
							
							<form class="form-horizontal" 
								action="<?php echo base_url('index.php/'); ?>/AccountController/Autenticate" 
								method="POST">
								<!-- Error Messages -->
								<div class="form-group">
                            		<!-- <label class="control-label hidden-xs hidden-sm"></label> -->

                            		<div data-bind="visible: cookieErrorVisible">
                                		<br />
										<div class="alert alert-danger alert-dismissible" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
											<span><b>Attenzione:</b> Cookies non abilitati</span>
										</div>
									</div>

									<div data-bind="visible: attemptsErrorVisible">
                                		<br />
										<div class="alert alert-danger alert-dismissible" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
											<span>
												<b>Attenzione:</b> 
												<span data-bind="text: loginAttempts"></span> Tentativi/o rimasti/o
											</span>
										</div>
									</div>
									<div data-bind="visible: noAttemptsErrorVisible">
                                		<br />
										<div class="alert alert-danger alert-dismissible" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
											<span>
												<b>Attenzione:</b> 
												Il seguente IP <span data-bind="text: loginIp"></span> è stato bloccato per motivi di sicurezza. Cotatta l'assistenza all'indirizzo mail assistenza@dominio.it
											</span>
										</div>
									</div>
								</div>
								
								<!-- Login Inputs --> 
								<input type="hidden" 
									name="<?php echo $this->security->get_csrf_token_name(); ?>" 
									value="<?php echo $this->security->get_csrf_hash(); ?>" />                      

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
									<button class="btn btn-lg btn-primary btn-block" 
										type="submit"
									 	data-bind="css: { disabled: submitEnabled() == false }">
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
		<script src="<?php echo $this->config->item('contents_js');  ?>/login.js"></script> 
  	</body>
</html>