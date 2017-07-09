<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?php echo $this->config->item('contents_css'); ?>/toDoList.css" rel="stylesheet" />  

<!-- START: ToDoList -->
<div class="panel" data-element-id="to-do-list" data-bind="visible: ToDoListVisible">
    <div class="title">
        <h2>To Do List 
            <small>Sample tasks</small>
        </h2>
        <div class="clearfix"></div>
    </div>
    <div class="content">
        <ul class="to_do">
            <li>
                <p>
                    <input type="checkbox"> Schedule meeting with new client 
                </p>
            </li>          
        </ul>
    </div>
</div>
<!-- END: ToDoList-->
