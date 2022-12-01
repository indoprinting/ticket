<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<!-- Apple devices fullscreen -->
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<!-- Apple devices fullscreen -->
	<meta names="apple-mobile-web-app-status-bar-style" content="black-translucent" />

	<title>Indoprinting support center</title>

	<!-- Bootstrap -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
	<!-- icheck -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/plugins/icheck/all.css">
	<!-- Theme CSS -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
	<!-- Color CSS -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/themes.css">


	<!-- jQuery -->
	<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>

	<!-- Nice Scroll -->
	<script src="<?php echo base_url(); ?>assets/js/plugins/nicescroll/jquery.nicescroll.min.js"></script>
	<!-- Validation -->
	<script src="<?php echo base_url(); ?>assets/js/plugins/validation/jquery.validate.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/plugins/validation/additional-methods.min.js"></script>
	<!-- icheck -->
	<script src="<?php echo base_url(); ?>assets/js/plugins/icheck/jquery.icheck.min.js"></script>
	<!-- Bootstrap -->
	<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/eakroko.js"></script>

	<!--[if lte IE 9]>
		<script src="js/plugins/placeholder/jquery.placeholder.min.js"></script>
		<script>
			$(document).ready(function() {
				$('input, textarea').placeholder();
			});
		</script>
	<![endif]-->


	<!-- Favicon -->
	<link rel="shortcut icon" href="img/favicon.ico" />
	<!-- Apple devices Homescreen icon -->
	<link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-precomposed.png" />

</head>

<body class='login'>
	<div class="wrapper">
		<h1>
			<a href="https://indoprinting.co.id">Indoprinting</a>
		</h1>
		<div class="login-body">
			<h2>SIGN IN</h2>
			<form action="login/login_process" method='post' class='form-validate' id="test">
				<?php if($this->session->flashdata('message')!='') { ?>
				<div class="alert alert-danger alert-dismissable">
					<button type="button" class="close" data-dismiss="alert">×</button>
					<?php echo $this->session->flashdata('message'); ?>
				</div>
				<?php } ?>
				<div class="form-group">
					<div class="email controls">
						<input type="text" name='username' placeholder="Username" class='form-control' data-rule-required="true">
					</div>
				</div>
				<div class="form-group">
					<div class="pw controls">
						<input type="password" name="password" placeholder="Password" class='form-control' data-rule-required="true">
					</div>
				</div>
				<div class="submit">
					<input type="submit" value="Sign me in" class='btn btn-primary'>
				</div>
			</form>
			<div class="forget">
				&nbsp;
				<!-- <a href="#">
					<span>Forgot password?</span>
				</a> -->
			</div>
		</div>
	</div>
</body>

</html>
