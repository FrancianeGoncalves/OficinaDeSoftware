<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="pt-br" itemscope itemtype="http://schema.org/WebPage">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="<?= base_url('assets/material-kit/assets/img/apple-icon.png') ?>" rel="apple-touch-icon" sizes="76x76"/>
	<link rel="icon" type="image/png" href="<?= base_url('assets/material-kit/assets/img/favicon.png') ?>">
	<title>
		O que tem pra hoje?
	</title>
	<!--     Fonts and icons     -->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
	<!-- Nucleo Icons -->
	<link href="<?= base_url('assets/material-kit/assets/css/nucleo-icons.css') ?>" rel="stylesheet" />
	<link href="<?= base_url('assets/material-kit/assets/css/nucleo-svg.css') ?>" rel="stylesheet" />
	<!-- Font Awesome Icons -->
	<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
	<!-- Material Icons -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
	<!-- CSS Files -->
	<link id="pagestyle" href="<?=base_url('assets/material-kit/assets/css/material-kit.css?v=3.0.4')?>" rel="stylesheet" />
</head>

<body class="sign-in-basic">
<!-- Navbar Transparent -->
<!--<nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3  navbar-transparent ">-->
<!--	<div class="container">-->
<!--		<div class="row">-->
<!--			<div class="col-sm col-sm col-lg-3">-->
<!--				<a class="navbar-brand  text-white " href="--><?//=base_url()?><!--" rel="tooltip" title="O que tem pra hoje?" data-placement="bottom">-->
<!--					<img src="--><?//=base_url('assets/img/now-logo.png')?><!--" class="img-fluid border-radius-lg" alt="Responsive image">-->
<!--				</a>-->
<!--			</div>-->
<!--		</div>-->
<!--	</div>-->
<!--</nav>-->
<!-- End Navbar -->
<div class="page-header align-items-start min-vh-100" style="background-image: url('<?=base_url('assets/img/fundo.jpg')?>');" loading="lazy">
	<span class="mask bg-gradient-dark opacity-6"></span>
	<div class="container my-auto">
		<div class="row">
			<div class="col-lg-4 col-md-8 col-12 mx-auto">
				<div class="card z-index-0 fadeIn3 fadeInBottom">
					<div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
						<div class="bg-gradient-warning shadow-primary border-radius-lg py-3 pe-1">
							<div class="col-sm col-sm col-lg-8 justify-content-center">
								<a class="navbar-brand  text-white " href="<?=base_url()?>" rel="tooltip" title="O que tem pra hoje?" data-placement="bottom">
									<img src="<?=base_url('assets/img/now-logo.png')?>" class="img-fluid border-radius-lg" alt="Responsive image">
								</a>
							</div>
							<div class="row mt-3">
								<div class="col-2 text-center ms-auto">
									<a class="btn btn-link px-3" href="javascript:;">
										<i class="fa fa-facebook text-white text-lg"></i>
									</a>
								</div>
								<div class="col-2 text-center px-1">
									<a class="btn btn-link px-3" href="javascript:;">
										<i class="fa fa-github text-white text-lg"></i>
									</a>
								</div>
								<div class="col-2 text-center me-auto">
									<a class="btn btn-link px-3" href="javascript:;">
										<i class="fa fa-google text-white text-lg"></i>
									</a>
								</div>
							</div>
						</div>
					</div>
					<div class="card-body">
						<form role="form" class="text-start">
							<div class="input-group input-group-outline my-3">
								<label class="form-label">Email</label>
								<input type="email" class="form-control">
							</div>
							<div class="input-group input-group-outline mb-3">
								<label class="form-label">Password</label>
								<input type="password" class="form-control">
							</div>
							<div class="form-check form-switch d-flex align-items-center mb-3">
								<input class="form-check-input" type="checkbox" id="rememberMe" checked>
								<label class="form-check-label mb-0 ms-3" for="rememberMe">Remember me</label>
							</div>
							<div class="text-center">
								<button type="button" class="btn bg-gradient-warning w-100 my-4 mb-2">Sign in</button>
							</div>
							<p class="mt-4 text-sm text-center">
								Don't have an account?
							</p>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<footer class="footer position-absolute bottom-2 py-2 w-100">
		<div class="container">
			<div class="row align-items-center justify-content-lg-between">
				<div class="col-12 col-md-6 my-auto">
					<div class="copyright text-center text-sm text-white text-lg-start">
						© <script>
							document.write(new Date().getFullYear())
						</script>,
						made with <i class="fa fa-heart" aria-hidden="true"></i> by
						<a href="https://www.creative-tim.com" class="font-weight-bold text-white" target="_blank">Creative Tim</a>
						for a better web.
					</div>
				</div>
				<div class="col-12 col-md-6">
					<ul class="nav nav-footer justify-content-center justify-content-lg-end">
						<li class="nav-item">
							<a href="https://www.creative-tim.com" class="nav-link text-white" target="_blank">Creative Tim</a>
						</li>
						<li class="nav-item">
							<a href="https://www.creative-tim.com/presentation" class="nav-link text-white" target="_blank">About Us</a>
						</li>
						<li class="nav-item">
							<a href="https://www.creative-tim.com/blog" class="nav-link text-white" target="_blank">Blog</a>
						</li>
						<li class="nav-item">
							<a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-white" target="_blank">License</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</footer>
</div>
<!--   Core JS Files   -->
<script src="<?=base_url('assets/material-kit/assets/js/core/popper.min.js" type="text/javascript')?>"></script>
<script src="<?=base_url('assets/material-kit/assets/js/core/bootstrap.min.js" type="text/javascript')?>"></script>
<script src="<?=base_url('assets/material-kit/assets/js/plugins/perfect-scrollbar.min.js')?>"></script>
<!--  Plugin for Parallax, full documentation here: https://github.com/wagerfield/parallax  -->
<script src="<?=base_url('assets/material-kit/assets/js/plugins/parallax.min.js')?>"></script>
<!-- Control Center for Material UI Kit: parallax effects, scripts for the example pages etc -->
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTTfWur0PDbZWPr7Pmq8K3jiDp0_xUziI"></script>
<script src="<?=base_url('assets/material-kit/assets/js/material-kit.min.js?v=3.0.4')?>" type="text/javascript"></script>
</body>

</html>
