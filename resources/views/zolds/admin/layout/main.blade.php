<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>FCB - Barça Academy</title>

		<!-- Bootstrap -->
		<link href="{{url('')}}/packages/bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet">
		<!-- Fontawesome -->
		<link href="{{url('')}}/packages/font-awesome-4.5.0/css/font-awesome.min.css" rel="stylesheet">
		<link href="{{url('')}}/packages/bootstrap-sweetalert-master/lib/sweet-alert.css" rel="stylesheet">
 		@yield('extracss')		
 		<link href="{{url('')}}/packages/css/custom.css" rel="stylesheet">

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
  	<nav class="navbar navbar">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="{{url('/admin')}}"><img class="" src="{{url('')}}/packages/images/logo.jpg" /></a>
			</div>
			<div id="navbar" class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<li class="title-nav">
						PANEL DE CONTROL <span>ADMINISTRADOR</span>
					</li>
				</ul>

		
	
			</div><!--/.nav-collapse -->

		</div>
	</nav>




    @yield('content')
	
    
	    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{url('')}}/packages/js/jquery.min.js"></script>
	<script src="{{url('')}}/packages/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
	<script src="{{url('')}}/packages/bootstrap-sweetalert-master/lib/sweet-alert.min.js"></script>
    @yield('extrajs')
  </body>
</html>
