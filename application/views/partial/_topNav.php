<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?php echo $this->config->item('contents_css'); ?>/topNav.css" rel="stylesheet" />  

<!-- START Top Navbar data-element-id="top-navbar" -->
<div data-element-id="top-navbar">
	<nav>
		<div class="nav toggle">
			<a id="menu_toggle" data-element-id="toggle">
				<i class="ion-navicon"></i>
			</a>
		</div>

		<ul class="nav navbar-nav navbar-right">
			<li>
				<a class="user-profile dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="javascript:;">
					<img src="<?php echo $this->config->item('contents_img'); ?>/img.jpg" alt="" >John Doe
					<span class=" fa fa-angle-down"></span>
				</a>
				<ul class="dropdown-menu dropdown-usermenu pull-right">
					<li>
						<a href="javascript:;"> Profile</a>
					</li>
					<li>
						<a href="javascript:;">
							<span class="badge bg-red pull-right">50%</span>
							<span>Settings</span>
						</a>
					</li>
					<li>
						<a href="javascript:;">Help</a>
					</li>
					<li>
						<a href="login.html">
							<i class="ion-log-out pull-right"></i> Log Out
						</a>
					</li>
				</ul>
			</li>

			<li class="dropdown" role="presentation">
				<a class="info-number dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="javascript:;">
					<i class="ion-ios-email-outline"></i>
					<span class="badge bg-green">6</span>
				</a>
				<ul class="dropdown-menu message-list" role="menu">
					<li>
						<a>
							<span class="image">
								<img alt="Profile Image" src="<?php echo $this->config->item('contents_img'); ?>/img.jpg">
							</span>
							<span>
								<span>John Smith</span>
								<span class="time">3 mins ago</span>
							</span>
							<span class="message">
								Film festivals used to be do-or-die moments for movie makers. They were where...
							</span>
						</a>
					</li>
					<li>
						<a>
							<span class="image">
								<img alt="Profile Image" src="<?php echo $this->config->item('contents_img'); ?>/img.jpg">
							</span>
							<span>
								<span>John Smith</span>
								<span class="time">3 mins ago</span>
							</span>
							<span class="message">
								Film festivals used to be do-or-die moments for movie makers. They were where...
							</span>
						</a>
					</li>
					<li>
						<a>
							<span class="image">
								<img alt="Profile Image" src="<?php echo $this->config->item('contents_img'); ?>/img.jpg">
							</span>
							<span>
								<span>John Smith</span>
								<span class="time">3 mins ago</span>
							</span>
							<span class="message">
								Film festivals used to be do-or-die moments for movie makers. They were where...
							</span>
						</a>
					</li>
					<li>
						<a>
							<span class="image">
								<img alt="Profile Image" src="<?php echo $this->config->item('contents_img'); ?>/img.jpg">
							</span>
							<span>
								<span>John Smith</span>
								<span class="time">3 mins ago</span>
							</span>
							<span class="message">
								Film festivals used to be do-or-die moments for movie makers. They were where...
							</span>
						</a>
					</li>
					<li class="text-center">
						<a>
							<strong>See All Alerts</strong>
							<i class="ion-chevron-right"></i>
						</a>
					</li>
				</ul>
			</li>
		</ul>
	</nav>
</div>
<!-- END Top Navbar-->

<script src="<?php echo $this->config->item('contents_js'); ?>/topNav.js" type="text/javascript"></script>
