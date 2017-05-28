<?php 
	defined('BASEPATH') OR exit('No direct script access allowed'); 
	$resources_path = $this->config->item('resources_url');
	$resources_css = $resources_path . "/css";
	$resources_js = $resources_path . "/js";
	$resources_img = $resources_path . "/img";
?>

<body>
	<div id="wrapper">
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo site_url('back/index'); ?>">
                	WE ADMINISTRATION
                </a>
            </div>
            
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    	<i class="flaticon-user65"></i> Roberto Baruffi <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo site_url('back/logout'); ?>"><i class="fa fa-fw fa-power-off"></i> Log Out</a></li>
                    </ul>
                </li>
            </ul>
            
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
	                <li><a href="<?php echo site_url('back'); ?>"> <i class="flaticon-piegraph"></i> Dashboard</a></li>
                    <li class="header hidden-xs">Catalogo</li>
                    <li class="bg-blue">
                        <a href="javascript:;" data-toggle="collapse" data-target="#products">
                        	<i class="flaticon-read1"></i>  Articoli </a>
                        <ul id="products" class="collapse">
                            <li><a href="<?php echo site_url('back/products'); ?>">Lista Articoli</a></li>
                            <li><a href="<?php echo site_url('back/n_product'); ?>">Inserisci Articolo</a></li>
                        </ul>
                    </li>
					<li class="bg-green"><a href="<?php echo site_url('back/texts'); ?>"> <i class="flaticon-ruler9"></i> Testi</a></li>
					<li class="header hidden-xs">Funzionalità</li>
					<li class="bg-yellow">
					    <a href="javascript:;" data-toggle="collapse" data-target="#exportData">
					    	<i class="flaticon-cloud79"></i>  Esportazione 
					    </a>
					    <ul id="exportData" class="collapse">
					        <li><a href="<?php echo site_url('back/csv'); ?>">CSV</a></li>
					        <li><a href="<?php echo site_url('back/xml'); ?>">XML</a></li>
					    </ul>
					</li>
					<li class="bg-red">
					    <a href="javascript:;" data-toggle="collapse" data-target="#socialNetwork">
					    	<i class="flaticon-twitter42"></i> Social Network 
					    </a>
					    <ul id="socialNetwork" class="collapse">
					        <li><a href="https://www.facebook.com/roberto.baruffi.7?fref=ts">Facebook</a></li>
					        <li><a href="https://twitter.com/artebaruffi">Twitter</a></li>
					        <li><a href="https://instagram.com/robertobaruffi/">Instagram</a></li>
					    </ul>
					</li>
                </ul>
            </div>
        </nav>
        
        <script type="text/javascript">
        /* AUTO COLLAPSE ON CLICK OUTSIDE */
        $(document).ready(function () {
            $(document).click(function (event) {
                $('.navbar-collapse li ul').collapse('hide');
            });
        });
        </script>
