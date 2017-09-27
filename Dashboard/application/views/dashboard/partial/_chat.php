<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- <link href="<?php echo $this->config->item('contents_css'); ?>/activities.css" rel="stylesheet" />   -->

<!-- START: Chat -->
<div class="col-lg-6" data-bind="fadeVisible: ChatVisible">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-comments-o"></i> Chat Pubblica</h3>
        </div>
        <div class="panel-body">
            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 250px;">
                <div class="box-body chat" id="chat-box" style="overflow: scroll; width: auto; height: 250px;"></div>
            </div>
            <form id="formMessage" action="">
                <div class="input-group">
                    <input type="text" name="messageText" class="form-control" placeholder="Scrivi il messaggio..." required />
                    <div class="input-group-btn">
                        <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END: Chat -->