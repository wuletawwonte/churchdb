<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>


	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Arbaminch Mekane Eyesus Church Members Database" />
	<meta name="author" content="wuletawwonte@yahoo.com" />
	
	<title> ቸርችDB </title>
	

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/iCheck/square/blue.css">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/AdminLTE.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/skins/skin-blue-light.min.css'); ?>">

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

	    #footer {
			font-family: 'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif;
			font-weight: 400;
	    }

	</style>


	<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/favicon.ico">
	
</head>
<!--  -->
<body class="hold-transition login-page">

<div class="se-pre-con"></div>

<div class="wrapper">
	<div class="login-box main-rapper">
	  <div class="login-logo">
	    <a href="<?= base_url(); ?>"><?php echo $system_name; ?></a>
	  </div>
	  <!-- /.login-logo -->
	  <div class="login-box-body">
	    <p class="login-box-msg">ወደ አካውንቶ ይግቡ</p>

	    <form action="<?php echo base_url(); ?>users/login" method="post">
	      <div class="form-group has-feedback">
	        <input type="text" class="form-control" name="username" placeholder="ስም">
	        <span class="glyphicon glyphicon-user form-control-feedback"></span>
	      </div>
	      <div class="form-group has-feedback">
	        <input type="password" name="password" class="form-control" placeholder="የይለፍ ቃል">
	        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
	      </div>

          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> አስታውሰኝ
            </label>
          </div>

	        <div>
	          <button type="submit" class="btn btn-primary btn-block btn-flat">ይዝለቁ</button>
	        </div>

	    </form>

				<?php if($this->session->flashdata('login_failed')) : ?>
					<br><p class="alert alert-danger alert-dismissible"><?php echo $this->session->flashdata('login_failed'); ?></p>
				<?php endif; ?>



	    <br><a href="#">የይለፍ ቃሌን ረስቻለው</a><br>

	  </div>
	  <!-- /.login-box-body -->
	</div>

	<div class="footer text-center" id="footer">
	    Copyright © <?= date('Y'); ?> <b><a href="https://www.gracesoft.com.et" target="_blank">Grace Soft Arbaminch</a>	
	</div>

</div>

<!-- jQuery 3 -->
<script src="<?php echo base_url('assets/vendors/jquery/jquery.min.js'); ?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>assets/vendors/bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?= base_url(); ?>assets/plugins/iCheck/icheck.min.js"></script>
<script>

    $(window).on('load', function() {
        // Animate loader off screen
        $(".se-pre-con").fadeOut("slow");
    });

    $(function () {
        $('input').iCheck({
	      checkboxClass: 'icheckbox_square-blue',
	      radioClass: 'iradio_square-blue',
	      increaseArea: '20%' /* optional */
	    });
    });


</script>
</body>
</html>
