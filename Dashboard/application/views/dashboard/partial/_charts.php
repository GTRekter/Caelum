<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- <link href="<?php echo $this->config->item('contents_css'); ?>/charts.css" rel="stylesheet" />   -->

<!-- START: Charts -->
<div data-bind="fadeVisible: ChartsVisible">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="ion-stats-bars"></i> 
                    Statistica annuale Cani - Visualizzazioni
                </h3>
            </div>
            <div class="panel-body">
                <div id="morris-area-chart"></div>
                <canvas id="area-chart"></canvas>
            </div>
        </div>
    </div>
</div>
<!-- END: Charts -->

<script src="<?php echo $this->config->item('libraries_url'); ?>/chart.js/js/chart.bundle.js"></script>
<script src="<?php echo $this->config->item('contents_js'); ?>/charts.js" type="text/javascript"></script>