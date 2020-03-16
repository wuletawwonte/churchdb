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

  <link rel="stylesheet" href="<?php echo base_url('assets/vendors/bootstrap/css/bootstrap.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/skins/'.$this->session->userdata('skin').'.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/AdminLTE.min.css'); ?>">

  <link rel="shortcut icon" href="<?php echo base_url('assets/img/favicon.ico'); ?>">


<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="<?php echo base_url('assets/vendors/jquery/jquery.min.js'); ?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('assets/vendors/bootstrap/js/bootstrap.min.js'); ?>"></script>
  
<style type="text/css">

.profile-image {
  width: 80px;
  height: 80px;
  border-radius: 50%;
  font-size: 30px;
  color: #fff;
  text-align: center;
  line-height: 80px;
  margin: 0 0; 
}

</style>

</head>

<body class="hold-transition lockscreen">
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
    <a href="<?= base_url('users/relogin'); ?>"><?= $this->session->userdata('system_name'); ?></a>
  </div>
  <!-- User name -->
  <div class="lockscreen-name"><?= $_SESSION['current_user']['firstname'].' '.$_SESSION['current_user']['lastname']?></div>

  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item">
    <!-- lockscreen image -->
    <div class="lockscreen-image">
      <img src="<?= base_url(); ?>assets/<?php if($_SESSION['current_user']['profile_picture'] == NULL) { echo 'img/user-icon.jpg'; } else { echo 'profile_pictures/'.$_SESSION['current_user']['profile_picture']; } ?>" alt="User Image">
    </div>
    <!-- /.lockscreen-image -->

    <!-- lockscreen credentials (contains the form) -->
    <form class="lockscreen-credentials" method="POST" action="<?= base_url('users/login'); ?>">
      <input type="text" name="username" value="<?= $this->session->userdata('current_user')['username']; ?>" hidden>
      <div class="input-group">
        <input type="password" name="password" class="form-control" placeholder="የይለፍ ቃል">

        <div class="input-group-btn">
          <button type="submit" class="btn"><i class="glyphicon glyphicon-arrow-right text-muted"></i></button>
        </div>
      </div>
    </form>
    <!-- /.lockscreen credentials -->

  </div>
  <!-- /.lockscreen-item -->
  <div class="help-block text-center">
    ወዳ አካውንቶ ለመመለስ የይለፍ ቃሎን ያስገቡ
  </div>
  <div class="text-center">
    <a href="<?= base_url('users/logout'); ?>">ወይም በሌላ አካውንት ይግቡ</a>
  </div>
  <div class="lockscreen-footer text-center">
<strong><?= lang('copyright') ?> &copy; <?= date('Y'); ?> <a href="https://www.facebook.com/gracesoftwebdesign" target="blank"><b>Grace</b>Soft webdesign</a>.</strong> <?= lang('all_rights_reserved') ?>.  
</div>
</div>
<!-- /.center -->

</body>
</html>
