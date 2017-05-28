<?php 
	defined('BASEPATH') OR exit('No direct script access allowed'); 
	$resources_path = $this->config->item('resources_url');
	$resources_css = $resources_path . "/css";
	$resources_js = $resources_path . "/js";
	$resources_img = $resources_path . "/img";
?>

<body>
	<section class="header contacts">
		<!--[contact]-->
		<div class="container">
		    <div class="row contact">
		        <div class="col-xs-12 col-md-6 col-md-offset-2 contact-header" data-sr='wait 0.2s, then enter left and hustle 50px over 1s'>
		            <div class="border-contact"></div>
		            <h1>Contacts</h1>
		            <form method="post" action="<?php site_url('front/send_contact_form'); ?>"></form>
		            <div class="form-group">
		                <div class="input-group">
		                    <input type="text" class="form-control" name="InputName" id="InputName" placeholder="Name" required>
		                    <span class="input-group-addon"><i></i></span></div>
		            </div>
		            <div class="form-group">
		                <div class="input-group">
		                    <input type="email" class="form-control" id="InputEmail" name="InputEmail" placeholder="Email" required  >
		                    <span class="input-group-addon"><i></i></span></div>
		            </div>
		            <div class="form-group">
		                <div class="input-group">
		                    <textarea name="InputMessage" id="InputMessage" class="form-control" rows="10" placeholder="Message" required></textarea>
		                    <span class="input-group-addon"><i></i></span></div>
		            </div>
		            <div class="col-md-12 contact-send">
		                <button type="submit" name="submit" id="buttonContact" class="btn send hvr-shutter-out-vertical-contact-form">Send</button>
		            </div>
		            </form>
		        </div>
		        <div class="col-md-4 lead" data-sr='wait 0.1s, then enter bottom and hustle 55px over 1.5s'>
		            <h1>Info</h1>
		            <p>Mobile: +39 346 386 2003</p>
		            <p>Mail: roberto.baruffi@gmail.com</p>
		            <a href="https://www.facebook.com/roberto.baruffi.7?fref=ts" class="btn-social facebook" target="_blank">
		            	<i class="fa fa-facebook"></i>
		            </a>
		            <a href="https://twitter.com/artebaruffi" class="btn-social twitter" target="_blank">
		            	<i class="fa fa-twitter"></i>
		            </a>
		            <a href="https://instagram.com/robertobaruffi/" class="btn-social instagram" target="_blank">
		            	<i class="fa fa-instagram"></i>
		            </a>
		        </div>
		    </div>
		</div>
		<!--[contact-end]-->
	</section>
