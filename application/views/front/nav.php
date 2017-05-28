<?php 
	defined('BASEPATH') OR exit('No direct script access allowed'); 
	$resources_path = $this->config->item('resources_url');
	$resources_css = $resources_path . "/css";
	$resources_js = $resources_path . "/js";
	$resources_img = $resources_path . "/img";
?>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo site_url('front'); ?>">ROBERTO BARUFFI<br><span>Photographer</span></a>
            </div>

            <div class="collapse navbar-collapse" id="navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="<?php echo site_url('front'); ?>">Book</a>
                    </li>
                    <li class="page-scroll">
                        <a href="<?php echo site_url('front/about'); ?>">About Me</a>
                    </li>
                    <li class="page-scroll">
                        <a href="http://Www.artebaruffi.blogspot.com" target="_blank">Blog</a>
                    </li>
                    <li class="page-scroll">
                        <a href="<?php echo site_url('front/contact'); ?>">Contacts</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
