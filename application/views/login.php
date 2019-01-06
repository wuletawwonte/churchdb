<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Arbaminch Mekane Eyesus Church Members Database" />
	<meta name="author" content="wuletawwonte@yahoo.com" />
	
	<title> የአርባምንጭ መካነ እየሱስ ምዕመናን መረጃ ቋት </title>
	

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/neon-forms.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css">

	<script src="<?php echo base_url(); ?>assets/js/jquery-1.11.0.min.js"></script>

	<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/favicon.ico">
	
</head>
<body class="page-body login-page login-form-fall">


<script type="text/javascript">
var baseurl = '<?php echo base_url(); ?>';
</script>

<div class="login-container">
	
	<div class="login-header login-caret">
		
		<div class="login-content" style="width:100%;">
			
			<a href="<?php echo base_url(); ?>" class="logo">
				<img src="<?php echo base_url(); ?>assets/img/logo.png" height="80" alt="" />			</a>
			
			<p class="description">
            	<h2 style="color:#cacaca; font-weight:100;">
					የአርባምንጭ መካነ እየሱስ ምዕመናን መረጃ ቋት              </h2>
           </p>
			
			<!-- progress bar indicator -->
			<div class="login-progressbar-indicator">
				<h3>43%</h3>
				<span>logging in...</span>
			</div>
		</div>
		
	</div>
	
	<div class="login-progressbar">
		<div></div>
	</div>
	
	<div class="login-form">
		
		<div class="login-content">
			
			<div class="form-login-error">
				<h3>Invalid login</h3>
				<p>Please enter correct email and password!</p>
			</div>
			
			<form method="post" role="form" id="form_login">
				
				<div class="form-group">
					
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-user"></i>
						</div>
						
						<input type="text" class="form-control" name="email" id="email" placeholder="ስም" autocomplete="off" data-mask="email" />
					</div>
					
				</div>
				
				<div class="form-group">
					
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-key"></i>
						</div>
						
						<input type="password" class="form-control" name="password" id="password" placeholder="የይለፍ ቃል" autocomplete="off" />
					</div>
				
				</div>
				
				<div class="form-group">
					<button type="submit" class="btn btn-primary btn-block btn-login">
						<i class="entypo-login"></i>
						ይግቡ
					</button>
				</div>
				
						
			</form>
			
			
			<div class="login-bottom-links">
				<a href="http://testlimat.wuletaw/login/forgot_password" class="link">
					የይለፍ ቃል ረሱ ?
				</a>
			</div>
			
		</div>
		
	</div>
	
</div>


	<!-- Bottom Scripts -->
	<script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/neon-login.js"></script>

</body>
</html>
