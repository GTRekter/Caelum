<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?php echo $this->config->item('contents_css'); ?>/charts.css" rel="stylesheet" />  

<!-- START: Charts -->
<div data-element-id="charts">

    <div class="row title">
        <div class="col-xs-12">
            <h3>Network Activities 
                <small>Graph title sub-title</small>
            </h3>
        </div>
    </div>

    <div class="row charts">
        <div class="col-md-9 col-sm-9 col-xs-12">
            <canvas data-element-id="chart"></canvas>
        </div>

        <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="title">
                <h2>Top Campaign Performance</h2>
                <div class="clearfix"></div>
            </div>

            <div class="col-md-12 col-sm-12 col-xs-6">
                <div>
                    <p>Facebook Campaign</p>
                    <div class="progress">
                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
                            <span class="sr-only">50% Complete</span>
                        </div>
                    </div> 
                </div>
                <div>
                    <p>Twitter Campaign</p>
                    <div class="progress">
                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                            <span class="sr-only">70% Complete</span>
                        </div>
                    </div> 
                </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-6">
                <div>
                    <p>Conventional Media</p>
                    <div class="progress">
                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 30%">
                            <span class="sr-only">30% Complete</span>
                        </div>
                    </div> 
                </div>
                <div>
                    <p>Bill boards</p>
                    <div class="progress">
                        <div class="progress-bar bg-red" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 10%">
                            <span class="sr-only">10% Complete</span>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>

</div>
<!-- END: Charts -->

<script src="<?php echo $this->config->item('libraries_url'); ?>/chart.js/js/chart.bundle.js"></script>
<script src="<?php echo $this->config->item('contents_js'); ?>/charts.js" type="text/javascript"></script>