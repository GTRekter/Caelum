<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?php echo $this->config->item('contents_css'); ?>/list.css" rel="stylesheet" />  

<!-- START: LIST -->
<div class="panel" data-bind="visible: ListVisible">

  <div class="title">
    <h2>Projects</h2>
    <div class="clearfix"></div>
  </div>

  <div class="content">

    <p>Simple table with project listing with progress and editing options</p>

    <!-- start project list -->
    <table class="table table-striped projects">
      <thead>
        <tr>
          <th style="width: 1%">#</th>
          <th style="width: 20%">Project Name</th>
          <th>Team Members</th>
          <th>Project Progress</th>
          <th>Status</th>
          <th style="width: 20%">#Edit</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>#</td>
          <td>
            <a>Pesamakini Backend UI</a>
            <br />
            <small>Created 01.01.2015</small>
          </td>
          <td>
            <ul class="list-inline">
              <li>
                <img src="<?php echo $this->config->item('contents_img'); ?>/user.png" class="avatar" alt="Avatar">
              </li>
              <li>
                <img src="<?php echo $this->config->item('contents_img'); ?>/user.png" class="avatar" alt="Avatar">
              </li>
              <li>
                <img src="<?php echo $this->config->item('contents_img'); ?>/user.png" class="avatar" alt="Avatar">
              </li>
              <li>
                <img src="<?php echo $this->config->item('contents_img'); ?>/user.png" class="avatar" alt="Avatar">
              </li>
            </ul>
          </td>
          <td class="project_progress">
            <div class="progress progress_sm">
              <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="57"></div>
            </div>
            <small>57% Complete</small>
          </td>
          <td>
            <button type="button" class="btn btn-success btn-xs">Success</button>
          </td>
          <td>
            <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
            <a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
            <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
          </td>
        </tr>
      </tbody>
    </table>
    <!-- end project list -->

  </div>

</div>
<!-- END: LIST -->