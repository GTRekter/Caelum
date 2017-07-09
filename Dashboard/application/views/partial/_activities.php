<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?php echo $this->config->item('contents_css'); ?>/activities.css" rel="stylesheet" />  

<!-- START: Activities -->
<div class="panel" data-element-id="activities" data-bind="visible: ActivitiesVisible"> 
    <div class="title">
        <h2>Recent Activities 
            <small>Sessions</small>
        </h2>
        <div class="clearfix"></div>
    </div>
    <div class="content">
        <ul>
            <li>
                <h2 class="title">
                    <a>Who Needs Sundance When You’ve Got&nbsp;Crowdfunding?</a>
                </h2>
                <div class="byline">
                    <span>13 hours ago</span> by 
                    <a>Jane Smith</a>
                </div>
                <p class="excerpt">Film festivals used to be do-or-die moments for movie makers. They were where you met the producers that could fund your project, and if the buyers liked your flick, they’d pay to Fast-forward and… <a>Read&nbsp;More</a></p>
            </li>
        </ul>
    </div>
</div>
<!-- END: Activities -->