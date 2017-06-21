<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?php echo $this->config->item('contents_css'); ?>/sideNav.css" rel="stylesheet" />  

<!-- START Nav Navbar-->
<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title">
                <i class="ion-ios-paw"></i> 
                <span>Surname Name</span>
            </a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="<?php echo $this->config->item('contents_img'); ?>/img.jpg" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Welcome,</span>
                <h2>John Doe</h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu" data-element-id="side-bar">
            <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                    <li>
                        <a>
                            <i class="ion-ios-home"></i> Home 
                            <i class="ion-chevron-down pull-right"></i>
                        </a>
                        <ul class="nav child_menu">
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
                            <i class="ion-chevron-down pull-right"></i>
                        </a>
                        <ul class="nav child_menu">
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
                            <i class="ion-chevron-down pull-right"></i>
                        </a>
                        <ul class="nav child_menu">
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
            <div class="menu_section">
                <h3>Live On</h3>
                <ul class="nav side-menu">
                    <li>
                        <a>
                            <i class="ion-ios-home"></i> Home 
                            <i class="ion-chevron-down pull-right"></i>
                        </a>
                        <ul class="nav child_menu">
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
                            <i class="ion-chevron-down pull-right"></i>
                        </a>
                        <ul class="nav child_menu">
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
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
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
        <!-- /menu footer buttons -->
    </div>
</div>
<!-- END Nav Navbar-->

<script src="<?php echo $this->config->item('contents_js'); ?>/sideNav.js" type="text/javascript"></script>