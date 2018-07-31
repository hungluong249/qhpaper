<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Restaurant DEMO</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo site_url('assets/') ?>lib/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo site_url('assets/') ?>lib/fontAwesome/css/font-awesome.min.css">


    <!-- Google Font -->
    <!--<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,700,700i" rel="stylesheet">

	<!-- Owl Carousel -->
	<link rel="stylesheet" href="<?php echo site_url('assets/css/') ?>owl.carousel.css">
	<!-- Main Stylesheet -->
	<link rel="stylesheet" href="<?php echo site_url('assets/css/') ?>animate.min.css">

	<link rel="stylesheet" href="<?php echo site_url('assets/sass/') ?>main.min.css">
	<!-- Responsive Stylesheet -->
	<link rel="stylesheet" href="<?php echo site_url('assets/sass/') ?>responsive.min.css">

	<!-- jQuery 3 -->
	<script src="<?php echo site_url('assets/lib/') ?>jquery/jquery.min.js"></script>
	<!-- Js -->
	<script src="<?php echo site_url('assets/js/') ?>vendor/modernizr-2.6.2.min.js"></script>

	<script src="<?php echo site_url('assets/js/') ?>jquery.nav.js"></script>
	<script src="<?php echo site_url('assets/js/') ?>jquery.sticky.js"></script>
	<script src="<?php echo site_url('assets/js/') ?>plugins.js"></script>
	<script src="<?php echo site_url('assets/js/') ?>wow.min.js"></script>
	<script src="<?php echo site_url('assets/js/') ?>main.js"></script>

</head>

<body>

<header>
	<!--
    header-img start
    ============================== -->
	<section id="hero-area">
		<img class="img-responsive" src="<?php echo site_url('assets/img/') ?>header.jpg" alt="">
	</section>
	<!--
    Header start
	============================== -->
	<nav id="navigation">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="block">
						<nav class="navbar navbar-default">
							<div class="container-fluid">
								<!-- Brand and toggle get grouped for better mobile display -->
								<div class="navbar-header">
									<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
									<a class="navbar-brand" href="#">
										<img src="<?php echo site_url('assets/img/') ?>logo.png" alt="Logo">
									</a>

								</div>

								<!-- Collect the nav links, forms, and other content for toggling -->
								<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
									<ul class="nav navbar-nav navbar-right" id="top-nav">
										<li><a href="#hero-area">Home</a></li>
										<li><a href="#about-us">about us</a></li>
										<li><a href="#blog">Blog</a></li>
										<li><a href="#price">menu</a></li>
										<li><a href="#subscribe">news</a></li>
										<li><a href="#contact-us">contacts</a></li>
									</ul>
								</div><!-- /.navbar-collapse -->
							</div><!-- /.container-fluid -->
						</nav>
					</div>
				</div><!-- .col-md-12 close -->
			</div><!-- .row close -->
		</div><!-- .container close -->
	</nav><!-- header close -->
</header>
