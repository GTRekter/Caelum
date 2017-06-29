<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?php echo $this->config->item('contents_css'); ?>/sideNav.css" rel="stylesheet" />  

<!-- START: Side-navbar -->
<div data-element-id="side-navbar">
    <div>

        <div class="navbar title">
            <a href="#">
                <i class="ion-ios-paw"></i> 
                <span>Surname Name</span>
            </a>
        </div>

        <div class="navbar profile">
            <div class="picture">
                <img src="<?php echo $this->config->item('contents_img'); ?>/img.jpg" alt="..." class="img-circle">
            </div>
            <div class="info">
                <span>Welcome,</span>
                <h2>John Doe</h2>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="navbar side-navbar">
            <div class="section">
                <h3>General</h3>
                <ul class="nav">
                    <li>
                        <a>
                            <i class="ion-ios-home"></i> Home 
                            <i class="ion-chevron-down pull-right hidden-close"></i>
                        </a>
                        <ul class="nav">
                            <li>
                                <a href="index.html">Dashboard</a>
                            </li>
                            <li>
                                <a href="index2.html">Dashboard2</a>
                            </li>
                            <li>
                                <a href="index3.html">Dashboard3</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a>
                            <i class="ion-ios-home"></i> Home 
                            <i class="ion-chevron-down pull-right hidden-close"></i>
                        </a>
                        <ul class="nav">
                            <li>
                                <a href="index.html">Dashboard</a>
                            </li>
                            <li>
                                <a href="index2.html">Dashboard2</a>
                            </li>
                            <li>
                                <a href="index3.html">Dashboard3</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a>
                            <i class="ion-ios-home"></i> Home 
                            <i class="ion-chevron-down pull-right hidden-close"></i>
                        </a>
                        <ul class="nav">
                            <li>
                                <a href="index.html">Dashboard</a>
                            </li>
                            <li>
                                <a href="index2.html">Dashboard2</a>
                            </li>
                            <li>
                                <a href="index3.html">Dashboard3</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="section">
                <h3>Live On</h3>
                <ul class="nav">
                    <li>
                        <a>
                            <i class="ion-ios-home"></i> Home 
                            <i class="ion-chevron-down pull-right hidden-close"></i>
                        </a>
                        <ul class="nav">
                            <li>
                                <a href="index.html">Dashboard</a>
                            </li>
                            <li>
                                <a href="index2.html">Dashboard2</a>
                            </li>
                            <li>
                                <a href="index3.html">Dashboard3</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a>
                            <i class="ion-ios-home"></i> Home 
                            <i class="ion-chevron-down pull-right hidden-close"></i>
                        </a>
                        <ul class="nav">
                            <li>
                                <a href="index.html">Dashboard</a>
                            </li>
                            <li>
                                <a href="index2.html">Dashboard2</a>
                            </li>
                            <li>
                                <a href="index3.html">Dashboard3</a>
                            </li>
                        </ul>
                    </li>                 
                    <li>
                        <a href="javascript:void(0)">
                            <i class="ion-android-laptop"></i> Landing Page 
                            <span class="label label-success pull-right">Coming Soon</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
                <i class="ion-ios-gear-outline" aria-hidden="true"></i>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <i class="ion-arrow-expand" aria-hidden="true"></i>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                <i class="ion-ios-locked-outline" aria-hidden="true"></i>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <i class="ion-power" aria-hidden="true"></i>
            </a>
        </div>

    </div>
</div>
<!-- END: Side-navbar-->

<script src="<?php echo $this->config->item('contents_js'); ?>/sideNav.js" type="text/javascript"></script>