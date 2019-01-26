<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> <?php echo $this->session->userdata('system_name'); ?> </title>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/AdminLTE.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/skins/<?php echo $this->session->userdata('skin'); ?>.min.css">

  <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/favicon.ico">


<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>assets/vendors/jquery/jquery.min.js"></script>
  

</head>

<body class="hold-transition <?php echo $this->session->userdata('skin'); ?> sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="<?php echo base_url(); ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><?php echo $this->session->userdata('system_name_short'); ?></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><?php echo $this->session->userdata('system_name'); ?></span>
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
              <i class="fa fa-envelope-o"></i>
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
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
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
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- Inner Menu: contains the notifications -->
                <ul class="menu">
                  <li><!-- start notification -->
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <!-- end notification -->
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- Tasks Menu -->
          <li class="dropdown tasks-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">9</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              <li>
                <!-- Inner menu: contains the tasks -->
                <ul class="menu">
                  <li><!-- Task item -->
                    <a href="#">
                      <!-- Task title and progress text -->
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <!-- The progress bar -->
                      <div class="progress xs">
                        <!-- Change the css width attribute to simulate progress -->
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li>
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="<?php echo base_url(); ?>assets/img/user-icon.jpg" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php echo $this->session->userdata('name'); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="<?php echo base_url(); ?>assets/img/user-icon.jpg" class="img-circle" alt="User Image">

                <p>
                  <?php echo $this->session->userdata('system_name'); ?> - Admin
                  <small>Member since Nov. 2012</small>
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
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url(); ?>users/logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
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
          <p><?php echo $this->session->userdata('name'); ?></p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header"><?= lang('menu'); ?></li>
        <!-- Optionally, you can add icons to the links -->
        <li <?php if($active_menu == 'dashboard') { ?> class="active" <?php } ?>><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> <span><?= lang('dashboard'); ?></span></a></li>
        
        <li <?php if($active_menu == 'personregistration') { ?> class="active" <?php } ?> class="treeview">
          <a href="#"><i class="fa fa-users"></i> <span> <?= lang('people'); ?></span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li <?php if($active_menu == 'generalsetting') { ?> class="active" <?php } ?>>
                <a href="<?php echo base_url(); ?>admin/generalsetting">
                    <i class="fa fa-angle-double-right"></i> <?= lang('dashboard'); ?></a>
            </li>
            
            <li <?php if($active_menu == 'personregistration') { ?> class="active" <?php } ?>>
                <a href="<?php echo base_url(); ?>admin/personregistration">
                    <i class="fa fa-angle-double-right"></i> <?= lang('add_new_person'); ?></a>
            </li>
            
            <li <?php if($active_menu == 'generalsetting') { echo "class='active'"; } ?>>
                <a href="<?php echo base_url(); ?>admin/generalsetting">
                    <i class="fa fa-angle-double-right"></i> <?= lang('view_all_persons'); ?></a>
            </li>
            
            <li <?php if($active_menu == 'familyregistration') { echo "class='active'"; } ?>>
                <a href="<?php echo base_url(); ?>admin/familyregistration">
                    <i class="fa fa-angle-double-right"></i> <?= lang('add_new_family'); ?> </a>
            </li>
            
            <li <?php if($active_menu == 'generalsetting') { echo "class='active'"; } ?>>
                <a href="<?php echo base_url(); ?>admin/generalsetting">
                    <i class="fa fa-angle-double-right"></i> <?= lang('families'); ?> </a>
            </li>
                        
          </ul>
        </li>

        <li <?php if($active_menu == 'sunday_school') { ?> class="active" <?php } ?>><a href="<?php echo base_url(); ?>admin/users"><i class="fa fa-child"></i> <span><?= lang('sunday_school'); ?></span></a></li>
        <li <?php if($active_menu == 'sunday_school') { ?> class="active" <?php } ?>><a href="<?php echo base_url(); ?>admin/users"><i class="fa fa-tag"></i> <span><?= lang('groups'); ?></span></a></li>
        <li <?php if($active_menu == 'sunday_school') { ?> class="active" <?php } ?>><a href="<?php echo base_url(); ?>admin/users"><i class="fa fa-file-pdf-o"></i> <span><?= lang('data_report'); ?></span></a></li>
        <li <?php if($active_menu == 'generalsetting') { ?> class="active" <?php } ?> class="treeview">
          <a href="#"><i class="fa fa-gears"></i> <span><?= lang('setting'); ?></span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li <?php if($active_menu == 'generalsetting') { ?> class="active" <?php } ?>><a href="<?php echo base_url(); ?>admin/generalsetting"><i class="fa fa-angle-double-right"></i> General Setting</a></li>
            <li <?php if($active_menu == 'usersetting') { ?> class="active" <?php } ?>><a href="<?php echo base_url(); ?>admin/generalsetting"><i class="fa fa-angle-double-right"></i> Self Registration</a></li>
            <li><a href="#"><i class="fa fa-angle-double-right"></i> User Setting</a></li>
          </ul>
        </li>
      
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>















