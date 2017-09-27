<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- <link href="<?php echo $this->config->item('contents_css'); ?>/topTitle.css" rel="stylesheet" />   -->

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <span data-bind="text: Title"></span> 
            <small data-bind="text: Subtitle"></small>
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="ion-ios-home"></i> 
                <span data-bind="text: Title"></span> 
            </li>
        </ol>
    </div>
</div>    

<div class="row" data-bind="fadeVisible: TopTitleVisible">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="ion-ios-paw icon-45"></i> 
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge" data-bind="text: DogsCount"></div>
                        <div>Totale Cani</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="ion-transgender icon-45"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge" data-bind="text: RacesCount"></div>
                        <div>Totale Razze</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="ion-ios-color-filter icon-45"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge" data-bind="text: ColorsCount"></div>
                        <div>Totale Colori</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="ion-ios-people icon-45"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">N.D</div>
                        <div>Totale Clienti</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
		