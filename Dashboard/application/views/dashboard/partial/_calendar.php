<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?php echo $this->config->item('libraries_url'); ?>/datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />  
<link href="<?php echo $this->config->item('contents_css'); ?>/calendar.css" rel="stylesheet" />  

<!-- START: Calendar -->
<div class="col-lg-6" data-bind="fadeVisible: CalendarVisible">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-calendar"></i> Calendario</h3>
        </div>
        <div class="panel-body">
            <div id="calendar" style="width: 100%"></div>
        </div>
    </div>
</div>
<!-- END: Calendar -->

<script src="<?php echo $this->config->item('libraries_url'); ?>/datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?php echo $this->config->item('contents_js'); ?>/calendar.js" type="text/javascript"></script>