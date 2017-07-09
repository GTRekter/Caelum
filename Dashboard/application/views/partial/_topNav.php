<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?php echo $this->config->item('contents_css'); ?>/topNav.css" rel="stylesheet" />  

<!-- START Top Navbar data-element-id="top-navbar" -->
<div data-element-id="top-navbar">
	<nav>
		<div class="nav toggle">
			<a data-element-id="toggle" data-bind="click: onClickToggleSideNavbar">
				<i class="ion-navicon"></i>
			</a>
		</div>

		<ul class="nav navbar-nav navbar-right">
			<li>
				<a class="user-profile dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="javascript:;">
					<img src="<?php echo $this->config->item('contents_img'); ?>/img.jpg" alt="" >
					<?php echo $this->session->UserInfo->Name ." ". $this->session->UserInfo->Surname; ?>
					<span class=" fa fa-angle-down"></span>
				</a>
				<ul class="dropdown-menu dropdown-usermenu pull-right">
					<li>
						<a data-bind="click: onClickProfile"> Profile</a>
					</li>
					<li>
						<a data-bind="click: onClickHelp">Help</a>
					</li>
					<li>
						<a data-bind="click: onClickLogout">
							<i class="ion-log-out pull-right"></i> Log Out
						</a>
					</li>
				</ul>
			</li>

			<li class="dropdown" role="presentation">
				<a class="info-number dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="javascript:;">
					<i class="ion-ios-email-outline"></i>
					<span class="badge bg-green" data-bind="text: Messages.length"></span>
				</a>
				<ul class="dropdown-menu message-list" role="menu">
					<!-- ko foreach: Messages -->
					<li>
						<a>
							<span class="image">
								<img data-bind="attr: { alt: User.Name, src: ImagePath }">
							</span>
							<span>
								<span data-bind="text: User.Name"></span>
								<span class="time" data-bind="text: CreationDate"></span>
							</span>
							<span class="message" data-bind="text: Message"></span>
						</a>
					</li>
					<!-- /ko -->
					<!-- ko if: Messages.length == 0 -->
					<li class="text-center">
						<a>
							<strong>No message available</strong>
						</a>
					</li>
					<!-- /ko -->
					<!-- ko if: Messages.length > 5 -->
					<li class="text-center">
						<a>
							<strong>See All Alerts</strong>
							<i class="ion-chevron-right"></i>
						</a>
					</li>
					<!-- /ko -->
				</ul>
			</li>
		</ul>
	</nav>
</div>
<!-- END Top Navbar-->