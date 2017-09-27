<!-- START: Navbar -->
<nav id="mainNav" class="navbar navbar-default navbar-fixed-top" >
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                <span class="sr-only">Toggle navigation</span> Menu 
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand centered-menu" href="#" data-element-link="homepage"> 
                <img src="<?php echo $this->config->item('contents_img'); ?>/frontend/Logo_complete.png" class="logo-menu"> 
            </a>
        </div>
        <div class="collapse navbar-collapse text-center" id="navbar-collapse">
            <ul class="ul-menu-navbar nav navbar-nav">
                <li>
                    <a href="#" data-element-link="retire">Pensione</a>
                </li>
                <li>
                    <a href="#" data-element-link="breeding">Allevamento</a>
                </li>
                <li>
                    <a href="#" data-element-link="contact">Contattaci</a>
                </li>
                <li>
                    <a href="#" data-element-link="about">Elena & Mirta</a>
                </li>
            </ul>
            <div class="hidden-sm hidden-md enci-icons">
                <img src="<?php echo $this->config->item('contents_img'); ?>/frontend/enci.png" class="enci-ico-nav">
                <img src="<?php echo $this->config->item('contents_img'); ?>/frontend/fci.png" class="fci-ico-nav">
            </div>
        </div>
    </div>
</nav>
<!-- END: Navbar -->