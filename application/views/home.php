<?php 
	defined('BASEPATH') OR exit('No direct script access allowed'); 
	$resources_path = $this->config->item('resources_url');
	$resources_css = $resources_path . "/css";
	$resources_js = $resources_path . "/js";
	$resources_img = $resources_path . "/img";
	
	$totLike = 0;
	$averagePhoto = 0;
	foreach ($products as $product) {
		$totLike += $product->facebookShare; 
		$totLike += $product->googleShare; 
		$totLike += $product->twitterShare; 
	}
	$averagePhoto = count($photos) / count($products);
?>

<div id="page-wrapper">
	<div class="container-fluid">

         <div class="row">
        	<div class="col-lg-12">
            	<h1 class="page-header">
                	Dashboard <small>Statistiche Generali</small>
                 </h1>
                 <ol class="breadcrumb">
	                 <li class="active">
	                 	<i class="fa fa-dashboard"></i> Dashboard
	                 </li>
                 </ol>
             </div>
         </div>
               
		 <div class="row">
         	<div class="col-lg-3 col-md-6">
            	<div class="panel panel-primary">
                	<div class="panel-heading">
                    	<div class="row">
                        	<div class="col-xs-3">
                            	<i class="fa fa-comments fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?php echo count($products) ?></div>
                                <div>Totale Articoli</div>
                             </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
            	<div class="panel panel-green">
                	<div class="panel-heading">
                    	<div class="row">
                        	<div class="col-xs-3">
                            	<i class="fa fa-tasks fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                            	<div class="huge"><?php echo count($photos); ?></div>
                               	<div>Totale Fotografie</div>
                           	</div>
                        </div>
                    </div>
            	</div>
            </div>
            <div class="col-lg-3 col-md-6">
            	<div class="panel panel-yellow">
                	<div class="panel-heading">
                    	<div class="row">
                        	<div class="col-xs-3">
                            	<i class="fa fa-shopping-cart fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                            	<div class="huge"><?php echo $totLike ?></div>
                                <div>Totale Condivisioni</div>
                            </div>
                        </div>
                    </div>
                 </div>
             </div>
            <div class="col-lg-3 col-md-6">
            	<div class="panel panel-red">
                	<div class="panel-heading">
                    	<div class="row">
                        	<div class="col-xs-3">
                            	<i class="fa fa-support fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                            	<div class="huge"><?php echo substr($averagePhoto,0,5); ?></div>
                                <div>Media Fotografie</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         </div>
		
		 <div class="row">
         	<div class="col-lg-8">
            	<div class="panel panel-default">
                	<div class="panel-heading">
                    	<h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Area Chart</h3>
                    </div>
                    <div class="panel-body">
                    	<div id="morris-area-chart"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
            	<div class="panel panel-default">
                	<div class="panel-heading">
                    	<h3 class="panel-title"><i class="fa fa-long-arrow-right fa-fw"></i> Donut Chart</h3>
                    </div>
                    <div class="panel-body">
                    	<div id="morris-donut-chart"></div>
                    </div>
                </div>
            </div>
         </div>

	</div>
</div>
