<?php
	defined('BASEPATH') OR exit('No direct script access allowed'); 
?>

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
		<!--<link rel="apple-touch-icon" sizes="180x180" href="/bedemobile/Images/favicons/apple-touch-icon.png">
		<link rel="icon" type="image/png" href="/bedemobile/Images/favicons/favicon-32x32.png" sizes="32x32">
		<link rel="icon" type="image/png" href="/bedemobile/Images/favicons/favicon-16x16.png" sizes="16x16">
		<link rel="manifest" href="/bedemobile/Images/favicons/manifest.json">
		<link rel="mask-icon" href="/bedemobile/Images/favicons/safari-pinned-tab.svg" color="#5bbad5">
		<link rel="shortcut icon" href="/bedemobile/Images/favicons/favicon.ico">
		<meta name="msapplication-config" content="/bedemobile/Images/favicons/browserconfig.xml">
		<meta name="theme-color" content="#ffffff">-->

		<!-- CSS -->
		<link href="<?php echo $this->config->item('libraries_url'); ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet" />  
		<link href="<?php echo $this->config->item('contents_css'); ?>/login.css" rel="stylesheet" />

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="container hide" data-element-id="signin-box">
    		<div class="form-signin" role="form">
        		<div class="panel panel-default">
            		<div class="panel-body">
						<div class="col-xs-12">
							<img src="/bedemobile/Images/logo.png" class="img-responsive img-center" />
                    		<hr />
							<form action="<?php echo site_url('front/autenticate') ?>" autocomplete="off" class="form-horizontal" method="post">
								<input name="__RequestVerificationToken" type="hidden" value="" />                        
								<div class="form-group">
                            		<label class="control-label hidden-xs hidden-sm"></label>
                            		<div data-element-id="cookie-error">
                                	<br />
										<div class="alert alert-danger alert-dismissible" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
											<span>Cookies non abilitati - Cookies nicht aktiviert</span>
										</div>
									</div>
                        		</div>
								<div class="form-group">
									<div class="input-group">
										<input autocomplete="off" autofocus="true" class="form-control" data-val="true" data-val-length="The field User name must be a string with a maximum length of 50." data-val-length-max="50" data-val-required="The User name field is required." id="UserName" maxlength="50" name="UserName" placeholder="Username" required="required" type="text" value="" />
										<span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<input autocomplete="off" class="form-control" data-val="true" data-val-length="The field Password must be a string with a maximum length of 50." data-val-length-max="50" data-val-required="The Password field is required." id="Password" maxlength="50" name="Password" placeholder="Password" required="required" type="password" />
										<span class="input-group-addon"><i class="fa fa-lock" aria-hidden="true"></i></span>
									</div>
								</div>
								<div class="form-group">
									<button class="btn btn-lg btn-primary btn-block hide" type="submit" data-element-id="log-in-button">
										<i class="fa fa-key"></i>&nbsp;Log in
									</button>
									<button class="btn btn-lg btn-primary btn-block disabled" type="button" data-element-id="log-in-button-disabled">
										<i class="fa fa-spinner fa-spin"></i>&nbsp;Log in
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
						<a class="link-social link-youtube" href="https://www.youtube.com/user/DOCFLOWItalia/" target="_blank" title="Youtube">
							<i class="fa fa-youtube"></i>
						</a>
						<a class="link-social link-linkedin" href="https://www.linkedin.com/company/docflow/" target="_blank" title="Linkedin">
							<i class="fa fa-linkedin"></i>
						</a>
					</p>
				</div>
    		</div>
		</div>

		<!-- SCIRPT -->
		<script src="<?php echo $this->config->item('contents_js'); ?>/jquery-3.2.1.min.js"></script>   
		<script src="<?php echo $this->config->item('contents_js');  ?>/login.js"></script> 
  	</body>
</html>