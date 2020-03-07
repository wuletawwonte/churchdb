<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html;; charset=UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> <?php echo $this->session->userdata('system_name'); ?> </title>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="stylesheet" href="<?= base_url('assets/vendors/bootstrap/css/bootstrap.min.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/vendors/font-awesome/css/font-awesome.min.css'); ?>">
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendors/select2/css/select2.min.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendors/select2/css/select2-bootstrap.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/skins/skin-blue-light.min.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/AdminLTE.min.css'); ?>">

  <link rel="shortcut icon" href="<?= base_url('assets/img/favicon.ico'); ?>">
  
  <style type="text/css">
    
    .se-pre-con {
      position: fixed;
      left: 0px;
      top: 0px;
      width: 100%;
      height: 100%;
      z-index: 9999;
      background: url(<?= base_url('assets/img/ripple.gif'); ?>) center no-repeat #eee;
    }

  </style>

<!-- REQUIRED JS SCRIPTS -->
<script src="<?= base_url('assets/vendors/jquery/jquery.min.js'); ?>"></script>
<script src="<?= base_url(); ?>assets/vendors/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/vendors/select2/js/select2.min.js') ?>"></script>

</head>

<body class="hold-transition skin-blue-light sidebar-mini">
<div class="se-pre-con"></div>
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="<?php echo base_url(); ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><?= $this->session->userdata('system_name_short'); ?></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><?= $this->session->userdata('system_name'); ?></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <!-- inner menu: contains the messages -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <!-- User Image -->
                        <img src="<?php echo base_url(); ?>assets/img/admin.jpg" class="img-circle" alt="User Image">
                      </div>
                      <!-- Message title and timestamp -->
                      <h4>
                        Support Team
                        <small><i class="fa fa-time"></i> 5 mins</small>
                      </h4>
                      <!-- The message -->
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <!-- end message -->
                </ul>
                <!-- /.menu -->
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          <!-- /.messages-menu -->

          <!-- Notifications Menu -->
          <li class="dropdown notifications-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- Inner Menu: contains the notifications -->
                <ul class="menu">
                  <li><!-- start notification -->
                    <a href="#">
                      <i class="fa fa-user text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <!-- end notification -->
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="<?php echo base_url(); ?>assets/img/user-icon.jpg" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php echo $this->session->userdata('current_user')['firstname'].' '.$this->session->userdata('current_user')['lastname']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="<?php echo base_url(); ?>assets/img/user-icon.jpg" class="img-circle" alt="User Image">

                <p>
                  <?php echo $this->session->userdata('system_name'); ?> - Admin
                  <small><?= $this->session->userdata('church_name'); ?></small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat"><i class="fa fa-user"></i>  Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url(); ?>users/logout" class="btn btn-default btn-flat"><i class="fa fa-sign-out"></i> Sign out</a>
                </div>
              </li>
            </ul>
          </li>

        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url(); ?>assets/img/user-icon.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata('current_user')['firstname'].' '.$this->session->userdata('current_user')['lastname']; ?></p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> በመስመር ላይ</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <!-- <li class="header"><?= lang('menu'); ?></li> -->
        <!-- Optionally, you can add icons to the links -->
        <li <?php if($active_menu == 'dashboard') { ?> class="active" <?php } ?>><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i><span><?= lang('dashboard'); ?></span></a></li>
        <li <?php if($active_menu == 'personregistration') { ?> class="active" <?php } ?> ><a href="<?php echo base_url(); ?>admin/personregistration"><i class="fa fa-user-plus"></i> <?= lang('add_new_person'); ?></a></li>
        <li <?php if($active_menu == 'listmembers') { ?> class="active" <?php } ?> ><a href="<?php echo base_url(); ?>admin/listmembers"><i class="fa fa-users"></i> <?= lang('members'); ?></a></li>      
        <li <?php if($active_menu == 'groups') { ?> class="active" <?php } ?>><a href="<?php echo base_url(); ?>admin/listgroups"><i class="fa fa-object-group"></i> <span><?= lang('groups'); ?></span></a></li>
        <li <?php if($active_menu == 'sunday_school') { ?> class="active" <?php } ?>><a href="<?php echo base_url(); ?>admin/sunday_school_classes"><i class="fa fa-child"></i> <span><?= lang('sunday_school'); ?></span></a></li>

        <li <?php if($active_menu == 'adminreport') { ?> class="active" <?php } ?>><a href="<?php echo base_url(); ?>admin/adminreport"><i class="fa fa-file-pdf-o"></i> <span><?= lang('data_report'); ?></span></a></li>
        <li <?php if($active_menu == 'generalsetting') { ?> class="active" <?php } ?> ><a href="<?php echo base_url(); ?>admin/generalsetting"><i class="fa fa-gear"></i> ጠቅላላ መቼት </a></li>
        <li <?php if($active_menu == 'users') { ?> class="active" <?php } ?>><a href="<?php echo base_url(); ?>admin/users"><i class="fa fa-user-secret"></i> የሲስተም ተጠቃሚዎች </a></li>
        <li <?php if($active_menu == 'formelements') { ?> class="active" <?php } ?> ><a href="<?php echo base_url(); ?>admin/listformelements"><i class="fa fa-tags"></i> የቅፅ ማስተካከያ </a></li>

      
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>















