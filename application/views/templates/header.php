<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html;; charset=UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> <?php echo $this->session->userdata('system_name'); ?> </title>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="stylesheet" href="<?= base_url('assets/vendors/bootstrap/css/bootstrap.min.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/vendors/font-awesome/css/font-awesome.min.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/vendors/pace/pace.min.css'); ?>">
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendors/select2/css/select2.min.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendors/select2/css/select2-bootstrap.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/skins/skin-yellow.min.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/AdminLTE.min.css'); ?>">
  <link rel="shortcut icon" href="<?= base_url('assets/img/favicon.ico'); ?>">
  
  <style type="text/css">
    
    textarea {
      resize: none;
    }

  </style>

<!-- REQUIRED JS SCRIPTS -->
<script src="<?= base_url('assets/vendors/jquery/jquery.min.js'); ?>"></script>
<script src="<?= base_url(); ?>assets/vendors/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/vendors/select2/js/select2.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/vendors/pace/pace.min.js') ?>"></script>

</head>

<body class="hold-transition skin-yellow sidebar-mini">
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

          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="<?= base_url(); ?>assets/<?php if($_SESSION['current_user']['profile_picture'] == NULL) { echo 'img/user-icon.jpg'; } else { echo 'profile_pictures/'.$_SESSION['current_user']['profile_picture']; } ?>" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php echo $this->session->userdata('current_user')['firstname'].' '.$this->session->userdata('current_user')['lastname']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="<?= base_url(); ?>assets/<?php if($_SESSION['current_user']['profile_picture'] == NULL) { echo 'img/user-icon.jpg'; } else { echo 'profile_pictures/'.$_SESSION['current_user']['profile_picture']; } ?>" class="img-circle" alt="User Image">

                <p>
                  <?php echo $this->session->userdata('system_name'); ?>
                  <small><?= $this->session->userdata('current_user')['user_type']; ?></small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?= base_url(); ?>admin/profile" class="btn btn-default btn-flat"><i class="fa fa-user"></i>  አካውንት </a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url(); ?>users/logout" class="btn btn-default btn-flat"><i class="fa fa-sign-out"></i> ዘግተው ይውጡ</a>
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
          <img src="<?= base_url(); ?>assets/<?php if($_SESSION['current_user']['profile_picture'] == NULL) { echo 'img/user-icon.jpg'; } else { echo 'profile_pictures/'.$_SESSION['current_user']['profile_picture']; } ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata('current_user')['firstname'].' '.$this->session->userdata('current_user')['lastname']; ?></p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> በመስመር ላይ</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">

        <li class="header"> ዋና ምርጫዎች </li>

        <li <?php if($active_menu == 'dashboard') { ?> class="active" <?php } ?>><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i><span><?= lang('dashboard'); ?></span></a></li>
        <li <?php if($_SESSION['current_user']['user_type'] == 'መደበኛ ተጠቃሚ' && $_SESSION['current_user']['p_register_member'] != 'allow'){ echo 'hidden'; } if($active_menu == 'personregistration') { ?> class="active" <?php } ?> ><a href="<?php echo base_url(); ?>admin/personregistration"><i class="fa fa-user-plus"></i> <span><?= lang('add_new_person'); ?></span></a></li>
        <li <?php if($active_menu == 'listmembers') { ?> class="active" <?php } ?> ><a href="<?php echo base_url(); ?>admin/listmembers"><i class="fa fa-users"></i> <span><?= lang('members'); ?></span></a></li>      
        <li <?php if($_SESSION['current_user']['user_type'] == 'መደበኛ ተጠቃሚ' && $_SESSION['current_user']['p_manage_group'] != 'allow'){ echo 'hidden'; } if($active_menu == 'groups') { ?> class="active" <?php } ?>><a href="<?php echo base_url(); ?>admin/listgroups"><i class="fa fa-object-group"></i> <span><?= lang('groups'); ?></span></a></li>
        <li <?php if($active_menu == 'sunday_school') { ?> class="active" <?php } ?> ><a href="<?php echo base_url(); ?>admin/sunday_school_classes"><i class="fa fa-child"></i> <span> የሰንበት ትምህርት </span></a></li>
        <li <?php if($active_menu == 'listpayments') { ?> class="active" <?php } ?> ><a href="<?php echo base_url(); ?>admin/listpayments"><i class="fa fa-money"></i> <span> ክፍያ </span></a></li>
        <li <?php if($active_menu == 'adminreport') { ?> class="active" <?php } ?> ><a href="<?php echo base_url(); ?>admin/adminreport"><i class="fa fa-book"></i><span> ጠቅላላ መረጃ </span></a></li>
        <li <?php if($active_menu == 'membersexport') { ?> class="active" <?php } ?> ><a href="<?php echo base_url(); ?>admin/membersexport"><i class="fa fa-file-pdf-o"></i><span> ምእመናን ሪፖርት </span></a></li>
        
        <li class="header" <?php if($_SESSION['current_user']['user_type'] == 'መደበኛ ተጠቃሚ' && $_SESSION['current_user']['p_manage_form'] != 'allow'){ echo 'hidden'; } ?> > ማስተካከያ </li>

        <li <?php if($_SESSION['current_user']['user_type'] == 'መደበኛ ተጠቃሚ' || $_SESSION['current_user']['user_type'] == 'የሲስተም አስተዳደር') { echo 'hidden'; } if($active_menu == 'generalsetting') { ?> class="active" <?php } ?> ><a href="<?php echo base_url(); ?>admin/generalsetting"><i class="fa fa-gear"></i><span> አጠቃላይ ማስተካከያዎች </span></a></li>
        <li <?php if($_SESSION['current_user']['user_type'] == 'መደበኛ ተጠቃሚ' || $_SESSION['current_user']['user_type'] == 'የሲስተም አስተዳደር') { echo 'hidden'; } if($active_menu == 'users') { ?> class="active" <?php } ?>><a href="<?php echo base_url(); ?>admin/users"><i class="fa fa-user-secret"></i><span> የሲስተም ተጠቃሚዎች </span></a></li>
        <li <?php if($_SESSION['current_user']['user_type'] == 'መደበኛ ተጠቃሚ' && $_SESSION['current_user']['p_manage_form'] != 'allow'){ echo 'hidden'; } if($active_menu == 'formelements') { ?> class="active" <?php } ?> ><a href="<?php echo base_url(); ?>admin/listformelements"><i class="fa fa-tags"></i><span> የቅፅ ማስተካከያ </span></a></li>
        <li <?php if($_SESSION['current_user']['user_type'] == 'መደበኛ ተጠቃሚ' || $_SESSION['current_user']['user_type'] == 'የሲስተም አስተዳደር') { echo 'hidden'; } if($active_menu == 'backupdatabase') { ?> class="active" <?php } ?> ><a href="<?php echo base_url(); ?>admin/backupdatabase"><i class="fa fa-database"></i><span> የመረጃቋት ባካፕ </span></a></li>
        <li <?php if($_SESSION['current_user']['user_type'] == 'መደበኛ ተጠቃሚ' || $_SESSION['current_user']['user_type'] == 'የሲስተም አስተዳደር') { echo 'hidden'; } if($active_menu == 'recyclebin') { ?> class="active" <?php } ?> ><a href="<?php echo base_url(); ?>admin/recyclebin"><i class="fa fa-trash"></i><span> ቆሼ </span></a></li>

<!--         <li <?php if($active_menu == 'account') { ?> class="active" <?php } ?> ><a href="<?php echo base_url(); ?>admin/profile"><i class="fa fa-user"></i><span> የአካውንት ማስተካከያ </span></a></li>
 -->
      
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>















