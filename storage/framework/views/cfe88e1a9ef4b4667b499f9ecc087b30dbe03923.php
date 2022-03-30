<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>FCB - Barça Academy</title>

		<!-- Bootstrap -->
		<link href="<?php echo e(url('')); ?>/packages/bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet">
		<!-- Fontawesome -->
		<link href="<?php echo e(url('')); ?>/packages/font-awesome-4.5.0/css/font-awesome.min.css" rel="stylesheet">
		<link href="<?php echo e(url('')); ?>/packages/bootstrap-sweetalert-master/lib/sweet-alert.css" rel="stylesheet">
 		<?php echo $__env->yieldContent('extracss'); ?>		
 		<link href="<?php echo e(url('')); ?>/packages/css/custom.css" rel="stylesheet">
 		<link href="<?php echo e(url('')); ?>/packages/css/live.css" rel="stylesheet">
		<link href="<?php echo e(url('')); ?>/packages/css/animate.min.css" rel="stylesheet">

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>

    <?php echo $__env->yieldContent('content'); ?>
	
    
	    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo e(url('')); ?>/packages/js/jquery.min.js"></script>
	<script src="<?php echo e(url('')); ?>/packages/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
	<script src="<?php echo e(url('')); ?>/packages/bootstrap-sweetalert-master/lib/sweet-alert.min.js"></script>
    <?php echo $__env->yieldContent('extrajs'); ?>
  </body>
</html>
