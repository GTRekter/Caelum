<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- <link href="<?php echo $this->config->item('contents_css'); ?>/sideNav.css" rel="stylesheet" />   -->

<!-- START: Side-navbar -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#" data-bind="click: onClickHome">
            WE ADMINISTRATION
        </a>
    </div>

    <ul class="nav navbar-right top-nav">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="flaticon-user65"></i> Administrator <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
                <li>
                    <a href="<?php echo base_url('index.php/'); ?>/AccountController/Logout">
                        <i class="fa fa-fw fa-power-off"></i> Log Out
                    </a>
                </li>
            </ul>
        </li>
    </ul>

    <div class="collapse navbar-collapse navbar-collapse">
        <ul class="nav navbar-nav side-nav">
            <li>
                <a href="#" data-bind="click: onClickHome"> 
                    <i class="ion-ios-home"></i> Dashboard
                </a>
            </li>
            <li class="header hidden-xs">Catalogo</li>
            <li class="bg-blue">
                <a href="#" data-bind="click: onClickDogs">
                    <i class="ion-ios-paw"></i> Cani 
                </a>
            </li>
            <li class="bg-blue">
                <a href="#" data-bind="click: onClickRaces"> 
                    <i class="ion-transgender"></i> Razze
                </a>
            </li>
            <!--
            <li class="bg-blue">
                <a href="#" data-bind="click: onClickExhibitions">
                    <i class="ion-trophy"></i> Esibizioni
                </a>
            </li>
            -->
            <li class="bg-blue">
                <a href="#" data-bind="click: onClickColors"> 
                    <i class="ion-ios-color-filter"></i> Colori
                </a>
            </li>
            <li class="header hidden-xs">Funzionalità</li>
            <li class="bg-red">
                <a href="javascript:;" data-toggle="collapse" data-target="#socialNetwork">
                    <i class="ion-earth"></i> Social Network 
                </a>
                <ul id="socialNetwork" class="collapse">
                    <li><a href="https://www.facebook.com/Latteria-Sociale-Beduzzo-Inferiore-1671775039732463/" target="_blank">Facebook</a></li>
                </ul>
            </li>
            <li class="header hidden-xs">Settaggi</li>
            <li class="bg-yellow">
                <a href="javascript:;" data-toggle="collapse" data-target="#exportData">
                    <i class="ion-gear-a"></i> Esportazione 
                </a>
                <ul id="exportData" class="collapse">
                    <li><a href="#" data-bind="click: onClickExportCsv">CSV</a></li>
                    <li><a href="#" data-bind="click: onClickExportXml">XML</a></li>
                </ul>
            </li>
            <li class="bg-yellow">
                <a href="#" data-bind="click: onClickClients"> 
                <i class="ion-ios-people"></i> Utenti
                </a>
            </li>
        </ul>
    </div>
</nav>
<!-- END: Side-navbar-->